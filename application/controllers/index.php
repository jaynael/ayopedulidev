<?php
 
class Index extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');		
		//$this->load->model(array('aksi_m'));
	}
 
	public function index(){				
		//require '/src/facebook.php';
		$this->load->library('facebook'); // Automatically picks appId and secret from config
		$this->load->model('user_m','',TRUE);
        // OR
        // You can pass different one like this
        //$this->load->library('facebook', array(
        //    'appId' => 'APP_ID',
        //    'secret' => 'SECRET',
        //    ));

		$user = $this->facebook->getUser();
       // var_dump($user);
        if($this->session->userdata('logged_in')){
			//var_dump($user);
			try {
				//var_dump($data['user_profile']);
				//echo'test';
				//$data['user_profile'] =  'test';
				$data['user_profile'] = $this->facebook->api('/me');
				$fullname = $data['user_profile']['name'];
				//$email1 = $data['user_profile']['email'];
				$fbid = $data['user_profile']['id'];
				$fname = $data['user_profile']['first_name'];
				$this->load->model('user_m','',TRUE);
				$data['user_front'] = $this->user_m->getuserfront();
				//redirect('/dashboard' , 'refresh');
				//var_dump($data['user_profile']);
				//var_dump($nama);
			} catch (FacebookApiException $e) {
						$user = null;
			}					
		}else{
			if ($user) {				
				try {
							//var_dump($data['user_profile']);
							//echo'test';
							//$data['user_profile'] =  'test';
							//var_dump($user);
							$data['user_profile'] = $this->facebook->api('/me');							
							//var_dump($data['user_profile']);
							$fullname = $data['user_profile']['name'];
							$email1 = $data['user_profile']['email'];
							$fbid = $data['user_profile']['id'];
							$fname = $data['user_profile']['first_name'];
							$this->load->model('user_m','',TRUE);					
							$result = $this->user_m->register($fbid, $fullname, $email1, $fname);
							//$result = $this->user_m->register($fbid, $fullname, $fname);
							var_dump($data['user_profile']);
							var_dump($nama);
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
		$data['title']='Semangat Kebaikan!';		
		$this->load->view('header',$data);
		$this->load->model(array('aksi_m'));
		$data['aksi_slider'] = $this->aksi_m->aksi_home_slider();
		//var_dump($data['aksi_slider']);
		//$data['uid'] = $data['aksi_slider']['uidact'];		
		//$uid = $data['aksi_slider']['uidact'];	
//		$data['aksi_user_lingkungan'] = $this->aksi_m->getuser($uid);
//		$data['fullname'] = $data['aksi_user_lingkungan']['fullname'];
//		$data['photo'] = $data['aksi_user_lingkungan']['photo'];
//		$data['poin'] = $data['aksi_user_lingkungan']['poin'];
		$data['aksi_terbaru'] = $this->aksi_m->aksi_home_terbaru();
		$data['pelaku_kebaikan'] = $this->aksi_m->pelaku_kebaikan();
		
		//$this->load->view('index',$data);
		
		//aksi lingkungan
		//aksi data
		$data['aksi_lingkungan'] = $this->aksi_m->aksi_home_lingkungan();
		$data['deskripsi'] = $data['aksi_lingkungan']['deskripsi'];
		$data['judul'] = $data['aksi_lingkungan']['judul'];
		$data['aid'] = $data['aksi_lingkungan']['aid'];		
		$data['jumlahtarget'] = $data['aksi_lingkungan']['jumlahtarget'];
		$data['slug'] = $data['aksi_lingkungan']['slug'];
		$data['pic'] = $data['aksi_lingkungan']['pic'];		
		//fasilitator data
		//$data['uid'] = $data['aksi_lingkungan']['uid'];		
		$uid = $data['aksi_lingkungan']['uidact'];	
		$data['aksi_user_lingkungan'] = $this->aksi_m->getuser($uid);
		$data['fullname'] = $data['aksi_user_lingkungan']['fullname'];
		$data['photo'] = $data['aksi_user_lingkungan']['photo'];
		$data['poin'] = $data['aksi_user_lingkungan']['poin'];	
		
		//aksi kesehatan
		//aksi data
		$data['aksi_kesehatan'] = $this->aksi_m->aksi_home_kesehatan();
		$data['deskripsi'] = $data['aksi_kesehatan']['deskripsi'];
		$data['judul'] = $data['aksi_kesehatan']['judul'];
		$data['aid'] = $data['aksi_kesehatan']['aid'];		
		$data['jumlahtarget'] = $data['aksi_kesehatan']['jumlahtarget'];
		$data['slug'] = $data['aksi_kesehatan']['slug'];
		$data['pic'] = $data['aksi_lingkungan']['pic'];		
		//fasilitator data
		//$data['uid'] = $data['aksi_lingkungan']['uid'];		
		$uid = $data['aksi_kesehatan']['uidact'];	
		$data['aksi_user_kesehatan'] = $this->aksi_m->getuser($uid);
		$data['fullname'] = $data['aksi_user_kesehatan']['fullname'];
		$data['photo'] = $data['aksi_user_kesehatan']['photo'];
		$data['poin'] = $data['aksi_user_kesehatan']['poin'];
		
		//aksi pendidikan
		//aksi data
		$data['aksi_pendidikan'] = $this->aksi_m->aksi_home_pendidikan();
		$data['deskripsi'] = $data['aksi_pendidikan']['deskripsi'];
		$data['judul'] = $data['aksi_pendidikan']['judul'];
		$data['aid'] = $data['aksi_pendidikan']['aid'];		
		$data['jumlahtarget'] = $data['aksi_pendidikan']['jumlahtarget'];
		$data['slug'] = $data['aksi_pendidikan']['slug'];
		$data['pic'] = $data['aksi_pendidikan']['pic'];		
		//fasilitator data
		//$data['uid'] = $data['aksi_lingkungan']['uid'];		
		$uid = $data['aksi_pendidikan']['uidact'];	
		$data['aksi_user_pendidikan'] = $this->aksi_m->getuser($uid);
		$data['fullname'] = $data['aksi_user_pendidikan']['fullname'];
		$data['photo'] = $data['aksi_user_pendidikan']['photo'];
		$data['poin'] = $data['aksi_user_pendidikan']['poin'];	
		
		$this->load->view('index', $data);
		$this->load->view('footer');	
	}	
	
}