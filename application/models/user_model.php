<?php

    class User_model extends CI_Model{

		public function opslaan_user($voornaam, $achternaam, $email, $password = NULL) {
			if (isset($password)) {
				$data = array(
					'voornaam' => $voornaam,
					'achternaam' => $achternaam,
					'email' => $email,
					'password' => sha1($password)
					);
			} else {
				$data = array(
					'voornaam' => $voornaam,
					'achternaam' => $achternaam,
					'email' => $email
					);
			}

			// Opslaan van de gebruiker
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('users', $data);

			return;
		}

    }
