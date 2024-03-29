<?php
    class beheer extends CI_Controller {

        function __construct(){
            parent::__construct();
            if(! $this->session->userdata('validated')){
                show_404();
            }

        }

        public function index()
        {
            redirect('beheer/opties');
        }

        public function opties($tab = 'algemeen')
        {
            // Controle rollen
            if(! $this->session->userdata('spellen')){
                show_404();
            }

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
            $data['titel'] = "Beheer themateam website";
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
        
        public function spel($id = NULL)
        {
            // Controle rollen
            if(! $this->session->userdata('spellen')){
                
            }

            $this->load->model('beheer_model');
            if ($this->input->post('search')) {
                $data['search'] = $this->input->post('search');
            } else {
                $data['search'] = NULL;
            }

            // Variabelen goedzetten
            $data['page'] = 'beheer';
            if ($id) {
                if ($id == 'nieuw') {
                    $data['titel'] = "Nieuw spel";
                    $data['spel']['titel'] = '';
                    $data['spel']['omschrijving'] = '';
                    $data['spel']['voorbereiding'] = '';
                    $data['spel']['beschrijving'] = '';
                    $data['spel']['copyright'] = '';
                    $data['spel']['spelduur'] = '';
                    $data['spel']['min_spelers'] = '';
                    $data['spel']['max_spelers'] = '';
                    $data['spel']['leiding'] = '';
                    $data['spel']['jota'] = '';
                    $data['spel']['joti'] = '';
                    $data['spel']['artikelen']['0']['artikel_id'] = '';
                    $data['spel']['artikelen']['0']['aantal'] = '';
                    $data['spel']['duur']['0']['duur_id'] = '';
                    $data['spel']['gebied']['0']['gebied_id'] = '';
                    $data['spel']['lokatie']['0']['spellokatie_id'] = '';

                } else {
                    $speldata = $this->beheer_model->get_spel($id);
                    $data['spel'] = $speldata['0'];
                    $data['spel']['artikelen'] = $this->beheer_model->get_spel_artikelen($id);
                    $data['spel']['duur'] = $this->beheer_model->get_spel_duur($id);
                    $data['spel']['gebied'] = $this->beheer_model->get_spel_gebied($id);
                    $data['spel']['lokatie'] = $this->beheer_model->get_spel_lokatie($id);
                    $data['titel'] = "Spel ".$data['spel']['titel'];
                }

                $data['artikelen'] = $this->beheer_model->get_artikelen();
                $data['duur'] = $this->beheer_model->get_duur();
                $data['gebieden'] = $this->beheer_model->get_gebieden();
                $data['spellokaties'] = $this->beheer_model->get_spellokaties();

            } else {
                $data['spelen'] = $this->beheer_model->get_spelen($data['search']);
                $items = $this->beheer_model->get_spelen_speltakken();
                foreach ($items as $item) {
                    if (isset($data['speltakken'][$item['spel_id']])) {
                        $data['speltakken'][$item['spel_id']] = $data['speltakken'][$item['spel_id']].", ".$item['naam'];
                    } else {
                        $data['speltakken'][$item['spel_id']] = $item['naam'];
                    }
                }
                $data['titel'] = "Beheer spelen";
            }

            // Eerst de header laden.
            $this->load->view('header_view', $data);
            
            // Menu laden.
            $this->load->view('menu_view', $data);

            // Pagina inhoud weergeven
            if ($id) {
                $this->load->view('beheer_spel_edit', $data);
            } else {
                $this->load->view('beheer_spel_view', $data);
            }
                        
            // Als laatste de footer laden.
            $this->load->view('footer_view', $data);

        }

        public function pagina($id = NULL)
        {
            // Controle rollen
            if(! $this->session->userdata('pagina')){
                show_404();
            }

            // Variabelen goedzetten
            $data['page'] = 'beheer';
            $data['titel'] = "Beheer pagina teksten";

            // Modellen laden
            $this->load->model('beheer_model');
            if (isset($id)) {
                $pagina = $this->beheer_model->get_paginas($id);
                $data['pagina'] = $pagina[0];
            } else {
                $data['paginas'] = $this->beheer_model->get_paginas();
            }

            // Eerst de header laden.
            $this->load->view('header_view', $data);
            
            // Menu laden.
            $this->load->view('menu_view', $data);

            // Pagina inhoud weergeven
            if ($id) {
                $this->load->view('beheer_pagina_edit_view', $data);
            } else {
                $this->load->view('beheer_pagina_view', $data);
            }
                        
            // Als laatste de footer laden.
            $this->load->view('footer_view', $data);
        }

        public function verwijder($item, $id)
        {
            // Controle rollen
            if(! $this->session->userdata('spellen')){
                show_404();
            }

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
            } elseif ($item == 'spel') {
                // Spellokatie verwijderen
                $this->beheer_model->verwijder_spel($id);

                redirect('beheer/spel');
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
                // Controle rollen
                if(! $this->session->userdata('spellen')){
                    show_404();
                }

                // item aanpassen
                $this->beheer_model->opslaan_speltak();
                
                redirect('beheer/opties/speltakken');
            } elseif ($item == 'gebieden') {
                // Controle rollen
                if(! $this->session->userdata('spellen')){
                    show_404();
                }

                // item aanpassen
                $this->beheer_model->opslaan_gebied();
                
                redirect('beheer/opties/gebieden');
            } elseif ($item == 'duur') {
                // Controle rollen
                if(! $this->session->userdata('spellen')){
                    show_404();
                }

                // item aanpassen
                $this->beheer_model->opslaan_duur();
                
                redirect('beheer/opties/duur');
            } elseif ($item == 'spellokaties') {
                // Controle rollen
                if(! $this->session->userdata('spellen')){
                    show_404();
                }

                // item aanpassen
                $this->beheer_model->opslaan_spellokatie();
                
                redirect('beheer/opties/spellokaties');
            } elseif ($item == 'artikelen') {
                // Controle rollen
                if(! $this->session->userdata('spellen')){
                    show_404();
                }

                // item aanpassen
                $this->beheer_model->opslaan_artikel();
                
                redirect('beheer/opties/artikelen');
            } elseif ($item == 'spel') {
                // Controle rollen
                if(! $this->session->userdata('spellen')){
                    show_404();
                }

                // item aanpassen
                $spelid = $this->beheer_model->opslaan_spel();
                $this->session->set_flashdata('submit', true);

                redirect('beheer/spel/'.$this->input->post('spelid'));
            } elseif ($item == 'pagina') {
                // Controle rollen
                if(! $this->session->userdata('pagina')){
                    show_404();
                }

                // item aanpassen
                $this->beheer_model->opslaan_pagina();
                $this->session->set_flashdata('submit', true);

                redirect('beheer/pagina/'.$this->input->post('paginaid'));
            } else {
                // Controle rollen
                if(! $this->session->userdata('validated')){
                    show_404();
                }
                // Anders loopt iemand te klooien.
                redirect('beheer/opties');
            }
        }

        public function overzicht(){
            // Modellen laden
            $this->load->model('statistics_model');
            $data['hits_ph'] = $this->statistics_model->get_hits();
            $data['popular'] = $this->statistics_model->get_popular();
            $data['referrer'] = $this->statistics_model->get_referrer();
            $data['browsers'] = $this->statistics_model->get_browsers();

            $data['totalhits'] = 0;

            foreach ($data['browsers'] as $browser) {
                $data['totalhits'] = $data['totalhits'] + $browser['hits'];
            }

            $data['stats_today'] = $this->statistics_model->get_stats_today();

            $data['oses'] = $this->statistics_model->get_os();
            $data['error_404'] = $this->statistics_model->get_404();
            $data['returning'] = $this->statistics_model->get_returning_visitors();

            // Variabelen goedzetten
            $data['page'] = 'beheer';
            $data['titel'] = "Beheermodule";

            // Eerst de header laden.
            $this->load->view('header_view', $data);
            
            // Menu laden.
            $this->load->view('menu_view', $data);

            // Pagina inhoud weergeven
            $this->load->view('beheer_overzicht_view', $data);
                        
            // Als laatste de footer laden.
            $this->load->view('footer_view', $data);
        }
        
    }
    