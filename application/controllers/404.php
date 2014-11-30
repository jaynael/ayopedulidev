<?php
 
class Index extends CI_Controller{
	public function __construct(){
		parent::__construct();
		//$this->load->model(array('aksi_m'));
	}
 
	public function index(){
		$data = array(
			'title' =>' Connecting Goodness!',
		);		
		$this->load->view('header', $data);
		$this->load->view('index');
		$this->load->view('index-template/content-index');
		$this->load->view('footer');	}	
	
}