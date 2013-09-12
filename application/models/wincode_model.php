<?php

    class Wincode_model extends CI_Model{
        
        public function controleer($antwoord) {
			// Controleren wincode
            $this->db->where('code', $antwoord);
            $query = $this->db->get('wincode');
            
            // Is er 1 resultaat?
            if($query->num_rows == 1)
            {
				// We hebben een winnaar!
                return $query->row_array();
            }
            // Helaas is het antwoord niet goed...
            return false;
        }

    }