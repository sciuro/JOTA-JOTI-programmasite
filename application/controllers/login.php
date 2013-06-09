<?php
    class login extends CI_Controller {
        
        public function index() {
            redirect('/login/groep');
        }

        public function groep($msg = NULL)
        {
            // Variabelen van de pagina zetten.
            $data['page'] = "login";
            $data['titel'] = "Inloggen groepen";

			// Eventueel errorbericht laden.
            $data['msg'] = $msg;
			
            // Eerst de header laden.
            $this->load->view('header_view', $data);
            
            // Menu laden.
            $this->load->view('menu_view', $data);

            // Pagina inhoud weergeven
            $this->load->view('login_groep_view', $data);
                        
            // Als laatste de footer laden.
            $this->load->view('footer_view', $data);
        }

        public function persoon($msg = NULL)
        {
            // Variabelen van de pagina zetten.
            $data['page'] = "login";
            $data['titel'] = "Inloggen persoon";

            // Eventueel errorbericht laden.
            $data['msg'] = $msg;

            // Eerst de header laden.
            $this->load->view('header_view', $data);
            
            // Menu laden.
            $this->load->view('menu_view', $data);

            // Pagina inhoud weergeven
            $this->load->view('login_persoon_view', $data);
                        
            // Als laatste de footer laden.
            $this->load->view('footer_view', $data);
        }
        
        public function process_user(){
            // Model laden.
            $this->load->model('login_model');
            
            // Is de gebruiker bekend?
            $result = $this->login_model->validate_user();
            
            if(! $result){
                // De gebruiker is niet bekend.
                $msg = 'Verkeerde e-mail en/of wachtwoord.';
                $this->persoon($msg);
            }else{
                // De gebruiker mag verder.
                redirect('/');
            }
        }
		
		public function logout(){
            $data = array(
                'uid' => '',
                'voornaam' => '',
                'achternaam' => '',
                'email' => '',
                'validated' => '',
                'admin' => '',
                'pagina' => '',
                'spellen' => ''
                              );
            $this->session->unset_userdata($data);
            redirect('/');
        }
        
    }