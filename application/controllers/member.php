<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {
	public function index()
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
		$this->load->view('menu/membermenu');
		$this->load->view('website/v_member',$data);
		$this->load->view('templates/footer');
	}
	public function check()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['id'] = $session_data['id'];
		}
		else
		{
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}

	public function kontak()
	{
		$this->check();
		$this->load->view('templates/upheader');
		$this->load->view('css/sbadmin');
		$this->load->view('css/grayscale');
		$this->load->view('templates/endheader');
		$this->load->view('menu/membermenu');
		$this->load->view('website/sendemail');
		$this->load->view('templates/footer');
	}

	public function sendEmail() {
        // parameters of your mail server and how to send your email
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'altairaoriflame@gmail.com',
            'smtp_pass' => 'henryanaaltaira',
            'mailtype' => 'html'
        );
 
        // recipient, sender, subject, and you message
        $this->load->model('kontak_model');
        $data = $this->kontak_model->find();
        foreach ($data as $row) 
        {
	        $to = $row->Email;
	        //echo $row->Email;
	        $from = $config['smtp_user'];
	        //echo $config['smtp_user'];
	        $subject = "From ".$this->input->post('name')." - ".$this->input->post('subject');
	        //echo $subject;
	        $message = "Email pengirim = ".$this->input->post('email')."\r\n\r\nPesannya\r\n".$this->input->post('message');
	        //echo $message;
	 
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
		        //send email to host
		        $this->session->set_flashdata('message', 'berhasil');
	        }
	        else {
	            $this->session->set_flashdata('message', 'gagal');
	        }
	   	}
	   	redirect(site_url('member'));
	}

	public function pass()
	{
		$this->check();
		$this->load->helper(array('form'));
		$this->load->view('templates/upheader');
		$this->load->view('css/grayscale');
		$this->load->view('templates/endheader');
		$this->load->view('website/changepass');
	}

	public function gantipass()
	{
		$this->check();
		$this->load->model('member_model');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('pass', 'Password', 'required|min_length[6]|max_length[12]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[confirmation]|min_length[6]|max_length[12]');
		$this->form_validation->set_rules('confirmation', 'Password Confirmation', 'required');
		if ($this->form_validation->run() == FALSE)
		{
		      //if not valid
		  $this->session->set_flashdata('message', 'gagal');
		  redirect(site_url('member/pass'));
		}
		else
		{
		      //if valid
			$this->load->model('member_model');
			$tmp = $this->session->userdata('logged_in')['id'];
			$data = $this->member_model->getpass($tmp);
			foreach ($data as $row) {
				if(md5($this->input->post('pass') == $row))
				{
				  	$current = $this->input->post('pass');
				 	$change = $this->input->post('passconf');
				 	$flag=$this->member_model->update_pass(md5($current),md5($change),$tmp);
				  	if($flag == TRUE)// If Successful
				  	{
				      	$this->session->set_flashdata('message', 'berhasil');
				  	}
				  	else // If Unsuccessful
				  	{
				      	$this->session->set_flashdata('message', 'gagal
				      		');
				  	}
				  	redirect(site_url('member/pass'));
				}
				else 
				{
					echo "gagal";
				}
			}
	  	}
	  }

	function logout()
	{
		$this->check();
		$this->session->unset_userdata('logged_in');
		redirect('halutama', 'refresh');
	}
}