<?php
	/**
	* 
	*/
	class Member_model extends CI_Model
	{

		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function find()
		{
			$save = $this->db->query('select * from member, nonmember where member.IDNon = nonmember.IDNon');
			return $save->result();
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

		public function ira()
		{
			$save = $this->db->query('select * from member, nonmember where member.IDNon = nonmember.IDNon and member.IDNon = 0');
			return $save->result();
		}

		public function masuk($data)
		{
			return $this->db->insert('member',$data);
		}
		
		public function update($id, $data)
		{
			$this->db->where('IDMember',$id);
			return $this->db->update('member',$data);
		}

		public function delete($id)
		{
			$this->db->where('IDMember',$id);
			return $this->db->delete('member');
		}
		
		function login($username, $password)
		 {
		   $this -> db -> select('IDMember, username, password');
		   $this -> db -> from('member');
		   $this -> db -> where('username', $username);
		   $this -> db -> where('password', md5($password));
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

		function update_pass($current,$change,$id)
		{
			$data = array('password'=>$change);
		  	$this->db->where('IDMember',$id);
		 	$this->db->where('password',$current);
		  	$this->db->update('member',$data);
			if($this->db->affected_rows() > 0)
		  		return TRUE;
			else
				return FALSE;
		}

		public function getID()
		{
			$i = 0;
			$save = $this->db->query('select IDMember from member where IDMember ="'.$i.'"');
			while($save->num_rows() == 1)
			{
				$i = $i + 1;
				$save = $this->db->query('select IDMember from member where IDMember ="'.$i.'"');
			}
			return $i;
		}
	}
?>