<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Auth {

	var $CI = null;

	function Auth()
	{
		$this->CI =& get_instance();
		$this->CI->load->database();
		$this->CI->load->library(array('loader','fungsi','simplival'));
	}
	function _getnamakantor(){
		$hasil = $this->CI->db->get('kantorku');
		if($hasil->num_rows() > 0){
			return $data = $hasil->row_array();
		}
	}
	function _get_maxuser(){
		$kantor = $this->_getnamakantor();
		$namakantor = $kantor['namakantorku'];
		$sql = "SELECT maxuser FROM aktifasi WHERE namakantor = PASSWORD('".$namakantor."') LIMIT 1";
		$hasil = $this->CI->db->query($sql);
		if($hasil->num_rows() > 0){
			return $data = $hasil->row_array();
		}
	}
	function cek_maxuser(){
		$max = $this->_get_maxuser();
		$maxuser = substr($max['maxuser'],3,10);
		if($maxuser == false){
			$maxuser = 5;
		}
		$this->CI->db->select('user_id');
		$this->CI->db->from('user');
		if($this->CI->db->count_all_results() >= $maxuser){
			return 1;
		}else{
			return 0;
		}
	}
	function cek_akses($field){
		$user_id = $this->CI->session->userdata('user_id');
		$sql = "SELECT priv_".$field." FROM user WHERE user_id = '".$user_id."'";
		// echo $sql;
		$que = mysql_query($sql);
		$d = mysql_fetch_array($que);
		$hak_akses = $d[0];
		if($hak_akses == 0){
			$akses = array(
				'akses_tambah' => 'display:none',
				'akses_edit' => 'display:none',
				'akses_hapus' => 'display:none',
				'akses_lihat' => 'display:none',
			);
		}elseif($hak_akses == 1){
			$akses = array(
				'akses_tambah' => 'display:none',
				'akses_edit' => 'display:none',
				'akses_hapus' => 'display:none',
				'akses_lihat' => '',
			);
		}elseif($hak_akses == 2){
			$akses = array(
				'akses_tambah' => 'display:none',
				'akses_edit' => 'display:none',
				'akses_hapus' => '',
				'akses_lihat' => 'display:none',
			);
		}elseif($hak_akses == 3){
			$akses = array(
				'akses_tambah' => 'display:none',
				'akses_edit' => 'display:none',
				'akses_hapus' => '',
				'akses_lihat' => '',
			);
		}elseif($hak_akses == 4){
			$akses = array(
				'akses_tambah' => 'display:none',
				'akses_edit' => '',
				'akses_hapus' => 'display:none',
				'akses_lihat' => 'display:none',
			);
		}elseif($hak_akses == 5){
			$akses = array(
				'akses_tambah' => 'display:none',
				'akses_edit' => '',
				'akses_hapus' => 'display:none',
				'akses_lihat' => '',
			);
		}elseif($hak_akses == 6){
			$akses = array(
				'akses_tambah' => 'display:none',
				'akses_edit' => '',
				'akses_hapus' => '',
				'akses_lihat' => 'display:none',
			);
		}elseif($hak_akses == 7){
			$akses = array(
				'akses_tambah' => 'display:none',
				'akses_edit' => '',
				'akses_hapus' => '',
				'akses_lihat' => '',
			);
		}elseif($hak_akses == 8){
			$akses = array(
				'akses_tambah' => '',
				'akses_edit' => 'display:none',
				'akses_hapus' => 'display:none',
				'akses_lihat' => 'display:none',
			);
		}elseif($hak_akses == 9){
			$akses = array(
				'akses_tambah' => '',
				'akses_edit' => 'display:none',
				'akses_hapus' => 'display:none',
				'akses_lihat' => '',
			);
		}elseif($hak_akses == 10){
			$akses = array(
				'akses_tambah' => '',
				'akses_edit' => 'display:none',
				'akses_hapus' => '',
				'akses_lihat' => 'display:none',
			);
		}elseif($hak_akses == 11){
			$akses = array(
				'akses_tambah' => '',
				'akses_edit' => 'display:none',
				'akses_hapus' => '',
				'akses_lihat' => '',
			);
		}elseif($hak_akses == 12){
			$akses = array(
				'akses_tambah' => '',
				'akses_edit' => '',
				'akses_hapus' => 'display:none',
				'akses_lihat' => 'display:none',
			);
		}elseif($hak_akses == 13){
			$akses = array(
				'akses_tambah' => '',
				'akses_edit' => '',
				'akses_hapus' => 'display:none',
				'akses_lihat' => '',
			);
		}elseif($hak_akses == 14){
			$akses = array(
				'akses_tambah' => '',
				'akses_edit' => '',
				'akses_hapus' => '',
				'akses_lihat' => 'display:none',
			);
		}elseif($hak_akses == 15){
			$akses = array(
				'akses_tambah' => '',
				'akses_edit' => '',
				'akses_hapus' => '',
				'akses_lihat' => '',
			);
		}
		$this->CI->session->set_userdata('sesi_lihat'.$field, $akses['akses_lihat']);
		// echo $this->CI->session->userdata('sesi_lihat');
		return $akses;
	}
	function get_namakantor(){
		$sql = "SELECT namakantorku FROM kantorku WHERE aktifasi = PASSWORD('sampun') LIMIT 1";
		$hasil = mysql_query($sql);
		$num = mysql_fetch_array($hasil);
		if($num > 0){
			return $num['namakantorku']; //return row sebagai associative array
		}
	}
	function cek_jumrecord($table,$id){
		$sql = "SELECT COUNT(".$id.") jumrec FROM ".$table;
		$que = mysql_query($sql);
		$num = mysql_fetch_array($que);
		if($num > 0){
			return $num['jumrec']; //return row sebagai associative array
		}
	}
	function cek_register($table,$id){
		$this->cek('data_master');
		$namakantor = $this->get_namakantor();
		$sql = "SELECT * FROM aktifasi WHERE namakantor = PASSWORD('".$namakantor."') AND absah = PASSWORD('inisyah')";
		$que = mysql_query($sql);
		$hasil = mysql_num_rows($que);

		$jr = $this->cek_jumrecord($table, $id);
		$jumrec = $jr['jumrec'];
		/* MAKSIMAL JUMLAH RECORD */
		if($hasil == false AND $jumrec >4){
			return $result = 0;
		}else{
			return $result = 1;
		}
	}
	function cek_register_only(){
		$this->cek('data_master');
		$namakantor = $this->get_namakantor();
		$sql = "SELECT * FROM aktifasi WHERE namakantor = PASSWORD('".$namakantor."') AND absah = PASSWORD('inisyah')";
		$que = mysql_query($sql);
		return $hasil = mysql_num_rows($que);		
	}
	function do_login($login = NULL)
	{
	     	// A few safety checks
	    	// Our array has to be set

	    	if(!isset($login))
		        return FALSE;
		
	    	//Our array has to have 2 values
	     	//No more, no less!
	    	if(count($login) != 2)
			return FALSE;
		
	     	$username = $login['username'];
	     	$password = $login['password'];
	
		$this->CI->db->from('user');
		$this->CI->db->where('user_username', $username);
		$this->CI->db->where("user_password=PASSWORD('$password')");
		$query = $this->CI->db->get();

	     	foreach ($query->result() as $row)
        	{
        	$user_id = $row->user_id;
			$username = $row->user_username;
			$username = $row->user_username;
			$namafull = $row->user_name;
			$jabatan = $row->user_jabatan;
			$count = $row->user_logincount;
			$level = $row->user_level;
			$count++;
        	}
	
	     	if ($query->num_rows() == 1)
	     	{
	       	 	$newdata = array(
	       	 	    'user_id'	=> $user_id,
                            'username'  => $username,
                            'jabatan'	=> $jabatan,
                            'nama'  	=> $namafull,
                            'logged_in' => TRUE,
                            'login_ke' 	=> $count,
			    'level'	=> $level
               		);
			// Our user exists, set session.
			$this->CI->session->set_userdata($newdata);	  
			// update counter login
			$this->CI->db->where('user_id',$user_id);
			$this->CI->db->update('user',array('user_logincount'=>$count));
			return TRUE;
		}
		else 
		{
			// No existing user.
			return FALSE;
		}
	}
	function checkIP()
	{
		$domain = isset($_SERVER['HTTP_X_FORWARDED_FOR'])
		 ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
		$this->CI->db->from('allowed_ip');
		$this->CI->db->where('ip_address',$domain);
		$exist = $this->CI->db->count_all_results();
		if($exist == 0)
		{
			/* NTAR DIAKTIFKAN LAGI */
			/*echo $this->CI->fungsi->warning($this->CI->config->item('project_name').' tidak memperbolehkan Login di Area Anda',site_url());
			die(); */
		}
	}
	function checkOnline($id)
	{
		$this->CI->db->where('user_id',$id);
		$this->CI->db->from('online');
		return $this->CI->db->count_all_results();
	}
	function getLastActivity($id)
	{
		$this->CI->db->select('last_activity');
		$this->CI->db->from('online');
		$this->CI->db->where('user_id',$id);
		$data = $this->CI->db->get();
		$row = $data->row();
		return $row->last_activity;
	}
	function getDiff($old,$now)
	{
	    if($old == '' OR $now == '')
	    {
	       return TRUE;
	    }
		$old_y = date('Y',$old);
		$old_m = date('n',$old);
		$old_d = date('j',$old);
		$old_g = date('G',$old);
		$old_i = date('i',$old);
		//$old_s = date('s',$old);
		$now_y = date('Y',$now);
		$now_m = date('n',$now);
		$now_d = date('j',$now);
		$now_g = date('G',$now);
		$now_i = date('i',$now);
		//$now_s = date('s',$now);
		//start checking
		if($now_y!=$old_y){return TRUE;}
		if($now_m!=$old_m){return TRUE;}
		if($now_d!=$old_d){return TRUE;}
		if($now_g!=$old_g){return TRUE;}
		// ignore second
		$diff_minute = $now_i - $old_i;
		if($diff_minute >= 10){ return TRUE;}
		return FALSE;
	}
	function process_login($login = NULL)
	{
	     	// A few safety checks
	    	// Our array has to be set
	    	$this->checkIP();
	    	if(!isset($login))
		        return FALSE;
		
	    	//Our array has to have 2 values
	     	//No more, no less!
	    	if(count($login) != 2)
	         	return FALSE;
		
	     	$username = $login['username'];
	     	$password = $login['password'];
	
		$this->CI->db->from('user');
		$this->CI->db->where('user_username', $username);
		$this->CI->db->where('user_aktif', '1');
		$this->CI->db->where("user_password=PASSWORD('$password')");
		$query = $this->CI->db->get();

	     	foreach ($query->result() as $row)
        	{
        		$user_id=$row->user_id;
			$username= $row->user_username;
			$level = $row->level_id;
			$namafull=$row->user_nama;
			$count = $row->user_logincount;
			$status_online = $this->checkOnline($user_id);
			$count++;
			if($status_online == 1)
			{
				$now = time();
				$old = $this->getLastActivity($user_id);
				if(!$this->getDiff($old,$now))
				{
					echo $this->CI->fungsi->warning('Anda masih tercatat dalam database sebagai user online.\nIni mungkin terjadi karena :\n1. Anda belum \'Logout\' pada waktu terakhir kali Anda login, atau \n2. Ada orang lain yang sedang menggunakan user Anda. \nJika kemungkinan pertama memang benar, Anda hanya perlu menunggu sekitar 10 menit dari \nsejak aktivitas terakhir Anda di Profast ini. Jika 10 menit berselang namun \nAnda masih tetap tidak bisa login, maka kemungkinan kedua bisa jadi benar. \nJika Anda tidak yakin, silakan hubungi Administrator untuk konfirmasi. \nHal ini penting untuk mengindari adanya pemakaian user oleh orang yang tidak bertanggung jawab.',site_url());
					die();
				}else{
					$this->CI->db->delete('online',array('user_id'=>$user_id));
				}
			}
        	}
	
	     	if ($query->num_rows() == 1)
	     	{
	       	 	$newdata = array(
	       	 	    'user_id'	=> $user_id,
                            'username'  => $username,
                            'level'    	=> $level,
                            'nama'  	=> $namafull,
                            'jabatan'  	=> $jabatan,
                            'logged_in' => TRUE,
                            'login_ke' 	=> $count,
               		);
		// Our user exists, set session.
		$this->CI->session->set_userdata($newdata);	  
		$kegiatan='Login '.$this->CI->config->item('project_name').' by '.$namafull;
		$this->CI->fungsi->catat($kegiatan);
		// update counter login
		$this->CI->db->where('user_id',$user_id);
		$this->CI->db->update('user',array('user_logincount'=>$count));
		// insert user_id to table 'online'
		$this->CI->db->insert('online',array('user_id'=>$user_id));
		return TRUE;
		}
		else 
		{
		    // No existing user.
		    return FALSE;
		}
	 }
 
       /**
         *
         * This function restricts users from certain pages.
         * use restrict(TRUE) if a user can't access a page when logged in
         *
         * @access	public
         * @param	boolean	wether the page is viewable when logged in
         * @return	void
         */	
    	function restrict($logged_out = FALSE)
    	{
		$this->checkIP();
		// If the user is logged in and he's trying to access a page
		// he's not allowed to see when logged in,
		// redirect him to the index!
		if ($logged_out && $this->logged_in())
		{
		      echo $this->CI->fungsi->warning('Maaf, sepertinya Anda sudah login...',site_url());
		      die();
		}
		
		// If the user isn' logged in and he's trying to access a page
		// he's not allowed to see when logged out,
		// redirect him to the login page!
		if ( ! $logged_out && ! $this->logged_in()) 
		{
		      echo $this->CI->fungsi->warning('Anda diharuskan untuk Login bila ingin mengakses halaman Administrasi.',site_url());
		      die();
		}
     	}

/**
 *
 * Checks if a user is logged in
 *
 * @access	public
 * @return	boolean
 */	
    	function logged_in()
      	{
      		if ($this->CI->session->userdata('username') == FALSE)
	         {
	    	    	return FALSE;
	         }
	        else 
	         {
	         return TRUE;
	         }
    }
    function logout() 
    {
		$kegiatan='Logout '.$this->CI->config->item('project_name').' by '.$this->CI->session->userdata('nama');
		$this->CI->fungsi->catat($kegiatan);
		// delete the 'online' status 
		$user_id=$this->CI->session->userdata('user_id');
		$this->CI->db->delete('online',array('user_id'=>$user_id));
		// destroy the session
		$this->CI->session->sess_destroy();	
		return TRUE;
    }
	function cek($id,$ret=false)
	{
		$menu = array(
			'data_master'=>'+admin+',
			'manajemen_user'=>'+admin+'
		);
		$allowed = explode('+',$menu[$id]);
		if(!in_array(from_session('level'),$allowed))
		{
			if($ret) return false;
			echo $this->CI->fungsi->warning('KONFIRMASI\nAnda tidak diijinkan mengakses halaman ini.',site_url());
			die();
		}
		else
		{
			if($ret) return true;
		}
	}
	function setChaptcha()
	{
		$this->CI->config->load('config');
		$this->CI->load->helper('string');
		$this->CI->load->plugin('captcha');
		$captcha_url = $this->CI->config->item('captcha_url');
		$captcha_path = $this->CI->config->item('captcha_path');
		$vals = array(
			'img_path'      	=> $captcha_path,
			'img_url'       	=> $captcha_url,
			'expiration'    	=> 3600,// one hour
			'font_path'	 	=> './system/fonts/georgia.ttf',
			'img_width'	 	=> '140',
			'img_height' 		=> 30,
			'word'			=> random_string('numeric', 6),
        	);
		$cap = create_captcha($vals);
		$capdb = array(
			'captcha_id'      	=> '',
			'captcha_time'    	=> $cap['time'],
			'ip_address'      	=> $this->CI->input->ip_address(),
			'word'            	=> $cap['word']
		);
		$query = $this->CI->db->insert_string('captcha', $capdb);
		$this->CI->db->query($query);
		$data['cap'] = $cap;
		return $data;
	}	
}
// End of library class
// Location: system/application/libraries/Auth.php
