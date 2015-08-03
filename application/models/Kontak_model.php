<?php
	/**
	* 
	*/
	class Kontak_model extends CI_Model
	{

		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function find()
		{
			$query = $this->db->get('kontak');
			return $query->result(); 
		}

		public function getpass($id)
		{
			$save = $this->db->query('select password from member where IDMember = "'.$id.'"');
			if ($save->num_rows() >0)
			{
				return $save->result();
			}
			else return NULL;
		}

		public function masuk($data)
		{
			$query = $this->db->get('kontak');
			if ($query->result() == NULL)
			{
				$data['idkontak'] = 0;
				return $this->db->insert('kontak',$data);
			}
			else
			{
				$this->db->where('idkontak',0);
				return $this->db->update('kontak',$data);
			}
		}

		function login($username, $password)
		 {
		   $this -> db -> select('IDKontak, email, pass');
		   $this -> db -> from('kontak');
		   $this -> db -> where('email', $username);
		   $this -> db -> where('pass', md5($password));
		   $this -> db -> limit(1);
		 
		   $query = $this -> db -> get();
		 
		   if($query -> num_rows() == 1)
		   {
			 return $query->result();
		   }
		   else
		   {
			 return false;
		   }
		 }

		public function gantipass()
		{
			$this->check();
			$this->load->model('kontak_model');
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
	}
?>