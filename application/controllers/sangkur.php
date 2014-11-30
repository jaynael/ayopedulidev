<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Sangkur extends CI_Controller{
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
	}
	public function index(){
		$this->load->model('sangkur_m','',TRUE);
		$data['volunteer'] = $this->sangkur_m->volunteer();	
		//var_dump ($data['volunteer']);
		$email = $data['volunteer']['email'];
		$data['komunitas'] = $data['volunteer']['komunitas'];
		$data['user'] = $this->sangkur_m->volunteeremail($email);
		//var_dump($data['user']);			
		$this->load->view('sangkur', $data);
	}
	public function daftar(){
		//This method will have the credentials validation
	   $this->load->library('form_validation');
	   $this->load->helper(array('form', 'url'));
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|xss_clean');
		$this->form_validation->set_rules('komunitas', 'Komunitas', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
	   $this->form_validation->set_rules('hp', 'hp', 'trim|required|xss_clean');
	   //$this->form_validation->set_rules('photoimg', 'Photo', 'trim|required|xss_clean');
	   $nama = $this->input->post('nama');
	   $komunitas = $this->input->post('komunitas');
	   $email = $this->input->post('email');
	   $hp = $this->input->post('hp');
	   $pesan = $this->input->post('pesan');	
	   if($this->form_validation->run() == FALSE)
	   {
		 //Field validation failed.  User redirected to login page
		 //$this->load->view('login_view');
		 $data = array(
			'title' =>'Login dan kumpulkan gudness poin di ayopeduli.com!',
			'error' => 'Pendaftaran anda gagal silahkan isi kembali dengan benar',
			'nama' => $nama,
			'email' => $email,
			'komunitas' => $komunitas,
			'hp' => $hp,
			'pesan' => $pesan
			);
			$this->load->view('sangkur', $data);
	   }
	   else
	   {
		     //Field validation succeeded.  Validate against database
	  	$nama = $this->input->post('nama');
	   $komunitas = $this->input->post('komunitas');
	   $email = $this->input->post('email');
	   $hp = $this->input->post('hp');
	   $pesan = $this->input->post('pesan');	   
	   $config['upload_path'] = './upload/user/';
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
			$error = array('title' => $this->upload->display_errors());
			$datas = (array(
				'error' => $this->upload->display_errors(),
				'nama' => $nama,
				'email' => $email,
				'komunitas' => $komunitas,
				'hp' => $hp,
				'pesan' => $pesan			
			));

			//$this->load->view('upload_form', $error);
			$this->load->view('sangkur', $datas);
		}
		else
		{
			//$data = array('upload_data' => $this->upload->data());
			$dat = $this->upload->data();
			$filename = $dat['file_name'];
		    $this->load->model('sangkur_m','',TRUE);
	   		$result = $this->sangkur_m->daftar($nama, $email, $filename, $komunitas, $hp, $pesan);
			
			
		
		 }
		 //Go to private area
		 //redirect('home', 'refresh');
	   };
	}
}