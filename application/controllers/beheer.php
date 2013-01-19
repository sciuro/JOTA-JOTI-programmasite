<?php
    class beheer extends CI_Controller {

        public function index()
        {
            redirect('beheer/opties');
        }

        public function opties($tab = 'algemeen')
        {
            // Modellen laden
            $this->load->model('beheer_model');

            if ($tab == 'speltakken') {
                $data['speltakken'] = $this->beheer_model->get_speltakken();
            } elseif ($tab == 'gebieden') {
                $data['speltakken'] = $this->beheer_model->get_speltakken();
                $data['gebieden'] = $this->beheer_model->get_gebieden();
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
            // Model laden
            $this->load->model('beheer_model');
            
            if (($item == 'speltak') && ($id)) {
                // item verwijderen
                $this->beheer_model->verwijder_speltak($id);

                redirect('beheer/opties/speltakken');
            } elseif ($item == 'gebied') {
                // Gebied verwijderen
                $this->beheer_model->verwijder_gebied($id);

                redirect('beheer/opties/gebieden');
            } else {
                // Anders loopt iemand te klooien.
                redirect('beheer/opties');
            }
        }

        public function opslaan($item)
        {
            // Model laden
            $this->load->model('beheer_model');

            if($item == 'speltakken') {
                // item aanpassen
                $this->beheer_model->opslaan_speltak();

                redirect('beheer/opties/speltakken');
            } elseif ($item == 'gebieden') {
                // item aanpassen
                $this->beheer_model->opslaan_gebied();

                redirect('beheer/opties/gebieden');
            } else {
                // Anders loopt iemand te klooien.
                redirect('beheer/opties');
            }
        }
        
    }