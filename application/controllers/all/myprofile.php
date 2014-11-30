<?php
session_start(); //we need to call PHP's session object to access it through CI
class Myprofile extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}
 
	public function index()
	{
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
	   //if($this->session->userdata('name'))
	   //{
		 $session_data = $this->session->userdata('logged_in');
		 $data['email'] = $session_data['email'];
		 $this->load->view('header');
		 $this->load->view('my-profile', $data);
		 $this->load->view('footer');
	   //}
	   //else
	   //{
		 //If no session, redirect to login page
		 //redirect('/login', 'refresh');
	   //}
	 }
	
	 function logout()
	 {
	   $this->session->unset_userdata('logged_in');
	   session_destroy();
	   redirect('login', 'refresh');
	 }
	
	//{
//		$this->load->view('header');
//		$this->load->view('my-profile');
//		$this->load->view('footer');
//	}
	
}