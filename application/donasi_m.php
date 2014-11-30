<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
Class Donasi_m extends CI_Model{
	public function __construct(){
		parent::__construct();
		//$this->load->helper('url');
		$this->load->database();
	}
	public function getdonasi($aid = FALSE){
		if ($aid === FALSE)
		{
			$this->db->select('*');
			$this->db->from('ap_donasi');
			$this->db->order_by('did','desc');
			$this->db->where(array('statdon' => 0));
			//$this->db->order_by("UPPER(course_name)","desc");
			$query = $this->db->get();
			return $query->result_array();
		}	
		$query = $this->db->get_where('ap_donasi', array('aid' => $aid,'statdon' => 1));
		return $query->result_array();		
		//$uid = $query->row_array('uid');
//		$queryuap = $this->db->get_where('ap_user', array('uid'=> $uid));
//		return $queryuap->row_array();
		
	}
	public function getdonasiapprove(){
		$this->db->select('*');
			$this->db->from('ap_donasi');
			$this->db->order_by('did','desc');
			$this->db->where(array('statdon' => 1));
			//$this->db->order_by("UPPER(course_name)","desc");
			$query = $this->db->get();
			return $query->result_array();
	}
	public function getalldonasi($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("donasi");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   
	public function update (){
		$did  = mysql_real_escape_string($_POST['did']);
        $totaldon = mysql_real_escape_string($_POST['totaldon']);
		$poin = number_format($totaldon / 1200,0); 
		//$poin  = mysql_real_escape_string($_POST['poin']);
        $uid = mysql_real_escape_string($_POST['uid']);
		$aid  = mysql_real_escape_string($_POST['aid']);       
		
		
		// update poin user
		$this->db->select('*');
		$this->db->from('ap_user');
		$this->db->where(array('uid' => $uid));
		$query = $this->db->get();
		$poin2 = $query->row_array();
		$poin3 =$poin2['poin'];
		$emaildon =$poin2['email'];
		$pangdon =$poin2['panggilan'];
		var_dump($emaildon);
		var_dump($pangdon);
		$poin4 =$poin + $poin3;
		$data = array(
               'poin' => $poin4,               
            );
		$this->db->where('uid', $uid);
		$this->db->update('ap_user', $data);
		//var_dump($poin2['poin']);
		
		// update donasi aksi
		$this->db->select('*');
		$this->db->from('ap_aksi');
		$this->db->where(array('aid' => $aid));
		$query = $this->db->get();
		$jumlah = $query->row_array();
		$terkumpul = $jumlah['jumlahterkumpul'];
		$namaaksi = $jumlah['judul'];
		$uidfas = $jumlah['uid'];
		$this->db->select('*');
		$this->db->from('ap_user');
		$this->db->where(array('uid' => $uidfas));
		$queryfas = $this->db->get();
		$poin2fas = $queryfas->row_array();
		$emailfas =$poin2fas['email'];
		$pangfas =$poin2fas['panggilan'];
		//var_dump($terkumpul);
		$total = $totaldon + $terkumpul;
		//var_dump($total);
		var_dump($emailfas);
		var_dump($pangfas);
		$data = array(
               'jumlahterkumpul' => $total,               
            );
		$this->db->where('aid', $aid);
		$this->db->update('ap_aksi', $data);
		//var_dump($poin2['poin']);
		
		$data = array(
               'statdon' => 1,               
            );
		$this->db->where('did', $did);
		$this->db->update('ap_donasi', $data);
		$this->db->select('*');
		$this->db->from('ap_donasi');
		$this->db->where(array('did' => $did));
		$querydid = $this->db->get();
		$jumlahdid = $querydid->row_array();
		$donasi_ap = $jumlahdid['donasi_ap'];
		$donasi_aksi = $jumlahdid['donasi_aksi'];
		
		//email to donatur :
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
	                                            	<td width='65%' style='background:#eee'>
	                                            	<img src='http://ayopeduli.com/wp-content/themes/ayopeduli/images/logo.png' style='max-width:600px;width:80px;' id='headerImage campaign-icon' mc:label='header_image' mc:edit='header_image' mc:allowdesigner mc:allowtext />
	                                                </td>
	                                                <td width='35%' style='background:#eee'>Buat Aksi sosial dan berkolaborasilah bersama kami</td>
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
	                                                                <h4 class='h4'>Hello $pangdon,</h4>
	                                                                Terima kasih, donasi anda untuk ($namaaksi) Telah kami terima, berikut data informasinya :
	                                                            </div>
															</td>
	                                                    </tr>
	                                                    <tr>
	                                                    	<td valign='top' style='padding-top:0; padding-bottom:0;'>
	                                                          <table border='0' cellpadding='10' cellspacing='0' width='100%' class='templateDataTable'>
															  <tr mc:repeatable>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
	                                                                    Donasi ID
	                                                                  :</td>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
	                                                                    $did
	                                                                  </td>                                                       
	                                                              </tr>
																<tr mc:repeatable>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
	                                                                    Donasi ID
	                                                                  :</td>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
	                                                                    $did
	                                                                  </td>                                                       
	                                                              </tr>
															<tr mc:repeatable>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
	                                                                    Donasi untuk Aksi
	                                                                  :</td>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
	                                                                    $donasi_aksi
	                                                                  </td>                                                       
	                                                       </tr>
														   <tr mc:repeatable>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
	                                                                    Donasi untuk ayopeduli
	                                                                  :</td>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
	                                                                    $donasi_ap
	                                                                  </td>                                                       
	                                                       </tr>
														   <tr mc:repeatable>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
	                                                                    Total Donasi
	                                                                  :</td>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
	                                                                    $totaldon
	                                                                  </td>                                                       
	                                                       </tr> 
														   <tr mc:repeatable>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
	                                                                    Gudness Poin saat ini
	                                                                  :</td>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
	                                                                    $poin4
	                                                                  </td>                                                       
	                                                       </tr> 
																                                                                
	                                                          </table>
	                                                        </td>
	                                                    </tr>
	                                                    <tr>
	                                                      
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
    $this->email->from('donasi@ayopeduli.com', 'Donasi Ayopeduli.com');
    //$list = array('user@gmail.com');
    $this->email->to($emaildon);
	$this->email->cc('gufron@ayopeduli.com');
    $this->email->subject('Terima kasih donasi anda telah kami terima');
    $this->email->message($email_body);

    $this->email->send();
	echo $this->email->print_debugger();
	
	
	}
	
	 
	 
	 public function cancel (){
		if($_POST['action'] == 'update'){
 
        $did  = mysql_real_escape_string($_POST['did']);
        $totaldon = mysql_real_escape_string($_POST['totaldon']);
		//$poin  = mysql_real_escape_string($_POST['poin']);
        $uid = mysql_real_escape_string($_POST['uid']);
		$aid  = mysql_real_escape_string($_POST['aid']);
		$poin = number_format($totaldon / 1200,0); 
		     
		
		
		// update poin user
		$this->db->select('*');
		$this->db->from('ap_user');
		$this->db->where(array('uid' => $uid));
		$query = $this->db->get();
		$poin2 = $query->row_array();
		$poin3 =$poin2['poin'];
		$poin4 =$poin3 - $poin;
		$data = array(
               'poin' => $poin4,               
            );
		$this->db->where('uid', $uid);
		$this->db->update('ap_user', $data);
		//var_dump($poin2['poin']);
		
		// update donasi aksi
		$this->db->select('*');
		$this->db->from('ap_aksi');
		$this->db->where(array('aid' => $aid));
		$query = $this->db->get();
		$jumlah = $query->row_array();
		$terkumpul =$jumlah['jumlahterkumpul'];
		$total =$terkumpul - $totaldon ;
		$data = array(
               'jumlahterkumpul' => $total,               
            );
		$this->db->where('aid', $aid);
		$this->db->update('ap_aksi', $data);
		//var_dump($poin2['poin']);
		
		$data = array(
               'statdon' => 0,               
            );
		$this->db->where('did', $did);
		$this->db->update('ap_donasi', $data);
		
		?>
		<div class='alert alert-success'>
            <button type="button" class="close" data-dismiss="alert">×</button> ID Donasi <?php echo "$did"; ?> berhasi di cancel jumlah poin <?php echo "$poin"; ?> </div>
            <script type="text/javascript">
            $(function(){
				$('#email').val('');
				$('#password').val('');
				$('#fullname').val('');
				$('#panggilan').val('');
				$('#totaldon').val('');
				$('#loading').show();					   
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
	<?php }
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
	public function nonlog(){
		if($_POST['action'] == 'insert'){ 
        $email  = mysql_real_escape_string($_POST['email']);
		$pass = mysql_real_escape_string($_POST['password']);
        $password = md5(mysql_real_escape_string($_POST['password']));
		$fullname  = mysql_real_escape_string($_POST['fullname']);
        $panggilan = mysql_real_escape_string($_POST['panggilan']);
		$totaldon  = mysql_real_escape_string($_POST['totaldon']);
        $donasi_aksi = mysql_real_escape_string($_POST['donasi_aksi']);	
		$namaaksi = mysql_real_escape_string($_POST['namaaksi']);	
		$donasi_ap = $totaldon - $donasi_aksi;	
		//$donasi_ap  = mysql_real_escape_string($_POST['donasi_ap']);		
		$aid  = mysql_real_escape_string($_POST['aid']);
		$now1 = date("m/d/Y H:i:s");
		$poin = number_format($totaldon / 1200,0);		
		$this->db->select('*');
		$this->db->from('ap_user');
		$this->db->where(array('email' =>$email));
		$query = $this->db->get();
		$email2 = $query->row_array('email');
		//$email3 = $email2['email'];	
		if (count($email2)>0){				
			$datas = (array(
				'error' => 'Email sudah terdaftar silahkan login',
				'title' => 'Daftar dan bergabung bersama ribuan volunteer lainnya',
				//'fullname' => $fullname,
				//'panggilan' => $panggilan,
				//'email' => $email,				
			));?>
			<div class='alert alert-error'>
			  <button type="button" class="close" data-dismiss="alert">×</button>Something Wrong!<br> Email telah terdaftar silahkan login</div>
			  <script type="text/javascript">
				$(function(){
					$('#loading').show();					   
				});				
				</script>
			<?php //$this->load->view('upload_form', $error);
			//$this->load->view('header', $datas);
//			$this->load->view('profile/register_v', $datas);
//			$this->load->view('footer');
		}else{
			
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
			$did = autonumber("ap_donasi","did",5,"AP");
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
			$sql   = "insert into ap_user (uid, email, password, fullname, panggilan, poin, photo ) values ('$uid','$email', '$password', '$fullname', '$panggilan', 25, 0)";
			$query1 = mysql_query($sql);
			$sqldonasi   = "insert into ap_donasi (donasi_aksi, did, uid, donasi_ap, time1, statdon, totaldon, aid, namaaksi, donatur, poin ) values ('$donasi_aksi', '$did', '$uid', '$donasi_ap', '$now1', 0, '$totaldon', '$aid','$namaaksi', '$fullname', '$poin')";
			$query = mysql_query($sqldonasi);  
			
		$this->db->select('*');
		$this->db->from('ap_aksi');
		$this->db->where(array('aid' =>$aid));
		$queryslug = $this->db->get();
		$slug2 = $queryslug->row_array();
		$slug = $slug2['slug'];
		$slug = $slug2['slug'];
		
		//var_dump($email3);
		//sending email
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
	                                                                <h4 class='h4'>Hello $fullname,</h4>
	                                                                Terima kasih $fullname atas donasi anda di ayopeduli.com, berikut ini adalah informasi donasi anda dan akun login di ayopeduli.com:
	                                                            </div>
															</td>
	                                                    </tr>
	                                                    <tr>
	                                                    	<td valign='top' style='padding-top:0; padding-bottom:0;'>
	                                                          <table border='0' cellpadding='10' cellspacing='0' width='100%' class='templateDataTable'>
															  <tr mc:repeatable>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
	                                                                    email
	                                                                  </td>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
	                                                                    $email
	                                                                  </td>                                                       
	                                                              </tr> 
																  <tr mc:repeatable>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
	                                                                    Password
	                                                                  </td>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
	                                                                    $pass
	                                                                  </td>                                                                  
	                                                              </tr> 
	                                                             <tr mc:repeatable>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
	                                                                    Donasi ID
	                                                                  </td>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
	                                                                    $did
	                                                                  </td>                                                                  
	                                                              </tr> 
	                                                              <tr mc:repeatable>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
	                                                                    Untuk
	                                                                  </td>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
	                                                                    <a href='http://ayopeduli.com/aksi/view/$slug'>$namaaksi</a>
	                                                                  </td>                                                                  
	                                                              </tr>
	                                                              <tr mc:repeatable>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
	                                                                    Donasi untuk aksi
	                                                                  </td>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
	                                                                    Rp.$donasi_aksi
	                                                                  </td>                                                                  
	                                                              </tr>
																  <tr mc:repeatable>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
	                                                                    Donasi untuk ayopeduli
	                                                                  </td>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
	                                                                    Rp.$donasi_ap
	                                                                  </td>                                                                  
	                                                              </tr>
																  <tr mc:repeatable>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
	                                                                    Total Donasi
	                                                                  </td>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
	                                                                    Rp.$totaldon
	                                                                  </td>                                                                  
	                                                              </tr>                                                              
	                                                          </table>
	                                                        </td>
	                                                    </tr>
	                                                    <tr>
	                                                      <td valign='top' class='bodyContent'>
	                                                            <div mc:edit='std_content01'>
	                                                                 Silahkan lakukan transfer donasi anda sejumlah Rp. $totaldon  ke rekening berikut :<br />
                                                               <strong>1. BCA KCP Metro Pasar Baru <br>   a.n Yayasan Solidaritas Anak Terlantar acc. 536-011-0399 dengan mencantumkan id donasi anda dalam referensi transfer donasi.</strong><br /><br />
                                                               Note : <br />
                                                               1. Silahkan konfirmasi donasi melalui sms ke no 0857 269 33 154 <br />
															   <strong>Id Donasi # Nama # Tujuan Donasi # Jumlah Donasi</strong>                  
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
    $this->email->from('donasi@ayopeduli.com', 'Donasi Ayopeduli.com');
    //$list = array('user@gmail.com');
    $this->email->to($email);
	$this->email->cc('gufron@ayopeduli.com');
    $this->email->subject('Informasi donasi anda di ayopeduli.com');
    $this->email->message($email_body);

    $this->email->send();
	//echo $this->email->print_debugger();
	?> 	
				<div class='alert alert-success'>
				<button type="button" class="close" data-dismiss="alert">×</button> Terima kasih <?php echo "$panggilan"; ?> , Info Donasi anda telah terkirim ke <?php echo "$email"; ?>, Mohon segera lakukan transfer donasi untuk mendapatkan <?php echo "$poin"; ?> Gudness Poin </div>
				<script type="text/javascript">
				$(function(){
					$('#email').val('');
					$('#password').val('');
					$('#fullname').val('');
					$('#panggilan').val('');
					$('#totaldon').val('');
					$('#loading').show();					   
				});				
				</script>
			<?php } }else {
				?>          
			  <div class='alert alert-error'>
			  <button type="button" class="close" data-dismiss="alert">×</button>Something Wrong!<br> <?php die('Could not enter data: ' . mysql_error());?></div>
			  <script type="text/javascript">
				$(function(){
					$('#loading').show();					   
				});				
				</script>
				
		   <?php
		}
		//if show key is pressed then show records
		if($_POST['action'] == 'show'){
			$sql   = "select * from sekai order by id desc limit 10";
			$query = mysql_query($sql);
	 
			echo "<table border='1'>";
			while($row = mysql_fetch_assoc($query)){
				echo "<tr><td>$row[id]</td><td>$row[name]</td><td>$row[email]</td></tr>";
			}
			echo "</table>";
		}
	}
	
	
	public function donlogin(){
		if($_POST['action'] == 'insert'){
 		$fullname  = mysql_real_escape_string($_POST['fullname']);
       // $panggilan = mysql_real_escape_string($_POST['panggilan']);
		$totaldon  = mysql_real_escape_string($_POST['totaldon']);
        $donasi_aksi = mysql_real_escape_string($_POST['donasi_aksi']);	
		$uid = mysql_real_escape_string($_POST['uid']);	
		$namaaksi = mysql_real_escape_string($_POST['namaaksi']);	
		$donasi_ap = $totaldon - $donasi_aksi;	
		//$donasi_ap  = mysql_real_escape_string($_POST['donasi_ap']);		
		$aid  = mysql_real_escape_string($_POST['aid']);
		$now1 = date("m/d/Y H:i:s");
		$poin = number_format($totaldon / 1000,0);		
		
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
		$did = autonumber("ap_donasi","did",5,"AP");
		$sqldonasi   = "insert into ap_donasi (donasi_aksi, did, uid, donasi_ap, time1, statdon, totaldon, aid, namaaksi, donatur, poin ) values ('$donasi_aksi', '$did', '$uid', '$donasi_ap', '$now1', 0, '$totaldon', '$aid','$namaaksi', '$fullname', '$poin')";
        $query = mysql_query($sqldonasi);
		$this->db->select('*');
		$this->db->from('ap_user');
		$this->db->where(array('uid' =>$uid));
		$query = $this->db->get();
		$email2 = $query->row_array();
		$email3 = $email2['email'];
		
		$this->db->select('*');
		$this->db->from('ap_aksi');
		$this->db->where(array('aid' =>$aid));
		$queryslug = $this->db->get();
		$slug2 = $queryslug->row_array();
		$slug = $slug2['slug'];
		
		//var_dump($email3);
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
	                                                                <h4 class='h4'>Hello $fullname,</h4>
	                                                                Terima kasih $fullname atas donasi anda di ayopeduli.com, berikut ini adalah informasi donasi anda:
	                                                            </div>
															</td>
	                                                    </tr>
	                                                    <tr>
	                                                    	<td valign='top' style='padding-top:0; padding-bottom:0;'>
	                                                          <table border='0' cellpadding='10' cellspacing='0' width='100%' class='templateDataTable'>
	                                                             <tr mc:repeatable>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
	                                                                    Donasi ID
	                                                                  </td>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
	                                                                    $did
	                                                                  </td>                                                                  
	                                                              </tr> 
	                                                              <tr mc:repeatable>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
	                                                                    Untuk
	                                                                  </td>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
	                                                                    <a href='http://ayopeduli.com/aksi/view/$slug'>$namaaksi</a>
	                                                                  </td>                                                                  
	                                                              </tr>
	                                                              <tr mc:repeatable>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
	                                                                    Donasi untuk aksi
	                                                                  </td>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
	                                                                    Rp.$donasi_aksi
	                                                                  </td>                                                                  
	                                                              </tr>
																  <tr mc:repeatable>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
	                                                                    Donasi untuk ayopeduli
	                                                                  </td>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
	                                                                    Rp.$donasi_ap
	                                                                  </td>                                                                  
	                                                              </tr>
																  <tr mc:repeatable>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
	                                                                    Total Donasi
	                                                                  </td>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
	                                                                    Rp.$totaldon
	                                                                  </td>                                                                  
	                                                              </tr>                                                              
	                                                          </table>
	                                                        </td>
	                                                    </tr>
	                                                    <tr>
	                                                      <td valign='top' class='bodyContent'>
	                                                            <div mc:edit='std_content01'>
	                                                                 Silahkan lakukan transfer donasi anda sejumlah Rp. $totaldon  ke rekening berikut :<br />
                                                               <strong>1. BCA KCP Metro Pasar Baru <br>   a.n Yayasan Solidaritas Anak Terlantar acc. 536-011-0399 dengan mencantumkan id donasi anda dalam referensi transfer donasi.</strong><br /><br />
                                                               Note : <br />
                                                               1. Silahkan konfirmasi donasi melalui sms ke no 0857 269 33 154 <br />
															   <strong>Id Donasi # Nama # Tujuan Donasi # Jumlah Donasi</strong>                  
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
    $this->email->from('donasi@ayopeduli.com', 'Donasi Ayopeduli.com');
    //$list = array('user@gmail.com');
    $this->email->to($email3);
	$this->email->bcc('gufron@ayopeduli.com');
    $this->email->subject('Informasi donasi anda di ayopeduli.com');
    $this->email->message($email_body);

    $this->email->send();
    //echo $this->email->print_debugger();
?> 	
            <div class='alert alert-success'>
            <button type="button" class="close" data-dismiss="alert">×</button> Terima kasih <?php echo $fullname; ?> , Info Donasi anda telah terkirim ke email anda, Mohon segera lakukan transfer donasi untuk mendapatkan <?php echo "$poin"; ?> Gudness Poin </div>
            <script type="text/javascript">
            $(function(){
				$('#email').val('');
				$('#password').val('');
				$('#fullname').val('');
				$('#panggilan').val('');
				$('#totaldon').val('');
				$('#loading').show();					   
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
			
       <?php
    }
    //if show key is pressed then show records
    if($_POST['action'] == 'show'){
        $sql   = "select * from sekai order by id desc limit 10";
        $query = mysql_query($sql);
 
        echo "<table border='1'>";
        while($row = mysql_fetch_assoc($query)){
            echo "<tr><td>$row[id]</td><td>$row[name]</td><td>$row[email]</td></tr>";
        }
        echo "</table>";
    }
	}
};
