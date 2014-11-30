<?php //if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Volunteer extends CI_Controller{
	public function __construct(){
		parent::__construct();
		//$this->load->library('auth');
		$this->load->model(array('volunteer_m'));
		//$this->load->helper(array('globals'));
		//$this->load->library(array('simpliparse','pquery','form_validation'));
		//$this->auth->restrict();
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
	}
	public function getvolun($aid){
		$this->volunteer_m->getvolun($aid);
	}
	public function getalldonasi(){
		$this->donasi_m->getalldonasi();
	}
	public function new_volunteer(){  
		if($_POST['action'] == 'insert'){
			$uid = mysql_real_escape_string($_POST['uid']);
			$aid  = mysql_real_escape_string($_POST['aid']); 
			$fullname  = mysql_real_escape_string($_POST['fullname']);  
			$this->load->model(array('volunteer_m'));	
			$data['volunteer_insert'] = $this->volunteer_m->insert();

	?>
		<div class='alert alert-success'>
            <button type="button" class="close" data-dismiss="alert">×</button> Terima kasih <?php echo "$fullname"; ?>, Kamu telah menjadi Volunteer aksi ini<?php //echo $aksi_item['judul'] ?> Mari sebarkan aksi ini untuk dapatkan dukungan lebih banyak lagi</div>
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
	
	
}