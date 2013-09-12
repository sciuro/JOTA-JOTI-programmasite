<?php
    class spellen extends CI_Controller {
        
        public function index()
        {
            redirect('info/pagina/spelen');
        }

        public function bevers($view = NULL, $opkomstduur = NULL, $jjkeuze = NULL) {
            if ($view == 'web') {
                $this->web('bevers', $opkomstduur, $jjkeuze);
            } elseif ($view == 'pdf') {
                $this->pdf('bevers', $opkomstduur, $jjkeuze);
            } elseif ($view == 'eindspel') {
                $this->eindspel('bevers', $opkomstduur);
            } elseif ($view == 'overzicht') {
                $this->spellenoverzicht('bevers', $opkomstduur, $jjkeuze);
            } else {
                $this->keuze('bevers');
            }
        }

        public function welpen($view = NULL, $opkomstduur = NULL, $jjkeuze = NULL) {
            if ($view == 'web') {
                $this->web('welpen', $opkomstduur, $jjkeuze);
            } elseif ($view == 'pdf') {
                $this->pdf('welpen', $opkomstduur, $jjkeuze);
            } elseif ($view == 'eindspel') {
                $this->eindspel('welpen', $opkomstduur);
            } elseif ($view == 'overzicht') {
                $this->spellenoverzicht('welpen', $opkomstduur, $jjkeuze);
            } else {
                $this->keuze('welpen');
            }
        }

        public function scouts($view = NULL, $opkomstduur = NULL, $jjkeuze = NULL) {
            if ($view == 'web') {
                $this->web('scouts', $opkomstduur, $jjkeuze);
            } elseif ($view == 'pdf') {
                $this->pdf('scouts', $opkomstduur, $jjkeuze);
            } elseif ($view == 'eindspel') {
                $this->eindspel('scouts', $opkomstduur);
            } elseif ($view == 'overzicht') {
                $this->spellenoverzicht('scouts', $opkomstduur, $jjkeuze);
            } else {
                $this->keuze('scouts');
            }
        }

        public function download() {
            // Variabelen van de pagina zetten.
            $data['page'] = "leiding";
            $data['titel'] = "Spellen downloaden";

            // Modellen laden.
            $this->load->model('overzicht_model');
            $data['speltakken'] = $this->overzicht_model->get_speltakken();

            foreach ($data['speltakken'] as $speltak) {
                $data['duur'][$speltak['naam']] = $this->overzicht_model->get_duur($speltak['naam']);
            }

            // Eerst de header laden.
            $this->load->view('header_view', $data);

            // Menu laden.
            $this->load->view('menu_view', $data);

            // Pagina weergeven
            $this->load->view('spellen_download_view', $data);

             // Als laatste de footer laden.
             $this->load->view('footer_view', $data);   
        }

        public function overzicht() {
            // Variabelen van de pagina zetten.
            $data['page'] = "leiding";
            $data['titel'] = "Spellen overzicht";

            // Modellen laden.
            $this->load->model('overzicht_model');
            $data['speltakken'] = $this->overzicht_model->get_speltakken();

            foreach ($data['speltakken'] as $speltak) {
                $data['duur'][$speltak['naam']] = $this->overzicht_model->get_duur($speltak['naam']);
            }

            // Eerst de header laden.
            $this->load->view('header_view', $data);

            // Menu laden.
            $this->load->view('menu_view', $data);

            // Pagina weergeven
            $this->load->view('spellen_overzicht_view', $data);

             // Als laatste de footer laden.
             $this->load->view('footer_view', $data);   
        }

        public function spel($spelid, $feedback = NULL) {
            // Helpers laden
            $this->load->library('user_agent');

            // Variabelen van de pagina zetten.
            $data['page'] = "leiding";
            $data['titel'] = "Spelbeschrijving";
            if ($feedback == 'feedback') {
                $data['feedback'] = 1;
            } else {
                $data['feedback'] = 0;
            }
            
            // Modellen laden.
            $this->load->model('overzicht_model');
            $tmp = $this->overzicht_model->get_spel($spelid);
            $data['spel'] = $tmp['0'];
            $data['artikelen'] = $this->overzicht_model->get_artikelen($spelid);
            $data['spellocaties'] = $this->overzicht_model->get_spellocaties($spelid);
            $data['bijlagen'] = $this->overzicht_model->get_bijlagen($spelid);

            // Eerst de header laden.
            $this->load->view('header_view', $data);

            // Menu laden.
            $this->load->view('menu_view', $data);

            // Pagina weergeven
            $this->load->view('spellen_spel_view', $data);

             // Als laatste de footer laden.
             $this->load->view('footer_view', $data);   
        }

        public function draaiboekpdf() {

            // We hebben de file en download helper nodig
            $this->load->helper('file');
            $this->load->helper('download');

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

            // Genereer filenaam
            $filenaam = "0";
            foreach ($data['spellen'] as $spel) {
                $filenaam = $filenaam."-".$spel['id'];
            }
            $filenaam = $filenaam."S".$data['speltak']."D".$data['opkomstduur'];
            $currentdir = exec('pwd');

            $filehash = $currentdir."/pdf/".md5($filenaam).".pdf";

            if (!file_exists($filehash)) {

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
                    $data['bijlagen'][$spel['id']] = $this->overzicht_model->get_bijlagen($spel['id']);
                    $spelartikelen = $this->overzicht_model->get_artikelen($spel['id']);
                    foreach ($spelartikelen as $artikel) {
                        if (isset($data['nodiglijst'][$artikel['id']])) {
                            $data['nodiglijst'][$artikel['id']]['aantal'] = $data['nodiglijst'][$artikel['id']]['aantal'] + $artikel['aantal'];
                        } else {
                            $data['nodiglijst'][$artikel['id']] = $artikel;
                        }
                    }

                }

                // Order de lijst met spullen
                function vergelijkartikel($a, $b) {
                    return strnatcmp($a['naam'], $b['naam']);
                } // sort alphabetically by name
                if (isset($data['nodiglijst'])) {
                    usort($data['nodiglijst'], 'vergelijkartikel');
                }
            
                // PDF genereren
                $this->load->library('pdf');
                $this->pdf->load_view('spellen_draaiboek_pdf', $data);
                $this->pdf->render();
                                
                if (is_writable($currentdir."/pdf/")) {
                    $pdf = $this->pdf->output();
                    $write = file_put_contents($filehash, $pdf);
                    chmod($filehash, 0666);
                } else {
                    $this->pdf->stream("JOTA-JOTI-spellen-".$data['speltak']."-".$data['opkomstduur']."uur.pdf");
                }

            }

            $pdffile = read_file($filehash);
            force_download("JOTA-JOTI-spellen-".$data['speltak']."-".$data['opkomstduur']."uur.pdf", $pdffile);

        }

        public function gebied($gebied, $opkomstduur, $jjkeuze = NULL) {
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
 
            $spelcount = count($data['spellen']);
            if ($jjkeuze == "jota") {
                for ($i=0; $i < $spelcount; $i++) { 
                    if ($data['spellen'][$i]['jota'] == 0) { // Hier begrijp ik zelf de logica niet van. Maar het werkt.
                        unset($data['spellen'][$i]);
                    }
                }
            } elseif ($jjkeuze == "joti") {
                for ($i=0; $i < $spelcount; $i++) { 
                    if ($data['spellen'][$i]['joti'] == 0) { // Hier begrijp ik zelf de logica niet van. Maar het werkt.
                        unset($data['spellen'][$i]);
                    }
                }
            }

            // Eerst de header laden.
            $this->load->view('header_view', $data);

            // Menu laden.
            $this->load->view('menu_view', $data);

            // Pagina weergeven
            $this->load->view('spellen_gebied_view', $data);

             // Als laatste de footer laden.
             $this->load->view('footer_view', $data);         
        }
		
        public function code($spelnr, $gebied) {
			// Agent informatie laden
			$this->load->library('user_agent');
			
            // Modellen laden.
            $this->load->model('overzicht_model');
            $speltak = $this->overzicht_model->get_gebied_speltak($gebied)->naam;
            $gebiednaam = $this->overzicht_model->get_gebied_naam($gebied)->naam;

            $data['spel'] = $this->overzicht_model->get_spel($spelnr);
            

            // Variabelen van de pagina zetten.
            $data['page'] = "spellen";
            $data['titel'] = "Code van ".$data['spel'][0]['titel'];
            $data['speltak'] = $speltak;
            $data['gebied'] = $gebiednaam;
            $data['gebiednr'] = $gebied;
			$data['returnurl'] = $this->agent->referrer();

            // Eerst de header laden.
            $this->load->view('header_view', $data);

            // Menu laden.
            $this->load->view('menu_view', $data);

            // Pagina weergeven
            $this->load->view('spellen_code_view', $data);

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
            $spelbericht = $this->overzicht_model->get_spelbericht($speltak);
            if (isset($spelbericht[0])) {
                $data['bericht'] = $spelbericht[0]['bericht'];
            } else {
                $data['bericht'] = '';
            }

            // Eerst de header laden.
            $this->load->view('header_view', $data);

            // Menu laden.
            $this->load->view('menu_view', $data);

            // Pagina weergeven
            $this->load->view('spellen_keuze_view', $data);

             // Als laatste de footer laden.
             $this->load->view('footer_view', $data);            
        }

        private function web($speltak, $opkomstduur, $jjkeuze = NULL) {
            // Variabelen van de pagina zetten.
            $data['page'] = "spellen";
            $data['titel'] = "Spellen ".$speltak;
            $data['speltak'] = $speltak;
            $data['opkomstduur'] = $opkomstduur;
            $data['jjkeuze'] = $jjkeuze;

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

        private function eindspel($speltak, $opkomstduur) {
            // Variabelen van de pagina zetten.
            $data['page'] = "spellen";
            $data['titel'] = "Eindspel ".$speltak;
            $data['speltak'] = $speltak;
            $data['opkomstduur'] = $opkomstduur;

            // Modellen laden.

            // Eerst de header laden.
            $this->load->view('header_view', $data);

            // Menu laden.
            $this->load->view('menu_view', $data);

            // Pagina weergeven
            $this->load->view('spellen_eindspel_view', $data);

             // Als laatste de footer laden.
             $this->load->view('footer_view', $data);   
        }

        private function pdf($speltak, $opkomstduur) {
            // Variabelen van de pagina zetten.
            $data['page'] = "leiding";
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

        private function spellenoverzicht($speltak, $opkomstduur, $jjkeuze = NULL) {
            // Variabelen van de pagina zetten.
            $data['page'] = "leiding";
            $data['titel'] = "Spellen ".$speltak;
            $data['speltak'] = $speltak;
            $data['opkomstduur'] = $opkomstduur;

            // Modellen laden.
            $this->load->model('overzicht_model');
            $data['gebieden'] = $this->overzicht_model->get_gebieden($speltak);
            $data['spellen'] = $this->overzicht_model->get_spelen($speltak, $opkomstduur);

            $spelcount = count($data['spellen']);
            if ($jjkeuze == "jota") {
                for ($i=0; $i < $spelcount; $i++) { 
                    if ($data['spellen'][$i]['jota'] == 0) { // Hier begrijp ik zelf de logica niet van. Maar het werkt.
                        unset($data['spellen'][$i]);
                    }
                }
            } elseif ($jjkeuze == "joti") {
                for ($i=0; $i < $spelcount; $i++) { 
                    if ($data['spellen'][$i]['joti'] == 0) { // Hier begrijp ik zelf de logica niet van. Maar het werkt.
                        unset($data['spellen'][$i]);
                    }
                }
            }

            // Eerst de header laden.
            $this->load->view('header_view', $data);

            // Menu laden.
            $this->load->view('menu_view', $data);

            // Pagina weergeven
            $this->load->view('spellen_spellenoverzicht_view', $data);

             // Als laatste de footer laden.
             $this->load->view('footer_view', $data);  
        }
    }
