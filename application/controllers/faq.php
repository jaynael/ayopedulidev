<?php
 
class Faq extends CI_Controller{
	public function __construct(){
		parent::__construct();
		//$this->load->model(array('aksi_m'));
	}
 
	public function index(){
		$data = array(
			'title' =>' Faq!',
		);		
		$this->load->view('header', $data);
		$this->load->view('view/faq_v');
		$this->load->view('footer');	}	
	
}