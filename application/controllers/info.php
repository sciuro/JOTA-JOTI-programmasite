<?php
    class info extends CI_Controller {
        
        public function pagina($urlnaam)
        {
            // Variabelen van de pagina zetten.
            $data['page'] = "home";

            // Modellen laden.
            $this->load->model('pagina_model');
            $data['pagina'] = $this->pagina_model->get_pagina($urlnaam);

            // Eerst de header laden.
            $this->load->view('header_view', $data);
            
            // Menu laden.
            $this->load->view('menu_view', $data);

            // Pagina inhoud weergeven
            $this->load->view('pagina_view');
                        
            // Als laatste de footer laden.
            $this->load->view('footer_view', $data);

        }
        
    }