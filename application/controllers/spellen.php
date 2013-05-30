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

        public function welpen($view = NULL, $opkomstduur = NULL) {
            if ($view == 'web') {
                $this->web('welpen', $opkomstduur);
            } elseif ($view == 'pdf') {
                $this->pdf('welpen', $opkomstduur);
            } else {
                $this->keuze('welpen');
            }
        }

        public function scouts($view = NULL) {
            if ($view == 'web') {
                $this->web('scouts', $opkomstduur);
            } elseif ($view == 'pdf') {
                $this->pdf('scouts', $opkomstduur);
            } else {
                $this->keuze('scouts');
            }
        }

        public function draaiboekpdf() {
            // Variabelen van de pagina zetten.
            $data['speltak'] = $this->input->post('speltak');
            $data['opkomstduur'] = $this->input->post('opkomstduur');

            // Modellen laden.
            $this->load->model('overzicht_model');
            $data['gebieden'] = $this->overzicht_model->get_gebieden($data['speltak']);
            $data['spellen'] = $this->overzicht_model->get_spelen($data['speltak'], $data['opkomstduur']);

            $spelcount = count($data['spellen']);
            for ($i=0; $i < $spelcount; $i++) { 
                if ($this->input->post('spel'.$data['spellen'][$i]['id']) != '1') {
                    unset($data['spellen'][$i]);
                }
            }

            $i=0;
            foreach ($data['gebieden'] as $gebied) {
                $j=0;
                foreach ($data['spellen'] as $spel) {
                    if ($spel['gebied'] == $gebied['id']) {
                        $j++;
                    }
                }
                $data['gebieden'][$i]['aantal'] = $j;
                $i++;
            }

            foreach ($data['spellen'] as $spel) {
                $data['artikelen'][$spel['id']] = $this->overzicht_model->get_artikelen($spel['id']);
                $data['spellocaties'][$spel['id']] = $this->overzicht_model->get_spellocaties($spel['id']);
            }
            

            // PDF genereren
            $this->load->library('pdf');
            $this->pdf->load_view('spellen_draaiboek_pdf', $data);
            $this->pdf->render();
            $this->pdf->stream("JOTA-JOTI-spellen-".$data['speltak']."-".$data['opkomstduur']."uur.pdf");

        }

        public function gebied($gebied, $opkomstduur) {
            // Modellen laden.
            $this->load->model('overzicht_model');
            $speltak = $this->overzicht_model->get_gebied_speltak($gebied)->naam;

            $data['spellen'] = $this->overzicht_model->get_spelen($speltak, $opkomstduur);
            
            $speltak = $this->overzicht_model->get_gebied_speltak($gebied)->naam;
            $gebiednaam = $this->overzicht_model->get_gebied_naam($gebied)->naam;

            // Variabelen van de pagina zetten.
            $data['page'] = "spellen";
            $data['titel'] = "Spellen van ".$gebiednaam." (".$speltak.")";
            $data['speltak'] = $speltak;
            $data['gebied'] = $gebiednaam;
            $data['gebiednr'] = $gebied;

            // Eerst de header laden.
            $this->load->view('header_view', $data);

            // Menu laden.
            $this->load->view('menu_view', $data);

            // Pagina weergeven
            $this->load->view('spellen_gebied_view', $data);

             // Als laatste de footer laden.
             $this->load->view('footer_view', $data);         
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

        private function web($speltak, $opkomstduur) {
            // Variabelen van de pagina zetten.
            $data['page'] = "spellen";
            $data['titel'] = "Spellen ".$speltak;
            $data['speltak'] = $speltak;
            $data['opkomstduur'] = $opkomstduur;

            // Modellen laden.
            $this->load->model('overzicht_model');
            $data['gebieden'] = $this->overzicht_model->get_gebieden($speltak);

            // Eerst de header laden.
            $this->load->view('header_view', $data);

            // Menu laden.
            $this->load->view('menu_view', $data);

            // Pagina weergeven
            $this->load->view('spellen_web_view', $data);

             // Als laatste de footer laden.
             $this->load->view('footer_view', $data);   
        }

        private function pdf($speltak, $opkomstduur) {
            // Variabelen van de pagina zetten.
            $data['page'] = "spellen";
            $data['titel'] = "Spellen ".$speltak;
            $data['speltak'] = $speltak;
            $data['opkomstduur'] = $opkomstduur;

            // Modellen laden.
            $this->load->model('overzicht_model');
            $data['gebieden'] = $this->overzicht_model->get_gebieden($speltak);
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
