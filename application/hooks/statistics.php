<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Statistics {
	public function log_activity() {
		// We need an instance of CI as we will be using some CI classes
		$CI =& get_instance();

		// Enable classes
		$CI->load->library('user_agent');

		// Tracking cookie goedzetten
		if ($CI->session->userdata('cookie_id') === FALSE ) {
			$CI->session->set_userdata('cookie_id', $CI->session->userdata('session_id') );
		}

		// Alle data verzamelen
		$data = array();

		// Usergegevens
		$data['user'] = $CI->session->userdata('uid');
		$data['session'] = $CI->session->userdata('cookie_id');

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

		// And write it to the database
		$CI->db->insert('statistics', $data);
	}
}