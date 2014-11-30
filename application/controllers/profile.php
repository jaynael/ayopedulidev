<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');
//session_start(); 
class Profile extends CI_Controller{
	public function __construct(){
		parent::__construct();
		//$this->load->library('auth');
		//$this->load->model(array('aksi_m'));
		//$this->load->helper(array('globals'));
		//$this->load->library(array('simpliparse','pquery','form_validation'));
		//$this->auth->restrict();
		//$this->load->library('form_validation');
		$this->load->model(array('user_m'));
		$this->load->helper(array('form', 'url'));
	}
 
	//public function index(){
//		$this->load->view('header');
//		$this->load->view('aksi-detail');
//		$this->load->view('footer');
//	}
	
	public function register(){
		if(isset($_POST['submit'])) {
			//$this->load->helper(array('form', 'url'));			
			$this->load->model(array('user_m'));
			$this->user_m->register();
		}else{
			redirect("/register");
		}
	}	
	public function do_login(){
		if(isset($_POST['submitted'])) {
			$this->load->helper(array('form', 'url'));			
			$this->load->model(array('user_m'));
			$this->user_m->login();
		}else{
			redirect("/");
		}
	}
	public function logout(){
		//$this->load->library('session');
		//$this->load->model(array('user_m'));
//		$this->user_m->logout();		
		//$_SESSION = array('uid','fullname');
		session_start();
		$_SESSION['uid']='';
		$_SESSION['nama']='';
		//session_destroy();
		redirect('/');
	}
	public function myprofile(){
		if(!$this->session->userdata('logged_in'))
   		{
			redirect("/login");
		}
		$this->load->model(array('user_m'));
		$session_data = $this->session->userdata('logged_in');
		$data['user_item'] = $this->user_m->getuserid($session_data['uid']);		
			if (empty($data['user_item']))
			{
				redirect('notfound');
			}
		$data['title'] = $data['user_item']['fullname'];
		$data['panggilan'] = $data['user_item']['panggilan'];
		$data['fullname'] = $data['user_item']['fullname'];
		$data['uid'] = $data['user_item']['uid'];
		$data['poin'] = $data['user_item']['poin'];
		//$data = array(
//			'title' =>'My Profile!',
//			'nama' =>'Jaenal Gufron',
//			'poin'=>'1.000'
//		);
		$this->load->view('header', $data);
		$this->load->view('profile/my-profile_v', $data);
		$this->load->view('footer');
	}
	public function view($uid){
		$this->load->model(array('user_m'));
		$data['user_item'] = $this->user_m->getuserid($uid);		
			if (empty($data['user_item']))
			{
				redirect('notfound');
			}
		$data['title'] = $data['user_item']['fullname'];
		$data['panggilan'] = $data['user_item']['panggilan'];
		$data['fullname'] = $data['user_item']['fullname'];
		$data['uid'] = $data['user_item']['uid'];
		$data['poin'] = $data['user_item']['poin'];
		$datas['aksi_user'] = $this->user_m->getaksi($uid);
	 //$datas['title'] = $datas['user_item']['fullname'] ;
		//list volunteer
			$this->load->model(array('volunteer_m'));
			$data['volunteer_user'] = $this->volunteer_m->getvolunid($uid);
		//$data = array(
//			'title' =>'My Profile!',
//			'nama' =>'Jaenal Gufron',
//			'poin'=>'1.000'
//		);
		$this->load->view('header', $data);
		$this->load->view('profile/view-profile', $datas);
		$this->load->view('footer');
	}
	
}