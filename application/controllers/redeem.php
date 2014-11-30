<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
class Redeem extends CI_Controller{
	public function __construct(){
		parent::__construct();
		//$this->load->library('auth');
		$this->load->model(array('redeem_m'));
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
	}	
	public function poin(){
		//This method will have the credentials validation
	   $this->load->library('form_validation');
	   $this->load->helper(array('form', 'url'));
		//$this->form_validation->set_rules('alamat', 'alamat', 'trim|required|xss_clean');
//		//$this->form_validation->set_rules('kota', 'kota', 'trim|required|xss_clean');
//		//$this->form_validation->set_rules('pos', 'pos', 'trim|required|xss_clean');
//	   $this->form_validation->set_rules('item', 'Product ', 'trim|required');
//	   //$this->form_validation->set_rules('photoimg', 'Photo', 'trim|required|xss_clean');
//	   $alamat = $this->input->post('alamat');
//	  // $kota = $this->input->post('kota');
//	  // $pos = $this->input->post('pos');
	   $item = $this->input->post('item');
	   $uid = $this->input->post('uid');
	   //var_dump($item);	
		
	   if($item==false)
	   {
		 //Field validation failed.  User redirected to login page
		 //$this->load->view('login_view');
		$datas = array(
			'title' =>'Redeem Poin Kamu!',
			'error' => 'Redeem Poin Gagal, silahkan pilih item redeem dengan benar',
			//'alamat' => $alamat,
			//'kota' => $kota,
			//'pos' => $pos
		);
		//$this->load->view('sangkur', $data);			
		$session_data = $this->session->userdata('logged_in');
		$data['email'] = $session_data['email'];
		$email= $data['email'];
		$data['uid'] = $session_data['uid'];
		$uid2= $data['uid'];
		//var_dump($uid);
		$this->load->model(array('user_m'));
		$datas['user_item'] = $this->user_m->getuser($email);
		//$datas['namanya'] = $datas['user_item']['fullname'] ;
		//$datas['donasi_user'] = $this->user_m->getdonasi($uid2);
		//$datas['aksi_user'] = $this->user_m->getaksi($uid);
		//$datas['title'] = $datas['user_item']['fullname'] ;
		$this->load->model(array('partner_m'));
		$datas['product'] = $this->partner_m->getproduct();	
		$datas['title'] = 'halaman profile' ;	 
		if (empty($datas['user_item']))
		{
			redirect('home');
		}
		$this->load->view('home/headerdash', $datas);
		$this->load->view('home/redeem_new', $datas);
   		}
		else
		{
	   		$this->load->model('redeem_m','',TRUE);
	   		$result = $this->redeem_m->poin($uid,$item);
			$datas = array(
				'success' => 'Terima kasih, redeem anda segera kami proses dan Gudness poin anda akan berkurang' ,
				//'link' => $links,
			);
			//$this->load->view('sangkur', $data);			
			$session_data = $this->session->userdata('logged_in');
			$data['email'] = $session_data['email'];
			$email= $data['email'];
			$data['uid'] = $session_data['uid'];
			$uid2= $data['uid'];
			//var_dump($uid);
			$this->load->model(array('user_m'));
			$datas['user_item'] = $this->user_m->getuser($email);
			//$datas['namanya'] = $datas['user_item']['fullname'] ;
			$datas['donasi_user'] = $this->user_m->getdonasi($uid2);
			$datas['aksi_user'] = $this->user_m->getaksi($uid);
			//$datas['title'] = $datas['user_item']['fullname'] ;
			$this->load->model(array('partner_m'));
			$datas['product'] = $this->partner_m->getproduct();	
			$datas['title'] = 'halaman profile' ;	 
			if (empty($datas['user_item']))
				{
					redirect('home');
				}
			$this->load->view('home/headerdash', $datas);
			$this->load->view('home/redeem_new', $datas);
			
	   }
		
	}
	public function voucher($url = FALSE){
		if ($url === FALSE)
		{
			redirect('notfound');
		}
			$this->load->model(array('redeem_m'));
			$data['voucher_item'] = $this->redeem_m->getvoucher($url);
			$this->load->library('ciqrcode');
			//header("Content-Type: image/png");
			$qrcode = $data['voucher_item']['vocerid'];
			//var_dump($qrcode);
			//$params['data'] = 'This is a text to encode become QR Code';
			//$data['qrcode']=$this->ciqrcode->generate($params);
			if (empty($data['voucher_item']))
			{
				redirect('notfound');
			}
			$this->load->view('partner/voucher_v', $data);
	}
}