<?php

    class Beheer_model extends CI_Model{
        
		public function get_speltakken(){
			$this->db->select('speltak.id, speltak.naam, count(gebied.naam) AS aantal');
			$this->db->from('speltak');

			$this->db->join('gebied', 'speltak.id=gebied.speltak_id', 'left');
			$this->db->group_by('speltak.naam');

			$this->db->order_by('speltak.id');

			$query = $this->db->get();
			return $query->result_array();
		}
		
		public function verwijder_speltak($id) {
			$this->db->where('id', $id);
			$this->db->delete('speltak');

			return;
		}

		public function opslaan_speltak() {
			$data = array('naam' => $this->input->post('speltaknaam'));

			// Eerst controleren of er moet worden geupdate, of geinsert.
			if ($this->input->post('speltakid')) {
				//Update van de data.
				$this->db->where('id', $this->input->post('speltakid'));
				$this->db->update('speltak', $data);
			} else {
				// Inserten van data.
				$this->db->insert('speltak', $data);
			}

			return;
		}
    }