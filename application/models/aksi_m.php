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
			//$query = $this->db->get_where('ap_aksi', array('stat' =>1));			
//			return $query->result_array();
			$this->db->select('*');
			$this->db->from('ap_aksi');
			$this->db->where(array('stat' => 1));
			$this->db->join('ap_user', 'ap_aksi.uidact = ap_user.uid');
			$query = $this->db->get();
		//$query = $this->db->where('ap_aksi', array('cat' => $cat,'stat' =>1));
		
		return $query->result_array();
		};	
		$query = $this->db->get_where('ap_aksi', array('slug' => $slug));		
		return $query->row_array();		
		$uid = $query->row_array('uidact');
		$queryuap = $this->db->get_where('ap_user', array('uid'=> $uid));
		return $queryuap->row_array();			
		
	}
	
	public function getaksiid($aid){
		$query = $this->db->get_where('ap_aksi', array('aid' => $aid));		
		return $query->result_array();	
	}
	public function getaksiidadmin($aid){
		$query = $this->db->get_where('ap_aksi', array('aid' => $aid));		
		return $query->row_array();	
	}
	public function getaksihomeid($aid){
		$query = $this->db->get_where('ap_aksi', array('aid' => $aid));		
		return $query->row_array();	
	}
	public function getuidacthome($fasid){
		$query = $this->db->get_where('ap_user', array('uid' => $fasid));		
		return $query->row_array();	
	}
	
	public function getaksicontent($aid,$uid){
		//if ($slug === FALSE)
		//{
//			//$query = $this->db->get_where('ap_aksi', array('stat' =>1));			
////			return $query->result_array();
//			$this->db->select('*');
//			$this->db->from('ap_aksi');
//			$this->db->where(array('stat' => 1));
//			$this->db->join('ap_user', 'ap_aksi.uid = ap_user.uid');
//			$query = $this->db->get();
//		//$query = $this->db->where('ap_aksi', array('cat' => $cat,'stat' =>1));
//		
//		return $query->result_array();
//		}	
		$query = $this->db->get_where('ap_aksi', array('aid' => $aid, 'uidact' => $uid));		
		return $query->row_array();
	
		
	}
	public function aksi_active() {
        //return $this->db->count_all("ap");
		$this->db->select('*');
		$this->db->from('ap_aksi');
		$this->db->where(array('stat' => 1));
		$query = $this->db->get();
		return $query->result_array();
    }
	public function fetch_aksi($limit, $start) {
        $this->db->limit($limit, $start);
        //$query = $this->db->get_where('ap_aksi', array('stat' => 1));
		$this->db->select('*');
		$this->db->from('ap_aksi');
		$this->db->order_by('aid','desc');
		$this->db->where(array('stat' => 1));
		$this->db->join('ap_user', 'ap_aksi.uidact = ap_user.uid');
		$query = $this->db->get();
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
	public function aksi_activemy($uid) {
        //return $this->db->count_all("ap");
		$this->db->select('*');
		$this->db->from('ap_aksi');
		$this->db->where(array('uidact' => $uid));
		$query = $this->db->get();
		return $query->result_array();
    }
	public function fetch_aksimy($limit, $start, $uid) {
        $this->db->limit($limit, $start);
        //$query = $this->db->get_where('ap_aksi', array('stat' => 1));
		$this->db->select('*');
		$this->db->from('ap_aksi');
		$this->db->order_by('aid','desc');
		$this->db->where(array('uidact' => $uid));
		$this->db->join('ap_user', 'ap_aksi.uidact = ap_user.uid');
		$query = $this->db->get();
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
	
	public function getaksiadmin(){
			$this->db->select('*');
			$this->db->from('ap_aksi');
			$this->db->order_by('aid','desc');
			$this->db->join('ap_user', 'ap_aksi.uidact = ap_user.uid');
			$query = $this->db->get();	
		return $query->result_array();
	}
	public function getcategory($cat = FALSE){
		if ($cat === FALSE)
		{
			$query = $this->db->get_where('ap_aksi', array('stat' =>1));
			return $query->result_array();
		}
		
		//$query = $this->db->get_where('ap_aksi', array('cat' => $cat,'stat' =>1));
		//$query = $this->db->join('ap_user');
		$this->db->select('*');
		$this->db->from('ap_aksi');
		$this->db->order_by('aid','desc');
		$this->db->where(array('cat' => $cat,'stat' =>1));
		$this->db->join('ap_user', 'ap_user.uid = ap_aksi.uidact');
		
		$query = $this->db->get();
		//$query = $this->db->where('ap_aksi', array('cat' => $cat,'stat' =>1));
		
		return $query->result_array();
		//var_dump($cat);
		//echo $cat;		
		
		$uid = $query->row_array('uid');
		$queryuap = $this->db->get_where('ap_user', array('uid'=> $uid));
		return $queryuap->row_array();					
		
	}
	public function aksi_home_slider (){
		//$query = $this->db->get_where('ap_aksi', array('featured' =>1),3);
		//$query = $this->db->join('ap_user');		
		//return $query->result_array();
		
		$this->db->select('*');
		$this->db->from('ap_aksi');
		$this->db->order_by('aid','desc');
		$this->db->where(array('featured' =>1),3);
		$this->db->join('ap_user', 'ap_user.uid = ap_aksi.uidact');
		$this->db->limit(3);
		$query = $this->db->get();
		//$query = $this->db->where('ap_aksi', array('cat' => $cat,'stat' =>1));		
		return $query->result_array();
		
	}
	public function aksi_home_terbaru (){
		//$query = $this->db->get_where('ap_aksi', array('featured' =>1),3);
		//$query = $this->db->join('ap_user');		
		//return $query->result_array();
		
		$this->db->select('*');
		$this->db->from('ap_aksi');	
		$this->db->where(array('verified' => 1));
		$this->db->join('ap_user', 'ap_user.uid = ap_aksi.uidact');		
		$this->db->limit(3);
		$this->db->order_by('aid','desc');
		$query = $this->db->get();		
		return $query->result_array();
		
	}
	public function pelaku_kebaikan (){
		$this->db->select('*');
		$this->db->from('ap_user');
		$this->db->order_by('aid','random');
		$this->db->limit(5);
		$query = $this->db->get();		
		return $query->result_array();
		
	}
	public function aksi_home_lingkungan (){
		$this->db->order_by('aid','desc');
		$query = $this->db->get_where('ap_aksi', array('cat' => 'lingkungan'));
		//$query = $this->db->from('ap_aksi');
		//$query2 = $this->db->get_where('ap_aksi', array('featured' =>1));
		//$query3 = $query->db->join('ap_user', 'ap_user.uid = ap_aksi.uid','left');
		//$query4 = $query3->db->get();
		//$query2 = $query->db->limit(1);
		//$query3 = $query2->db->last_query();
		//$this->db->order_by("ID", "desc");
		return $query->row_array();		
		$uid = $query->row_array('uidact');
		$queryuap = $this->db->get_where('ap_user', array('uid'=> $uid) );
		return $queryuap->row_array();
	}
	public function aksi_home_kesehatan (){
		$this->db->order_by('aid','desc');
		$query = $this->db->get_where('ap_aksi', array('cat' => 'kesehatan'));
		return $query->row_array();		
		$uid = $query->row_array('uidact');
		$queryuap = $this->db->get_where('ap_user', array('uid'=> $uid) );
		return $queryuap->row_array();
	}
	public function aksi_home_pendidikan (){
		$this->db->order_by('aid','desc');
		$query = $this->db->get_where('ap_aksi', array('cat' => 'pendidikan'));
		return $query->row_array();
		
		$uid = $query->row_array('uidact');
		$queryuap = $this->db->get_where('ap_user', array('uid'=> $uid) );
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
	public function validateaksi(){
		$aid  = mysql_real_escape_string($_POST['aid']);
		$data = array(
               'verified' => 1,            
            );
		$this->db->where('aid', $aid);
		$this->db->update('ap_aksi', $data);
		// update donasi aksi
		$this->db->select('*');
		$this->db->from('ap_aksi');
		$this->db->where(array('aid' => $aid));
		$query = $this->db->get();
		$jumlah = $query->row_array();
		$terkumpul = $jumlah['jumlahterkumpul'];
		$namaaksi = $jumlah['judul'];
		$uidfas = $jumlah['uidact'];
		$this->db->select('*');
		$this->db->from('ap_user');
		$this->db->where(array('uid' => $uidfas));
		$queryfas = $this->db->get();
		$poin2fas = $queryfas->row_array();
		$emailfas =$poin2fas['email'];
		$pangfas =$poin2fas['panggilan'];
		//email to fasilitator :
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
	                                                                <h4 class='h4'>Hello $pangfas,</h4>
	                                                                Selamat, Aksi kamu ($namaaksi) telah berhasil kami validasi, berikut ini adalah cara-cara agar aksi kamu bisa terdanai:<br>
																	1. Sebarkan link aksi sosial kamu di ayopeduli.com melalui social media<br>
																	2. Ajak Saudara, teman atau keluarga untuk mendukung aksi kami melalui link yang kamu sebar<br>
																	3. Jika dalam 2 minggu aksi sosial tidak ada yang memberikan donasi maka aksi sosial kamu akan kami turunkan dan telah gagal <br>
																	4. Mulai ajak orang terdekat untuk memberikan donasi kepada aksi sosial kamu melalui ayopeduli.com untuk kumpulkan poin. karena ini adalah bentuk validasi lainya <br>
																	5. Jangan menyerah dan terus semangat <br>
	                                                            </div>
															</td>
	                                                    </tr>
	                                                    <tr>
	                                                    	<td valign='top' style='padding-top:0; padding-bottom:0;'>
	                                                          <table border='0' cellpadding='10' cellspacing='0' width='100%' class='templateDataTable'>															  
																<tr mc:repeatable>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
	                                                                    Aksi ID
	                                                                  :</td>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
	                                                                    $aid
	                                                                  </td>                                                       
	                                                              </tr>
															<tr mc:repeatable>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content00'>
	                                                                    Nama Aksi
	                                                                  :</td>
	                                                                  <td valign='top' class='dataTableContent' mc:edit='data_table_content01'>
	                                                                    $namaaksi
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
    $this->email->from('aksi@ayopeduli.com', 'Aksi Ayopeduli.com');
    //$list = array('user@gmail.com');
    $this->email->to($emailfas);
	$this->email->cc('gufron@ayopeduli.com');
    $this->email->subject('Selamat, Aksi kamu telah di validasi di ayopeduli.com');
    $this->email->message($email_body);

    $this->email->send();
	//echo $this->email->print_debugger();
				
	}
	public function updateaksi($aid){
		$cat  =($_POST['cat']);
        $judul = ($_POST['judul']);
		$descsing  = ($_POST['descsing']);
        //$picaksi=($_POST['picaksi']);
		//$picaksi = $filename;
		//$picaksi=($_POST['picaksi']);
        $donasi =($_POST['donasi']);			
		$jumlahtarget  =($_POST['jumlahtarget']);		
		$b = str_replace( ',', '', $jumlahtarget );		
		if( is_numeric( $b ) ) {
			$jumlahtarget = $b;
		}
		$tgl  =($_POST['tgl']);
        $desc = htmlspecialchars($_POST['deskripsi']);		
        $vid =($_POST['vid']);
		$now1 = date("m/d/Y H:i:s");
		$uid= ($_POST['uid']);		
		$email =($_POST['email']);
		$data = array(
               'judul' => $judul,
			   'cat' => $cat,
			   'descsing' => $descsing,
			   'donasi' => $donasi, 
			   'tgl' => $tgl,  
			   'jumlahtarget' => $jumlahtarget,  
			   'vid' => $vid,  
			   'deskripsi' => $desc,            
            );
		$this->db->where('aid', $aid);
		$this->db->update('ap_aksi', $data);
		
	}
	public function insertact2(){
		$this->load->helper('url');
		$judul = ($_POST['judul']);
		$slug = url_title($judul, 'dash', TRUE);
		$cat  =($_POST['cat']);        
		$descsing  = ($_POST['descsing']);       
        //$donasi =($_POST['donasi']);
		$jumlahtarget  =($_POST['jumlahtarget']);		
		$b = str_replace( ',', '', $jumlahtarget );		
		if( is_numeric( $b ) ) {
			$jumlahtarget = $b;
		}
		$tgl  =($_POST['tgl']);
        $desc = htmlspecialchars($_POST['deskripsi']);
		$now1 = date("m/d/Y");
		$uid= ($_POST['uid']);		
		$email =($_POST['email']);					
		$this->db->select('*');
		$this->db->from('ap_aksi');
		$this->db->where(array('judul' => $judul));
		$query = $this->db->get();
		$judul2 = $query->row_array();
		//$judul3 =$judul2['judul'];
		//var_dump($judul3);
		if (isset($judul2['judul'])){
			$datas = (array(
				'error' => 'Judul sudah digunakan oleh aksi lain, silahkan gunakan judul yang baru ',
				'title' => 'Judul Tidak Boleh sama ',
				'judul' => $judul,
				'descsing' => $descsing,
				'deskripsi' => $desc,
				'selesai' => $tgl,
				'jumlahtarget' => $jumlahtarget,
				'cat' => $cat,				
			));	
			$this->load->model(array('user_m'));
			$datas['user_item'] = $this->user_m->getuser($email);
			$datas['donasi_user'] = $this->user_m->getdonasi($uid);
	 		$datas['aksi_user'] = $this->user_m->getaksi($uid);
			$this->load->view('home/headerdash', $datas);			
			$this->load->view('home/new_aksi',$datas);
			//$this->load->view('footer');
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
		$aid = autonumber("ap_aksi","aid",5,"AAP");
		$insertaksi = array(
		   'aid' => $aid,
		   'uidact' => $uid,
		   'cat' => $cat,
		   'judul' =>$judul ,
		   'descsing' => $descsing ,
		   'jumlahtarget' => $jumlahtarget,
		   'tgl' => $tgl,
		   'now' => $now1,
		   'stat' => 2,
		   'deskripsi' => $desc,
		   'slug' => $slug,
		   'jumlahterkumpul' => 00,
		   'verified' => 0,
		);	
		//var_dump($insertaksi);
		$this->db->insert('ap_aksi', $insertaksi);
				$datas = (array(
				'thanks' => 'Silahkan upload photo dan iframe video aksi kamu ',
				'title' => 'Terima kasih aksi kamu telah kami terima untuk di review, tunggu kabar baik dari kami. ',
				'aksiid' => $aid,
				'judul' =>$judul,
				
				//'aksi_item' => $this->aksi_m->getaksiid($aid) 				
			));	
			$this->load->model(array('user_m'));
			$datas['user_item'] = $this->user_m->getuser($email);
			//var_dump($datas['aksi_item']);
			$this->load->view('home/headerdash', $datas);			
			$this->load->view('home/new_aksi_step2',$datas);
		}
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
	//$password2 = md5($_POST['password']);
//	$result=mysql_query("select * from ap_user where email='$email' and password='$password2'")or die (mysql_error());//query sang database 
//			
//	$count=mysql_num_rows($result);//isipon kn may tyakto sa query
//	$row=mysql_fetch_array($result);//ma return row sa database
//	$uid=$row['uid'];
//	$nama=$row['fullname'];
//	$poin=$row['poin'];		
//	$this->load->helper('url');
//			if ($count > 0){//kun may tyakto sa query e execute yah ang code sa dalom
//			session_start();//para mag start ang session
//			$_SESSION['uid']=$row['uid'];
//			$_SESSION['nama']=$row['fullname'];
//			$data = $uid;
//			redirect('/profile/myprofile/'.$uid);			
//			}else{
//			$dataerror = "error";
//			redirect('/login');
//			 //$this->load->view('login'); 
//			}
//	
	//}else {
		//echo "Ada yang salah";
		//}
	}
	
	public function insertact3($filename, $aid, $vid){
		$updatetaksivid = array(
		   'pic' => $filename,
		   'vid' => $vid,
		);	
		$this->db->where('aid', $aid); 
		//var_dump($insertaksi);
		$this->db->update('ap_aksi', $updatetaksivid);			
		
	}
	
	public function insertaksilogin($filename){
		$this->load->helper('url');
		$slug = url_title($this->input->post('judul'), 'dash', TRUE);
		$cat  =($_POST['cat']);
        $judul = ($_POST['judul']);
		$descsing  = ($_POST['descsing']);
        //$picaksi=($_POST['picaksi']);
		$picaksi = $filename;
		//$picaksi=($_POST['picaksi']);
        $donasi =($_POST['donasi']);
		$jumlahtarget  =($_POST['jumlahtarget']);		
		$b = str_replace( ',', '', $jumlahtarget );		
		if( is_numeric( $b ) ) {
			$jumlahtarget = $b;
		}
		$tgl  =($_POST['tgl']);
        $desc = htmlspecialchars($_POST['deskripsi']);		
        $vid =($_POST['vid']);
		$now1 = date("m/d/Y");
		$uid= ($_POST['uid']);		
		$email =($_POST['email']);	
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
		//if (!isset($uid)){
//			$uid= ($_POST['uid']);			 
//		}else{
//			function autouser($tabel2, $kolom2, $lebar2=0, $awalan2='')
//				{
//					$query2="select $kolom2 from $tabel2 order by $kolom2 desc limit 1";
//					$hasil2=mysql_query($query2);
//					$jumlahrecord2 = mysql_num_rows($hasil2);
//					if($jumlahrecord2 == 0)
//						$nomor2=1;
//					else
//					{
//						$row2=mysql_fetch_array($hasil2);
//						$nomor2=intval(substr($row2[0],strlen($awalan2)))+1;
//					}
//					if($lebar2>0)
//						$angka2 = $awalan2.str_pad($nomor2,$lebar2,"0",STR_PAD_LEFT);
//					else
//						$angka2 = $awalan2.$nomor2;
//					return $angka2;
//				}
//			$uid = autouser("ap_user","uid",5,"UAP");			
//		}
		//$sql   = "insert into ap_user (uid, fullname,  panggilan, email, password, poin) values ('$uid','$fullname', '$panggilan','$email','$password','5' )";     
				
			//$query1 = $this->db->query($sql);
			
			//if($query1){ 
			// update poin user
		$this->db->select('*');
		$this->db->from('ap_aksi');
		$this->db->where(array('judul' => $judul));
		$query = $this->db->get();
		$judul2 = $query->row_array();
		//$judul3 =$judul2['judul'];
		//var_dump($judul3);
		if (isset($judul2['judul'])){	
				
			$datas = (array(
				'error' => 'Judul sudah digunakan oleh aksi lain, silahkan gunakan judul yang baru ',
				'title' => 'Judul Tidak Boleh sama ',
				'judul' => $judul,
				'descsing' => $descsing,
				'desc' => $desc,
				'tgl' => $tgl,				
			));	
			$this->load->model(array('user_m'));
			$datas['user_item'] = $this->user_m->getuser($email);
			$datas['donasi_user'] = $this->user_m->getdonasi($uid);
	 		$datas['aksi_user'] = $this->user_m->getaksi($uid);
			$this->load->view('header', $datas);			
			$this->load->view('profile/my-profile_v',$datas);
			$this->load->view('footer');
		}else{		
			 $sqlaksi   = "insert into ap_aksi (aid, uidact, cat,  judul, descsing, donasi, jumlahtarget, tgl, vid, now, stat, deskripsi, pic, slug, verified, jumlahterkumpul) values ('$aid','$uid','$cat','$judul','$descsing','$donasi','$jumlahtarget','$tgl','$vid','$now1',1,'$desc','$picaksi','$slug',0,00)";
			$query = $this->db->query($sqlaksi);
			$datas = (array(
				'thanks' => 'Terima kasih aksi kamu telah kami terima untuk di review, tunggu kabar baik dari kami. ',
				'title' => 'Terima kasih aksi kamu telah kami terima untuk di review, tunggu kabar baik dari kami. '				
			));	
			$this->load->model(array('user_m'));
			$datas['user_item'] = $this->user_m->getuser($email);
			$datas['donasi_user'] = $this->user_m->getdonasi($uid);
	 		$datas['aksi_user'] = $this->user_m->getaksi($uid);
			$this->load->view('header', $datas);			
			$this->load->view('profile/my-profile_v',$datas);
			$this->load->view('footer');
		}
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
	//$password2 = md5($_POST['password']);
//	$result=mysql_query("select * from ap_user where email='$email' and password='$password2'")or die (mysql_error());//query sang database 
//			
//	$count=mysql_num_rows($result);//isipon kn may tyakto sa query
//	$row=mysql_fetch_array($result);//ma return row sa database
//	$uid=$row['uid'];
//	$nama=$row['fullname'];
//	$poin=$row['poin'];		
//	$this->load->helper('url');
//			if ($count > 0){//kun may tyakto sa query e execute yah ang code sa dalom
//			session_start();//para mag start ang session
//			$_SESSION['uid']=$row['uid'];
//			$_SESSION['nama']=$row['fullname'];
//			$data = $uid;
//			redirect('/profile/myprofile/'.$uid);			
//			}else{
//			$dataerror = "error";
//			redirect('/login');
//			 //$this->load->view('login'); 
//			}
//	
	//}else {
		//echo "Ada yang salah";
		//}
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
        $donasi =str_replace(".","",($_POST['donasi']));
        //var_dump($donasi);		
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
		$now1 = date("m/d/Y");
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
			$sess_array = array(	
				'uid' => $uid,			 
				 'email' => $email,
				 'fullname' => $fullname
			   );
			$this->session->set_userdata('logged_in', $sess_array);
			
			if($query1){ 
			 $sqlaksi   = "insert into ap_aksi (aid, uidact, cat,  judul, descsing, donasi, jumlahtarget, tgl, vid, now, stat, deskripsi, pic, slug, verified, jumlahterkumpul) values ('$aid','$uid','$cat','$judul','$descsing','$donasi','$jumlahtarget','$tgl','$vid','$now1',1,'$desc','$picaksi','$slug',0,00)";
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
			//redirect('/profile/myprofile/'.$uid);	
			redirect('/home');			
			}else{
			$dataerror = "error";
			redirect('/login');
			 //$this->load->view('login'); 
			}
	
	//}else {
		echo "Ada yang salah";
		}
	}
	
	public function update_act2(){
		$this->load->helper('url');
		$judul = ($_POST['judul']);
		$slug = url_title($judul, 'dash', TRUE);
		$cat  =($_POST['cat']);        
		$descsing  = ($_POST['descsing']);       
        //$donasi =($_POST['donasi']);
		$jumlahtarget  =($_POST['jumlahtarget']);		
		$b = str_replace( ',', '', $jumlahtarget );		
		if( is_numeric( $b ) ) {
			$jumlahtarget = $b;
		}
		$tgl  =($_POST['tgl']);
        $desc = htmlspecialchars($_POST['deskripsi']);
		$now1 = date("m/d/Y");
		$uid= ($_POST['uid']);		
		$email =($_POST['email']);	
		$aid  =($_POST['aid']);
		$fasil  =($_POST['fasil']);
		$peran  =($_POST['peran']);
		$updateaksi = array(
		   //'aid' => $aid,
		   'uidact' => $uid,
		   'cat' => $cat,
		   'judul' =>$judul ,
		   'descsing' => $descsing ,
		   'jumlahtarget' => $jumlahtarget,
		   'tgl' => $tgl,
		   'now' => $now1,
		   'stat' => 2,
		   'deskripsi' => $desc,
		   'slug' => $slug,
		   'fasil' => $fasil,
		   'peranfasil' => $peran
		);	
		//var_dump($insertaksi);
		$this->db->where('aid', $aid);
		$this->db->update('ap_aksi', $updateaksi);
		$this->load->model(array('user_m'));
		
		$this->db->select('*');
		$this->db->from('ap_aksi');
		$this->db->where(array('aid' => $aid));
		$queryfas = $this->db->get();
		//$picfas = $queryfas->row_array();
		//$pic2 =$picfas['pic'];	
		return $queryfas->row_array();	
//		//var_dump($pic2);
//		$datas = (array(
//				'thanks' => 'Silahkan upload photo dan iframe video aksi kamu ',
//				'title' => 'Terima kasih aksi kamu telah kami terima untuk di review, tunggu kabar baik dari kami. ',
//				'aksiid' => $aid,
//				'judul' =>$judul,
//				'edit' =>'yes',
//				'user_item' => $this->user_m->getuser($email),
//				'pic' => $pic2
//								
//		));	
//			
//			//var_dump($datas['aksi_item']);
//			$this->load->view('home/headerdash', $datas);			
//			$this->load->view('home/new_aksi_step2',$datas);
		}
};
