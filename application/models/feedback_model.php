<?php

    class Feedback_model extends CI_Model{

		public function opslaan_feedback($spel, $bruikbaar, $opmerking, $email) {
			$data = array('spel' => $spel,
				'bruikbaar' => $bruikbaar,
				'opmerking' => $opmerking,
				'email' => $email);

			$this->db->insert('feedback', $data);

			return;
		}


    }
