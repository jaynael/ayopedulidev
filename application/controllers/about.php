<?php
 
class About extends CI_Controller{
	public function __construct(){
		parent::__construct();
		//$this->load->model(array('aksi_m'));
	}
 
	public function index(){
		$data = array(
			'title' =>' About Us!',
		);		
		$this->load->view('header', $data);
		$this->load->view('view/about_v');
		$this->load->view('footer');	}	
	
}