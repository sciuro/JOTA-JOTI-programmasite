<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

$CI =& get_instance();

// Modellen laden.
$CI->load->model('pagina_model');

// -------------------------------------------------------------------------
// Eerst een copie van de hook statistics draaien.
// Kom er even niet uit hoe ik die vanuit hier kan aanroepen.
// Dan maar een copie.

		// Enable classes
		$CI->load->library('user_agent');
		$CI->load->helper('cookie');

		// Tracking cookie goedzetten
		if ($CI->input->cookie('jj_thema2') === FALSE ) {
			$cookie_array = array (
				'name' => 'jj_thema2',
				'value' => $CI->session->userdata('session_id'),
				'expire' => 94608000
				);
			$CI->input->set_cookie($cookie_array);
			$tracking = $CI->session->userdata('session_id');
		} else {
			$tracking = $CI->input->cookie('jj_thema2');
		}

		// Alle data verzamelen
		$data = array();

		// Usergegevens
		$data['user'] = $CI->session->userdata('uid');
		$data['group'] = $CI->session->userdata('gid');
		$data['session'] = $CI->session->userdata('session_id');
		$data['tracking'] = $tracking;

		// Browsergegevens
		$data['agent'] = $CI->agent->agent_string();
		$data['browser'] = $CI->agent->browser();
		$data['version'] = $CI->agent->version();
		$data['mobile'] = $CI->agent->mobile();
		$data['robot'] = $CI->agent->robot();

		// Clientgegevens
		$data['ip'] = $CI->session->userdata('ip_address');
		$data['platform'] = $CI->agent->platform();

		// Referrer
		$data['referrer'] = $CI->agent->referrer();

		// Next up, we want to know what page we're on, use the router class
		//$data['section'] = $CI->router->class;
		//$data['action'] = $CI->router->method;

		// We don't need it, but we'll log the URI just in case
		$data['uri'] = uri_string();
		$data['error_code'] = "404";

		// And write it to the database
		$CI->db->insert('statistics', $data);

// -------------------------------------------------------------------------

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
