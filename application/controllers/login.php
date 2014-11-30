<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{    
    function __construct(){
        parent::__construct();
    }	
	
    public function index(){
        // Load our view to be displayed
        // to the user
       // $data['msg'] = $msg;
        //$this->load->view('login_view', $data);
		$this->load->helper(array('form'));
		$data = array(
			'title' =>'Login dan kumpulkan gudness poin di ayopeduli.com!',
			);
		$this->load->view('header',$data);
		$this->load->view('profile/login_v');
		$this->load->view('footer');
    }
    
    public function verifylogin()
	 {
	   //This method will have the credentials validation
	   $this->load->library('form_validation');
	   $this->load->helper(array('form', 'url'));
	
	   $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
	   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
	
	   if($this->form_validation->run() == FALSE)
	   {
		 //Field validation failed.  User redirected to login page
		 //$this->load->view('login_view');
		 $data = array(
			'title' =>'Login dan kumpulkan gudness poin di ayopeduli.com!',
			);
			$this->load->view('header',$data);
			$this->load->view('profile/login_v');
			$this->load->view('footer');
	   }
	   else
	   {
		 //Go to private area
		 redirect('home', 'refresh');
	   }
	
	 }
	
	 public function check_database($password)
	 {
	   //Field validation succeeded.  Validate against database
	    $email = $this->input->post('email');
		if(isset($_SESSION['FBID'])&&$_SESSION['FBID']<>""){
		   $sess_array = array(
			 'uid' => $_SESSION['FBID'],
			 'email' => $_SESSION['EMAIL'],
			 'fullname' => $_SESSION['FULLNAME']
		   );
		   $this->session->set_userdata('logged_in', $sess_array);
			return TRUE;
		}
	   //query the database
	    $this->load->model('user_m','',TRUE);
	   $result = $this->user_m->login($email, $password);
	
	   if($result)
	   {
		 $sess_array = array();
		 foreach($result as $row)
		 {
		   $sess_array = array(
			 'uid' => $row->uid,
			 'email' => $row->email,
			 'fullname' => $row->fullname
		   );
		   $this->session->set_userdata('logged_in', $sess_array);
		 }
		 return TRUE;
	   }
	   else
	   {
		 $this->form_validation->set_message('check_database', 'Invalid username or password');
		 return false;
	   }
	 }
}


/* End of file login.php */
/* Location: ./application/controllers/login.php */