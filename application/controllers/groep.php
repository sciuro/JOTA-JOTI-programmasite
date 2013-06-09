<?php
    class groep extends CI_Controller {

        function __construct(){
            parent::__construct();
            if(! $this->session->userdata('groep')){
                show_404();
            }        
        }

        public function index()
        {
            // Variabelen goedzetten
            $data['page'] = 'groep';
            $data['titel'] = "Groepsinstellingen";

            // Eerst de header laden.
            $this->load->view('header_view', $data);
            
            // Menu laden.
            $this->load->view('menu_view', $data);

            // Pagina inhoud weergeven
            $this->load->view('groep_view', $data);
                        
            // Als laatste de footer laden.
            $this->load->view('footer_view', $data);
        }

        public function opslaan()
        {
            // Model laden
            $this->load->model('groep_model');

            $groepsnaam = $this->input->post('groepsnaam');
            $email = $this->input->post('email');

            $this->groep_model->opslaan_groep($groepsnaam, $email);

            // Sessie data bijwerken
            $userdata = array(
                'groepsnaam' => $groepsnaam,
                'email' => $email
            );

            $this->session->set_userdata($userdata);
            $this->session->set_flashdata('submit', true);

            // Redirect naar de vorige pagina
            redirect('/groep');
        }

    }