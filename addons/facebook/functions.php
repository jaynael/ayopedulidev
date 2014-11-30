<?php
require 'dbconfig.php';
function checkuser($fuid,$funame,$ffname,$femail){
    $check = mysql_query("select * from ap_user where uid='$fuid' or email='$femail' limit 1");
	$check = mysql_num_rows($check);
	$pass = md5($fuid);	
	$pict = file_get_contents("http://graph.facebook.com/".$fuid."/picture?type=large");
	file_put_contents('/home/ayopedul/public_html/upload/user/'.$pass.'.jpg',$pict);
	if (empty($check)) { // if new user . Insert a new record	
		$query = "INSERT INTO ap_user VALUES ('$femail','','','$pass','$funame','$ffname','0','0','0','','','$fuid','$pass.jpg','','')";
		$dt_exist = 0;
	} else {   // If Returned user . update the user record		
		$query = "UPDATE ap_user SET photo='".$pass.".jpg' where uid='$fuid' or email='$femail'";
		$dt_exist = mysql_fetch_array($check);
	}
	mysql_query($query) or die(mysql_error());
	return $dt_exist;
}?>
