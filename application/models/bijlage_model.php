<?php

    class Bijlage_model extends CI_Model{
        
		public function get_bijlage($id) {
			$this->db->select('bijlage.id, bijlage.omschrijving, bijlage.filename');
			$this->db->from('bijlage');

			$this->db->where('bijlage.id', $id);

			$query = $this->db->get();
			return $query->row();
		}
		
    }