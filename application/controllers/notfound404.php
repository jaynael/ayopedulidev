<?php
 
class Notfound404 extends CI_Controller{
	public function __construct(){
		parent::__construct();
		//$this->load->model(array('aksi_m'));
	}
 
	public function index(){
		$data = array(
			'title' =>'404 Halaman yang anda cari tidak diketemukan',
		);		
		$this->load->view('header', $data);
		
		
		$this->load->view('notfound');
		
		
		$this->load->view('footer');	
	}	
	
}