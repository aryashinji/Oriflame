<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class VerifyLogin extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
   $this->load->model('member_model','',TRUE);
   $this->load->model('kontak_model','',TRUE);
 }
 
 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');
   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
   $this->load->model('kontak_model');
  $data = $this->kontak_model->find();
  foreach ($data as $row) {
     if($this->form_validation->run() == FALSE)
     {
       //Field validation failed.  User redirected to login page
      $this->load->view('templates/upheader');
      $this->load->view('css/grayscale');
      $this->load->view('templates/endheader');
      $this->load->view('website/v_login');
     }
     else if ($this->input->post('username') == $row->Email && md5($this->input->post('password')) == $row->Pass)
     {
       //Go to private area
       redirect('backend', 'refresh');
     }
     else
     {
       //Go to private area
       redirect('member', 'refresh');
     }
  }
 }
 
 function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');
 
   //query the database
   $result = $this->member_model->login($username, $password);
   $result2 = $this->kontak_model->login($username, $password);
 
   if($result || $result2)
   {
      if($result)
      {
         $sess_array = array();
         foreach($result as $row)
         {
           $sess_array = array(
             'id' => $row->IDMember,
             'username' => $row->username
           );
           //echo "IDMember ".$row->IDMember." Sess ID ".$sess_array['id'];
           $this->session->set_userdata('logged_in', $sess_array);
         }
         return TRUE;
      }
      else if ($result2) 
      {
         $sess_array = array();
         foreach($result2 as $row)
         {
           $sess_array = array(
             'id' => $row->IDKontak,
             'username' => $row->email
           );
           //echo "IDKontak ".$row->IDKontak." Sess ID ".$sess_array['id'];
           $this->session->set_userdata('logged_in', $sess_array);
         }
         return TRUE;
      }
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
}
?>