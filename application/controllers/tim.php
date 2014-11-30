<?php
 
class Tim extends CI_Controller{
	public function __construct(){
		parent::__construct();
		//$this->load->model(array('aksi_m'));
	}
 
	public function index(){
		$data = array(
			'title' =>' Struktur Organisasi!',
		);		
		$this->load->view('header', $data);
		$this->load->view('view/tim-v');
		$this->load->view('footer');	}	
	
}