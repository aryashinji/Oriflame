<?php
	/**
	* 
	*/
	class Halutama_model extends CI_Model
	{

		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function find()
		{
			$query = $this->db->get('halutama');
			return $query->result(); 
		}

		public function masuk($data)
		{
			$query = $this->db->get('halutama');
			if ($query->result() == NULL)
			{
				$data['idhal'] = 0;
				return $this->db->insert('halutama',$data);
			}
			else
			{
				$this->db->where('IDHal',0);
				return $this->db->update('halutama',$data);
			}
		}
	}
?>