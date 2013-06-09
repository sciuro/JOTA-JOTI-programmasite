<?php

    class Groep_model extends CI_Model{

		public function opslaan_groep($groepsnaam, $email) {
			$data = array(
				'naam' => $groepsnaam,
				'email' => $email
				);

			// Opslaan van de gebruiker
			$this->db->where('id', $this->session->userdata('gid'));
			$this->db->update('groep', $data);

			return;
		}

    }
