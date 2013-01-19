<?php
    class beheer extends CI_Controller {

        public function index()
        {
            redirect('beheer/opties');
        }

        public function opties($tab = 'algemeen')
        {
            // Modellen laden
            if ($tab == 'speltakken') {
                $this->load->model('beheer_model');

                $data['speltakken'] = $this->beheer_model->get_speltakken();
            }

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

        public function verwijder($item, $id)
        {
            if(($item == 'speltak') && ($id)) {
                // Model laden
                $this->load->model('beheer_model');

                // item verwijderen
                $this->beheer_model->verwijder_speltak($id);

                redirect('beheer/opties/speltakken');
            } else {
                // Anders loopt iemand te klooien.
                redirect('beheer/opties');
            }
        }

        public function opslaan($item)
        {
            if($item == 'speltakken') {
                // Model laden
                $this->load->model('beheer_model');

                // item aanpassen
                $this->beheer_model->opslaan_speltak();

                redirect('beheer/opties/speltakken');
            } else {
                // Anders loopt iemand te klooien.
                redirect('beheer/opties');
            }
        }
        
    }