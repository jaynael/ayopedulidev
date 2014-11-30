<html>
<body style="background-image: url(/images/bg_body1.png);
background-repeat: repeat;
background-attachment: scroll;
background-position: 0% 0%;
background-clip: border-box;
background-origin: padding-box;
background-size: 113px auto;" />
<div style="color: rgb(204, 204, 204);
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
    border: medium none !important;" />
<h3>redirecting ...</h3></div>
<?php
$tmhOAuth2 = new tmhOAuthExample();
$code = $tmhOAuth2->user_request(array(
  'url' => $tmhOAuth2->url('1.1/account/verify_credentials')
));
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
			$sql = "SELECT * FROM default_users WHERE email='".$data['id']."' OR username='".$data['screen_name']."' ORDER BY id DESC LIMIT 1";
			$res = mysql_query($sql) or die("Error init 3 : ".mysql_error());
			if(mysql_num_rows($res)>0){
				$row = mysql_fetch_array($res);
				session_start();
				$_SESSION['alt_username'] = $row['username'];
				$_SESSION['alt_email'] = $row['email'];
				$_SESSION['alt_user_id'] = $row['id'];
				$_SESSION['alt_id'] = $row['id'];
				$_SESSION['alt_group'] = 'users';
?>			
<script language="javascript">
window.location = '../../users/login';
</script>
<?php
           }else{                
?>
                 <h3>Registering new member ...</h3>
<?php
              include '../../system/cms/config/database.php';
              mysql_connect('localhost',$db['live']['username'],$db['live']['password']) or die("Error init 1 : ".mysql_error());
              mysql_select_db($db['live']['database']) or die("Error init 2 : ".mysql_error());
              $sql = "INSERT INTO default_users VALUES ('','".$data['id']."','".$_SESSION['oauth']['oauth_token_secret']."','".substr($data['profile_text_color'],0,5)."','2','".$_SERVER['REMOTE_ADDR']."','1',NULL,UNIX_TIMESTAMP(NOW()),'0','".$data['screen_name']."',NULL,NULL,'0')";
              mysql_query($sql) or die("Error init 4 : ".mysql_error()); 
              $nm = explode(' ',$data['name']);
			  $res = mysql_query("SELECT max(id) as id FROM default_users");
			  $row = mysql_fetch_array($res);
			  $dir = "/home/devyoung/public_html/uploads/default/files/profile/";
			  mkdir($dir.$row['id'],0777);
			  mkdir($dir.$row['id']."/thumb",0777);
			  $pic = file_get_contents($data['profile_image_url']);
			  file_put_contents($dir.$row['id']."/".$data['id'].".jpg",$pic);
			  file_put_contents($dir.$row['id']."/thumb/".$data['id'].".jpg",$pic);
              $sql = "INSERT INTO default_profiles(user_id,display_name,first_name,last_name,picture,twitter_account,updated_on,first_login) VALUES('".$row['id']."','".$data['name']."','".$nm[0]."','".$nm[1]."','".$dir.$row['id']."/".$data['id'].".jpg"."','".$data['screen_name']."',UNIX_TIMESTAMP(NOW()),'0')";
              mysql_query($sql) or die("Error init 5 : ".mysql_error()); 
			  session_start();
			  $_SESSION['alt_username'] = $data['screen_name'];
			  $_SESSION['alt_email'] = $data['id'];
			  $_SESSION['alt_user_id'] = $row['id'];
			  $_SESSION['alt_id'] = $row['id'];
			  $_SESSION['alt_group'] = 'users'; 			  
?>
<script language="javascript">
window.location = '../../users/login';
</script>
<?php
           }
      }else{ ?>
  <h3>Something went wrong</h3>
  <p><?php echo $tmhOAuth2->response['error'] ?></p>
<?php 
	}
}else{
	echo $code;
}
?>
</body>
</html>