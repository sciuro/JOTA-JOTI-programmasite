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

		public function get_gebieden(){
			$this->db->select('gebied.id, gebied.naam, speltak.id AS speltakid, speltak.naam AS speltak, count(spel_gebied.spel_id) AS aantal');
			$this->db->from('gebied');

			$this->db->join('speltak', 'gebied.speltak_id=speltak.id');

			$this->db->join('spel_gebied', 'gebied.id=spel_gebied.gebied_id', 'left');
			$this->db->group_by('gebied.id');

			$this->db->order_by('speltak.id, gebied.naam');

			$query = $this->db->get();
			return $query->result_array();			
		}

		public function get_duur(){
			$this->db->select('duur.id, duur.lengte, count(spel_duur.spel_id) AS aantal');
			$this->db->from('duur');

			$this->db->join('spel_duur', 'duur.id=spel_duur.duur_id', 'left');
			$this->db->group_by('duur.lengte');

			$this->db->order_by('duur.lengte');

			$query = $this->db->get();
			return $query->result_array();
		}		

		public function get_artikelen(){
			$this->db->select('artikel.id, artikel.naam, artikel.naammv, count(spel_artikel.spel_id) AS aantal');
			$this->db->from('artikel');

			$this->db->join('spel_artikel', 'artikel.id=spel_artikel.artikel_id', 'left');
			$this->db->group_by('artikel.naam');

			$this->db->order_by('artikel.naam');

			$query = $this->db->get();
			return $query->result_array();
		}

		public function get_spellokaties(){
			$this->db->select('spellokatie.id, spellokatie.naam, count(spel_spellokatie.spel_id) AS aantal');
			$this->db->from('spellokatie');

			$this->db->join('spel_spellokatie', 'spellokatie.id=spel_spellokatie.spellokatie_id', 'left');
			$this->db->group_by('spellokatie.naam');

			$this->db->order_by('spellokatie.naam');

			$query = $this->db->get();
			return $query->result_array();
		}
		
		public function verwijder_speltak($id) {
			$this->db->where('id', $id);
			$this->db->delete('speltak');

			return;
		}

		public function verwijder_gebied($id) {
			$this->db->where('id', $id);
			$this->db->delete('gebied');

			return;
		}

		public function verwijder_duur($id) {
			$this->db->where('id', $id);
			$this->db->delete('duur');

			return;
		}

		public function verwijder_spellokatie($id) {
			$this->db->where('id', $id);
			$this->db->delete('spellokatie');

			return;
		}

		public function verwijder_artikel($id) {
			$this->db->where('id', $id);
			$this->db->delete('artikel');

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

		public function opslaan_gebied() {
			$data = array('naam' => $this->input->post('gebiednaam'), 'speltak_id' => $this->input->post('speltakid'));

			// Eerst controleren of er moet worden geupdate, of geinsert.
			if ($this->input->post('gebiedid')) {
				//Update van de data.
				$this->db->where('id', $this->input->post('gebiedid'));
				$this->db->update('gebied', $data);
			} else {
				// Inserten van data.
				$this->db->insert('gebied', $data);
			}

		}

		public function opslaan_duur() {
			$data = array('lengte' => $this->input->post('lengte'));

			// Eerst controleren of er moet worden geupdate, of geinsert.
			if ($this->input->post('duurid')) {
				//Update van de data.
				$this->db->where('id', $this->input->post('duurid'));
				$this->db->update('duur', $data);
			} else {
				// Inserten van data.
				$this->db->insert('duur', $data);
			}

			return;
		}

		public function opslaan_spellokatie() {
			$data = array('naam' => $this->input->post('spellokatie'));

			// Eerst controleren of er moet worden geupdate, of geinsert.
			if ($this->input->post('spellokatieid')) {
				//Update van de data.
				$this->db->where('id', $this->input->post('spellokatieid'));
				$this->db->update('spellokatie', $data);
			} else {
				// Inserten van data.
				$this->db->insert('spellokatie', $data);
			}

			return;
		}

		public function opslaan_artikel() {
			$data = array('naam' => $this->input->post('naam'), 'naammv' => $this->input->post('naammv'));

			// Eerst controleren of er moet worden geupdate, of geinsert.
			if ($this->input->post('artikelid')) {
				//Update van de data.
				$this->db->where('id', $this->input->post('artikelid'));
				$this->db->update('artikel', $data);
			} else {
				// Inserten van data.
				$this->db->insert('artikel', $data);
			}

		}
    }