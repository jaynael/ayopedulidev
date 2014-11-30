<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
class Partner extends CI_Controller{
	public function __construct(){
		parent::__construct();
		//$this->load->library('auth');
		$this->load->model(array('partner_m'));
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
	}
	public function Index(){
		if($this->session->userdata('loggedpartner'))
	   {
		   //Go to private area
		 redirect ('partner/home');
	   }else{
		$data= array(
			'title' => 'Register Partner'
		);
		$this->load->view('partner/header', $data);
		$this->load->view('partner/register-partner_v');
		$this->load->view('partner/footer');
	   }
	}
	
	public function home(){
		if($this->session->userdata('loggedpartner'))
	   {
		 $session_data = $this->session->userdata('loggedpartner');
		 $data['email'] = $session_data['email'];
		 $email= $data['email'];
		 $data['partid'] = $session_data['partid'];
		 $partid= $data['partid'];
		 //var_dump($email);
		 //$this->load->library('pagination');
         //$this->load->library('app/paginationlib');
		 $this->load->model(array('partner_m'));
		 $datas['user_item'] = $this->partner_m->getpartner($partid);
		 $this->load->library("pagination");
		 $config = array();
        $config["base_url"] = base_url() . "partner/home";
        $config["total_rows"] = $this->partner_m->record_count($partid);
        $config["per_page"] = 10;
        $config["uri_segment"] = 5;
		//pagination customization using bootstrap styles
  $config['full_tag_open'] = '<div class="pagination pagination-centered"><ul class="page_test">'; // I added class name 'page_test' to used later for jQuery
  $config['full_tag_close'] = '</ul></div><!--pagination-->';
  $config['first_link'] = '&laquo; First';
  $config['first_tag_open'] = '<li class="prev page">';
  $config['first_tag_close'] = '</li>';

  $config['last_link'] = 'Last &raquo;';
  $config['last_tag_open'] = '<li class="next page">';
  $config['last_tag_close'] = '</li>';

  $config['next_link'] = 'Next &rarr;';
  $config['next_tag_open'] = '<li class="next page">';
  $config['next_tag_close'] = '</li>';

  $config['prev_link'] = '&larr; Previous';
  $config['prev_tag_open'] = '<li class="prev page">';
  $config['prev_tag_close'] = '</li>';

  $config['cur_tag_open'] = '<li class="active"><a href="">';
  $config['cur_tag_close'] = '</a></li>';

  $config['num_tag_open'] = '<li class="page">';
  $config['num_tag_close'] = '</li>';
 
        $this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->partner_m->fetch_countries($partid,$config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
		
		 $datas['promo_item'] = $this->partner_m->getpromo($partid);
		 $datas['title'] = 'Selamat Datang Gudness Partner';
		
		$this->load->view('partner/header', $datas);
		$this->load->view('partner/my-dashboard-partner_v',$data);
		$this->load->view('partner/footer');
		}else{
				//Go to private area
		 redirect ('partner/login');
		}
	}
	public function login(){
		if($this->session->userdata('loggedpartner'))
	   {
		   redirect ('partner/home');
	        
	    }else{
			$data= array(
			'title' => 'Login Gufdness Partner'
		);
			$this->load->view('partner/header', $data);
			$this->load->view('partner/login-partner_v');
			$this->load->view('partner/footer');
		}
		
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
		$data= array(
			'title' => 'Username dan password ada tidak cocok'
		);
			$this->load->view('partner/header', $data);
			$this->load->view('partner/login-partner_v');
		
	   }
	   else
	   {
		 //Go to private area
		 redirect ('partner/home');
	   }
	
	 }
	
	 public function check_database($password)
	 {
	   //Field validation succeeded.  Validate against database
	   $email = $this->input->post('email');
	
	   //query the database
	    $this->load->model('partner_m','',TRUE);
	   $result = $this->partner_m->login($email, $password);
	
	   if($result)
	   {
		 $sess_array = array();
		 foreach($result as $row)
		 {
		   $sess_array = array(
			 'partid' => $row->partid,
			 'email' => $row->email,
			 'perusahaan' => $row->perusahaan
		   );
		   $this->session->set_userdata('loggedpartner', $sess_array);
		 }
		 return TRUE;
	   }
	   else
	   {
		 $this->form_validation->set_message('check_database', 'Invalid username or password');
		 return false;
	   }
	 }

