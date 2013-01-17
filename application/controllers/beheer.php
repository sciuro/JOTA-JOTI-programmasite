<?php
    class beheer extends CI_Controller {

        public function index()
        {
            redirect('beheer/opties');
        }

        public function opties($tab = 'algemeen')
        {
            // Variabelen goedzetten
            $data['page'] = 'beheer';
            $data['titel'] = "Algemene instellingen";
            $data['tab'] = $tab;

            // Eerst de header laden.
            $this->load->view('header_view', $data);
            
            // Menu laden.
            $this->load->view('menu_view', $data);

            // Pagina inhoud weergeven
            $this->load->view('beheer_view', $data);
                        
            // Als laatste de footer laden.
            $this->load->view('footer_view', $data);

        }
        
        public function spel($spelid = NULL)
        {
            // Variabelen goedzetten
            $data['page'] = 'beheer';
            $data['titel'] = "Titel";

            // Eerst de header laden.
            $this->load->view('header_view', $data);
            
            // Menu laden.
            $this->load->view('menu_view', $data);

            // Pagina inhoud weergeven
            //$this->load->view('beheer_spel_view', $data);
                        
            // Als laatste de footer laden.
            $this->load->view('footer_view', $data);

        }
        
    }