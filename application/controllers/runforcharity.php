<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Runforcharity extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model(array('aksi_m'));
		$this->load->model(array('donasi_m'));
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
	}
 
	public function index(){
		$this->load->library('facebook');
		$user = $this->facebook->getUser();
        //var_dump($user);
        if($this->session->userdata('logged_in'))
				{
					try {
						//var_dump($data['user_profile']);
						echo'test';
						//$data['user_profile'] =  'test';
						$data['user_profile'] = $this->facebook->api('/me');
						$fullname = $data['user_profile']['name'];
						//$email1 = $data['user_profile']['email'];
						$fbid = $data['user_profile']['id'];
						$fname = $data['user_profile']['first_name'];
						$this->load->model('user_m','',TRUE);
						//$data['user_front'] = $this->user_m->getuserfront();
						//redirect('/dashboard' , 'refresh');
						//var_dump($data['user_profile']);
						//var_dump($nama);
					} catch (FacebookApiException $e) {
						$user = null;
					}					
				}else{
					if ($user) {
						try {
							echo"ping";
							//var_dump($data['user_profile']);
							//echo'test';
							//$data['user_profile'] =  'test';
							$data['user_profile'] = $this->facebook->api('/me');
							$fullname = $data['user_profile']['name'];
							//$email1 = $data['user_profile']['email'];
							$fbid = $data['user_profile']['id'];
							$fname = $data['user_profile']['first_name'];
							$this->load->model('user_m','',TRUE);					
							//$result = $this->user_m->register($fbid, $fullname, $email1, $fname);
							$result = $this->user_m->register($fbid, $fullname, $fname);
							//var_dump($data['user_profile']);
							//var_dump($result);
							redirect('/home' , 'refresh');
							
						} catch (FacebookApiException $e) {
							$user = null;
						}
					}else {
						$this->facebook->destroySession();
					}					
				}

        if ($user) {

            $data['logout_url'] = site_url('welcome/logout'); // Logs off application
            // OR 
            // Logs off FB!
            // $data['logout_url'] = $this->facebook->getLogoutUrl();

        } else {
            $data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => 'http://ayopeduli.dev/', 
                'scope' => array("email") // permissions here
            ));
        }
		$data['title'] = '#RunForCharity2014';	
		$this->load->view('header', $data);
		$this->load->view('runforcharity/indexrun', $data);
	}
}