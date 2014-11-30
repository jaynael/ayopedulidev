<?php
 
class Buataksi extends CI_Controller{
	public function __construct(){
		parent::__construct();
		//$this->load->model('buataksi','',TRUE);
	}
 
	public function index(){
		$this->load->view('header');
		$this->load->view('buat-aksi_v');
		$this->load->view('footer');
	}
	public function slug(){
	$slug = $this->uri->segment(2);
	echo $slug;
	}
}