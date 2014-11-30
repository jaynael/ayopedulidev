<?php //if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Donasi extends CI_Controller{
	public function __construct(){
		parent::__construct();
		//$this->load->library('auth');
		$this->load->model(array('donasi_m'));
		//$this->load->helper(array('globals'));
		//$this->load->library(array('simpliparse','pquery','form_validation'));
		//$this->auth->restrict();
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
	}
	public function getdonasi($aid){
		$this->donasi_m->getdonasi($aid);
	}
	public function getalldonasi(){
		$this->donasi_m->getalldonasi();
	}
	public function update(){  
		if($_POST['action'] == 'update'){
			$did  = mysql_real_escape_string($_POST['did']);
			$totaldon = mysql_real_escape_string($_POST['totaldon']);
			//$poin  = mysql_real_escape_string($_POST['poin']);
			$uid = mysql_real_escape_string($_POST['uid']);
			$aid  = mysql_real_escape_string($_POST['aid']);  
			$this->load->model(array('donasi_m'));	
			$data['donasi_update'] = $this->donasi_m->update();
//			$uid = mysql_real_escape_string($_POST['uid']);
//			$data['poin_liat'] = $this->donasi_m->getpoin($uid);
//			$poinuser = $data['poin_liat']['poin'];
//			$data['poin_liat'] = $this->donasi_m->updatepoin($poinuser);

	?>
		<div class='alert alert-success'>
            <button type="button" class="close" data-dismiss="alert">×</button> ID Donasi <?php echo "$did"; ?> berhasi di update jumlah poin <?php // echo $poinuser ?> </div>
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
	<?php   }

		//$uid = $data['aksi_item']['uid'];
		//var_dump($uid);
	}
	public function cancel(){
		$this->load->model(array('donasi_m'));
		$data['aksi_item'] = $this->donasi_m->cancel();	
		//$uid = $data['aksi_item']['uid'];
		//var_dump($uid);
	}

	public function nonlog(){
		$this->donasi_m->nonlog();
	}
	public function donlogin(){
		$this->donasi_m->donlogin();		
	}
	public function addadmin(){
		$this->donasi_m->addadmin();		
	}
	
	
}