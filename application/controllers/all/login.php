<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
//include the facebook.php from libraries directory
require_once APPPATH.'libraries/facebook/facebook.php';
 
class Login extends CI_Controller {
 
  public function __construct(){
    parent::__construct();
	    $this->load->library('session');  //Load the Session 
		$this->config->load('facebook'); //Load the facebook.php file which is located in config directory
  }
 
  public function index(){
	
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('login');
			}
			else
			{
				$this->load->view('formsuccess');
			}
			
	}   
  public function cek_login(){
    $user = $this->input->post('username');
    $pass = $this->input->post('password');
  
    if(empty($user) or empty($pass)){
      $this->session->set_flashdata('msg', 'Username or password can\'t be blank');
      redirect('login');
    }
  
    $query = $this->account_model->validasi();
    if($query){
      $data = array(
        'username' => $user,
        'is_logged_in' => true   
      );
  
      $this->session->set_userdata($data);
      redirect('user');
    }else{
      $this->session->set_flashdata('msg', 'Invalid username and password');
      redirect('login');
    }
  }
  public function fblogin() {
	 $this->load->library('session');
 	$this->load->helper('url'); 
	$facebook = new Facebook(array(
	'appId' => $this->config->item('appID'),
	'secret' => $this->config->item('appSecret'),
	));
	// We may or may not have this data based on whether the user is logged in.
	// If we have a $user id here, it means we know the user is logged into
	// Facebook, but we don't know if the access token is valid. An access
	// token is invalid if the user logged out of Facebook.
	$user = $facebook->getUser(); // Get the facebook user id
	$profile = NULL;
	$logout = NULL;
	 
	if ($user) {
	try {
	$profile = $facebook->api('/me');  //Get the facebook user profile data
	$access_token = $facebook->getAccessToken();
	$params = array('next' => base_url('fb/logout/'), 'access_token' => $access_token);
	$logout = $facebook->getLogoutUrl($params);
	 
	} catch (FacebookApiException $e) {
	error_log($e);
	$user = NULL;
	}
	 
	$data['user_id'] = $user;
	$data['name'] = $profile['name'];
	$data['logout'] = $logout;
	$this->session->set_userdata($data);
	redirect('myprofile', $data);
	}
	}
	 
	public function test() {
	$this->load->view('test');
	}
 


   

}
/* End of file login.php */
/* Location: ./application/controllers/login.php */