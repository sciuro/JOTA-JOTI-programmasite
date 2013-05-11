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
		
		public function get_spelen($search){
			$this->db->select('spel.id, spel.titel, spel.duur, spel.min_spelers, spel.max_spelers, spel.leiding, spel.jota, spel.joti');
			$this->db->from('spel');

			$this->db->like('titel', $search);

			$query = $this->db->get();
			return $query->result_array();
		}

		public function get_spel($id){
			$this->db->select('spel.id, spel.titel, spel.omschrijving, spel.voorbereiding, spel.beschrijving, spel.duur as spelduur, spel.min_spelers, spel.max_spelers, spel.leiding, spel.jota, spel.joti');
			$this->db->from('spel');

			$this->db->where('spel.id', $id);

			$query = $this->db->get();
			return $query->result_array();
		}

		public function get_spel_artikelen($spelid){
			$this->db->select('spel_artikel.artikel_id, spel_artikel.aantal');
			$this->db->from('spel_artikel');

			$this->db->where('spel_artikel.spel_id', $spelid);

			$query = $this->db->get();
			return $query->result_array();
		}

		public function get_spel_duur($spelid){
			$this->db->select('spel_duur.duur_id');
			$this->db->from('spel_duur');

			$this->db->where('spel_duur.spel_id', $spelid);

			$query = $this->db->get();
			return $query->result_array();
		}

		public function get_spel_gebied($spelid){
			$this->db->select('spel_gebied.gebied_id');
			$this->db->from('spel_gebied');

			$this->db->where('spel_gebied.spel_id', $spelid);

			$query = $this->db->get();
			return $query->result_array();
		}

		public function get_spel_lokatie($spelid){
			$this->db->select('spel_spellokatie.spellokatie_id');
			$this->db->from('spel_spellokatie');

			$this->db->where('spel_spellokatie.spel_id', $spelid);

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

		public function verwijder_spel($id) {
			$this->db->where('spel_id', $id);
			$this->db->delete('spel_artikel');

			$this->db->where('spel_id', $id);
			$this->db->delete('spel_bijlage');

			$this->db->where('spel_id', $id);
			$this->db->delete('spel_duur');

			$this->db->where('spel_id', $id);
			$this->db->delete('spel_gebied');

			$this->db->where('spel_id', $id);
			$this->db->delete('spel_spellokatie');

			$this->db->where('id', $id);
			$this->db->delete('spel');

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

		public function opslaan_spel() {
			// Speldata opslaan
			$data = array(
				'titel' => $this->input->post('titel'),
				'omschrijving' => $this->input->post('omschrijving'),
				'voorbereiding' => $this->input->post('voorbereiding'),
				'beschrijving' => $this->input->post('beschrijving'),
				'duur' => $this->input->post('spelduur'),
				'min_spelers' => $this->input->post('min_spelers'),
				'max_spelers' => $this->input->post('max_spelers'),
				'leiding' => $this->input->post('leiding'),
				'jota' => $this->input->post('jota'),
				'joti' => $this->input->post('joti')
				);

			// Eerst controleren of er moet worden geupdate, of geinsert.
			if ($this->input->post('spelid')) {
				// Update van de data.
				$this->db->where('id', $this->input->post('spelid'));
				$this->db->update('spel', $data);
			} else {
				// Inserten van de data.
				$this->db->insert('spel', $data);
			}

			if ($this->input->post('spelid')) {
			// Totale opkomst lengte opslaan
			// Eerst halen we alle verwijzingen weg.
			// Dit is heel goor, maar wel gemakkelijk, aangezien 
			// dit onderdeel niet intensief gebruikt word.
			$this->db->where('spel_id', $this->input->post('spelid'));
			$this->db->delete('spel_duur');

			// Hierna inserten we weer de data
			$this->db->select('duur.id');
			$this->db->from('duur');
			$query = $this->db->get();
			$result = $query->result_array();

			foreach ($result as $item) {
				if ( $this->input->post('duur'.$item['id']) == '1') {
					$data = array('spel_id' => $this->input->post('spelid'),
						'duur_id' => $item['id']);
					$this->db->insert('spel_duur', $data);
				}
			}

			// Aandachtsgebieden opslaan
			// Eerst halen we alle verwijzingen weg.
			// Dit is heel goor, maar wel gemakkelijk, aangezien 
			// dit onderdeel niet intensief gebruikt word.
			$this->db->where('spel_id', $this->input->post('spelid'));
			$this->db->delete('spel_gebied');

			// Hierna inserten we weer de data
			$this->db->select('gebied.id');
			$this->db->from('gebied');
			$query = $this->db->get();
			$result = $query->result_array();

			foreach ($result as $item) {
				if ( $this->input->post('gebied'.$item['id']) == '1') {
					$data = array('spel_id' => $this->input->post('spelid'),
						'gebied_id' => $item['id']);
					$this->db->insert('spel_gebied', $data);
				}
			}

			// Spellokaties opslaan
			// Eerst halen we alle verwijzingen weg.
			// Dit is heel goor, maar wel gemakkelijk, aangezien 
			// dit onderdeel niet intensief gebruikt word.
			$this->db->where('spel_id', $this->input->post('spelid'));
			$this->db->delete('spel_spellokatie');

			// Hierna inserten we weer de data
			$this->db->select('spellokatie.id');
			$this->db->from('spellokatie');
			$query = $this->db->get();
			$result = $query->result_array();

			foreach ($result as $item) {
				if ( $this->input->post('lokatie'.$item['id']) == '1') {
					$data = array('spel_id' => $this->input->post('spelid'),
						'spellokatie_id' => $item['id']);
					$this->db->insert('spel_spellokatie', $data);
				}
			}

			// Spelartikelen opslaan
			// Eerst halen we alle verwijzingen weg.
			// Dit is heel goor, maar wel gemakkelijk, aangezien 
			// dit onderdeel niet intensief gebruikt word.
			$this->db->where('spel_id', $this->input->post('spelid'));
			$this->db->delete('spel_artikel');

			// Hierna inserten we weer de data
			$this->db->select('artikel.id');
			$this->db->from('artikel');
			$query = $this->db->get();
			$result = $query->result_array();

			foreach ($result as $item) {
				if ( $this->input->post('artikelaantal'.$item['id']) != '0') {
					$data = array('spel_id' => $this->input->post('spelid'),
						'artikel_id' => $item['id'],
						'aantal' => $this->input->post('artikelaantal'.$item['id'])
						);
					$this->db->insert('spel_artikel', $data);
				}
			}
			$return = $this->input->post('spelid');
			} else {
				$query = $this->db->query('SELECT LAST_INSERT_ID() as id');
				$return = $query->row()->id;
			}

			return $return;

		}
    }
