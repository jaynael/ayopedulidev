<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Aksi extends CI_Controller{
	public function __construct(){
		parent::__construct();
		//$this->load->library('auth');
		$this->load->model(array('aksi_m'));
		$this->load->model(array('donasi_m'));
		//$this->load->helper(array('globals'));
		//$this->load->library(array('simpliparse','pquery','form_validation'));
		//$this->auth->restrict();
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		//$this->load->library('pagination');
	}
 
	//public function index(){
//		$this->load->view('header');
//		$this->load->view('aksi-detail');
//		$this->load->view('footer');
//	}

	public function index(){
		//$data = array(
//			'title' =>' Save Muara Gembong!',
//		);
//		$this->load->view('header', $data);
//		$this->load->view('aksi/aksi-detail_v');
//		$this->load->view('footer');
		$data['aksi'] = $this->aksi_m->getaksi();
		//$config['base_url'] = 'http://ayopeduli.com/aksi/';
		//$config['total_rows'] = 200;
		//$config['per_page'] = 5; 
		
		//$this->pagination->initialize($config);

		$data['title'] = 'Seluruh Aksi';
	
		$this->load->view('header', $data);
		$this->load->view('aksi/all', $data);
		$this->load->view('footer');
	}
	
	public function create(){
			if($this->session->userdata('logged_in'))
   {
	   redirect('home');}else{
			$data = array(
				'title' =>' Buat Aksimu Sekarang!',
			);
			$this->load->view('header', $data);
			$this->load->view('aksi/buat-aksi_v');
			$this->load->view('footer');
   }
		
	}
	
	public function view($slug = FALSE){
		if ($slug === FALSE)
		{
			redirect('notfound');
		}
			$this->load->model(array('aksi_m'));
			$data['aksi_item'] = $this->aksi_m->getaksi($slug);
			if (empty($data['aksi_item']))
			{
				redirect('notfound');
			}
		
			$data['title'] = $data['aksi_item']['judul'];
			$data['deskripsi'] = $data['aksi_item']['deskripsi'];
			$data['jumlahtarget'] = $data['aksi_item']['jumlahtarget'];	
			$aid = $data['aksi_item']['aid'];		
			$uid = $data['aksi_item']['uidact'];
			$verified = $data['aksi_item']['verified'];
			$pic = $data['aksi_item']['pic'];
			$data['jumlahterkumpul'] = $data['aksi_item']['jumlahterkumpul'];			
			$data['aksi_user'] = $this->aksi_m->getuser($uid);
			$data['panggilan'] = $data['aksi_user']['panggilan'];			
			//var_dump($data['uap']);
			$title= $data['aksi_item']['judul'];
			
			//list donasi
			$this->load->model(array('donasi_m'));
			$data['aksi_donasi_item'] = $this->donasi_m->getdonasi($aid);
			
			//list volunteer
			$this->load->model(array('volunteer_m'));
			$data['volunteer_item'] = $this->volunteer_m->getvolun($aid);
			
			//var_dump($this->volunteer_m->getvolunuid($uid, $aid));
			$this->load->view('header', $data);
			$this->load->view('aksi/aksi-detail_v', $data);
			$this->load->view('footer');
		}
	
	public function category ($cat = FALSE){
		if ($cat === FALSE)
		{
			redirect('notfound');
		}
			$this->load->model(array('aksi_m'));
			$data['aksi'] = $this->aksi_m->getcategory();
			$data['aksi_item'] = $this->aksi_m->getcategory($cat);
			//$data['aksi_user'] = $this->aksi_m->getuser($uid);
			if (empty($data['aksi_item']))
			{
				redirect('notfound');
			}		
			$data['title'] = $data['aksi_item'][0]['cat'];
//			$data['deskripsi'] = $data['aksi_item']['deskripsi'];
//			$data['jumlahtarget'] = $data['aksi_item']['jumlahtarget'];				
//			$verified = $data['aksi_item']['verified'];
//			$pic = $data['aksi_item']['pic'];
//			$data['jumlahterkumpul'] = $data['aksi_item']['jumlahterkumpul'];
//			$data['cat'] = $data['aksi_item']['cat'];
//			$uid = $data['aksi_item']['uid'];
//			var_dump($uid = $data['aksi_item']['uid']);
//						
//			$data['aksi_user'] = $this->aksi_m->getuser($uid);
//			$data['panggilan'] = $data['aksi_user']['panggilan'];
//			$data['uid'] = $data['aksi_user']['panggilan'];			
//			var_dump($data['aksi_user'] = $this->aksi_m->getuser($uid));	
			$this->load->view('header', $data);
			$this->load->view('aksi/category-aksi', $data);
			$this->load->view('footer');
		}
	
	public function index_lingkungan() {
        $datalingkungan['hasil'] = $this->aksi_m->aksi_home_lingkungan();
        $this->load->view('index-template', $datalingkungan);
    }
	public function index_kesehatan() {
        $datakesehatan['hasilkesehatan'] = $this->aksi_m->aksi_home_kesehatan();
        $this->load->view('index-template', $datakesehatan);
    }

	public function create_error( $show_error = false ) {
		$dataerror['error'] = $show_error;
		$data = array(
			'title' =>'Buat Aksimu ! error',
		);
		$this->load->view('header', $data);
		$this->load->view('aksi/buat-aksi_v', $dataerror);
		$this->load->view('footer');
		
		
	} 
	
			

	public function savelogin(){
		if(isset($_POST['submitted'])) {
			
			$config['upload_path'] = './upload/aksi/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '1024';
		$config['encrypt_name']= true;
		//var_dump($filename);
		$field_name = "picaksi";
		$this->load->library('upload', $config);
		//$filename = $this->upload->data();
		$email =($_POST['email']);
		$uid =($_POST['uid']);
		//$cat  =($_POST['cat']);
        $judul = ($_POST['judul']);
		$descsing  = ($_POST['descsing']);
		$donasi =($_POST['donasi']);		
		$jumlahtarget  =($_POST['jumlahtarget']);
		$tgl  =($_POST['tgl']);
        $desc = htmlspecialchars($_POST['deskripsi']);		
        $vid =($_POST['vid']);
		
		if ( ! $this->upload->do_upload($field_name))
		{
			$error = array('title' => $this->upload->display_errors());
			//$datas = array('error' => $this->upload->display_errors());
			$this->load->model(array('user_m'));
			$datas = (array(
				'error' => $this->upload->display_errors(),
				'judul' => $judul,
				'descsing' => $descsing,
				'donasi' => $donasi,
				'jumlahtarget' => $jumlahtarget,
				'tgl' => $tgl,
				'desc' => $desc,
				'vid' => $vid
			));
			$datas['user_item'] = $this->user_m->getuser($email);
			$datas['donasi_user'] = $this->user_m->getdonasi($uid);
	 		$datas['aksi_user'] = $this->user_m->getaksi($uid);
			//$this->load->view('upload_form', $error);
			$this->load->view('header', $error);
			
			$this->load->view('profile/my-profile_v',$datas);
			$this->load->view('footer');
		}
		else
		{
			//$data = array('upload_data' => $this->upload->data());
			$dat = $this->upload->data();
			$filename = $dat['file_name'];
			//var_dump($filename);
			$this->load->model(array('aksi_m'));
			$data['profile_update'] = $this->aksi_m->insertaksilogin($filename);
			
			//$this->load->view('upload_success', $data);
		
		}

		}else{
			redirect('home', 'refresh');
		}
	}
	
	public function save(){
	if(isset($_POST['submitted'])) {		
		//upload file
		$config['upload_path'] = './upload/aksi';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['min_size']	= '100';
		$config['min_width']  = '1024';
		$config['min_height']  = '1024';
		$config['encrypt_name']  = true;
		
		//$this->load->library('upload', $config);
		$field_name = "picaksi";
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload($field_name))
		{
			$error = array('error' => $this->upload->display_errors());
			//$this->load->view('/aksi/create', $error);
			//$this->create_error(false);
			//var_dump($error);
			//var_dump(!$this->upload->do_upload($field_name));
		}
		else
		{
			$data = array('upload_data' => $this->upload->data($field_name));
			$config = array(
				array(
					  'field'   => 'judul',
					  'label'   => 'Judul Aksi',
					  'rules'   => 'required'
				   ),
				array(
					  'field'   => 'cat',
					  'label'   => 'Pilih Kategori Aksi',
					  'rules'   => 'required'
				   ),
				array(
					  'field'   => 'descsing',
					  'label'   => 'Deskripsi singkat aksi',
					  //'rules'   => 'required'
				   ),
				array(
					  'field'   => 'donasi',
					  'label'   => 'Donasi',
					  //'rules'   => 'required'
				   ),
				array(
					  'field'   => 'targetdonasi',
					  'label'   => 'Target',
					  //'rules'   => 'required'
				   ),
				array(
					  'field'   => 'picaksi',
					  'label'   => 'Pic Aksi',
					  //'rules'   => 'required'
				   ),
				array(
					  'field'   => 'tgl',
					  'label'   => 'Tanggal',
					  //'rules'   => 'required'
				   ),
				array(
					  'field'   => 'deskripsi',
					  'label'   => 'deskripsi',
					  'rules'   => 'required'
				   ),
				array(
					  'field'   => 'vid',
					  'label'   => 'Video',
					  //'rules'   => 'required'
				   ),
				
				   
		);
		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
		{
			$data = array(
			'title' =>' Kesalahan!',
			);
			$this->load->view('header', $data);
			$this->load->view('aksi/buat-aksi_v');
			$this->load->view('footer');
		}
		else
		{
			$this->aksi_m->insert();
		}
		//$this->form_validation->set_rules($config);
		//$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		//if ($this->form_validation->run() == FALSE){
			//$this->input();
		//}else{
			//$this->aksi_m->insert();
			//redirect("area");		
		//}
		}
	}else{
		redirect("/");
	}
	}
	
}