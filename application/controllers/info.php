<?php
    class info extends CI_Controller {
        
        public function pagina($urlnaam)
        {
            // Modellen laden.
            $this->load->model('pagina_model');

            // Variabelen van de pagina zetten.
            $data['page'] = "home";
            $data['pagina'] = $this->pagina_model->get_pagina($urlnaam);
            $data['titel'] = $data['pagina']['titel'];

            // Eerst de header laden.
            $this->load->view('header_view', $data);
            
            // Menu laden.
            $this->load->view('menu_view', $data);

            // Pagina inhoud weergeven
            $this->load->view('pagina_view', $data);
                        
            // Als laatste de footer laden.
            $this->load->view('footer_view', $data);

        }
        
    }