<?php
 
class Aksidetail extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}
 
	public function index(){
		$this->load->view('header');
		$this->load->view('aksi-detail');
		$this->load->view('footer');
	}
	public function slug(){
	$slug = $this->uri->segment(2);
	echo $slug;
	}
}