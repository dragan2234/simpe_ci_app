<?php  


class Shop extends CI_Controller {



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

		$this->load->model('Products_model');


		$data['products'] = $this->Products_model->get_all();
		$data['main_content'] = 'products';
		$this->load->view('includes/template',$data);


	}






	function add(){
		$this->load->model('Products_model');

		$product = $this->Products_model->get($this->input->post('id'));


		$insert = array(

			'id' =>$this->input->post('id'),
			'qty' => 1,
			'price' => $product->price,
			'name' => $product->name
			);

		if ($product->option_name){
			$insert['options'] = array(


				$product->option_name => $product->option_values[$this->input->post($product->option_name)]
				);
		}


		$this->cart->insert($insert);

		redirect('shop');


	}

	function remove($rowid) {
		$this->cart->update(array(

			'rowid' => $rowid	,
			'qty' => 0

			));

		redirect('shop');
	}



}

































