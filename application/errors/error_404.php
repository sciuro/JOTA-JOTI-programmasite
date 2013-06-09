<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

$CI =& get_instance();

// Modellen laden.
$CI->load->model('pagina_model');

// Variabelen van de pagina zetten.
$data['pagina'] = $CI->pagina_model->get_pagina('404');

$data['page'] = 'geen';
$data['titel'] = $data['pagina']['titel'];

// Eerst de header laden.
$CI->load->view('header_view', $data);
            
// Menu laden.
$CI->load->view('menu_view', $data);

// Pagina inhoud weergeven
$CI->load->view('pagina_view', $data);
                        
// Als laatste de footer laden.
$CI->load->view('footer_view', $data);