	public function register(){
		if($this->session->userdata('loggedpartner'))
	   {
		   redirect ('partner/home');
	        
	    }else{
	   //This method will have the credentials validation
	   $this->load->library('form_validation');
	   $this->load->helper(array('form', 'url'));
		$this->form_validation->set_rules('owner', 'Owner', 'trim|required|xss_clean');
		$this->form_validation->set_rules('perusahaan', 'perusahaan', 'trim|required|xss_clean');
		$this->form_validation->set_rules('bidang', 'HP', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('type', 'Gudness Partner', 'trim|required|xss_clean');
		$this->form_validation->set_rules('handphone', 'Handphone', 'trim|required|xss_clean');	   
	   $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
	   $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
	   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
	
	   if($this->form_validation->run() == FALSE)
	   {
		 //Field validation failed.  User redirected to login page
		 //$this->load->view('login_view');
		 	$data= array(
			'title' => 'Register Partner'
			);
			$this->load->view('partner/header', $data);
			$this->load->view('partner/register-partner_v');
	   }
	   else
	   {
		     //Field validation succeeded.  Validate against database
	   $owner = $this->input->post('owner');
	   $perusahaan = $this->input->post('perusahaan');
	   $bidang = $this->input->post('bidang');
	  // $type = $this->input->post('type');
	   $photoimg = $this->input->post('photoimg');
	   $handphone = $this->input->post('handphone');
	   $password = $this->input->post('password');
	   $emailin = $this->input->post('email');
	   $address = $this->input->post('address');
	   
	   $config['upload_path'] = './upload/partner/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '1024';
		$config['encrypt_name']= true;
		//var_dump($filename);
		$field_name = "photoimg";
		$this->load->library('upload', $config);
		//$filename = $this->upload->data();
			
		if ( ! $this->upload->do_upload($field_name))
		{
			$error = array('title' => $this->upload->display_errors());
			$data= array(				
				'error' => $this->upload->display_errors(),
				'title' => 'Error Register Partner',
				'owner' => $owner,
				'perusahaan' => $perusahaan,
				'bidang' => $bidang,
				//'type' => $type,
				'email' => $emailin,
				'address' => $address,
				'handphone' => $handphone,
			);
			$this->load->view('partner/header', $data);
			$this->load->view('partner/register-partner_v');
		}
		else
		{
			//$data = array('upload_data' => $this->upload->data());
			$dat = $this->upload->data();
			$filename = $dat['file_name'];
		    $this->load->model('partner_m','',TRUE);
	   		$result = $this->partner_m->register($owner, $perusahaan, $bidang, $emailin, $address, $handphone, $password,$filename);
			redirect('partner/home', 'refresh');
		
		 }
		 //Go to private area
		 
	   }
	
	 }
	}
	public function new_promo()
	 {
	 	if($this->session->userdata('loggedpartner'))
	   {
		 $session_data = $this->session->userdata('loggedpartner');
		 $data['email'] = $session_data['email'];
		 $email= $data['email'];
		 $data['partid'] = $session_data['partid'];
		 $partid= $data['partid'];
		 //var_dump($email);
		 $this->load->model(array('partner_m'));
		 $datas['user_item'] = $this->partner_m->getpartner($partid);
		 $datas['title'] = 'Selamat Datang Gudness Partner';
		
		$this->load->view('partner/header', $datas);
		$this->load->view('partner/create-campaign-partner_v');
		$this->load->view('partner/footer');
		}else{
				$data= array(
				'title' => 'Login Gufdness Partner'
			);
				$this->load->view('partner/header', $data);
				$this->load->view('partner/login-partner_v');
				$this->load->view('partner/footer');
			};
		}

	//Insert Promo
	public function insert_promo()
	 {
		if($this->session->userdata('loggedpartner'))
		{
			if(isset($_POST['submitted'])) {
			
			$config['upload_path'] = './upload/partner/promo';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '1000';
			$config['max_width']  = '1024';
			$config['max_height']  = '1024';
			$config['encrypt_name']= true;
			//var_dump($filename);
			$field_name = "pic";
			$this->load->library('upload', $config);
			//$filename = $this->upload->data();
			$partid =($_POST['partid']);
			//$cat  =($_POST['cat']);
			$judul = ($_POST['judul']);
			$deskripsi  = ($_POST['deskripsi']);
			$poin =($_POST['poin']);		
			$tersedia  =($_POST['tersedia']);			
			if ( ! $this->upload->do_upload($field_name))
			{
				$error = array('title' => $this->upload->display_errors());
				//$datas = array('error' => $this->upload->display_errors());
				$this->load->model(array('user_m'));
				$datas = (array(
					'error' => $this->upload->display_errors(),
					'judul' => $judul,
					'deskripsi' => $deskripsi,
					'poin' => $poin,
					'tersedia' => $tersedia,
					'partid' => $partid,
				));
				$datas['user_item'] = $this->user_m->getuser($email);
				$datas['donasi_user'] = $this->user_m->getdonasi($uid);
				$datas['aksi_user'] = $this->user_m->getaksi($uid);
				//$this->load->view('upload_form', $error);
				$this->load->view('partner/header', $error);
				
				$this->load->view('partner/create-campaign-partner_v',$datas);
				$this->load->view('partner/footer');
			}
			else
			{
				//echo 'siap upload';
				//$data = array('upload_data' => $this->upload->data());
				$dat = $this->upload->data();
				$filename = $dat['file_name'];
				//var_dump($filename);
				$this->load->model(array('partner_m'));
				$data['profile_update'] = $this->partner_m->insert_promo($filename);
				
				//$this->load->view('upload_success', $data);
			
			}
	
			}else{
				redirect('home', 'refresh');
			}
		   
			}else{
					$data= array(
					'title' => 'Login Gudness Partner'
				);
					$this->load->view('partner/header', $data);
					$this->load->view('partner/login-partner_v');
					$this->load->view('partner/footer');
			};
	
	}
	public function new_support()
	 {
	 	if($this->session->userdata('loggedpartner'))
	   {
		 $session_data = $this->session->userdata('loggedpartner');
		 $data['email'] = $session_data['email'];
		 $email= $data['email'];
		 $data['partid'] = $session_data['partid'];
		 $partid= $data['partid'];
		 //var_dump($email);
		 $this->load->model(array('partner_m'));
		 $datas['user_item'] = $this->partner_m->getpartner($partid);
		 $datas['title'] = 'Selamat Datang Gudness Partner';
		
		$this->load->view('partner/header', $datas);
		$this->load->view('partner/create-campaign-partner_v');
		$this->load->view('partner/footer');
		}else{
				$data= array(
				'title' => 'Login Gufdness Partner'
			);
				$this->load->view('partner/header', $data);
				$this->load->view('partner/login-partner_v');
				$this->load->view('partner/footer');
			};
		}
	public function redeem()
	 {
		 
	 }
	public function new_product()
	 {
	   //This method will have the credentials validation
	   $this->load->library('form_validation');
	   $this->load->helper(array('form', 'url'));
		$this->form_validation->set_rules('namapartner', 'Nama Partner', 'trim|required|xss_clean');
		$this->form_validation->set_rules('product', 'Product', 'trim|required|xss_clean');
		$this->form_validation->set_rules('poin', 'Poin', 'trim|required|xss_clean');
	   $this->form_validation->set_rules('tersedia', 'Tersedia', 'trim|required|xss_clean');
	   $this->form_validation->set_rules('desk', 'Desk', 'trim|required|xss_clean');
	
	   if($this->form_validation->run() == FALSE)
	   {
		 //Field validation failed.  User redirected to login page
		 //$this->load->view('login_view');
		  $namapartner = $this->input->post('namapartner');
		   $product = $this->input->post('product');
		   $poin = $this->input->post('poin');
		   $tersedia = $this->input->post('tersedia');
		   $desk = $this->input->post('desk');
		 $data = array(
			'title' =>'Login dan kumpulkan gudness poin di ayopeduli.com!',
			'namapartner' => $namapartner,
			'product' => $product,
			 'poin' => $poin,
			 'tersedia' => $tersedia,
			 'desk' => $desk
			);
			$this->load->view('admin/header',$data);
			$this->load->view('admin/dashboard_v',$data);
			$this->load->view('admin/footer');
	   }
	   else
	   {
		     //Field validation succeeded.  Validate against database
	   $namapartner = $this->input->post('namapartner');
		$product = $this->input->post('product');
		$poin = $this->input->post('poin');
		$tersedia = $this->input->post('tersedia');
		$desk = $this->input->post('desk');
	   $photoimg = $this->input->post('photoimg');
	   
	   $config['upload_path'] = './upload/product/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '1024';
		$config['encrypt_name']= true;
		//var_dump($filename);
		$field_name = "photoimg";
		$this->load->library('upload', $config);
		//$filename = $this->upload->data();
			
		if ( ! $this->upload->do_upload($field_name))
		{
			//$error = array('title' => $this->upload->display_errors());
			$datas = (array(
				'error' => $this->upload->display_errors(),
				'namapartner' => $namapartner,
				'product' => $product,
				 'poin' => $poin,
				 'tersedia' => $tersedia,
				 'desk' => $desk				
			));			
			
			//list donasi
			$this->load->model(array('donasi_m'));
			$datas['aksi_donasi_all'] = $this->donasi_m->getdonasi();
			$datas['donasi_approve'] = $this->donasi_m->getdonasiapprove();
			$this->load->model(array('aksi_m'));
			$datas['aksi'] = $this->aksi_m->getaksiadmin();
			//$datas['sum'] = $this->donasi_m->getdonasi();	
			//var_dump($data['donasi'] = $this->donasi_m->getdonasi());
			$data = array(
				'title' =>'Halaman Admin nih!',
			);		
			$this->load->view('admin/header', $data);
			$this->load->view('admin/dashboard_v', $datas);
			$this->load->view('admin/footer');	
		}
		else
		{
			//$data = array('upload_data' => $this->upload->data());
			$dat = $this->upload->data();
			$filename = $dat['file_name'];
	   //query the database
	   //$sess_array = array();		
//		//foreach($result as $row)
//		$sess_array = array(				 
//				 'email' => $email,
//				 'fullname' => $fullname
//			   );
		//$this->session->set_userdata('logged_in', $sess_array);
		//var_dump($sess_array);
	    $this->load->model('partner_m','',TRUE);
	   	$result = $this->partner_m->insertproduct($namapartner, $product, $poin, $tersedia, $desk, $filename);
		//$error = array('title' => $this->upload->display_errors());
			$datas = (array(
				'success' => "Product berhasil di masukan dan siap di redeem",				
			));			
			
			//list donasi
			$this->load->model(array('donasi_m'));
			$datas['aksi_donasi_all'] = $this->donasi_m->getdonasi();
			$datas['donasi_approve'] = $this->donasi_m->getdonasiapprove();
			$this->load->model(array('aksi_m'));
			$datas['aksi'] = $this->aksi_m->getaksiadmin();
			//$datas['sum'] = $this->donasi_m->getdonasi();	
			//var_dump($data['donasi'] = $this->donasi_m->getdonasi());
			$data = array(
				'title' =>'Halaman Admin nih!',
			);		
			$this->load->view('admin/header', $data);
			$this->load->view('admin/dashboard_v', $datas);
			$this->load->view('admin/footer');	
		
		 }
		 //Go to private area
		 //redirect('home', 'refresh');
	   }
	
	 }	
	  public function logout()
		 {
			//session_start();			
//		   //$this->session->unset_userdata('loggedpartner');
//		   $this->session->sess_destroy('loggedpartner');
//		   session_destroy();
//		   $this->load->helper(array('form', 'url'));
//		   redirect('partner/login');
			$this->session->unset_userdata('partid');
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('perusahaan');
			$this->session->sess_destroy();
			redirect('partner','refresh'); 
		 }
	
}