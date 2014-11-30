<?php
require 'functions.php';
require 'src/facebook.php';  // Include facebook SDK file
//require 'functions.php';  // Include functions
$facebook = new Facebook(array(
  'appId'  => '346932088812889',   // Facebook App ID 
  'secret' => '98801c781452a629ac7fc4bd2db2c219',  // Facebook App Secret
  'cookie' => true,	
));
$user = $facebook->getUser();

if ($user) {
  try {
    $user_profile = $facebook->api('/me');
  	    $fbid = $user_profile['id'];                 // To Get Facebook ID
 	    $fbuname = $user_profile['username'];  // To Get Facebook Username
 	    $fbfullname = $user_profile['name']; // To Get Facebook full name
	    $femail = $user_profile['email'];    // To Get Facebook email ID
	if(!isset($fbuname)||trim($fbuname)==""){
		$fbn = explode(' ',$fbfullname);
		$fbuname = $fbn[0];
	}
	/* ---- Session Variables -----*/
	    $_SESSION['FBID'] = $fbid;           
	    $_SESSION['USERNAME'] = $fbuname;
        $_SESSION['FULLNAME'] = $fbfullname;
	    $_SESSION['EMAIL'] =  $femail;
           $res = checkuser($fbid,$fbuname,$fbfullname,$femail);    // To update local DB
		   if($res>0){
		   		$_SESSION['FBID'] = $res['uid'];
				$_SESSION['EMAIL'] = $res['email'];
		   }
  } catch (FacebookApiException $e) {
    error_log($e);
   $user = null;
  }
}
if ($user) {
?>
<h3>Redirecting ...</h3>
<form accept-charset="utf-8" method="post" name="login" action="/login/verifylogin" style="display:none;">
<div class="form-group">
<label for="exampleInputEmail1">Alamat Email :</label>
<input type="email" placeholder="Enter email" id="email" class="form-control" name="email" value="<?php echo $femail; ?>" autocomplete="off" >
</div>
<div class="form-group">
<label for="exampleInputPassword1">Password :</label>
<input type="password" placeholder="Password" id="password" class="form-control" name="password" value="<?php echo $fbid; ?>"autocomplete="off" >
<input type="hidden" value="true" id="submitted" name="submitted" >
</div>                     
</form>
<script language="javascript">
document.login.submit();
</script>
<?php
} else {
 $loginUrl = $facebook->getLoginUrl(array(
		'scope'		=> 'email,public_profile', // Permissions to request from the user
		));
 header("Location: ".$loginUrl);
}
?>
