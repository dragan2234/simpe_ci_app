<?php 

 class Gallery extends CI_Controller {

	function __construct(){

		parent::__construct();
		$this->is_logged_in();
	}

	function is_logged_in() {

	$is_logged_in = $this->session->userdata('is_logged_in');

	if(!isset($is_logged_in) || $is_logged_in != true) {

		echo 'You dont have permission to access this page';
		echo anchor('login',"Login");
		die();
	}
}

 	function index(){


 		$this->load->model('Gallery_model');
 		if ($this->input->post('upload')){
 			$this->Gallery_model->do_upload();

 		}

 	





 		$this->load->library('pagination');

 		$config['base_url'] = 'http://localhost/codeigniter/ci/gallery/index';
 		$config['total_rows'] = $this->Gallery_model->get_num_images();
 		$config['per_page'] = 2;
 		$config['num_links'] = 20;
 		$config['full_tag_open'] = '<div id="pagination">';
 		$config['full_tag_close'] = '</div>';

 		$this->pagination->initialize($config);

 		$data['images'] = $this->Gallery_model->get_images(($this->uri->segment(3,0)+$config['per_page']),$config['per_page']);
 		
 		$data['main_content'] = 'gallery';
 		$this->load->view('includes/template',$data);

 	
}

 	function remove_all(){
 		$this->load->model('Gallery_model');
 		$this->Gallery_model->remove_all();

		$data['main_content'] = 'gallery';
 		$this->load->view('includes/template',$data);

 	}
 }