<?php
    class user extends CI_Controller {

        function __construct(){
            parent::__construct();
            if(! $this->session->userdata('validated')){
                show_404();
            }        
        }

        public function index()
        {
            // Variabelen goedzetten
            $data['page'] = 'user';
            $data['titel'] = "Persoonlijke instellingen";

            // Eerst de header laden.
            $this->load->view('header_view', $data);
            
            // Menu laden.
            $this->load->view('menu_view', $data);

            // Pagina inhoud weergeven
            $this->load->view('user_view', $data);
                        
            // Als laatste de footer laden.
            $this->load->view('footer_view', $data);
        }

        public function opslaan()
        {
            // Model laden
            $this->load->model('user_model');

            $voornaam = $this->input->post('voornaam');
            $achternaam = $this->input->post('achternaam');
            $email = $this->input->post('email');

            if ($this->input->post('password') != '') {
                $password = $this->input->post('password');
                $this->user_model->opslaan_user($voornaam, $achternaam, $email, $password);
            } else {
                $this->user_model->opslaan_user($voornaam, $achternaam, $email);
            }

            // Sessie data bijwerken
            $userdata = array(
                'voornaam' => $voornaam,
                'achternaam' => $achternaam,
                'email' => $email
            );
            $this->session->set_userdata($userdata);
            $this->session->set_flashdata('submit', true);

            // Redirect naar de vorige pagina
            redirect('/user');
        }

    }