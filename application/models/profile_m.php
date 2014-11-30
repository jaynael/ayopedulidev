<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
Class Aksi_m extends CI_Model{
	public function __construct(){
		parent::__construct();
		//$this->load->helper('url');
		$this->load->database();
	}
	public function getaksi($slug = FALSE){
		if ($slug === FALSE)
		{
			$query = $this->db->get('ap_aksi');
			return $query->result_array();
		}
	
		$query = $this->db->get_where('ap_aksi', array('slug' => $slug));
		return $query->row_array();
		
		$uid = $query->row_array('uid');
		$queryuap = $this->db->get_where('ap_user', array('uid'=> $uid));
		return $queryuap->row_array();			
		
	}
	public function getuser($uid = FALSE){
		if ($uid === FALSE)
		{
			$query = $this->db->get('ap_user');
			return $query->result_array();
		}
	
		$query = $this->db->get_where('ap_user', array('uid' => $uid));
		return $query->row_array();
				
		
	}

	
	public function insert(){
		$this->load->helper('url');
		$slug = url_title($this->input->post('judul'), 'dash', TRUE);
		$cat  =($_POST['cat']);
        $judul = ($_POST['judul']);
		$descsing  = ($_POST['descsing']);
        //$picaksi=($_POST['picaksi']);
		$picaksi = addslashes($_FILES['picaksi']['name']);
		//$picaksi=($_POST['picaksi']);
        $donasi =($_POST['donasi']);		
		$jumlahtarget  =($_POST['jumlahtarget']);
		$tgl  =($_POST['tgl']);
        $desc = htmlspecialchars($_POST['deskripsi']);		
        $vid =($_POST['vid']);
		//$descpost= nl2br($desc);	
		
		//user	
		$fullname =($_POST['fullname']);
		$panggilan  = ($_POST['panggilan']);
        $email =($_POST['email']);
        $password = md5($_POST['password']);
		$now1 = date("m/d/Y H:i:s");
		$uid= ($_POST['uid']);
		
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
		$aid = autonumber("ap_aksi","aid",5,"AAP");
		if (!isset($uid)){
			$uid= ($_POST['uid']);			 
		}else{
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
		}
		$sql   = "insert into ap_user (uid, fullname,  panggilan, email, password, poin) values ('$uid','$fullname', '$panggilan','$email','$password','5' )";     
				
			$query1 = $this->db->query($sql);
			
			if($query1){ 
			 $sqlaksi   = "insert into ap_aksi (aid, uid, cat,  judul, descsing, donasi, jumlahtarget, tgl, vid, now, stat, deskripsi, pic) values ('$aid','$uid','$cat','$judul','$descsing','$donasi','$jumlahtarget','$tgl','$vid','$now1',1,'$desc','$picaksi')";
			$query = $this->db->query($sqlaksi);
			
			//email
	//		$to = "$email";
	//		$subject = "[$aid] Terima Kasih $panggilan aksi anda berhasil disubmit";
	//		$headers = "From:  aksi@ayopeduli.com\r\n";
	//		$headers .= "Reply-To: donasi@ayopeduli.com \r\n";
	//		$headers .= "CC: donasi@ayopeduli.com, jaynael@gmail.com\r\n";
	//		$headers .= "MIME-Version: 1.0\r\n";
	//		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	//		$message .= "<html><head><style type='text/css'>
	//			#outlook a{padding:0;}
	//			body{width:100% !important;} .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} 
	//			body{-webkit-text-size-adjust:none;}
	//			body{margin:0; padding:0;}
	//			img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}
	//			table td{border-collapse:collapse;}
	//			#backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}
	//			body, #backgroundTable{
	//				background-color:#FAFAFA;
	//			}
	//			#templateContainer{
	//				border: 1px solid #DDDDDD;
	//			}
	//			h1, .h1{
	//				color:#202020;
	//				display:block;
	//				font-family:Arial;
	//				font-size:34px;
	//				font-weight:bold;
	//				line-height:100%;
	//				margin-top:0;
	//				margin-right:0;
	//				margin-bottom:10px;
	//				margin-left:0;
	//				text-align:left;
	//			}
	//			h2, .h2{
	//				color:#202020;
	//				display:block;
	//				font-family:Arial;
	//				font-size:30px;
	//				font-weight:bold;
	//				line-height:100%;
	//				margin-top:0;
	//				margin-right:0;
	//				margin-bottom:10px;
	//				margin-left:0;
	//				text-align:left;
	//			}
	//			h3, .h3{
	//				color:#202020;
	//				display:block;
	//				font-family:Arial;
	//				font-size:26px;
	//				font-weight:bold;
	//				line-height:100%;
	//				margin-top:0;
	//				margin-right:0;
	//				margin-bottom:10px;
	//				margin-left:0;
	//				text-align:left;
	//			}
	//			h4, .h4{
	//				color:#202020;
	//				display:block;
	//				font-family:Arial;
	//				ont-size:22px;
	//				font-weight:bold;
	//				line-height:100%;
	//				margin-top:0;
	//				margin-right:0;
	//				margin-bottom:10px;
	//				margin-left:0;
	//				ext-align:left;
	//			}
	//			#templateHeader{
	//				background-color:#FFFFFF;
	//				border-bottom:0;
	//			}
	//			.headerContent{
	//				color:#202020;
	//				font-family:Arial;
	//				font-size:34px;
	//				font-weight:bold;
	//				line-height:100%;
	//				padding:10px;
	//				text-align:center;
	//				vertical-align:middle;
	//				background: none repeat scroll 0 0 #EEEEEE;
	//			}
	//			.headerContent a:link, .headerContent a:visited, .headerContent a .yshortcuts {
	//				color:#336699;
	//				font-weight:normal;
	//				text-decoration:underline;
	//			}
	//			#headerImage{
	//				height:auto;
	//				max-width:600px !important;
	//			}
	//			#templateContainer, .bodyContent{
	//				background-color:#FFFFFF;
	//			}
	//			.bodyContent div{
	//				color:#505050;
	//				font-family:Arial;
	//				font-size:14px;
	//				line-height:150%;
	//				text-align:left;
	//			}
	//			.bodyContent div a:link, .bodyContent div a:visited, /* Yahoo! Mail Override */ .bodyContent div a .yshortcuts /* Yahoo! Mail Override */{
	//				color:#336699;
	//				font-weight:normal;
	//				text-decoration:underline;
	//			}
	//			.templateDataTable{
	//				background-color:#FFFFFF;
	//				border:1px solid #DDDDDD;
	//			}
	//			.dataTableHeading{
	//				background-color:#D8E2EA;
	//				color:#336699;
	//				font-family:Helvetica;
	//				font-size:14px;
	//				font-weight:bold;
	//				line-height:150%;
	//				text-align:left;
	//			}
	//			.dataTableHeading a:link, .dataTableHeading a:visited, /* Yahoo! Mail Override */ .dataTableHeading a .yshortcuts /* Yahoo! Mail Override */{
	//				color:#FFFFFF;
	//				font-weight:bold;
	//				text-decoration:underline;
	//			}
	//			.dataTableContent{
	//				border-top:1px solid #DDDDDD;
	//				border-bottom:0;
	//				color:#202020;
	//				font-family:Helvetica;
	//				font-size:12px;
	//				font-weight:bold;
	//				line-height:150%;
	//				text-align:left;
	//			}
	//			.dataTableContent a:link, .dataTableContent a:visited, /* Yahoo! Mail Override */ .dataTableContent a .yshortcuts /* Yahoo! Mail Override */{
	//				color:#202020;
	//				font-weight:bold;
	//				text-decoration:underline;
	//			}
	//			.templateButton{
	//				-moz-border-radius:3px;
	//				-webkit-border-radius:3px;
	//				background-color:#336699;
	//				border:0;
	//				border-collapse:separate !important;
	//				border-radius:3px;
	//			}
	//			.templateButton, .templateButton a:link, .templateButton a:visited, /* Yahoo! Mail Override */ .templateButton a .yshortcuts /* Yahoo! Mail Override */{
	//				color:#FFFFFF;
	//				font-family:Arial;
	//				font-size:15px;
	//				font-weight:bold;
	//				letter-spacing:-.5px;
	//				line-height:100%;
	//				text-align:center;
	//				text-decoration:none;
	//			}
	//			.bodyContent img{
	//				display:inline;
	//				height:auto;
	//			}
	//			#templateFooter{
	//				background-color:#FFFFFF;
	//				border-top:0;
	//			}
	//			.footerContent div{
	//				color:#707070;
	//				font-family:Arial;
	//				font-size:12px;
	//				line-height:125%;
	//				text-align:center;
	//			}
	//			.footerContent div a:link, .footerContent div a:visited, /* Yahoo! Mail Override */ .footerContent div a .yshortcuts /* Yahoo! Mail Override */{
	//				color:#336699;
	//				font-weight:normal;
	//				text-decoration:underline;
	//			}
	//			.footerContent img{
	//				display:inline;
	//			}
	//			#utility{
	//				background-color:#FFFFFF;
	//				border:0;
	//			}
	//			#utility div{
	//				text-align:center;
	//			}
	//			#monkeyRewards img{
	//				max-width:190px;
	//			}
	//		</style>
	//	</head>";
	//    $message .= "<body leftmargin='0' marginwidth='0' topmargin='0' marginheight='0' offset='0'>
	//    	<center>
	//        	<table border='0' cellpadding='0' cellspacing='0' height='100%' width='100%' id='backgroundTable'>
	//            	<tr>
	//                	<td align='center' valign='top' style='padding-top:20px;'>
	//                    	<table border='0' cellpadding='0' cellspacing='0' width='600' id='templateContainer'>
	//                        	<tr>
	//                            	<td align='center' valign='top'>
	//                                    <!-- // Begin Template Header \\ -->
	//                                	<table border='0' cellpadding='0' cellspacing='0' width='600' id='templateHeader'>
	//                                        <tr>
	//                                            <td class='headerContent'>
	//                                            	<td width='75%' style='background:#eee'>
	//                                            	<img src='http://ayopeduli.com/wp-content/themes/ayopeduli/images/logo.png' style='max-width:600px;width:80px;' id='headerImage campaign-icon' mc:label='header_image' mc:edit='header_image' mc:allowdesigner mc:allowtext />
	//                                                </td>
	//                                                <td width='25%' style='background:#eee'>Jln. Cut Mutiah Blok D No.5 Rt.8/8 Margahayu Bekasi</td>
	//                                            </td>
	//                                        </tr>
	//                                    </table>
	//                                    <!-- // End Template Header \\ -->
	//                                </td>
	//                            </tr>
	//                        	<tr>
	//                            	<td align='center' valign='top'>
	//                                    <!-- // Begin Template Body \\ -->
	//                                	<table border='0' cellpadding='0' cellspacing='0' width='600' id='templateBody'>
	//                                    	<tr>
	//                                            <td valign='top'>
	//                                                <!-- // Begin Module: Standard Content \\ -->
	//                                                <table border='0' cellpadding='20' cellspacing='0' width='100%'>
	//                                                    <tr>
	//                                                        <td valign='top' class='bodyContent'>
	//                                                            <div mc:edit='std_content00'>
	//                                                                <h4 class='h4'>Hello $panggilan,</h4>
	//                                                                Terima kasih telah bergabung di ayopeduli.com, Aksi anda telah kami terima dan akan kami review terlebih dahulu untuk kami setujui :
	//                                                            </div>
	//														</td>
	//                                                    </tr>
	//                                                    <tr>
	//                                                    	<td valign='top' style='padding-top:0; padding-bottom:0;'>
	//                                                          <table border='0' cellpadding='10' cellspacing='0' width='100%' class='templateDataTable'>
	//                                                              <tr>
	//                                                                  <th scope='col' valign='top' width='25%' class='dataTableHeading' mc:edit='data_table_heading00'>
	//                                                                    Aksi ID :  $aid
	//                                                                  </th>
	//                                                                  <th scope='col' valign='top' width='75%' class='dataTableHeading' mc:edit='data_table_heading01'>$unixes <td></td></th>
	//                                                              </tr>
	//                                                              <tr mc:repeatable>
	//                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
	//                                                                    Nama Aksi
	//                                                                  </td>
	//                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
	//                                                                    $judul
	//                                                                  </td>                                                                  
	//                                                              </tr>
	//                                                              <tr mc:repeatable>
	//                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
	//                                                                    Kategori Aksi
	//                                                                  </td>
	//                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
	//                                                                    $cat
	//                                                                  </td>                                                                  
	//                                                              </tr>
	//                                                              <tr mc:repeatable>
	//                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
	//                                                                    Status
	//                                                                  </td>
	//                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
	//                                                                    Under Review
	//                                                                  </td>                                                                  
	//                                                              </tr>
	//                                                              <tr mc:repeatable>
	//                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
	//                                                                    Email
	//                                                                  </td>
	//                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
	//                                                                    $email
	//                                                                  </td>                                                                  
	//                                                              </tr>
	//                                                              <tr mc:repeatable>
	//                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
	//                                                                    Password
	//                                                                  </td>
	//                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
	//                                                                    $password
	//                                                                  </td>                                                                  
	//                                                              </tr>                                                              
	//                                                          </table>
	//                                                        </td>
	//                                                    </tr>
	//                                                    <!--<tr>
	//                                                        <td valign='top' class='bodyContent'>
	//                                                            <div mc:edit='std_content01'>
	//                                                                Silahkan login di ayopeduli.com dengan menggunakan email dan password tersebut untuk memanage Aksi Kamu.                                                         
	//                                                            </div>
	//														</td>
	//                                                    </tr>-->
	//                                                </table>
	//                                                <!-- // End Module: Standard Content \\ -->
	//                                           </td>
	//                                        </tr>
	//                                    </table>
	//                                    <!-- // End Template Body \\ -->
	//                                </td>
	//                            </tr>
	//                        	<tr>
	//                            	<td align='center' valign='top'>
	//                                   <!-- // Begin Template Footer \\ -->
	//	                               	<table border='0' cellpadding='10' cellspacing='0' width='600' id='templateFooter'>
	//                                	<tr>
	//                                        	<td valign='top' class='footerContent'>
	//                                                <!-- // Begin Module: Transactional Footer \\ -->
	//                                                <table border='0' cellpadding='10' cellspacing='0' width='100%'>
	//                                                    <tr>
	//                                                        <td valign='top'>
	//                                                            <div mc:edit='std_footer'>
	//																<em>Copyright &copy; 2012 ayopeduli.com, All rights reserved.</em>
	//                                                            </div>
	//                                                        </td>
	//                                                    </tr>
	//                                                    <tr>
	//                                                        <td valign='middle' id='utility'>
	//                                                        </td>
	//                                                   </tr>
	//                                                </table>
	//                                               <!-- // End Module: Transactional Footer \\ -->
	//                                           </td>
	//                                        </tr>
	//                                    </table>
	//	                                  <!-- // End Template Footer \\ -->
	//                                </td>
	//                            </tr>
	//                        </table>
	//                        <br />
	//                    </td>
	//                </tr>
	//            </table>
	//        </center>
	//   </body>
	//</html>";
	//		mail($to, $subject, $message, $headers);
	//		$emailSent = true;
	$password2 = md5($_POST['password']);
	$result=mysql_query("select * from ap_user where email='$email' and password='$password2'")or die (mysql_error());//query sang database 
			
	$count=mysql_num_rows($result);//isipon kn may tyakto sa query
	$row=mysql_fetch_array($result);//ma return row sa database
	$uid=$row['uid'];
	$nama=$row['fullname'];
	$poin=$row['poin'];		
	$this->load->helper('url');
			if ($count > 0){//kun may tyakto sa query e execute yah ang code sa dalom
			session_start();//para mag start ang session
			$_SESSION['uid']=$row['uid'];
			$_SESSION['nama']=$row['fullname'];
			$data = $uid;
			redirect('/profile/myprofile/'.$uid);			
			}else{
			redirect('/login');
			 //$this->load->view('login'); 
			}
	
	//}else {
		echo "Ada yang salah";
		}
	}
};
function aksi_home_kesehatan (){
	$sql   = "select * from ap_aksi where cat='kesehatan'";
	$ambildata = $this->db->query($sql);
        //jika data ada (lebih dari 0)
        if ($ambildata->num_rows() > 0 ) {
            foreach ($ambildata->result() as $datakesehatan) {
                $hasilkesehatan[] = $datakesehatan;
            }
            return $hasilkesehatan;
        }
}
function aksi_home_lingkungan (){
	$sql   = "select * from ap_aksi where cat='lingkungan'";
	$ambildata = $this->db->query($sql);
        //jika data ada (lebih dari 0)
        if ($ambildata->num_rows() > 0 ) {
            foreach ($ambildata->result() as $datalingkungan) {
                $hasil[] = $datalingkungan;
            }
            return $hasil;
			
        }
    
	//$sql   = "select aap, uap* from ap_aksi where cat='lingkungan'";
//	$query = $this->db->query($sql);	
//	if ($query->num_rows() > 0)
//	{
//	   foreach ($query->result() as $row)
//	   {
//		  $data['judul'] = $row->judul;
//		  $data['Keywords'] = $row->Keywords;
//		  $data['Description']= $row->Description;
//	   }
//	} 
}
