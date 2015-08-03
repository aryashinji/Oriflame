<?php
	/**
	* 
	*/
	class Nonmember_model extends CI_Model
	{

		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function find()
		{
			$query = $this->db->query('select * from nonmember where IDNon not in (select IDNon from member)');
			return $query->result(); 
		}

		public function getdata($id)
		{
			$save = $this->db->query('select * from nonmember where IDNon ="'.$id.'"');
			return $save->result();
		}

		public function masuk($data)
		{
			$this->db->insert('nonmember',$data);
			return $this->db->affected_rows();
		}

		public function delete($id)
		{
			$this->db->where('IDNon',$id);
			return $this->db->delete('nonmember');
		}

		public function getID()
		{
			$i = 0;
			$save = $this->db->query('select IDNon from nonmember where IDNon ="'.$i.'"');
			while($save->num_rows() == 1)
			{
				$i = $i + 1;
				$save = $this->db->query('select IDNon from nonmember where IDNon ="'.$i.'"');
			}
			return $i;
		}
	}
?>