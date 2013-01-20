<?php
    class overzicht extends CI_Controller {
        
        public function index()
        {
            redirect('info/pagina/spelen');
        }

        public function bevers() {
            $this->speltak('bevers');
        }

        public function welpen() {
            $this->speltak('welpen');
        }

        public function scouts() {
            $this->speltak('scouts');
        }

        public function explorers() {
            $this->speltak('explorers');
        }

        public function roverscouts() {
            $this->speltak('roverscouts');
        }

        private function speltak($speltak) {
            // Variabelen van de pagina zetten.
            $data['page'] = "overzicht";
            $data['titel'] = "Overzicht spelen ".$speltak;
            $data['speltak'] = $speltak;

            // Modellen laden.
            $this->load->model('overzicht_model');
            $data['gebieden'] = $this->overzicht_model->get_gebieden($speltak);
            $data['duur'] = $this->overzicht_model->get_duur($speltak);

            // Eerst de header laden.
            $this->load->view('header_view', $data);

            // Menu laden.
            $this->load->view('menu_view', $data);

            // Pagina weergeven
            $this->load->view('overzicht_speltak_view', $data);

             // Als laatste de footer laden.
             $this->load->view('footer_view', $data);            
        }

        public function spelen($speltak = 'alles', $duur = NULL)
        {
            // Variabelen van de pagina zetten.
            $data['page'] = "overzicht";
            if ($speltak == 'alles') {
                $data['titel'] = "Overzicht spelen voor alle speltakken";
            } else {
                $data['titel'] = "Overzicht spelen speltak ".$speltak;
            }
            $data['speltak'] = $speltak;
            $data['duur'] = $duur;

            // Modellen laden.
            $this->load->model('overzicht_model');
            $data['spelen'] = $this->overzicht_model->get_spelen($speltak, $duur);

            foreach ($data['spelen'] as $spel) {
                $data['artikelen'][$spel['id']] = $this->overzicht_model->get_artikelen($spel['id']);
            }

            // Eerst de header laden.
            $this->load->view('header_view', $data);
            
            // Menu laden.
            $this->load->view('menu_view', $data);

            // Pagina inhoud weergeven
            $this->load->view('overzicht_spelen_view', $data);

             // Als laatste de footer laden.
             $this->load->view('footer_view', $data);
                    
        }
        
        public function gebieden($gebied = NULL)
        {
            if (!$gebied) {
                redirect('overzicht');
            }

            // Modellen laden.
            $this->load->model('overzicht_model');
            $data['gebied'] = $this->overzicht_model->get_gebied_naam($gebied)->naam;
            $data['speltak'] = $this->overzicht_model->get_gebied_speltak($gebied)->naam;

            $data['spelen'] = $this->overzicht_model->get_gebied($gebied);
            foreach ($data['spelen'] as $spel) {
                $data['artikelen'][$spel['id']] = $this->overzicht_model->get_artikelen($spel['id']);
            }

            // Variabelen van de pagina zetten.
            $data['page'] = "overzicht";
            $data['titel'] = "Overzicht spelen gebied ".$data['gebied'];
            $data['duur'] = NULL;

            // Eerst de header laden.
            $this->load->view('header_view', $data);
            
            // Menu laden.
            $this->load->view('menu_view', $data);

            // Pagina inhoud weergeven
            $this->load->view('overzicht_spelen_view', $data);

             // Als laatste de footer laden.
             $this->load->view('footer_view', $data);
                    
        }
    }