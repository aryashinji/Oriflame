<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Halutama extends CI_Controller {
	public function index()
	{
		#ambil data halaman utama
        $this->load->model('halutama_model');
        $query = $this->halutama_model->find();
        foreach ($query as $row)
        {
            $data['halutama']['isi'] = $row->Isi;
        }
        $data['error'] = NULL;
		$this->load->view('templates/upheader');
		$this->load->view('css/grayscale');
		$this->load->view('templates/endheader');
		$this->load->view('website/ajakan',$data);
		$this->load->view('templates/footer');
		
	}
	
	public function daftar()
	{
		$this->load->view('templates/upheader');
		$this->load->view('css/sbadmin');
		$this->load->view('css/grayscale');
		$this->load->view('templates/endheader');
		$this->load->view('website/form');
		$this->load->view('templates/footer');
	}

	public function daftarmasuk()
	{
		$this->load->model('nonmember_model');
		$data['idnon'] = $this->nonmember_model->getID();
		$data['namanon'] = $this->input->post('name');
		$data['emailnon'] = $this->input->post('email');
		$this->sendEmailNon($data);
		$data['tlpnon'] = $this->input->post('phone');
		$data['noktpnon'] = $this->input->post('ktp');
        $imgstring = file_get_contents($_FILES['ktpnon']['tmp_name']);
        $data['ktpnon'] = $imgstring;
        $save = $this->nonmember_model->masuk($data);
        if($save > 0)
        {
        	$this->session->set_flashdata('message', 'berhasil');
        }
        else
        {
        	$this->session->set_flashdata('message', 'gagal');
        }
        redirect(site_url('halutama'));
	}

	function sendEmailNon($data) {
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
        $to = $data['emailnon'];
        $from = $config['smtp_user'];
        $subject = "Selamat datang di Altaira Oriflame";
        $message = "I love you :*";
 
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
	        $email = $this->kontak_model->find();
	        foreach ($email as $row) {
	        	$to = $row->Email;	
	        	$from = $config['smtp_user'];
		        $subject = "Ada pendaftar baru di Altaira Oriflame";
		        $message = "Jancuk";
	        }
	 
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
        }
        else {
            echo "Fail to send your message!";
        }
	}
}