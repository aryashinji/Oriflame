<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index()
	{
		$this->load->helper(array('form'));
		$this->load->view('templates/upheader');
		$this->load->view('css/grayscale');
		$this->load->view('templates/endheader');
		$this->load->view('website/v_login');
	}
}