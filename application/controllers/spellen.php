<?php
    class spellen extends CI_Controller {
        
        public function index()
        {
            redirect('info/pagina/spelen');
        }

        public function bevers($view = NULL, $opkomstduur = NULL) {
            if ($view == 'web') {
                $this->web('bevers', $opkomstduur);
            } elseif ($view == 'pdf') {
                $this->pdf('bevers', $opkomstduur);
            } else {
                $this->keuze('bevers');
            }
        }

        public function welpen($view = NULL) {
            if ($view == 'web') {
                $this->web('welpen', $opkomstduur);
            } elseif ($view == 'pdf') {
                $this->pdf('welpen', $opkomstduur);
            } else {
                $this->keuze('welpen');
            }
        }

        public function scouts($view = NULL) {
            $this->keuze('scouts');
        }

        private function keuze($speltak) {
            // Variabelen van de pagina zetten.
            $data['page'] = "spellen";
            $data['titel'] = "Spellen ".$speltak;
            $data['speltak'] = $speltak;

            // Modellen laden.
            $this->load->model('overzicht_model');
            $data['duur'] = $this->overzicht_model->get_duur($speltak);

            // Eerst de header laden.
            $this->load->view('header_view', $data);

            // Menu laden.
            $this->load->view('menu_view', $data);

            // Pagina weergeven
            $this->load->view('spellen_keuze_view', $data);

             // Als laatste de footer laden.
             $this->load->view('footer_view', $data);            
        }

        private function web($speltak) {
            // Variabelen van de pagina zetten.
            $data['page'] = "spellen";
            $data['titel'] = "Spellen ".$speltak;
            $data['speltak'] = $speltak;

            // Modellen laden.
            //$this->load->model('overzicht_model');
            //$data['duur'] = $this->overzicht_model->get_duur($speltak);

            // Eerst de header laden.
            $this->load->view('header_view', $data);

            // Menu laden.
            $this->load->view('menu_view', $data);

            // Pagina weergeven
            //$this->load->view('spellen_keuze_view', $data);

             // Als laatste de footer laden.
             $this->load->view('footer_view', $data);   
        }

        private function pdf($speltak, $opkomstduur) {
            // Variabelen van de pagina zetten.
            $data['page'] = "spellen";
            $data['titel'] = "Spellen ".$speltak;
            $data['speltak'] = $speltak;

            // Modellen laden.
            $this->load->model('overzicht_model');
            $data['spellen'] = $this->overzicht_model->get_spelen($speltak, $opkomstduur);
            

            // Eerst de header laden.
            $this->load->view('header_view', $data);

            // Menu laden.
            $this->load->view('menu_view', $data);

            // Pagina weergeven
            $this->load->view('spellen_pdf_view', $data);

             // Als laatste de footer laden.
             $this->load->view('footer_view', $data);   
        }
    }
