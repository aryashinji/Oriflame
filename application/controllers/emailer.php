<?php
/*****************************
 ** Class name: Emailer
 ** Description: Send an email to user
 ** Date: 2010-05-28
 ** Author: Angga Lingga
 ** Email: aslingga@gmail.com
*****************************/
 
class Emailer extends Controller {
    // contructor
    public function Emailler() {}
    public function check()
    {
        if($this->session->userdata('logged_in'))
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
    public function sendEmail() {
        // parameters of your mail server and how to send your email
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'test@aslingga.com',
            'smtp_pass' => 'testpasswdxxx',
            'mailtype' => 'html'
        );
 
        // recipient, sender, subject, and you message
        $this->load->model('kontak_model');
        $email = $this->kontak_model->find();
        $to = $email->Email;
        $from = $email->Email;
        $subject = "Test sending email using CodeIgniter Framework";
        $message = "This is a test email using CodeIgniter. If you can view this email, it means you have successfully send an email using CodeIgniter.";
 
        // load the email library that provided by CI
        $this->load->library('email', $config);
        // this will bind your attributes to email library
        $this->email->set_newline("\r\n");
        $this->email->from($from, 'Your Company');
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
}