<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Website extends CI_Controller {
	public function index()
	{
		$this->load->view('website/v_websitehead');
		$this->load->view('index');
		$this->load->view('website/v_websitefoot');
	}
}