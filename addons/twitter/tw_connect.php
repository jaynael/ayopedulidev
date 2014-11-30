<?php
include 'function.php';
require 'tmhOAuthExample.php';
$tmhOAuth = new tmhOAuthExample();
$params = uri_params();
if (!isset($params['oauth_token'])) {
	request_token($tmhOAuth);
} else {
	access_token($tmhOAuth);
?>
<html>
<head>
<title>Processing Twitter Connect</title>
<style type="text/css">
<!--
body {
	background-image: url(/images/bg_body1.png);
	background-repeat: repeat;
	background-attachment: scroll;
	background-position: 0% 0%;
	background-clip: border-box;
	background-origin: padding-box;
	background-size: 113px auto;
}
.oneColFixCtr #container {
	position:absolute;
	top:250px;
	left:300px;
	width: 780px;  /* using 20px less than a full 800px width allows for browser chrome and avoids a horizontal scroll bar */
	background: #FFFFFF;
	margin: 0 auto; /* the auto margins (in conjunction with a width) center the page */
	border: 1px solid #000000;
	text-align: left; /* this overrides the text-align: center on the body element. */
}
.oneColFixCtr #mainContent {
	padding: 0 20px; /* remember that padding is the space inside the div box and margin is the space outside the div box */
}
.bar {
	color: rgb(204, 204, 204);
    font-size: 8px;
    background: none repeat scroll 0px 0px rgb(0, 130, 161);
    padding: 7px 14px;
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 20px;
    z-index: 9999;
    box-shadow: -3px 1px 5px rgb(34, 34, 34);
    border: medium none !important;
}
.themes {
    float: left;
	left: 100px;
	top: 50px;
    margin: 0 35%;
    position: absolute;
    width: 320px;
    z-index: 0;
}
-->
</style>
</head>
<body class="oneColFixCtr">
<div class="bar">&nbsp;</div>
<div class="logo" style="width:150px; margin:150px auto 0px;"><img alt="logo" src="../../default/themes/yot/img/demo/logo-yot.png" width="150px"></a></div>
<!--<div class="themes"><img alt="demo/theme" src="/default/themes/yot/img/demo/theme.png"></div>-->
<div id="mainContent" align="center">
<h3>Your request is being processed ... <br  />Do not press any key ...  <br  /><br  /><img src="/images/framely.gif" border="1" /></h3>  
</div>
<?php 

	$tmhOAuth2 = new tmhOAuthExample();
	$code = $tmhOAuth2->user_request(array('url' => $tmhOAuth2->url('1.1/account/verify_credentials')));
	if ($code == 200) {
		   
		   $data = json_decode($tmhOAuth2->response['response'], true);
		   
		  	if (isset($data['id'])) {
				$code = $tmhOAuth2->user_request(array(
				  'url' => $tmhOAuth2->url('1.1/statuses/oembed'),
				  'params' => array(
					'id' => $data['status']['id_str']
				  )
			));
			
  	    $fbid = $data['screen_name'];                 
 	    $fbuname = "";  
 	    $fbfullname = $data['name'];
	    $femail = $data['screen_name'].'@twitter.com';    
		
		if(!isset($fbuname)||trim($fbuname)==""){
			$fbn = explode(' ',$fbfullname);
			$fbuname = $fbn[0];
		}
		/* ---- Session Variables -----*/
		$_SESSION['FBID'] = $data['screen_name'];           
		$_SESSION['USERNAME'] = $data['screen_name'];
		$_SESSION['FULLNAME'] = $data['name'];
		$_SESSION['EMAIL'] =  $data['screen_name'].'@twitter.com';
	   	$res = checkuser($fbid,$fbuname,$fbfullname,$femail,$data['profile_image_url']);    // To update local DB
	   	if($res>0){
			$_SESSION['FBID'] = $data['screen_name'];
			$_SESSION['EMAIL'] = $data['screen_name'].'@twitter.com';
	   	}			

?>
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
		   
      	}else{ 
?>
			<h3>Something went wrong</h3>
<?php 
		}
	}else{
?>
        <h3>Something went wrong</h3>
<?php
	}
}
?>
</body>
</html>
