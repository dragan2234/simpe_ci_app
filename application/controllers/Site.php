<?php

/**
* 
*/
class Site extends CI_Controller
{
		

	function __construct(){

		parent::__construct();
		$this->is_logged_in();
	}



	function members_area()
	{
		$data['main_content'] = 'members_area';
		$this->load->view('includes/template',$data);
	}

	function is_logged_in() {

		$is_logged_in = $this->session->userdata('is_logged_in');

		if(!isset($is_logged_in) || $is_logged_in != true) {

			echo 'You dont have permission to access this page <a href= "../login">Login</a>';
			die();
		}
	}

	function logout() {
		$this->session->unset_userdata('is_logged_in');

			echo 'You have been logged out <a href= "../login">Login</a>';
	}
}