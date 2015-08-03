<?php
	/**
	* 
	*/
	class Materi_model extends CI_Model
	{

		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function find()
		{
			$query = $this->db->get('materi');
			return $query->result(); 
		}

		public function masuk($data)
		{
			return $this->db->insert('materi',$data);
		}
		
		public function update($id, $data)
		{
			$this->db->where('IDMateri',$id);
			return $this->db->update('materi',$data);
		}
		
		public function delete($id)
		{
			$this->db->where('IDMateri',$id);
			return $this->db->delete('materi');
		}
		
		public function countItem()
        {
            $query = $this->db->get('materi');
            return $query->num_rows();
        }

		public function getID()
		{
			$i = 0;
			$save = $this->db->query('select IDMateri from materi where IDMateri ="'.$i.'"');
			while($save->num_rows() == 1)
			{
				$i = $i + 1;
				$save = $this->db->query('select IDMateri from materi where IDMateri ="'.$i.'"');
			}
			return $i;
		}
	}
?>