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
<div class="logo" style="width:150px; margin:150px auto 0px;"><img alt="logo" src="../default/themes/yot/img/demo/logo-yot.png" width="150px"></a></div>
<!--<div class="themes"><img alt="demo/theme" src="../default/themes/yot/img/demo/theme.png"></div>-->
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
			
			include '../../system/cms/config/database.php';
			mysql_connect('localhost',$db['live']['username'],$db['live']['password']) or die("Error init 1 : ".mysql_error());
			mysql_select_db($db['live']['database']) or die("Error init 2 : ".mysql_error());
			$sql = "SELECT * FROM default_users WHERE email='".$data['screen_name']."@twitter.com' ORDER BY id DESC LIMIT 1";
			$res = mysql_query($sql) or die("Error init 3 : ".mysql_error());
			if(mysql_num_rows($res)==0){
				$sql = "SELECT * FROM default_profiles WHERE twitter_account='".$data['screen_name']."' ORDER BY id LIMIT 1";
				$res = mysql_query($sql) or die("Error init 3 : ".mysql_error());
                                if(mysql_num_rows($res)>0){
                                    $dtp = mysql_fetch_array($res);
                                    $sql = "SELECT * FROM default_users WHERE id=".$dtp['user_id'];
                                    $res = mysql_query($sql) or die("Error init 3 : ".mysql_error());
                                }

			}
			if(mysql_num_rows($res)>0){
			
				$row = mysql_fetch_array($res);
				$_SESSION['alt_username'] = $row['username'];
				$_SESSION['alt_email'] = $row['email'];
				$_SESSION['alt_user_id'] = $row['id'];
				$_SESSION['alt_id'] = $row['id'];
				$_SESSION['alt_group'] = 'users';
                                mysql_query("UPDATE default_users SET last_login=UNIX_TIMESTAMP(NOW()) WHERE id=".$row['id']);
           }else{                

              include '../../system/cms/config/database.php';
              mysql_connect('localhost',$db['live']['username'],$db['live']['password']) or die("Error init 1 : ".mysql_error());
              mysql_select_db($db['live']['database']) or die("Error init 2 : ".mysql_error());
              $sql = "INSERT INTO default_users VALUES ('','".$data['screen_name']."@twitter.com','".$_SESSION['oauth']['oauth_token_secret']."','".substr($data['profile_text_color'],0,5)."','2','".$_SERVER['REMOTE_ADDR']."','1',NULL,UNIX_TIMESTAMP(NOW()),'0','".$data['screen_name']."',NULL,NULL,'0')";
              mysql_query($sql) or die("Error init 4 : ".mysql_error()); 
              $nm = explode(' ',$data['name']);
			  $res = mysql_query("SELECT max(id) as id FROM default_users");
			  $row = mysql_fetch_array($res);
			  $dir = "/home/youngont/public_html/uploads/default/files/profile/";
			  mkdir($dir.$row['id'],0777);
			  mkdir($dir.$row['id']."/thumb",0777);
			  $pic = file_get_contents($data['profile_image_url']);
			  file_put_contents($dir.$row['id']."/".$row['id'].".jpg",$pic);
			  file_put_contents($dir.$row['id']."/thumb/".$row['id'].".jpg",$pic);
              $sql = "INSERT INTO default_profiles(user_id,display_name,first_name,last_name,picture,twitter_account,twitter_access_token,twitter_access_token_secret,updated_on,first_login) VALUES('".$row['id']."','".$data['name']."','".$nm[0]."','".$nm[1]."','".$dir.$row['id']."/".$row['id'].".jpg"."','".$data['screen_name']."','".$_SESSION['oauth']['res_oauth_token']."','".$_SESSION['oauth']['res_oauth_token_secret']."',UNIX_TIMESTAMP(NOW()),'0')";
              mysql_query($sql) or die("Error init 5 : ".mysql_error()); 
			 file_get_contents("http://www.youngontop.com/forum/add_user.php?username=".$data['screen_name']."&password=".$_SESSION['oauth']['oauth_token_secret']."&email=".$data['screen_name']."@twitter.com&gid=2&key=mysecretkey");
			  $_SESSION['alt_username'] = $data['screen_name'];
			  $_SESSION['alt_email'] = $data['screen_name']."@twitter.com";
			  $_SESSION['alt_user_id'] = $row['id'];
			  $_SESSION['alt_id'] = $row['id'];
			  $_SESSION['alt_group'] = 'users'; 	
                          mysql_query("INSERT INTO default_cv(id_user,name,email) VALUES('".$row['id']."','".$data['name']."','".$data['screen_name']."@twitter.com')");		  
                          mysql_query("INSERT INTO default_quotes(title,slug,user_id,quotes_content,datecreated,set_top,views,status,recordid) VALUES('Hello I am new user','hello-i-am-new-user-".$row['id']."','".$row['id']."','Hello I am new user',NOW(),0,0,0,NULL)");

           }
?>
			<script language="javascript">
            	window.location = '../../users/login';
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