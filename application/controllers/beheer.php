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
            } elseif ($tab == 'duur') {
                $data['duur'] = $this->beheer_model->get_duur();
            } elseif ($tab == 'spellokaties') {
                $data['spellokaties'] = $this->beheer_model->get_spellokaties();
            } elseif ($tab == 'artikelen') {
                $data['artikelen'] = $this->beheer_model->get_artikelen();
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
        
        public function spel()
        {
            $this->load->model('beheer_model');
            if ($this->input->post('search')) {
                $data['search'] = $this->input->post('search');
            } else {
                $data['search'] = NULL;
            }

            // Variabelen goedzetten
            $data['page'] = 'beheer';
            $data['titel'] = "Beheer spelen";
            $data['spelen'] = $this->beheer_model->get_spelen($data['search']);

            // Eerst de header laden.
            $this->load->view('header_view', $data);
            
            // Menu laden.
            $this->load->view('menu_view', $data);

            // Pagina inhoud weergeven
            $this->load->view('beheer_spel_view', $data);
                        
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
            } elseif ($item == 'duur') {
                // Programmaduur verwijderen
                $this->beheer_model->verwijder_duur($id);

                redirect('beheer/opties/duur');
            } elseif ($item == 'spellokaties') {
                // Spellokatie verwijderen
                $this->beheer_model->verwijder_spellokatie($id);

                redirect('beheer/opties/spellokaties');
            } elseif ($item == 'artikelen') {
                // Artikel verwijderen
                $this->beheer_model->verwijder_artikel($id);

                redirect('beheer/opties/artikelen');
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
            } elseif ($item == 'duur') {
                // item aanpassen
                $this->beheer_model->opslaan_duur();

                redirect('beheer/opties/duur');
            } elseif ($item == 'spellokaties') {
                // item aanpassen
                $this->beheer_model->opslaan_spellokatie();

                redirect('beheer/opties/spellokaties');
            } elseif ($item == 'artikelen') {
                // item aanpassen
                $this->beheer_model->opslaan_artikel();

                redirect('beheer/opties/artikelen');            
            } else {
                // Anders loopt iemand te klooien.
                redirect('beheer/opties');
            }
        }
        
    }