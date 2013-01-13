<?php

    class Bijlage_model extends CI_Model{
        
		public function get_bijlage($naam)
		{
			$this->db->where('id', $naam);

			$query = $this->db->get('bijlage');
			return $query->row();
		}
		
    }