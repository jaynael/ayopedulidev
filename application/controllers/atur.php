<?php
 
class Atur extends CI_Controller{
	public function __construct(){
		parent::__construct();
		//$this->load->model(array('aksi_m'));
		//$this->auth->restrict();
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		
	}
	public function login(){
		$data = array(
			'title' =>'Halaman Admin nih!',
		);		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/login_v');
		$this->load->view('admin/footer');
	}
	public function admin(){
		if($this->session->userdata('logged_admin'))
	   {
			//list donasi
			$this->load->model(array('donasi_m'));
			$datas['aksi_donasi_all'] = $this->donasi_m->getdonasi();
			$datas['donasi_approve'] = $this->donasi_m->getdonasiapprove();
			$this->load->model(array('aksi_m'));
			$datas['aksi'] = $this->aksi_m->getaksiadmin();
			$this->load->model(array('partner_m'));
			$datas['productis'] = $this->partner_m->getproduct();
			//$datas['sum'] = $this->donasi_m->getdonasi();	
			//var_dump($data['donasi'] = $this->donasi_m->getdonasi());
			$data = array(
				'title' =>'Halaman Admin nih!',
			);		
			$this->load->view('admin/header', $data);
			$this->load->view('admin/dashboard_v', $datas);
			$this->load->view('admin/footer');		
		}else
		   {
			 //If no session, redirect to login page
			 redirect('atur/login', 'refresh');
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
		 $data = array(
			'title' =>'Login dan kumpulkan gudness poin di ayopeduli.com!',
			);
			$this->load->view('admin/header', $data);
			$this->load->view('admin/login_v');
			$this->load->view('admin/footer');
	   }
	   else
	   {
		 //Go to private area
		 redirect('atur/admin', 'refresh');
	   }
	
	 }
	 
	 public function check_database($password)
	 {
	   //Field validation succeeded.  Validate against database
	   $email = $this->input->post('email');
	
	   //query the database
	    $this->load->model('user_m','',TRUE);
	   $result = $this->user_m->loginadmin($email, $password);
	
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
		   $this->session->set_userdata('logged_admin', $sess_array);
		 }
		 return TRUE;
	   }
	   else
	   {
		 $this->form_validation->set_message('check_database', 'anda bukan admin');
		 return false;
	   }
	 }
	 
	 function viewaksi($slug = FALSE){
		 if($this->session->userdata('logged_admin')){
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
					$this->load->view('admin/header', $data);
					$this->load->view('admin/aksi-detail-admin_v', $data);
					$this->load->view('admin/footer');				
			}else{
			redirect('login');
			}
	 }	 
	 
	 public function aksivalidasi(){
		if($this->session->userdata('logged_admin'))
	   {
		   if($_POST['action'] == 'update'){
			$aid  = mysql_real_escape_string($_POST['aid']);  
			$this->load->model(array('aksi_m'));	
			$data['donasi_update'] = $this->aksi_m->validateaksi();
	?>
		<div class='alert alert-success'>
            <button type="button" class="close" data-dismiss="alert">×</button> ID Aksi <?php echo "$aid"; ?> berhasi di divalidasi <?php // echo $poinuser ?> </div>
            <script type="text/javascript">
            $(function(){
				$('#email').val('');
				$('#password').val('');
				$('#fullname').val('');
				$('#panggilan').val('');
				$('#totaldon').val('');
				$('#loading').hide();					   
			});				
			</script>
        <?php }else {
            ?>          
          <div class='alert alert-error'>
          <button type="button" class="close" data-dismiss="alert">×</button>Something Wrong!<br> <?php die('Could not enter data: ' . mysql_error());?></div>
          <script type="text/javascript">
            $(function(){
				$('#loading').show();					   
			});				
			</script>
	<?php   }

		//$uid = $data['aksi_item']['uid'];
		//var_dump($uid);
		   
	   }else{
		   redirect('login');
	   }
	 }
	 
	 public function adddonasi($aid){
		if($this->session->userdata('logged_admin'))
	   {
		   //list donasi
			$this->load->model(array('donasi_m'));
			$datas['aksi_donasi_all'] = $this->donasi_m->getdonasi();
			$datas['donasi_approve'] = $this->donasi_m->getdonasiapprove();
			$this->load->model(array('aksi_m'));
			$datas['aksi'] = $this->aksi_m->getaksiidadmin($aid);
			$datas['judul'] = $datas['aksi']['judul'];
			//var_dump($datas['judul']);
			//$datas['sum'] = $this->donasi_m->getdonasi();	
			//var_dump($data['donasi'] = $this->donasi_m->getdonasi());
			$data = array(
				'title' =>'Halaman Admin nih!',
				'aid' => $aid
			);		
			$this->load->view('admin/header', $data);
			$this->load->view('admin/adddonasi_v', $datas);
			$this->load->view('admin/footer');
		   
	   }else{
		    redirect('atur/login', 'refresh');
	   }
		 
	 }
	 
	 public function logout()
	 {
		 session_start();
		$this->load->helper(array('form', 'url'));
	   $this->session->unset_userdata('logged_admin');
	   session_destroy();
	   redirect('atur/login');
	 }
	
	
}