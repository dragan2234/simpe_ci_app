<?php 


class Gallery_model extends CI_Model {



	var $gallery_path;
	var $gallery_path_url;


	function __construct() {

		parent::__construct();

		$this->gallery_path = realpath(APPPATH . '../images');
		$this->gallery_path_url = base_url(). 'images/';
	}

	function do_upload() {




		$config = array (

			'allowed_types'  => 'jpg|jpeg|gif|png',
			'upload_path'   => $this->gallery_path,
			'max_size'  => 2000,


			);

		$this->load->library('upload', $config);
		$this->upload->do_upload();
		$image_data= $this->upload->data();

		$config = array(
			'source_image' => $image_data['full_path'],
			'new_image'  => $this->gallery_path . '/thumbs',
			'maintain_ratio' => false,
			'width' => 200,
			'height' => 200,
			);


		$this->load->library('image_lib', $config);
		$this->image_lib->resize();


	}

	function get_images($offset,$limit) {

		$files = scandir($this->gallery_path);
		$files = array_diff($files, array('.','..','thumbs'));

		$images = array();

		$count = 0;
 		$start = $offset - $limit;


		foreach ($files as $file) {


		if ($count >= $start  && $count < $offset){
			$images []= array (


				'url' => $this->gallery_path_url . $file,
				'thumb_url' => $this->gallery_path_url . 'thumbs/' . $file	

				);
		}
		$count++;

		}
	
		return $images;
	}


	function get_num_images(){

		$files = scandir($this->gallery_path);
		$files = array_diff($files, array('.','..','thumbs'));

		$images = array();

		foreach ($files as $file) {



			$images []= array (
				'url' => $this->gallery_path_url . $file,
				'thumb_url' => $this->gallery_path_url . 'thumbs/' . $file	

				);
		}
	
		return count($images);

	}



	function remove_all(){

		delete_files($this->gallery_path);
		delete_files($this->gallery_path . '/thumbs');



	}

}