<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Home controller class
 * This is only viewable to those members that are logged in
 */
 class Home extends CI_Controller{
    function __construct(){
        parent::__construct();
        //$this->check_isvalidated();
		$this->load->helper(array('form', 'url'));
    }
    
 public function index()
 {
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['email'] = $session_data['email'];
	 $email= $data['email'];
	 $data['uid'] = $session_data['uid'];
	 $uid= $data['uid'];
	 //var_dump($uid);
	 $this->load->model(array('user_m'));
	 $this->load->model(array('donasi_m'));
	 $datas['user_item'] = $this->user_m->getuser($email);
	 //$datas['namanya'] = $datas['user_item']['fullname'] ;
	 $datas['donasi_user'] = $this->user_m->getdonasi($uid);
	 $datas['aksi_user'] = $this->user_m->getaksi($uid);
	 $datas['total_donasi'] = $this->donasi_m->getmydonasi($uid);
	 $datas['jumlah_donasi'] = $this->donasi_m->getmyjumdon($uid);
	 //$datas['title'] = $datas['user_item']['fullname'] ;
	 $this->load->model(array('partner_m'));
	$datas['product'] = $this->partner_m->getproduct();	
	 $datas['title'] = 'halaman profile' ;	 
		if (empty($datas['user_item']))
			{
				show_404();
			}
	//$this->load->view('header', $datas);
	//$this->load->view('profile/my-profile_v', $datas);
	//$this->load->view('footer'); 
	$this->load->view('home/headerdash', $datas);
	$this->load->view('home/index', $datas);
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }
 
public function new_act(){
   if($this->session->userdata('logged_in'))
   {
	   $session_data = $this->session->userdata('logged_in');
     $data['email'] = $session_data['email'];
	 $email= $data['email'];
	 $data['uid'] = $session_data['uid'];
	 $uid= $data['uid'];
	 //var_dump($uid);
	 $this->load->model(array('user_m'));
	 $datas['user_item'] = $this->user_m->getuser($email);
	 //$datas['namanya'] = $datas['user_item']['fullname'] ;
	// $datas['donasi_user'] = $this->user_m->getdonasi($uid);
	 //$datas['aksi_user'] = $this->user_m->getaksi($uid);
	 //$datas['title'] = $datas['user_item']['fullname'] ;
	// $this->load->model(array('partner_m'));
	//$datas['product'] = $this->partner_m->getproduct();	
	 $datas['title'] = 'halaman profile' ;	 
		if (empty($datas['user_item']))
			{
				show_404();
			}
	//$this->load->view('header', $datas);
	//$this->load->view('profile/my-profile_v', $datas);
	//$this->load->view('footer'); 
	$this->load->view('home/headerdash', $datas);
	$this->load->view('home/new_aksi', $datas);
	   
   }else{
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }
 
public function new_act2(){
   if($this->session->userdata('logged_in')){
	   if(isset($_POST['submitted'])) {
	   	$session_data = $this->session->userdata('logged_in');
		 $data['email'] = $session_data['email'];
		 $email= $data['email'];
		 //$data['uid'] = $session_data['uid'];
		// $uid= $data['uid'];
		 //var_dump($uid);
		 $this->load->model(array('user_m'));
		 $datas['user_item'] = $this->user_m->getuser($email);
		 $email2 =($_POST['email']);
		$uid =($_POST['uid']);
		$cat  =($_POST['cat']);
		$judul = ($_POST['judul']);
		$descsing  = ($_POST['descsing']);
		//$donasi =($_POST['donasi']);		
		$jumlahtarget  =($_POST['jumlahtarget']);
		$tgl  =($_POST['tgl']);
		$desc = htmlspecialchars($_POST['deskripsi']);
		$this->load->model(array('aksi_m'));
		$data['profile_update'] = $this->aksi_m->insertact2();
		
	   }else{
		   redirect('home/new_act/step1', 'refresh');
	   }
		   
   }else{
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
}

public function new_act3(){
   if($this->session->userdata('logged_in'))
   {
	 if(isset($_POST['submitted'])) {
	 $session_data = $this->session->userdata('logged_in');
     $data['email'] = $session_data['email'];
	 $email= $data['email'];
	 $data['uid'] = $session_data['uid'];
	 $uid= $data['uid'];
	 //var_dump($uid);
	 $this->load->model(array('user_m'));
	 $datas['user_item'] = $this->user_m->getuser($email);
	 $datas['title'] = 'halaman profile';
	 $config['upload_path'] = './upload/aksi/';
	 $config['allowed_types'] = 'gif|jpg|png|jpeg';
	 $config['max_size']	= '1000';
	 $config['max_width']  = '1024';
	 $config['max_height']  = '1024';
	 $config['encrypt_name']= true;
	 $field_name = "picaksi";
	 $aid  = $_POST['aid'];
	 $vid = $_POST['vid'];
	 $this->load->library('upload', $config);
	 if ( ! $this->upload->do_upload($field_name))
		{
			//$datas = array('error' => $this->upload->display_errors());
			$this->load->model(array('user_m'));
			$datas = (array(
				'error' => $this->upload->display_errors(),
				'vid' => $vid,
				'aksiid' => $aid,
			));
			$datas['user_item'] = $this->user_m->getuser($email);
			//$this->load->view('upload_form', $error);
			$this->load->view('home/headerdash', $datas);			
			$this->load->view('home/new_aksi_step2',$datas);
		}
		else
		{
			//$data = array('upload_data' => $this->upload->data());
			$dat = $this->upload->data();
			$filename = $dat['file_name'];
			//var_dump($filename);
			$this->load->model(array('aksi_m'));
			$data['aksi_update_pic'] = $this->aksi_m->insertact3($filename,$aid,$vid);
			$data['aksi_item'] = $this->aksi_m->getaksihomeid($aid);
			$judul = $data['aksi_item']['judul'];
			$selesai = $data['aksi_item']['tgl'];
			$fasid = $data['aksi_item']['uidact'];
			$data['userid_item'] = $this->aksi_m->getuidacthome($fasid);
			$namafasil = $data['userid_item']['fullname'];
			$email = $data['userid_item']['email'];
						
			$datas = (array(
				'thanks' => 'Silahkan upload photo dan iframe video aksi kamu ',
				'title' => 'Terima kasih aksi kamu telah kami terima untuk di review, tunggu kabar baik dari kami. ',
				'aksiid' => $aid,	
				'judul' => $judul ,	
				'namafasil' => $namafasil,	
				'selesai' => $selesai,	
				'email' => $email,
				'edit' => 'yes',	
			));	
			$this->load->model(array('user_m'));
			$datas['user_item'] = $this->user_m->getuser($email);
			//var_dump($datas['aksi_item']);
			$this->load->view('home/headerdash', $datas);			
			$this->load->view('home/new_aksi_step3',$datas,$data);	
			
		
		}
		}else{
		 //If no session, redirect to login page
		 redirect('home', 'refresh');
	   }
	   
   }else{
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
}
public function new_act4(){
	if($this->session->userdata('logged_in'))
   {
	if(isset($_POST['submitted'])) {
	 $session_data = $this->session->userdata('logged_in');
     $data['email'] = $session_data['email'];
	 $email= $data['email'];
	 $data['uid'] = $session_data['uid'];
	 $uid= $data['uid'];
	 //var_dump($uid);
	 $this->load->model(array('user_m'));
	 $datas['user_item'] = $this->user_m->getuser($email);
	 $datas['title'] = 'halaman profile';
	 $config['upload_path'] = './upload/ktp/';
	 $config['allowed_types'] = 'gif|jpg|png|jpeg';
	 $config['max_size']	= '1000';
	 $config['max_width']  = '1024';
	 $config['max_height']  = '1024';
	 $config['encrypt_name']= true;
	 $field_name = "ktp";
	 $aid  = $_POST['aid'];
	 $namaaksi = $_POST['namaaksi'];
	 $namafasil = $_POST['namafasil'];
	 $noktp = $_POST['noktp'];
	 $alamat = $_POST['alamat'];
	 $telpon = $_POST['telpon'];
	 $this->load->library('upload', $config);
	 if ( ! $this->upload->do_upload($field_name))
		{
			//$datas = array('error' => $this->upload->display_errors());
			$this->load->model(array('user_m'));
			$datas = (array(
				'error' => $this->upload->display_errors(),
				'aid' => $aid,
				'namaaksi' => $namaaksi,
				'namafasil' => $namafasil,
				'noktp' => $noktp,
				'alamat' => $alamat,
				'telpon' => $telpon,
				
			));
			$datas['user_item'] = $this->user_m->getuser($email);
			//$this->load->view('upload_form', $error);
			$this->load->view('home/headerdash', $datas);			
			$this->load->view('home/new_aksi_step2',$datas);
		}
		else
		{
			//$data = array('upload_data' => $this->upload->data());
			$dat = $this->upload->data();
			$filename = $dat['file_name'];
			//var_dump($filename);
			$this->load->model(array('aksi_m'));
			$data['aksi_update_pic'] = $this->aksi_m->insertact3($filename,$aid,$vid);
			$data['aksi_item'] = $this->aksi_m->getaksihomeid($aid);
			$judul = $data['aksi_item']['judul'];
			$selesai = $data['aksi_item']['tgl'];
			$fasid = $data['aksi_item']['uid'];
			$data['userid_item'] = $this->aksi_m->getuidacthome($fasid);
			$namafasil = $data['userid_item']['fullname'];
						
			$datas = (array(
				'thanks' => 'Silahkan upload photo dan iframe video aksi kamu ',
				'title' => 'Terima kasih aksi kamu telah kami terima untuk di review, tunggu kabar baik dari kami. ',
				'aksiid' => $aid,	
				'judul' => $judul ,	
				'namafasil' => $namafasil,	
				'selesai' => $selesai,			
			));	
			$this->load->model(array('user_m'));
			$datas['user_item'] = $this->user_m->getuser($email);
			//var_dump($datas['aksi_item']);
			$this->load->view('home/headerdash', $datas);			
			$this->load->view('home/new_aksi_step3',$datas,$data);	
			
		
		}
		}else{
		 //If no session, redirect to login page
		 redirect('home', 'refresh');
	   }
	
	}else{
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
}

public function aksidetail($slug = FALSE){
	if($this->session->userdata('logged_in'))
   {
	   $session_data = $this->session->userdata('logged_in');
     $data['email'] = $session_data['email'];
	 $email= $data['email'];
	 $data['uid'] = $session_data['uid'];
	 $uid= $data['uid'];
	 //var_dump($uid);
	 $this->load->model(array('user_m'));
	 $user['user_item'] = $this->user_m->getuser($email);
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
			$this->load->view('home/headerdash', $user);
			//$this->load->view('header', $data);
			$this->load->view('home/aksidetail_home', $data);
			//$this->load->view('footer');
		}
}

public function edit_act($aid){
   if($this->session->userdata('logged_in'))
   {
	   $session_data = $this->session->userdata('logged_in');
     $data['email'] = $session_data['email'];
	 $email= $data['email'];
	 $data['uid'] = $session_data['uid'];
	 $uid= $data['uid'];
	 //var_dump($uid);
	 $this->load->model(array('user_m'));
	 $user['user_item'] = $this->user_m->getuser($email);
	 $this->load->model(array('aksi_m'));
	 $datas['aksi_user'] = $this->aksi_m->getaksi($aid);
	 $datas['title'] = 'halaman profile' ;	 
		if (empty($user['user_item']))
			{
				show_404();
			}
	$data['aksi_item'] = $this->aksi_m->getaksihomeid($aid);
	$judul = $data['aksi_item']['judul'];
	$selesai = $data['aksi_item']['tgl'];
	$fasid = $data['aksi_item']['uidact'];
	$descsing = $data['aksi_item']['descsing'];
	$deskripsi = $data['aksi_item']['deskripsi'];
	$cat = $data['aksi_item']['cat'];
	$jumlahtarget = $data['aksi_item']['jumlahtarget'];
	$fasil = $data['aksi_item']['fasil'];
	$peranfasil = $data['aksi_item']['peranfasil'];
	$datas = (array(
				//'thanks' => 'Silahkan upload photo dan iframe video aksi kamu ',
				'title' => 'Terima kasih aksi kamu telah kami terima untuk di review, tunggu kabar baik dari kami. ',
				'edit'=>'yes',
				'aksiid' => $aid,	
				'judul' => $judul ,	
				//'namafasil' => $namafasil,	
				'selesai' => $selesai,	
				'descsing'=> $descsing,	
				'deskripsi'=> $deskripsi,
				'jumlahtarget' => $jumlahtarget,
				'cat' => $cat,
				'aid' => $aid,
				'fasil' => $fasil,
				'peranfasil' => $peranfasil
			));	
	$this->load->view('home/headerdash', $user);
	$this->load->view('home/new_aksi', $datas);
	   
   }else{
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

public function edit_act2($aid){
   if($this->session->userdata('logged_in')){	   
	   	$session_data = $this->session->userdata('logged_in');
		 $data['email'] = $session_data['email'];
		 $email= $data['email'];
		 //$data['uid'] = $session_data['uid'];
		// $uid= $data['uid'];
		 //var_dump($uid);
		 $this->load->model(array('user_m'));
		 $datas['user_item'] = $this->user_m->getuser($email);		 
		$this->load->model(array('aksi_m'));
		if(isset($_POST['submitted'])) {
			$email2 =($_POST['email']);
			$uid =($_POST['uid']);
			$cat  =($_POST['cat']);
			$judul = ($_POST['judul']);
			$descsing  = ($_POST['descsing']);
			//$donasi =($_POST['donasi']);		
			$jumlahtarget  =($_POST['jumlahtarget']);
			$tgl  =($_POST['tgl']);
			$desc = htmlspecialchars($_POST['deskripsi']);
			$fasil  =($_POST['fasil']);
			$peran  =($_POST['peran']);
			$data['aksi_update'] = $this->aksi_m->update_act2();
		};
		$data['aksi_id'] = $this->aksi_m->getaksihomeid($aid);
		$pic2 = $data['aksi_id']['pic'];
		$judul =  $data['aksi_id']['judul'];
		//var_dump($data['aksi_id']);
		$datas = (array(
				'thanks' => 'Silahkan upload photo dan iframe video aksi kamu ',
				'title' => 'Terima kasih aksi kamu telah kami terima untuk di review, tunggu kabar baik dari kami. ',
				'aid' => $aid,
				'aksiid' => $aid,
				'judul' =>$judul,
				'edit' =>'yes',
				'user_item' => $this->user_m->getuser($email),
				'pic' => $pic2
								
		));	
			
			//var_dump($datas['aksi_item']);
			$this->load->view('home/headerdash', $datas);			
			$this->load->view('home/new_aksi_step2',$datas);
						   
   }else{
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
}

public function edit_act3(){
   if($this->session->userdata('logged_in'))
   {
	 if(isset($_POST['submitted'])) {
	 $session_data = $this->session->userdata('logged_in');
     $data['email'] = $session_data['email'];
	 $email= $data['email'];
	 $data['uid'] = $session_data['uid'];
	 $uid= $data['uid'];
	 //var_dump($uid);
	 $this->load->model(array('user_m'));
	 $datas['user_item'] = $this->user_m->getuser($email);
	 $datas['title'] = 'halaman profile';	 
	 $aid  = $_POST['aid'];
	 $vid = $_POST['vid'];
	 $this->load->model(array('aksi_m'));
	 if (!isset($_POST['pic'])){
		//echo"none";
		$data['aksi_item'] = $this->aksi_m->getaksihomeid($aid);
			$judul = $data['aksi_item']['judul'];
			$selesai = $data['aksi_item']['tgl'];
			$fasid = $data['aksi_item']['uidact'];
			$data['userid_item'] = $this->aksi_m->getuidacthome($fasid);
			$namafasil = $data['userid_item']['fullname'];
			$email = $data['userid_item']['email'];
						
			$datas = (array(
				'thanks' => 'Silahkan upload photo dan iframe video aksi kamu ',
				'title' => 'Terima kasih aksi kamu telah kami terima untuk di review, tunggu kabar baik dari kami. ',
				'aksiid' => $aid,	
				'judul' => $judul ,	
				'namafasil' => $namafasil,	
				'selesai' => $selesai,	
				'email' => $email,
				'edit' => 'yes',	
			));	
			$this->load->model(array('user_m'));
			$datas['user_item'] = $this->user_m->getuser($email);
			//var_dump($datas['aksi_item']);
			$this->load->view('home/headerdash', $datas);			
			$this->load->view('home/new_aksi_step3',$datas,$data);
	 }else{
		
		 $config['upload_path'] = './upload/aksi/';
		 $config['allowed_types'] = 'gif|jpg|png|jpeg';
		 $config['max_size']	= '1000';
		 $config['max_width']  = '1024';
		 $config['max_height']  = '1024';
		 $config['encrypt_name']= true;
		 $field_name = "picaksi";
		 $this->load->library('upload', $config);
		 
		 if ( ! $this->upload->do_upload($field_name))
			{
				//$datas = array('error' => $this->upload->display_errors());
				$this->load->model(array('user_m'));
				$datas = (array(
					'error' => $this->upload->display_errors(),
					'vid' => $vid,
					'aksiid' => $aid,
				));
				$datas['user_item'] = $this->user_m->getuser($email);
				//$this->load->view('upload_form', $error);
				$this->load->view('home/headerdash', $datas);			
				$this->load->view('home/new_aksi_step2',$datas);
			}
			else
			{
				//$data = array('upload_data' => $this->upload->data());
				$dat = $this->upload->data();
				$filename = $dat['file_name'];
				var_dump($filename);
				$data['aksi_update_pic'] = $this->aksi_m->insertact3($filename,$aid,$vid);
				$data['aksi_item'] = $this->aksi_m->getaksihomeid($aid);
				$judul = $data['aksi_item']['judul'];
				$selesai = $data['aksi_item']['tgl'];
				$fasid = $data['aksi_item']['uidact'];
				$data['userid_item'] = $this->aksi_m->getuidacthome($fasid);
				$namafasil = $data['userid_item']['fullname'];
				$email = $data['userid_item']['email'];
							
				$datas = (array(
					'thanks' => 'Silahkan upload photo dan iframe video aksi kamu ',
					'title' => 'Terima kasih aksi kamu telah kami terima untuk di review, tunggu kabar baik dari kami. ',
					'aksiid' => $aid,	
					'judul' => $judul ,	
					'namafasil' => $namafasil,	
					'selesai' => $selesai,	
					'email' => $email,
					'edit' => 'yes',	
				));	
				$this->load->model(array('user_m'));
				$datas['user_item'] = $this->user_m->getuser($email);
				//var_dump($datas['aksi_item']);
				$this->load->view('home/headerdash', $datas);			
				$this->load->view('home/new_aksi_step3',$datas,$data);	
	 		};	 
		}
		}else{
		 //If no session, redirect to login page
		 redirect('home', 'refresh');
	   }
	   
   }else{
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
}

public function redeem()
 {
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['email'] = $session_data['email'];
	 $email= $data['email'];
	 $data['uid'] = $session_data['uid'];
	 $uid= $data['uid'];
	 //var_dump($uid);
	 $this->load->model(array('user_m'));
	 $datas['user_item'] = $this->user_m->getuser($email);
	 //$datas['namanya'] = $datas['user_item']['fullname'] ;
	 //$datas['donasi_user'] = $this->user_m->getdonasi($uid);
	 //$datas['aksi_user'] = $this->user_m->getaksi($uid);
	 //$datas['title'] = $datas['user_item']['fullname'] ;
	 $this->load->model(array('partner_m'));
	 $datas['product'] = $this->partner_m->getproduct();	
	 $datas['title'] = 'halaman profile' ;	 
		if (empty($datas['user_item']))
			{
				show_404();
			}
	$this->load->view('home/headerdash', $datas);
	$this->load->view('home/redeem_new', $datas);
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
}
public function redeemhistory()
 {
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['email'] = $session_data['email'];
	 $email= $data['email'];
	 $data['uid'] = $session_data['uid'];
	 $uid= $data['uid'];
	 //var_dump($uid);
	 $this->load->model(array('user_m'));
	 $datas['user_item'] = $this->user_m->getuser($email);
	 $this->load->model(array('redeem_m'));
	 $datas['redeem_list'] = $this->redeem_m->getmyredeem($uid);	
	 $datas['title'] = 'halaman profile' ;	 
		if (empty($datas['user_item']))
			{
				show_404();
			}
	$this->load->view('home/headerdash', $datas);
	$this->load->view('home/redeem_list', $datas);
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
}

 public function aksi($page=1)
 {
   if($this->session->userdata('logged_in'))
   {
	   $this->load->library('pagination');
        //$this->load->library('paginationlib');
	   $session_data = $this->session->userdata('logged_in');
     $data['email'] = $session_data['email'];
	 $email= $data['email'];
	 $data['uid'] = $session_data['uid'];
	 $uid= $data['uid'];
	 //var_dump($uid);
	 $this->load->model(array('user_m'));
	 $datas['user_item'] = $this->user_m->getuser($email);
	 $this->load->model(array('aksi_m'));
	 $datas['aksi_list'] = $this->user_m->getuser($email);
	 $datas['title'] = 'halaman profile' ;	 
	 if (empty($datas['user_item']))
		{
			show_404();
		}
	 
	 $this->load->library('pagination');

	$config['base_url'] = '/home/aksi/';
	$config['total_rows'] = count($this->aksi_m->aksi_active());
	//var_dump(count($this->aksi_m->aksi_active()));
	$config['per_page'] = 15;
	$choice = $config["total_rows"] / $config["per_page"];
    $config["num_links"] = round($choice); 
	//$config['num_links'] = 2;
	$config['uri_segment'] = 3;
	$config['page_query_string'] = FALSE;
	$config['use_page_numbers'] = FALSE;
	$config['full_tag_open'] = "<ul class='pagination'>";
	$config['full_tag_close'] ="</ul>";
	$config['num_tag_open'] = '<li>';
	$config['num_tag_close'] = '</li>';
	$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
	$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
	$config['next_tag_open'] = "<li>";
	$config['next_tagl_close'] = "</li>";
	$config['prev_tag_open'] = "<li>";
	$config['prev_tagl_close'] = "</li>";
	$config['first_tag_open'] = "<li>";
	$config['first_tagl_close'] = "</li>";
	$config['last_tag_open'] = "<li>";
	$config['last_tagl_close'] = "</li>";
	$this->pagination->initialize($config);
	$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	$datas["results"] = $this->aksi_m->fetch_aksi($config["per_page"], $page); 	
	$datas['nav'] = $this->pagination->create_links();
	//var_dump($datas['results']);
		$this->load->view('home/headerdash', $datas);
		$this->load->view('home/aksi_list', $datas);
	   
	   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
}
 public function aksimy($page=1)
 {
   if($this->session->userdata('logged_in'))
   {
	   $this->load->library('pagination');
        //$this->load->library('paginationlib');
	   $session_data = $this->session->userdata('logged_in');
     $data['email'] = $session_data['email'];
	 $email= $data['email'];
	 $data['uid'] = $session_data['uid'];
	 $uid= $data['uid'];
	 //var_dump($uid);
	 $this->load->model(array('user_m'));
	 $datas['user_item'] = $this->user_m->getuser($email);
	 $this->load->model(array('aksi_m'));
	 $datas['aksi_list'] = $this->user_m->getuser($email);
	 $datas['title'] = 'halaman profile' ;	 
	 if (empty($datas['user_item']))
		{
			show_404();
		}
	 
	 $this->load->library('pagination');

	$config['base_url'] = '/home/aksi/';
	$config['total_rows'] = count($this->aksi_m->aksi_activemy($uid));
	//var_dump(count($this->aksi_m->aksi_active()));
	$config['per_page'] = 15;
	$choice = $config["total_rows"] / $config["per_page"];
    $config["num_links"] = round($choice); 
	//$config['num_links'] = 2;
	$config['uri_segment'] = 3;
	$config['page_query_string'] = FALSE;
	$config['use_page_numbers'] = FALSE;
	$config['full_tag_open'] = "<ul class='pagination'>";
	$config['full_tag_close'] ="</ul>";
	$config['num_tag_open'] = '<li>';
	$config['num_tag_close'] = '</li>';
	$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
	$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
	$config['next_tag_open'] = "<li>";
	$config['next_tagl_close'] = "</li>";
	$config['prev_tag_open'] = "<li>";
	$config['prev_tagl_close'] = "</li>";
	$config['first_tag_open'] = "<li>";
	$config['first_tagl_close'] = "</li>";
	$config['last_tag_open'] = "<li>";
	$config['last_tagl_close'] = "</li>";
	$this->pagination->initialize($config);
	$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	$datas["results"] = $this->aksi_m->fetch_aksimy($config["per_page"], $page, $uid); 	
	$datas['nav'] = $this->pagination->create_links();
	//var_dump($datas['results']);
		$this->load->view('home/headerdash', $datas);
		$this->load->view('home/my_aksi_list', $datas);
	   
	   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
}
	   

public function donasihistory()
 {
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['email'] = $session_data['email'];
	 $email= $data['email'];
	 $data['uid'] = $session_data['uid'];
	 $uid= $data['uid'];
	 //var_dump($uid);
	 $this->load->model(array('user_m'));
	 $datas['user_item'] = $this->user_m->getuser($email);
	 $this->load->model(array('donasi_m'));
	 $datas['donasi_user'] = $this->user_m->getdonasi($uid);
	 $datas['total_donasi'] = $this->donasi_m->getmydonasi($uid);
	 $datas['jumlah_donasi'] = $this->donasi_m->getmyjumdon($uid);
	 //var_dump( $datas['total_donasi']);
	 //$datas['donasi_list'] = $this->donasi_m->getmydonasi($uid);	
	 $datas['title'] = 'halaman profile' ;	 
		if (empty($datas['user_item']))
			{
				show_404();
			}
	$this->load->view('home/headerdash', $datas);
	$this->load->view('home/donasi_list', $datas);
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
}
 public function editaksi($aid)
 {
	 if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['email'] = $session_data['email'];
	 $email= $data['email'];
	 $data['uid'] = $session_data['uid'];
	 $uid= $data['uid'];
	 //var_dump($uid);
	 $this->load->model(array('user_m'));
	 $datas['user_item'] = $this->user_m->getuser($email);
	 //$datas['namanya'] = $datas['user_item']['fullname'] ;
	 $datas['donasi_user'] = $this->user_m->getdonasi($uid);
	 $datas['aksi_user'] = $this->user_m->getaksi($uid);
	 $this->load->model(array('aksi_m'));
	 $datas['aksi_content'] = $this->aksi_m->getaksicontent($aid, $uid);
	 $datas['aid'] = $aid;	
	 //$datas['title'] = $datas['user_item']['fullname'] ;	
	 $datas['title'] = 'halaman profile' ;	 
		if (empty($datas['user_item']))
			{
				show_404();
			}
	$this->load->view('header', $datas);
	$this->load->view('profile/edit-aksi_v', $datas);
	$this->load->view('footer'); 
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
	
}

public function updateaksi($aid){
		if(isset($_POST['submitted'])) {
			if($this->session->userdata('logged_in'))
			   {
				 $session_data = $this->session->userdata('logged_in');
				 $data['email'] = $session_data['email'];
				 $email= $data['email'];
				 $data['uid'] = $session_data['uid'];
				 $uid= $data['uid'];
				 //var_dump($uid);
				 $this->load->model(array('user_m'));
				 $datas['user_item'] = $this->user_m->getuser($email);
				 //$datas['namanya'] = $datas['user_item']['fullname'] ;
				 $datas['donasi_user'] = $this->user_m->getdonasi($uid);
				 $datas['aksi_user'] = $this->user_m->getaksi($uid);
				 $this->load->model(array('aksi_m'));
				 $datas['aksi_content'] = $this->aksi_m->getaksicontent($aid, $uid);
				 $datas['aid'] = $aid;	
				 //$datas['title'] = $datas['user_item']['fullname'] ;	
				 $datas['title'] = 'halaman profile' ;	 
					if (empty($datas['user_item']))
						{
							show_404();
						}
						if (isset($_POST['picaksi'])){
							$config['upload_path'] = './upload/aksi/';
							$config['allowed_types'] = 'gif|jpg|png';
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
							$datas['aid'] = $aid;
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
									'vid' => $vid,
									'aid' => $aid
								));
								$datas['user_item'] = $this->user_m->getuser($email);
								$datas['donasi_user'] = $this->user_m->getdonasi($uid);
								$datas['aksi_user'] = $this->user_m->getaksi($uid);
								$this->load->model(array('aksi_m'));
								$datas['aksi_content'] = $this->aksi_m->getaksicontent($aid, $uid);
								//$this->load->view('upload_form', $error);
								$this->load->view('header', $error);
								
								$this->load->view('profile/edit-aksi_v',$datas);
								$this->load->view('footer');
							}
							else
								{
									//$data = array('upload_data' => $this->upload->data());
									$dat = $this->upload->data();
									$filename = $dat['file_name'];
									//var_dump($filename);
									$this->load->model(array('aksi_m'));
									$data['profile_update'] = $this->aksi_m->updateaksi($filename);						
									//$this->load->view('upload_success', $data);					
								}
							}else{
								$this->load->model(array('aksi_m'));
								$this->aksi_m->updateaksi($aid);
								//var_dump($data['profile_update']);	
								//echo $aid;
								$datas = (array(
									'success' => "Aksi Berhasil di Update",
									'title' => "Aksi Berhasil di Update",
									'aid' => $aid
									
								));
								$datas['user_item'] = $this->user_m->getuser($email);
								$datas['donasi_user'] = $this->user_m->getdonasi($uid);
								$datas['aksi_user'] = $this->user_m->getaksi($uid);
								$this->load->model(array('aksi_m'));
								$datas['aksi_content'] = $this->aksi_m->getaksicontent($aid, $uid);
								$this->load->view('header', $datas);					
								$this->load->view('profile/edit-aksi_v',$datas);
								$this->load->view('footer');
								}
			 
						   }
						   else
						   {
							 //If no session, redirect to login page
							 redirect('login', 'refresh');
						   }
						}else{
							redirect('home', 'refresh');
						}
				}
			 
public function editprofile($uid)
	{
		if(isset($_POST['submitted'])) {			
	 		if (isset($_POST['photoimg'])){
					$config['upload_path'] = './upload/user/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= '500';
					$config['max_width']  = '1024';
					$config['max_height']  = '1024';
					$config['encrypt_name']= true;
					//var_dump($filename);
					$field_name = "photoimg";
					$this->load->library('upload', $config);
					//$filename = $this->upload->data();
						
					if (!$this->upload->do_upload($field_name))
					{
						$error = array('title' => $this->upload->display_errors());
						//$datas = array('error' => $this->upload->display_errors());
						$this->load->model(array('user_m'));
						$datas = (array(
						'error' => $this->upload->display_errors(),
						));
						$session_data = $this->session->userdata('logged_in');
						$data['email'] = $session_data['email'];
						$email= $data['email'];
						$data['uid'] = $session_data['uid'];
						$uid= $data['uid'];
						//var_dump($uid);
						$this->load->model(array('user_m'));
						$datas['user_item'] = $this->user_m->getuser($email);
						//$datas['namanya'] = $datas['user_item']['fullname'] ;
						$datas['donasi_user'] = $this->user_m->getdonasi($uid);
						$datas['aksi_user'] = $this->user_m->getaksi($uid);
						//$datas['title'] = $datas['user_item']['fullname'] ;
						//$this->load->view('upload_form', $error);
						$this->load->view('header', $error);								
						$this->load->view('profile/my-profile_v',$datas);
						$this->load->view('footer');
					}
					else
					{
						$dat = $this->upload->data();
						$filename = $dat['file_name'];
						$this->load->model(array('user_m'));
						$data['profile_update'] = $this->user_m->updatepic($filename);						
						$this->load->model(array('user_m'));
						$datasu = (array(
							'success' => "Profile anda telah diupdate",
							'tittle' => "Profile anda telah diupdate",
						));
						$session_data = $this->session->userdata('logged_in');
						$data['email'] = $session_data['email'];
						$email= $data['email'];
						$data['uid'] = $session_data['uid'];
						$uid= $data['uid'];
						//var_dump($uid);
						$this->load->model(array('user_m'));
						$datas['user_item'] = $this->user_m->getuser($email);
						//$datas['namanya'] = $datas['user_item']['fullname'] ;
						$datas['donasi_user'] = $this->user_m->getdonasi($uid);
						$datas['aksi_user'] = $this->user_m->getaksi($uid);
						//$datas['title'] = $datas['user_item']['fullname'] ;
						//$this->load->view('upload_form', $error);
						$this->load->view('header', $datasu);								
						$this->load->view('profile/my-profile_v',$datasu);
						$this->load->view('footer');
					}
				}
				if (!isset($_POST['photoimg'])){
				$this->load->model(array('user_m'));
				$data['profile_update'] = $this->user_m->update( $uid);
				//$this->load->view('upload_success', $data);
				$this->load->model(array('user_m'));
				$datas = (array(
					'success' => "Profile anda telah diupdate",
					'tittle' => "Profile anda telah diupdate",
				));
				$session_data = $this->session->userdata('logged_in');
				$data['email'] = $session_data['email'];
				$email= $data['email'];
				$data['uid'] = $session_data['uid'];
				$uid= $data['uid'];
				//var_dump($uid);
				$this->load->model(array('user_m'));
				$datas['user_item'] = $this->user_m->getuser($email);
				$datas['namanya'] = $datas['user_item']['fullname'] ;
				$datas['donasi_user'] = $this->user_m->getdonasi($uid);
				$datas['aksi_user'] = $this->user_m->getaksi($uid);
				//$datas['title'] = $datas['user_item']['fullname'] ;
				//$this->load->view('upload_form', $error);
				$this->load->view('header', $datas);								
				$this->load->view('profile/my-profile_v',$datas);
				$this->load->view('footer');
				};
	 //}
	}else{
		redirect('home');
	}
}

public function updateprofile()
	{
		$session_data = $this->session->userdata('logged_in');
		$data['email'] = $session_data['email'];
		$email= $data['email'];
		$data['uid'] = $session_data['uid'];
		$uid= $data['uid'];
		if(isset($_POST['submit'])) {			
	 		if (isset($_POST['photo'])){
					$config['upload_path'] = './upload/user/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= '500';
					$config['max_width']  = '1024';
					$config['max_height']  = '1024';
					$config['encrypt_name']= true;
					//var_dump($filename);
					$field_name = "photo";
					$this->load->library('upload', $config);
					//$filename = $this->upload->data();
						
					if (!$this->upload->do_upload($field_name))
					{
						$error = array('title' => $this->upload->display_errors());
						//$datas = array('error' => $this->upload->display_errors());
						$this->load->model(array('user_m'));
						$datas = (array(
						'error' => $this->upload->display_errors(),
						));
						//var_dump($uid);
						$this->load->model(array('user_m'));
						$datas['user_item'] = $this->user_m->getuser($email);
						//$datas['namanya'] = $datas['user_item']['fullname'] ;
						$datas['donasi_user'] = $this->user_m->getdonasi($uid);
						$datas['aksi_user'] = $this->user_m->getaksi($uid);
						//$datas['title'] = $datas['user_item']['fullname'] ;
						//$this->load->view('upload_form', $error);
						$this->load->view('header', $error);								
						$this->load->view('profile/my-profile_v',$datas);
						$this->load->view('footer');
					}
					else
					{
						$dat = $this->upload->data();
						$filename = $dat['file_name'];
						$this->load->model(array('user_m'));
						$data['profile_update'] = $this->user_m->updatepic($filename);						
						$this->load->model(array('user_m'));
						$datasu = (array(
							'success' => "Profile anda telah diupdate",
							'tittle' => "Profile anda telah diupdate",
						));
						$session_data = $this->session->userdata('logged_in');
						$data['email'] = $session_data['email'];
						$email= $data['email'];
						$data['uid'] = $session_data['uid'];
						$uid= $data['uid'];
						//var_dump($uid);
						$this->load->model(array('user_m'));
						$datas['user_item'] = $this->user_m->getuser($email);
						//$datas['namanya'] = $datas['user_item']['fullname'] ;
						$datas['donasi_user'] = $this->user_m->getdonasi($uid);
						$datas['aksi_user'] = $this->user_m->getaksi($uid);
						//$datas['title'] = $datas['user_item']['fullname'] ;
						//$this->load->view('upload_form', $error);
						$this->load->view('header', $datasu);								
						$this->load->view('profile/my-profile_v',$datasu);
						$this->load->view('footer');
					}
				}
				if (!isset($_POST['photo'])){
				$this->load->model(array('user_m'));
				$data['profile_update'] = $this->user_m->update($uid);
				//$this->load->view('upload_success', $data);
				$this->load->model(array('user_m'));
				$datas = (array(
					'success' => "Profile anda telah diupdate",
					'tittle' => "Profile anda telah diupdate",
				));
				$session_data = $this->session->userdata('logged_in');
				$data['email'] = $session_data['email'];
				$email= $data['email'];
				$data['uid'] = $session_data['uid'];
				$uid= $data['uid'];
				//var_dump($uid);
				$this->load->model(array('user_m'));
				$datas['user_item'] = $this->user_m->getuser($email);
				$datas['namanya'] = $datas['user_item']['fullname'] ;
				$datas['donasi_user'] = $this->user_m->getdonasi($uid);
				$datas['aksi_user'] = $this->user_m->getaksi($uid);
				//$datas['title'] = $datas['user_item']['fullname'] ;
				//$this->load->view('upload_form', $error);
				$this->load->view('header', $datas);								
				$this->load->view('profile/my-profile_v',$datas);
				$this->load->view('footer');
				};
	 //}
	 	redirect('myprofile');
	}else{
		redirect('home');
	}
}

public function logout()
 {
	 session_start();
	$this->load->helper(array('form', 'url'));
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('login');
 }

 }
 ?>
