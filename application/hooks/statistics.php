<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Statistics {
	public function log_activity() {
		// We need an instance of CI as we will be using some CI classes
		$CI =& get_instance();

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

		// And write it to the database
		$CI->db->insert('statistics', $data);
	}
}