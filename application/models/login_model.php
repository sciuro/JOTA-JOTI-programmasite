<?php

    class Login_model extends CI_Model{
        
        public function validate_user(){
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
                              'uid' => $row->id,
                              'voornaam' => $row->voornaam,
                              'achternaam' => $row->achternaam,
                              'email' => $row->email,
                              'validated' => true
                              );
                $this->session->set_userdata($data);

                // Zetten van de rollen
                $rollen = array();

                $gidbin = decbin($row->rol);
                $c=8-(strlen($gidbin));
                for ($i=0; $i < $c; $i++) { 
                  $gidbin = "0".$gidbin;
                }
                $rol = str_split($gidbin);

                if ($gidbin == 255) {
                  $rollen['admin'] = true;
                } else {
                  if ($rol['7'] == 1) {
                    $rollen['pagina'] = true;
                  }
                  if ($rol['6'] == 1) {
                    $rollen['spellen'] = true;
                  }
                }

                $this->session->set_userdata($rollen);

                return true;
            }
            // De persoon is niet bekend.
            return false;
        }

        public function validate_group(){
            // Inhoud ophalen
            $groepsnummer = $this->security->xss_clean($this->input->post('groepsnummer'));
            
            // Zoek de gebruiker
            $this->db->where('id', $groepsnummer);
            $query = $this->db->get('groep');
            
            // Is er 1 resultaat?
            if($query->num_rows == 1)
            {
                // Creeren van een sessie
                $row = $query->row();
                $data = array(
                              'gid' => $row->id,
                              'groepsnaam' => $row->naam,
                              'email' => $row->email,
                              'groep' => true
                              );
                $this->session->set_userdata($data);
                return true;
            }
            // De groep is niet bekend.
            return false;
        }
    }