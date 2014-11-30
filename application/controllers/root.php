<?php
 
class Index extends CI_Controller{
	public function __construct(){
		parent::__construct();
		//$this->load->model(array('aksi_m'));
	}
 
	public function index(){
		$data = array(
			'title' =>' Connecting Goodness!',
		);		
		$this->load->view('header', $data);
		$this->load->view('index');
		$this->load->model(array('aksi_m'));
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
		$uid = $data['aksi_lingkungan']['uid'];	
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
		$uid = $data['aksi_kesehatan']['uid'];	
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
		$uid = $data['aksi_pendidikan']['uid'];	
		$data['aksi_user_pendidikan'] = $this->aksi_m->getuser($uid);
		$data['fullname'] = $data['aksi_user_pendidikan']['fullname'];
		$data['photo'] = $data['aksi_user_pendidikan']['photo'];
		$data['poin'] = $data['aksi_user_pendidikan']['poin'];	
		
		$this->load->view('index-template/content-index', $data);
		$this->load->view('footer');	
	}	
	
}