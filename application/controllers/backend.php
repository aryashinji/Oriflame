<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend extends CI_Controller {
	public function index()
	{
		$this->check();
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$this->load->model('kontak_model');
		$query = $this->kontak_model->find();
        foreach ($query as $row) {
        	$data['kontak']['email'] = $row->Email;
        	$data['kontak']['telp'] = $row->Telp;	
        }
        $this->load->model('halutama_model');
        $query = $this->halutama_model->find();
        foreach ($query as $row)
        {
            $data['halutama']['isi'] = $row->Isi;
        }
		$edit=0;
		if($this->input->get('edit'))$edit=1;
		$data['enable'] = $edit;
		$this->load->view('templates/upheader');
		$this->load->view('css/sbadmin');
		$this->load->view('templates/endheader');
		$this->load->view('menu/adminmenu');
		$this->load->view('website/v_backend',$data);
		$this->load->view('templates/footer');
	}
	public function check()
	{
		$this->load->model('kontak_model');
		$data = $this->kontak_model->find();
		foreach ($data as $row) {
			if($this->session->userdata('logged_in') && $this->session->userdata('logged_in')['username'] == $row->Email)
			{
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
			}
			else
			{
				//If no session, redirect to login page
				redirect('login', 'refresh');
			}
		}
	}
	public function materi()
	{
		$this->check();
		$this->load->model('materi_model');
		$query = $this->materi_model->find();
		$i=0;
		foreach ($query as $row) {
			$data['materi'][$i]['idmateri'] = $row->IDMateri;
        	$data['materi'][$i]['judulmateri'] = $row->JudulMateri;
        	$data['materi'][$i]['linkmateri'] = $row->LinkMateri;	
        	$data['materi'][$i]['penjelasan'] = $row->Penjelasan;	
        	$i++;
        }
        $data['numrows'] = $i;
		$this->load->view('templates/upheader');
		$this->load->view('css/sbadmin');
		$this->load->view('templates/endheader');
		$this->load->view('menu/adminmenu');
		$this->load->view('website/adminmateri',$data);
		$this->load->view('templates/footer');
	}

	public function addajakan()
	{
		$this->check();
		$this->load->model('halutama_model');
		$data['idhal'] = 0;
		$data['isi'] = $this->input->post('deskripsi');
		if ($this->halutama_model->masuk($data))
		{
			$this->session->set_flashdata('message', 'berhasil');
		}
		else
		{
			$this->session->set_flashdata('message', 'gagal');
		}
		redirect(site_url('backend'));
	}

	public function addinfo()
	{
		$this->check();
		$this->load->model('kontak_model');
		$data['email'] = $this->input->post('emailadmin');
		$data['telp'] = $this->input->post('tlpadmin');

		$this->load->library('form_validation');
		$this->form_validation->set_rules('pass', 'Password', 'required|matches[passconf]|min_length[6]|max_length[12]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
		if ($this->form_validation->run() == FALSE)
		{
		      //if not valid
		  $this->session->set_flashdata('message', 'gagal');
		  redirect(site_url('backend'));
		}
		else
		{
		      //if valid
			$tmp = $this->session->userdata('logged_in')['id'];
			$save = $this->kontak_model->getpass($tmp);
			foreach ($save as $row) {
				if(md5($this->input->post('pass')) == $row && md5($this->input->post('pass')) == md5($this->input->post('passconf')))
				{
				  	$data['pass'] = md5($this->input->post('pass'));
				}
			}
			if ($this->kontak_model->masuk($data))
			{
				$this->session->set_flashdata('message', 'berhasil');
			}
			else
			{
				$this->session->set_flashdata('message', 'gagal');
			}
	  	}
		redirect(site_url('backend'));
	}

	public function addmateri()
	{
		$this->check();
		$this->load->model('materi_model');
		$data['idmateri'] = $this->materi_model->getID();
		$data['judulmateri'] = $this->input->post('materi');
		$data['linkmateri'] = $this->input->post('linkmateri');
		$data['penjelasan'] = $this->input->post('penjelasan');
		if ($this->materi_model->masuk($data))
		{
			$this->session->set_flashdata('message', 'berhasil');
		}
		else
		{
			$this->session->set_flashdata('message', 'gagal');
		}
		redirect(site_url('backend'));
	}

	public function delmateri()
	{
		$this->check();
		$this->load->model('materi_model');
		$id = $this->input->get('id');
		$this->materi_model->delete($id);
		header("location: ".site_url('backend/materi'));
	}
	
	public function non()
	{
		$this->check();
		$this->load->model('nonmember_model');
		$query = $this->nonmember_model->find();
		$i=0;
        foreach ($query as $row) {
        	$data['nonmember'][$i]['idnon'] = $row->IDNon;
        	$data['nonmember'][$i]['namanon'] = $row->NamaNon;
        	$data['nonmember'][$i]['emailnon'] = $row->EmailNon;	
        	$data['nonmember'][$i]['tlpnon'] = $row->TlpNon;	
        	$data['nonmember'][$i]['noktpnon'] = $row->NoKTPNon;	
        	$data['nonmember'][$i]['ktpnon'] = $row->KTPNon;	
        	$i++;
        }
        $data['numrows'] = $i;
		$this->load->view('templates/upheader');
		$this->load->view('css/sbadmin');
		$this->load->view('templates/endheader');
		$this->load->view('menu/adminmenu');
		$this->load->view('website/adminnon',$data);
		$this->load->view('templates/footer');
	}

	public function member()
	{
		$this->check();
		$this->load->model('member_model');
		$this->load->model('nonmember_model');
		$query = $this->member_model->find();
		$i=0;
        foreach ($query as $row) {
        	$data['member'][$i]['idmember'] = $row->IDMember;
        	$data['member'][$i]['namanon'] = $row->NamaNon;
        	$data['member'][$i]['emailnon'] = $row->EmailNon;	
        	$data['member'][$i]['tlpnon'] = $row->TlpNon;	
        	$data['member'][$i]['noktpnon'] = $row->NoKTPNon;	
        	$data['member'][$i]['ktpnon'] = $row->KTPNon;
        	$i++;
        }
        $data['numrows'] = $i;
		$this->load->view('templates/upheader');
		$this->load->view('css/sbadmin');
		$this->load->view('templates/endheader');
		$this->load->view('menu/adminmenu');
		$this->load->view('website/adminmember',$data);
		$this->load->view('templates/footer');
	}

	public function delnon()
	{
		$this->load->model('nonmember_model');
		$id = $this->input->get('id');
		$this->nonmember_model->delete($id);
		header("location: ".site_url('backend/non'));
	}

	public function delmem()
	{
		$this->load->model('member_model');
		$this->load->model('nonmember_model');
		$id = $this->input->get('id');
		$this->member_model->delete($id);
		$this->nonmember_model->delete($id);
		header("location: ".site_url('backend/member'));
	}

	public function get_random_password($chars_min=6, $chars_max=8, $use_upper_case=false, $include_numbers=false, $include_special_chars=false)
    {
        $length = rand($chars_min, $chars_max);
        $selection = 'aeuoyibcdfghjklmnpqrstvwxz';
        if($include_numbers) {
            $selection .= "1234567890";
        }
        if($include_special_chars) {
            $selection .= "!@\"#$%&[]{}?|";
        }

        $password = "";
        for($i=0; $i<$length; $i++) {
            $current_letter = $use_upper_case ? (rand(0,1) ? strtoupper($selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))];            
            $password .=  $current_letter;
        }                

      return $password;
    }

	public function jadimember()
	{
		$this->load->model('nonmember_model');
		$this->load->model('member_model');
		$id = $this->input->get('id');
		$save = $this->nonmember_model->getdata($id);
		foreach ($save as $row) {
			$data['idmember'] = $this->member_model->getID();
			$data['idnon'] = $id;
			$data['username'] = $row->EmailNon;
			$pass = $this->get_random_password();
			$data['password'] = md5($pass);
		}
		if ($this->member_model->masuk($data))
		{
			$config = array(
	            'protocol' => 'smtp',
	            'smtp_host' => 'ssl://smtp.googlemail.com',
	            'smtp_port' => 465,
	            'smtp_user' => 'altairaoriflame@gmail.com',
	            'smtp_pass' => 'henryanaaltaira',
	            'mailtype' => 'html'
	        );
	 
	        // recipient, sender, subject, and you message
	        $this->load->model('member_model');
	        $to = $data['username'];
	        $from = $config['smtp_user'];
	        $subject = "Selamat menjadi member di Altaira Oriflame";
	        $message = "untuk melakukan login anda cukup masukkan email sebagai username dan ".$pass." sebagai passwordnya";
	 
	        // load the email library that provided by CI
	        $this->load->library('email', $config);
	        // this will bind your attributes to email library
	        $this->email->set_newline("\r\n");
	        $this->email->from($from, 'Altaira Oriflame');
	        $this->email->to($to);
	        $this->email->subject($subject);
	        $this->email->message($message);
	 
	        // send your email. if it produce an error it will print 'Fail to send your message!' for you
	        if($this->email->send()) {
		        echo "Message sent successfully!";
	        }
	        else {
	            echo "Fail to send your message!";
	        }
	        header("location: ".site_url('backend/non'));
		}
	}

	function logout()
	{
		$this->check();
		$this->session->unset_userdata('logged_in');
		redirect('halutama', 'refresh');
	}
}