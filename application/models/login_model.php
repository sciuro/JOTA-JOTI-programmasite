<?php

    class Login_model extends CI_Model{
        
        public function validate(){
            // Inhoud ophalen
            $email = $this->security->xss_clean($this->input->post('email'));
            $password = $this->security->xss_clean($this->input->post('password'));
            
            // Zoek de gebruiker
            $this->db->where('email', $email);
            $this->db->where('password', sha1($password));
            $query = $this->db->get('users');
            
            // Is er 1 resultaat?
            if($query->num_rows == 1)
            {
                // Creeren van een sessie
                $row = $query->row();
                $data = array(
                              'voornaam' => $row->voornaam,
                              'achternaam' => $row->achternaam,
                              'email' => $row->email,
                              'validated' => true
                              );
                $this->session->set_userdata($data);
                return true;
            }
            // De persoon is niet bekend.
            return false;
        }
    }