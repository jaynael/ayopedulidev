<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
Class Partner_m extends CI_Model{
	public function __construct(){
		parent::__construct();
		//$this->load->helper('url');
		$this->load->database();
	}
	public function login($email, $password)
	 {
	   $this -> db -> select('partid, email, perusahaan, password');
	   $this -> db -> from('ap_partner');
	   $this -> db -> where('email', $email);
	   $this -> db -> where('password', md5($password));
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
	
	public function register($owner, $perusahaan, $bidang, $emailin, $handphone, $password, $filename ){
	
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
	$partid = autouser("ap_partner","partid",5,"");
	$email1 = $emailin ;
	$this->db->select('*');
	$this->db->from('ap_partner');
	$this->db->where(array('email' => $email1));
	$query = $this->db->get();
	$email2 = $query->row_array();
	//$email3 = $email2['email'];
	$data = array(
	   'perusahaan' => $perusahaan ,
	   'owner' => $owner ,
	   'bidang' => $bidang ,
	   'pic' => $filename,
	   //'type' => $type,
	   'password' => MD5($password),
	   'partid' => $partid,
	   'hp' => $handphone,
	   'email' => $emailin,
	   'date' => date("m/d/Y H:i:s"),
	);	
	//var_dump($data);
	//echo count($email2);
	if(count($email2) !== 0 ){				
			$data= array(
				'error' => 'Email sudah terdaftar silahkan login',
				'title' => 'Daftar dan bergabung bersama ribuan volunteer lainnya',
				'owner' => $owner,
				'perusahaan' => $perusahaan,
				'bidang' => $bidang,
				//'type' => $type,
				'email' => $emailin,
				'handphone' => $handphone,
			);
			$this->load->view('partner/header', $data);
			$this->load->view('partner/register-partner_v');			
		}
	if (count($email2) == 0 ){	
	$this->db->insert('ap_partner', $data);	 
	$data= array(
				'success' => '',
				'title' => 'Daftar dan bergabung bersama ribuan volunteer lainnya',
				'owner' => $owner,
				'perusahaan' => $perusahaan,
				'bidang' => $bidang,
				//'type' => $type,
				'email' => $emailin,
				'handphone' => $handphone,
	);
	$this->load->view('partner/header', $data);
	$this->load->view('partner/register-partner_v');
	//var_dump($type);
	$sess_array = array();		
		//foreach($result as $row)
	$sess_array = array(	
				'partid' => $partid,			 
				 'email' => $emailin,
				 'perusahaan' => $perusahaan
			   );
	$this->session->set_userdata('logged_partner', $sess_array);

	//if($type=='regular'){
//		$harga = 'Rp.500.000';
//	}
//	if($type=='premium'){
//		$harga = 'Rp.1.500.000';
//	}
//	if($type=='platinum'){
//		$harga = 'Rp.3.500.000';
//	}
	
	//var_dump($harga);
  // $this->load->library('email');
   // $this->email->set_mailtype("html");
   
   //email aktivin ketika diupload
    //$email_body ="<html><head><style type='text/css'>
//				#outlook a{padding:0;}
//				body{width:100% !important;} .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} 
//				body{-webkit-text-size-adjust:none;}
//				body{margin:0; padding:0;}
//				img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}
//				table td{border-collapse:collapse;}
//				#backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}
//				body, #backgroundTable{
//					background-color:#FAFAFA;
//				}
//				#templateContainer{
//					border: 1px solid #DDDDDD;
//				}
//				h1, .h1{
//					color:#202020;
//					display:block;
//					font-family:Arial;
//					font-size:34px;
//					font-weight:bold;
//					line-height:100%;
//					margin-top:0;
//					margin-right:0;
//					margin-bottom:10px;
//					margin-left:0;
//					text-align:left;
//				}
//				h2, .h2{
//					color:#202020;
//					display:block;
//					font-family:Arial;
//					font-size:30px;
//					font-weight:bold;
//					line-height:100%;
//					margin-top:0;
//					margin-right:0;
//					margin-bottom:10px;
//					margin-left:0;
//					text-align:left;
//				}
//				h3, .h3{
//					color:#202020;
//					display:block;
//					font-family:Arial;
//					font-size:26px;
//					font-weight:bold;
//					line-height:100%;
//					margin-top:0;
//					margin-right:0;
//					margin-bottom:10px;
//					margin-left:0;
//					text-align:left;
//				}
//				h4, .h4{
//					color:#202020;
//					display:block;
//					font-family:Arial;
//					ont-size:22px;
//					font-weight:bold;
//					line-height:100%;
//					margin-top:0;
//					margin-right:0;
//					margin-bottom:10px;
//					margin-left:0;
//					ext-align:left;
//				}
//				#templateHeader{
//					background-color:#FFFFFF;
//					border-bottom:0;
//				}
//				.headerContent{
//					color:#202020;
//					font-family:Arial;
//					font-size:34px;
//					font-weight:bold;
//					line-height:100%;
//					padding:10px;
//					text-align:center;
//					vertical-align:middle;
//					background: none repeat scroll 0 0 #EEEEEE;
//				}
//				.headerContent a:link, .headerContent a:visited, .headerContent a .yshortcuts {
//					color:#336699;
//					font-weight:normal;
//					text-decoration:underline;
//				}
//				#headerImage{
//					height:auto;
//					max-width:600px !important;
//				}
//				#templateContainer, .bodyContent{
//					background-color:#FFFFFF;
//				}
//				.bodyContent div{
//					color:#505050;
//					font-family:Arial;
//					font-size:14px;
//					line-height:150%;
//					text-align:left;
//				}
//				.bodyContent div a:link, .bodyContent div a:visited, /* Yahoo! Mail Override */ .bodyContent div a .yshortcuts /* Yahoo! Mail Override */{
//					color:#336699;
//					font-weight:normal;
//					text-decoration:underline;
//				}
//				.templateDataTable{
//					background-color:#FFFFFF;
//					border:1px solid #DDDDDD;
//				}
//				.dataTableHeading{
//					background-color:#D8E2EA;
//					color:#336699;
//					font-family:Helvetica;
//					font-size:14px;
//					font-weight:bold;
//					line-height:150%;
//					text-align:left;
//				}
//				.dataTableHeading a:link, .dataTableHeading a:visited, /* Yahoo! Mail Override */ .dataTableHeading a .yshortcuts /* Yahoo! Mail Override */{
//					color:#FFFFFF;
//					font-weight:bold;
//					text-decoration:underline;
//				}
//				.dataTableContent{
//					border-top:1px solid #DDDDDD;
//					border-bottom:0;
//					color:#202020;
//					font-family:Helvetica;
//					font-size:12px;
//					font-weight:bold;
//					line-height:150%;
//					text-align:left;
//				}
//				.dataTableContent a:link, .dataTableContent a:visited, /* Yahoo! Mail Override */ .dataTableContent a .yshortcuts /* Yahoo! Mail Override */{
//					color:#202020;
//					font-weight:bold;
//					text-decoration:underline;
//				}
//				.templateButton{
//					-moz-border-radius:3px;
//					-webkit-border-radius:3px;
//					background-color:#336699;
//					border:0;
//					border-collapse:separate !important;
//					border-radius:3px;
//				}
//				.templateButton, .templateButton a:link, .templateButton a:visited, /* Yahoo! Mail Override */ .templateButton a .yshortcuts /* Yahoo! Mail Override */{
//					color:#FFFFFF;
//					font-family:Arial;
//					font-size:15px;
//					font-weight:bold;
//					letter-spacing:-.5px;
//					line-height:100%;
//					text-align:center;
//					text-decoration:none;
//				}
//				.bodyContent img{
//					display:inline;
//					height:auto;
//				}
//				#templateFooter{
//					background-color:#FFFFFF;
//					border-top:0;
//				}
//				.footerContent div{
//					color:#707070;
//					font-family:Arial;
//					font-size:12px;
//					line-height:125%;
//					text-align:center;
//				}
//				.footerContent div a:link, .footerContent div a:visited, /* Yahoo! Mail Override */ .footerContent div a .yshortcuts /* Yahoo! Mail Override */{
//					color:#336699;
//					font-weight:normal;
//					text-decoration:underline;
//				}
//				.footerContent img{
//					display:inline;
//				}
//				#utility{
//					background-color:#FFFFFF;
//					border:0;
//				}
//				#utility div{
//					text-align:center;
//				}
//				#monkeyRewards img{
//					max-width:190px;
//				}
//			</style>
//		</head>
//		<body leftmargin='0' marginwidth='0' topmargin='0' marginheight='0' offset='0'>
//	    	<center>
//	        	<table border='0' cellpadding='0' cellspacing='0' height='100%' width='100%' id='backgroundTable'>
//	            	<tr>
//	                	<td align='center' valign='top' style='padding-top:20px;'>
//	                    	<table border='0' cellpadding='0' cellspacing='0' width='600' id='templateContainer'>
//	                        	<tr>
//	                            	<td align='center' valign='top'>
//	                                    <!-- // Begin Template Header \\ -->
//	                                	<table border='0' cellpadding='0' cellspacing='0' width='600' id='templateHeader'>
//	                                        <tr>
//	                                            <td class='headerContent'>
//	                                            	<td width='75%' style='background:#eee'>
//	                                            	<img src='http://ayopeduli.com/asset/images/logo.png' style='max-width:600px;width:80px;' id='headerImage campaign-icon' mc:label='header_image' mc:edit='header_image' mc:allowdesigner mc:allowtext />
//	                                                </td>
//	                                                <td width='25%' style='background:#eee'>Buat Aksi sosial dan berkolaborasilah bersama kami</td>
//	                                            </td>
//	                                        </tr>
//	                                    </table>
//	                                    <!-- // End Template Header \\ -->
//	                                </td>
//	                            </tr>
//	                        	<tr>
//	                            	<td align='center' valign='top'>
//	                                    <!-- // Begin Template Body \\ -->
//	                                	<table border='0' cellpadding='0' cellspacing='0' width='600' id='templateBody'>
//	                                    	<tr>
//	                                            <td valign='top'>
//	                                                <!-- // Begin Module: Standard Content \\ -->
//	                                                <table border='0' cellpadding='20' cellspacing='0' width='100%'>
//	                                                    <tr>
//	                                                        <td valign='top' class='bodyContent'>
//	                                                            <div mc:edit='std_content00'>
//	                                                                <h4 class='h4'>Hello $owner,</h4>
//	                                                                Terima kasih telah bergabung menjadi Gudness Partner di ayopeduli.com, berikut ini adalah Informasi Gudness Partner Anda :
//	                                                            </div>
//															</td>
//	                                                    </tr>
//	                                                    <tr>
//	                                                    	<td valign='top' style='padding-top:0; padding-bottom:0;'>
//	                                                          <table border='0' cellpadding='10' cellspacing='0' width='100%' class='templateDataTable'>
//	                                                          	<tr mc:repeatable>
//	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
//	                                                                    Partner Id
//	                                                                  </td>
//	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
//	                                                                    $partid
//	                                                                  </td>                                                                  
//	                                                              </tr>
//
//	                                                              <tr mc:repeatable>
//	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
//	                                                                    Perusahaan
//	                                                                  </td>
//	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
//	                                                                    $perusahaan
//	                                                                  </td>                                                                  
//	                                                              </tr>
//	                                                              <tr mc:repeatable>
//	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
//	                                                                    Bidang
//	                                                                  </td>
//	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
//	                                                                    $bidang
//	                                                                  </td>                                                                  
//	                                                              </tr>
//	                                                              
//	                                                              <tr mc:repeatable>
//	                                                              		Informasi Akun Login :
//	                                                              </tr>
//	                                                              <tr mc:repeatable>
//	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
//	                                                                    email
//	                                                                  </td>
//	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
//	                                                                    $emailin
//	                                                                  </td>
//	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
//	                                                                    Password
//	                                                                  </td>
//	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
//	                                                                    $password
//	                                                                  </td>                                                                  
//	                                                              </tr>                                                              
//	                                                          </table>
//	                                                        </td>
//	                                                    </tr>	                                                    
//                                                    	<!-- // <tr>
//	                                                      <td valign='top' class='bodyContent'>
//	                                                            //<div mc:edit='std_content01'>
////	                                                            Untuk mengaktifkan akun anda, silahkan lakukan transfer donasi anda sejumlah  ke rekening berikut :<br />
////                                                               <strong>Founder ayopeduli.com 1. BCA <br>   a.n JAENUL KHUPRON acc. 133-016-5592 dengan mencantumkan partner id donasi anda dalam referensi transfer donasi.</strong><br /><br />
////                                                               Note : <br />
////                                                               1. Silahkan konfirmasi donasi melalui sms ke no 0812 1493 9954 <br />
////															   	<strong>Partner ID # Nama Owner # Jumlah Donasi</strong>                  
////	                                                            </div>
//															</td>
//                                                    	</tr>\\ -->
//	                                                </table>
//	                                                <!-- // End Module: Standard Content \\ -->
//	                                           </td>
//	                                        </tr>
//	                                    </table>
//	                                    <!-- // End Template Body \\ -->
//	                                </td>
//	                            </tr>
//	                        	<tr>
//	                            	<td align='center' valign='top'>
//	                                   <!-- // Begin Template Footer \\ -->
//		                               	<table border='0' cellpadding='10' cellspacing='0' width='600' id='templateFooter'>
//	                                	<tr>
//	                                        	<td valign='top' class='footerContent'>
//	                                                <!-- // Begin Module: Transactional Footer \\ -->
//	                                                <table border='0' cellpadding='10' cellspacing='0' width='100%'>
//	                                                    <tr>
//	                                                        <td valign='top'>
//	                                                            <div mc:edit='std_footer'>
//																	<em>Copyright &copy; 2014 ayopeduli.com, All rights reserved.</em>
//	                                                            </div>
//	                                                        </td>
//	                                                    </tr>
//	                                                    <tr>
//	                                                        <td valign='middle' id='utility'>
//	                                                        </td>
//	                                                   </tr>
//	                                                </table>
//	                                               <!-- // End Module: Transactional Footer \\ -->
//	                                           </td>
//	                                        </tr>
//	                                    </table>
//		                                  <!-- // End Template Footer \\ -->
//	                                </td>
//	                            </tr>
//	                        </table>
//	                        <br />
//	                    </td>
//	                </tr>
//	            </table>
//	        </center>
//	   </body>
//	</html>";
//    $this->email->from('no-reply@ayopeduli.com');
//
//    //$list = array('user@gmail.com');
//    $this->email->to($email,'gufron@ayopeduli.com');
//    $this->email->subject('Pendaftaran anda menjadi Gudness Partner di ayopeduli.com');
//    $this->email->message($email_body);
//    $this->email->send();
//    echo $this->email->print_debugger();	
	//redirect('partner/home' , 'refresh');	 
	
	}
}
//End Register partner
public function getpartner($partid){
	if ($partid === FALSE)
	{
		//$query = $this->db->get_where('ap_aksi', array('stat' =>1));			
		//return $query->result_array();
		$this->db->select('*');
		$this->db->from('ap_partner');
		$this->db->where(array('partid' => $partid));
		//$this->db->join('ap_user', 'ap_aksi.uid = ap_user.uid');
		$query = $this->db->get();
		
		return $query->result_array();
	}	
		$query = $this->db->get_where('ap_partner', array('partid' => $partid));		
		return $query->row_array();	
		
}
public function getpromo($partid){
	$query = $this->db->get_where('ap_product', array('partnerid' => $partid));
	return $query->result_array();
		
}

public function insert_promo($filename){
		$this->load->helper('url');
		$slug = url_title($this->input->post('judul'), 'dash', TRUE);
        $judul = ($_POST['judul']);
		$pic = $filename;
        $poin =($_POST['poin']);
		$tersedia  =($_POST['tersedia']);	
        $deskripsi = htmlspecialchars($_POST['deskripsi']);		
		$now1 = date("m/d/Y");
		$partid= ($_POST['partid']);
		function autonumber($tabel, $kolom, $lebar=0, $awalan='')
			{
				$query="select $kolom from $tabel order by $kolom desc limit 1";
				$hasil=mysql_query($query);
				$jumlahrecord = mysql_num_rows($hasil);
				if($jumlahrecord == 0)
					$nomor=1;
				else
				{
					$row=mysql_fetch_array($hasil);
					$nomor=intval(substr($row[0],strlen($awalan)))+1;
				}
				if($lebar>0)
					$angka = $awalan.str_pad($nomor,$lebar,"0",STR_PAD_LEFT);
				else
					$angka = $awalan.$nomor;
				return $angka;
			}
		$promid = autonumber("ap_product","promid",5,"PRO");
		$data = array(
			   'promid' => $promid ,
			   'partnerid' => $partid ,
			   'tgl' => $now1 ,
			   'pic' => $filename,
			   //'type' => $type,
			   'judul' => $judul,
			   'poin' => $poin,
			   'tersedia' => $tersedia,
			   'tersisa' => $tersedia,
			   'desk' => $deskripsi,
			   'stat' => '0',
			   
			);
		$this->db->insert('ap_product', $data);		
		$datas = (array(
				'thanks' => 'Terima kasih atas promo kamu telah kami terima untuk di review, tunggu kabar baik dari kami. ',
				'title' => 'Terima kasih aksi kamu telah kami terima untuk di review, tunggu kabar baik dari kami. '				
		));	
		$this->load->model(array('user_m'));
		$datas['user_item'] = $this->partner_m->getpartner($partid);
		//$datas['donasi_user'] = $this->user_m->getdonasi($uid);
	 	//$datas['aksi_user'] = $this->user_m->getaksi($uid);
		$this->load->view('partner/header', $datas);			
		$this->load->view('partner/create-campaign-partner_v',$datas);
		$this->load->view('partner/footer');
		
	}
	
	//get product
	public function getproduct(){		
		$query = $this->db->get_where('ap_product', array('stat' => 1));
		return $query->result_array();
	}
	
}