<?php
if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');
Class User_m extends CI_Model
{
	public function __construct(){
		parent::__construct();
		//$this->load->helper('url');
		$this->load->database();
	}

 /*public function register(){
		$name =$_POST['fullname'];		
		$call = $_POST['panggilan'];
 		$email =$_POST['email'];		
		$password = md5($_POST['password']);
		$photo = $_FILES['photoimg']['name'];		
		$result=mysql_query("select * from ap_user order by id desc limit 1")or die (mysql_error());//query sang database 			
		$row=mysql_fetch_array($result);//ma return row sa database
		$uid = $row['id']+1;
		$result=mysql_query("insert into ap_user values('$email','$password','$call','$name','5','0','$_SERVER[REMOTE_ADDR]','','$uid','UAP000$uid','/upload/UAP000$uid.jpg')")or die ("<script language=javascript>alert('ERROR : ".addslashes(mysql_error())."');history.back(1);</script>");
		move_uploaded_file($_FILES['photoimg']['tmp_name'], '/home/ayopedul/public_html/newversion/upload/UAP000'.$uid.'.jpg');
		echo "<script language=javascript>alert('Registrasi Berhasil');self.location.href='/login';</script>";
 }	*/
public function register($fullname, $panggilan, $filename, $email1, $handphone, $password){
	function autouser($tabel2, $kolom2, $lebar2=0, $awalan2='')
				{
					$query2="select $kolom2 from $tabel2 order by $kolom2 desc limit 1";
					$hasil2=mysql_query($query2);
					$jumlahrecord2 = mysql_num_rows($hasil2);
					if($jumlahrecord2 == 0)
						$nomor2=1;
					else
					{
						$row2=mysql_fetch_array($hasil2);
						$nomor2=intval(substr($row2[0],strlen($awalan2)))+1;
					}
					if($lebar2>0)
						$angka2 = $awalan2.str_pad($nomor2,$lebar2,"0",STR_PAD_LEFT);
					else
						$angka2 = $awalan2.$nomor2;
					return $angka2;
				}
	$uid = autouser("ap_user","uid",5,"UAP");
	$this->db->select('*');
	$this->db->from('ap_user');
	$this->db->where(array('email' =>$email1));
	$query = $this->db->get();
	$email2 = $query->row_array();
	//$email3 = $email2['email'];
	$data = array(
	   'email' => $email1 ,
	   'fullname' => $fullname ,
	   'panggilan' => $panggilan ,
	   'photo' => $filename,
	   'password' => MD5($password),
	   'uid' => $uid,
	   'hp' => $handphone,
	   'poin' => 25
	);	
	//var_dump($data);
	//echo count($email2);
	if(count($email2) !== 0 ){				
			$datas = (array(
				'error' => 'Email sudah terdaftar silahkan login',
				'title' => 'Daftar dan bergabung bersama ribuan volunteer lainnya',
				'fullname' => $fullname,
				'panggilan' => $panggilan,
				'email' => $email1,
				'handphone' => $handphone,				
			));

			//$this->load->view('upload_form', $error);
			$this->load->view('header', $datas);
			$this->load->view('profile/register_v', $datas);
			$this->load->view('footer');
		}
	if (count($email2) == 0 ){	
	$this->db->insert('ap_user', $data);	 
	$sess_array = array();		
		//foreach($result as $row)
	$sess_array = array(	
				'uid' => $uid,			 
				 'email' => $email1,
				 'fullname' => $fullname
			   );
	$this->session->set_userdata('logged_in', $sess_array);
		//var_dump($sess_array);	
	//sending email to new user	
	//$this->load->library('email');
//	$this->email->from('no-reply@ayopeduli.com', 'Ayopeduli.com ');
//	$this->email->to($email1); 
//	$this->email->cc('gufron@ayopeduli.com'); 
//	//$this->email->bcc('them@their-example.com'); 	
//	$this->email->subject('Terima kasih atas pendaftaran anda di ayopeduli.com');
//	$this->email->message('Testing the email class.');		
//	$this->email->send();	
	//echo $this->email->print_debugger();

   // $this->load->library('email', $config);
   $this->load->library('email');
    $this->email->set_mailtype("html");
    $email_body ="<html><head><style type='text/css'>
				#outlook a{padding:0;}
				body{width:100% !important;} .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} 
				body{-webkit-text-size-adjust:none;}
				body{margin:0; padding:0;}
				img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}
				table td{border-collapse:collapse;}
				#backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}
				body, #backgroundTable{
					background-color:#FAFAFA;
				}
				#templateContainer{
					border: 1px solid #DDDDDD;
				}
				h1, .h1{
					color:#202020;
					display:block;
					font-family:Arial;
					font-size:34px;
					font-weight:bold;
					line-height:100%;
					margin-top:0;
					margin-right:0;
					margin-bottom:10px;
					margin-left:0;
					text-align:left;
				}
				h2, .h2{
					color:#202020;
					display:block;
					font-family:Arial;
					font-size:30px;
					font-weight:bold;
					line-height:100%;
					margin-top:0;
					margin-right:0;
					margin-bottom:10px;
					margin-left:0;
					text-align:left;
				}
				h3, .h3{
					color:#202020;
					display:block;
					font-family:Arial;
					font-size:26px;
					font-weight:bold;
					line-height:100%;
					margin-top:0;
					margin-right:0;
					margin-bottom:10px;
					margin-left:0;
					text-align:left;
				}
				h4, .h4{
					color:#202020;
					display:block;
					font-family:Arial;
					ont-size:22px;
					font-weight:bold;
					line-height:100%;
					margin-top:0;
					margin-right:0;
					margin-bottom:10px;
					margin-left:0;
					ext-align:left;
				}
				#templateHeader{
					background-color:#FFFFFF;
					border-bottom:0;
				}
				.headerContent{
					color:#202020;
					font-family:Arial;
					font-size:34px;
					font-weight:bold;
					line-height:100%;
					padding:10px;
					text-align:center;
					vertical-align:middle;
					background: none repeat scroll 0 0 #EEEEEE;
				}
				.headerContent a:link, .headerContent a:visited, .headerContent a .yshortcuts {
					color:#336699;
					font-weight:normal;
					text-decoration:underline;
				}
				#headerImage{
					height:auto;
					max-width:600px !important;
				}
				#templateContainer, .bodyContent{
					background-color:#FFFFFF;
				}
				.bodyContent div{
					color:#505050;
					font-family:Arial;
					font-size:14px;
					line-height:150%;
					text-align:left;
				}
				.bodyContent div a:link, .bodyContent div a:visited, /* Yahoo! Mail Override */ .bodyContent div a .yshortcuts /* Yahoo! Mail Override */{
					color:#336699;
					font-weight:normal;
					text-decoration:underline;
				}
				.templateDataTable{
					background-color:#FFFFFF;
					border:1px solid #DDDDDD;
				}
				.dataTableHeading{
					background-color:#D8E2EA;
					color:#336699;
					font-family:Helvetica;
					font-size:14px;
					font-weight:bold;
					line-height:150%;
					text-align:left;
				}
				.dataTableHeading a:link, .dataTableHeading a:visited, /* Yahoo! Mail Override */ .dataTableHeading a .yshortcuts /* Yahoo! Mail Override */{
					color:#FFFFFF;
					font-weight:bold;
					text-decoration:underline;
				}
				.dataTableContent{
					border-top:1px solid #DDDDDD;
					border-bottom:0;
					color:#202020;
					font-family:Helvetica;
					font-size:12px;
					font-weight:bold;
					line-height:150%;
					text-align:left;
				}
				.dataTableContent a:link, .dataTableContent a:visited, /* Yahoo! Mail Override */ .dataTableContent a .yshortcuts /* Yahoo! Mail Override */{
					color:#202020;
					font-weight:bold;
					text-decoration:underline;
				}
				.templateButton{
					-moz-border-radius:3px;
					-webkit-border-radius:3px;
					background-color:#336699;
					border:0;
					border-collapse:separate !important;
					border-radius:3px;
				}
				.templateButton, .templateButton a:link, .templateButton a:visited, /* Yahoo! Mail Override */ .templateButton a .yshortcuts /* Yahoo! Mail Override */{
					color:#FFFFFF;
					font-family:Arial;
					font-size:15px;
					font-weight:bold;
					letter-spacing:-.5px;
					line-height:100%;
					text-align:center;
					text-decoration:none;
				}
				.bodyContent img{
					display:inline;
					height:auto;
				}
				#templateFooter{
					background-color:#FFFFFF;
					border-top:0;
				}
				.footerContent div{
					color:#707070;
					font-family:Arial;
					font-size:12px;
					line-height:125%;
					text-align:center;
				}
				.footerContent div a:link, .footerContent div a:visited, /* Yahoo! Mail Override */ .footerContent div a .yshortcuts /* Yahoo! Mail Override */{
					color:#336699;
					font-weight:normal;
					text-decoration:underline;
				}
				.footerContent img{
					display:inline;
				}
				#utility{
					background-color:#FFFFFF;
					border:0;
				}
				#utility div{
					text-align:center;
				}
				#monkeyRewards img{
					max-width:190px;
				}
			</style>
		</head>
		<body leftmargin='0' marginwidth='0' topmargin='0' marginheight='0' offset='0'>
	    	<center>
	        	<table border='0' cellpadding='0' cellspacing='0' height='100%' width='100%' id='backgroundTable'>
	            	<tr>
	                	<td align='center' valign='top' style='padding-top:20px;'>
	                    	<table border='0' cellpadding='0' cellspacing='0' width='600' id='templateContainer'>
	                        	<tr>
	                            	<td align='center' valign='top'>
	                                    <!-- // Begin Template Header \\ -->
	                                	<table border='0' cellpadding='0' cellspacing='0' width='600' id='templateHeader'>
	                                        <tr>
	                                            <td class='headerContent'>
	                                            	<td width='75%' style='background:#eee'>
	                                            	<img src='http://ayopeduli.com/wp-content/themes/ayopeduli/images/logo.png' style='max-width:600px;width:80px;' id='headerImage campaign-icon' mc:label='header_image' mc:edit='header_image' mc:allowdesigner mc:allowtext />
	                                                </td>
	                                                <td width='25%' style='background:#eee'>Buat Aksi sosial dan berkolaborasilah bersama kami</td>
	                                            </td>
	                                        </tr>
	                                    </table>
	                                    <!-- // End Template Header \\ -->
	                                </td>
	                            </tr>
	                        	<tr>
	                            	<td align='center' valign='top'>
	                                    <!-- // Begin Template Body \\ -->
	                                	<table border='0' cellpadding='0' cellspacing='0' width='600' id='templateBody'>
	                                    	<tr>
	                                            <td valign='top'>
	                                                <!-- // Begin Module: Standard Content \\ -->
	                                                <table border='0' cellpadding='20' cellspacing='0' width='100%'>
	                                                    <tr>
	                                                        <td valign='top' class='bodyContent'>
	                                                            <div mc:edit='std_content00'>
	                                                                <h4 class='h4'>Hello $panggilan,</h4>
	                                                                Terima kasih telah bergabung di ayopeduli.com, berikut ini adalah akun login Anda :
	                                                            </div>
															</td>
	                                                    </tr>
	                                                    <tr>
	                                                    	<td valign='top' style='padding-top:0; padding-bottom:0;'>
	                                                          <table border='0' cellpadding='10' cellspacing='0' width='100%' class='templateDataTable'>
	                                                              
	                                                              <tr mc:repeatable>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
	                                                                    Email
	                                                                  </td>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
	                                                                    $email1
	                                                                  </td>                                                                  
	                                                              </tr>
	                                                              <tr mc:repeatable>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
	                                                                    Password
	                                                                  </td>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
	                                                                    $password
	                                                                  </td>                                                                  
	                                                              </tr>                                                              
	                                                          </table>
	                                                        </td>
	                                                    </tr>
	                                                    <tr>
	                                                      <td valign='top' class='bodyContent'>
	                                                            <div mc:edit='std_content01'>
	                                                                Silahkan login di ayopeduli.com dengan menggunakan email dan password tersebut untuk memanage Aksi Kamu.                                                         
	                                                            </div>
														</td>
                                                    </tr>
	                                                </table>
	                                                <!-- // End Module: Standard Content \\ -->
	                                           </td>
	                                        </tr>
	                                    </table>
	                                    <!-- // End Template Body \\ -->
	                                </td>
	                            </tr>
	                        	<tr>
	                            	<td align='center' valign='top'>
	                                   <!-- // Begin Template Footer \\ -->
		                               	<table border='0' cellpadding='10' cellspacing='0' width='600' id='templateFooter'>
	                                	<tr>
	                                        	<td valign='top' class='footerContent'>
	                                                <!-- // Begin Module: Transactional Footer \\ -->
	                                                <table border='0' cellpadding='10' cellspacing='0' width='100%'>
	                                                    <tr>
	                                                        <td valign='top'>
	                                                            <div mc:edit='std_footer'>
																	<em>Copyright &copy; 2014 ayopeduli.com, All rights reserved.</em>
	                                                            </div>
	                                                        </td>
	                                                    </tr>
	                                                    <tr>
	                                                        <td valign='middle' id='utility'>
	                                                        </td>
	                                                   </tr>
	                                                </table>
	                                               <!-- // End Module: Transactional Footer \\ -->
	                                           </td>
	                                        </tr>
	                                    </table>
		                                  <!-- // End Template Footer \\ -->
	                                </td>
	                            </tr>
	                        </table>
	                        <br />
	                    </td>
	                </tr>
	            </table>
	        </center>
	   </body>
	</html>";
    $this->email->from('no-reply@ayopeduli.com', 'Ayopeduli.com');

    //$list = array('user@gmail.com');
    $this->email->to($email1);
    $this->email->subject('Akun anda di ayopeduli.com');
    $this->email->message($email_body);

    $this->email->send();
    //echo $this->email->print_debugger();
	
	redirect('home' , 'refresh');
	}
}

