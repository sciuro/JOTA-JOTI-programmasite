<?php

    class Overzicht_model extends CI_Model{
        
		public function get_spelen($speltak, $duur){
			$this->db->select('spel.id, gebied.id AS gebied, spel.titel, spel.omschrijving, spel.voorbereiding, spel.beschrijving, spel.duur, spel.min_spelers, spel.max_spelers, spel.leiding, spel.jota, spel.joti, spel.wincode');
			$this->db->from('spel');
			
			// Joins voor bepaling speltak.
			$this->db->join('spel_gebied', 'spel.id = spel_gebied.spel_id');
			$this->db->join('gebied', 'spel_gebied.gebied_id = gebied.id');
			$this->db->join('speltak', 'gebied.speltak_id = speltak.id');

			// Joins voor bepaling totale programmaduur.
			$this->db->join('opkomst_duur', 'spel.id = opkomst_duur.spel_id');
			$this->db->join('duur', 'opkomst_duur.duur_id = duur.id');

			// Controleer of er een speltak, of alles opgevraagd word.
			if ($speltak != 'alles') {
				$this->db->where('speltak.naam', $speltak);
			}

			// Als er ook een duur word gevraagd, filteren we daar ook op.
			if ($duur) {
				$this->db->where('duur.lengte', $duur);
			}

			// Zorg ervoor dat elk spel maar 1 keer voorkomt.
			$this->db->group_by('spel.id');

			$query = $this->db->get();
			return $query->result_array();
		}

		public function get_gebied($gebied) {
			$this->db->select('spel.id, spel.titel, spel.omschrijving, spel.voorbereiding, spel.beschrijving, spel.duur, spel.min_spelers, spel.max_spelers, spel.leiding, spel.jota, spel.joti');
			$this->db->from('spel');

			// Joins voor bepaling gebied.
			$this->db->join('spel_gebied', 'spel.id = spel_gebied.spel_id');
			$this->db->join('gebied', 'spel_gebied.gebied_id = gebied.id');

			$this->db->where('gebied.id', $gebied);

			$query = $this->db->get();
			return $query->result_array();
		}
		
		public function get_gebieden($speltak){
			$this->db->select('gebied.id, gebied.naam, gebied.kaartloc');
			$this->db->from('gebied');
			$this->db->join('speltak', 'gebied.speltak_id = speltak.id');
			$this->db->where('speltak.naam', $speltak);
			$this->db->order_by('gebied.naam');

			$query = $this->db->get();
			return $query->result_array();			
		}
		
		public function get_duur($speltak){
			$this->db->select('duur.id, duur.lengte, count(duur.lengte) AS aantal');
			$this->db->from('duur');

			// Bepalen speltak
			$this->db->join('opkomst_duur', 'opkomst_duur.duur_id = duur.id');
			$this->db->join('spel_gebied', 'opkomst_duur.spel_id = spel_gebied.spel_id');
			$this->db->join('gebied', 'spel_gebied.gebied_id = gebied.id');
			$this->db->join('speltak', 'gebied.speltak_id = speltak.id');

			$this->db->where('speltak.naam', $speltak);
			$this->db->group_by('duur.lengte');
			$this->db->order_by('duur.lengte');
			$this->db->having('aantal > 0');

			$query = $this->db->get();
			return $query->result_array();			
		}
		
		public function get_gebied_naam($gebied){
			$this->db->select('naam');
			$this->db->from('gebied');
			$this->db->where('id', $gebied);

			$query = $this->db->get();
			return $query->row();
		}

		public function get_gebied_speltak($gebied){
			$this->db->select('speltak.naam');
			$this->db->from('gebied');
			$this->db->join('speltak', 'gebied.speltak_id = speltak.id');
			$this->db->where('gebied.id', $gebied);

			$query = $this->db->get();
			return $query->row();
		}

		public function get_artikelen($spelid) {
			$this->db->select('spel_artikel.aantal, artikel.naam, artikel.naammv');
			$this->db->from('spel_artikel');

			$this->db->join('artikel', 'spel_artikel.artikel_id=artikel.id', 'right');
			$this->db->where('spel_artikel.spel_id', $spelid);

			$this->db->order_by('artikel.naam');

			$query = $this->db->get();
			return $query->result_array();
		}

		public function get_spellocaties($spelid){
			$this->db->select('spellokatie.id, spellokatie.naam');
			$this->db->from('spellokatie');

			$this->db->join('spel_spellokatie', 'spellokatie.id=spel_spellokatie.spellokatie_id', 'left');
			$this->db->where('spel_spellokatie.spel_id', $spelid);

			$this->db->order_by('spellokatie.naam');

			$query = $this->db->get();
			return $query->result_array();
		}

    }
