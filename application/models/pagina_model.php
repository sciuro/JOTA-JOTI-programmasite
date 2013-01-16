<?php

    class Pagina_model extends CI_Model{
        
		public function get_pagina($pagina){
			$this->db->where('urlnaam', $pagina);

			$query = $this->db->get('pagina');
			return $query->row_array();
		}
		
    }