public function login($email, $password)
 {
   $this -> db -> select('uid, email, fullname, password');
   $this -> db -> from('ap_user');
   $this -> db -> where('email', $email);
   $this -> db -> where('password', MD5($password));
   $this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
 
public function loginadmin($email, $password)
 {
	$statadmin = 1;
   $this -> db -> select('uid, email, fullname, password');
   $this -> db -> from('ap_user');
   $this -> db -> where('email', $email);
   $this -> db -> where('password', MD5($password));
   $this -> db -> where('group', $statadmin);
   $this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
 
public function getdonasi($uid){		
		$query = $this->db->get_where('ap_donasi', array('uid' => $uid));
		return $query->result_array();			
	}
public function getaksi($uid){		
		//$query = $this->db->get_where('ap_aksi', array('uid' => $uid));
		//return $query->result_array();
		$this->db->select('*');
		$this->db->from('ap_aksi');
		$this->db->where('uidact', $uid);
		//$this->db->join('ap_volunteer', 'ap_volunteer.aidv = ap_aksi.aid');		
		$query = $this->db->get();	
		//var_dump($query);	
		return $query->result_array();	
	}
 //by Pak Asep
 //public function login(){
//		$email =$_POST['email'];		
//		$password = md5($_POST['password']);
//		//$password = $_POST['password'];
//		$result=mysql_query("select * from ap_user where email='$email' and password='$password'")or die (mysql_error());//query sang database 			
//		$count=mysql_num_rows($result);//isipon kn may tyakto sa query
//		$row=mysql_fetch_array($result);//ma return row sa database
//		$uid=$row['uid'];
//		$nama=$row['fullname'];
//		$poin=$row['poin'];		
//		$this->load->helper('url');
//				if ($count > 0){//kun may tyakto sa query e execute yah ang code sa dalom
//				session_start();//para mag start ang session
//				$_SESSION['uid']=$row['uid'];
//				$_SESSION['nama']=$row['fullname'];
//				$data = $uid;
//				redirect('/profile/myprofile/'.$uid);			
//				}else{
//				$dataerror = "Gak Bisa Login";
//				redirect('/login/'.$dataerror, $dataerror);
//				 //$this->load->view('login'); 
//				}
//	 }
public function logout(){
	session_destroy();
	$_SESSION = array('uid','fullname');
	redirect('/');
}
public function getuser($email = FALSE){
		if ($email === FALSE)
		{
			//$query = $this->db->get_where('ap_aksi', array('stat' =>1));			
//			return $query->result_array();
			$this->db->select('*');
			$this->db->from('ap_user');
			$this->db->where(array('stat' => 1));
			//$this->db->join('ap_user', 'ap_aksi.uid = ap_user.uid');
			$query = $this->db->get();
		//$query = $this->db->where('ap_aksi', array('cat' => $cat,'stat' =>1));
		
		return $query->result_array();
		}	
		$query = $this->db->get_where('ap_user', array('email' => $email));		
		return $query->row_array();	
		
	}
	
public function getuserid($uid = FALSE){
		if ($uid === FALSE)
		{
			//$query = $this->db->get_where('ap_aksi', array('stat' =>1));			
//			return $query->result_array();
			$this->db->select('*');
			$this->db->from('ap_user');
			$this->db->where(array('stat' => 1));
			//$this->db->join('ap_user', 'ap_aksi.uid = ap_user.uid');
			$query = $this->db->get();
		//$query = $this->db->where('ap_aksi', array('cat' => $cat,'stat' =>1));
		
		return $query->result_array();
		}	
		$query = $this->db->get_where('ap_user', array('uid' => $uid));		
		return $query->row_array();	
		
	}	
public function update($uid , $filename = FALSE){
	$fullname  = mysql_real_escape_string($_POST['fullname']);
	$panggilan = mysql_real_escape_string($_POST['panggilan']);
	$uid = mysql_real_escape_string($_POST['uid']);
	$email = mysql_real_escape_string($_POST['email']);
	$hp = mysql_real_escape_string($_POST['hp']);
	$sex = mysql_real_escape_string($_POST['sex']);
	$city = mysql_real_escape_string($_POST['city']);
	$pass = mysql_real_escape_string($_POST['password']);
	/*if ($filename === FALSE)
		{*/
			//$filename = $dat['file_name'];
			$fullname  = mysql_real_escape_string($_POST['fullname']);
			$panggilan = mysql_real_escape_string($_POST['panggilan']);
			$uid = mysql_real_escape_string($_POST['uid']);
			$this->db->select('*');
			$this->db->from('ap_user');
			$this->db->where(array('uid' => $uid));
			$query = $this->db->get();
			$data = array(
					   'fullname' => $fullname,   
					   'panggilan' => $panggilan,
					   'email' => $email,
					   'hp' => $hp,
					   'sex' => $sex,
					   'city' => $city,
					   //'password' => $password,
					  // 'photo' =>	 $filename            
			 );
			if(trim($pass)<>"") array_push($data, array('password'=>md5($pass)));
			$this->db->where('uid', $uid);
			$this->db->update('ap_user', $data);
			//redirect('home', 'refresh');
		//};	
	
	//$pass2 = mysql_real_escape_string($_POST['pass2']);
	//if (isset($password)){
//		$password  = $pass2 ;
//	}else{
//		$password  = md5(mysql_real_escape_string($_POST['password']));
//	}
	//$password  = md5(mysql_real_escape_string($_POST['password']));
	
	
	//move_uploaded_file($_FILES['photoimg']['tmp_name'], '/upload/user/'.$uid.'jpg');
	// update poin user
	/*$this->db->select('*');
	$this->db->from('ap_user');
	$this->db->where(array('uid' => $uid));
	$query = $this->db->get();
	$data = array(
               'fullname' => $fullname,   
			   'panggilan' => $panggilan,
			   //'password' => $password,
			   //'photo' =>	 $filename            
     );
	$this->db->where('uid', $uid);
	$this->db->update('ap_user', $data);*/
	//redirect('home', 'refresh');	
}

public function updatepic($filename){
			//$filename = $dat['file_name'];
			$fullname  = mysql_real_escape_string($_POST['fullname']);
			$panggilan = mysql_real_escape_string($_POST['panggilan']);
			$uid = mysql_real_escape_string($_POST['uid']);
			$this->db->select('*');
			$this->db->from('ap_user');
			$this->db->where(array('uid' => $uid));
			$query = $this->db->get();
			$data = array(
					   'fullname' => $fullname,   
					   'panggilan' => $panggilan,
					   //'password' => $password,
					   'photo' =>	 $filename            
			 );
			$this->db->where('uid', $uid);
			$this->db->update('ap_user', $data);
			//redirect('home', 'refresh');
		
	//redirect('home', 'refresh');	
}
}

