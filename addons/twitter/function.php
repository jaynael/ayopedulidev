<?php
session_start();
include '../../application/config/database.php';
mysql_connect('localhost',$db['default']['username'],$db['default']['password']) or die("Error init 1 : ".mysql_error());
mysql_select_db($db['default']['database']) or die("Error init 2 : ".mysql_error());
function checkuser($fuid,$funame,$ffname,$femail,$url){
    $check = mysql_query("select * from ap_user where uid='$fuid' or email='$femail' limit 1");
	$check = mysql_num_rows($check);
	$pass = md5($fuid);	
	$pict = file_get_contents($url);
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
}
function php_self($dropqs=true) {
  $protocol = 'http';
  if (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') {
    $protocol = 'https';
  } elseif (isset($_SERVER['SERVER_PORT']) && ($_SERVER['SERVER_PORT'] == '443')) {
    $protocol = 'https';
  }

  $url = sprintf('%s://%s%s',
    $protocol,
    $_SERVER['SERVER_NAME'],
    $_SERVER['REQUEST_URI']
  );

  $parts = parse_url($url);

  $port = $_SERVER['SERVER_PORT'];
  $scheme = $parts['scheme'];
  $host = $parts['host'];
  $path = @$parts['path'];
  $qs   = @$parts['query'];

  $port or $port = ($scheme == 'https') ? '443' : '80';

  if (($scheme == 'https' && $port != '443')
      || ($scheme == 'http' && $port != '80')) {
    $host = "$host:$port";
  }
  $url = "$scheme://$host$path";
  if ( ! $dropqs)
    return "{$url}?{$qs}";
  else
    return $url;
}


function error($msg) {
?>
  <h3>Something went wrong</h3>
  <p><?php echo $msg ?></p>
<?php
}

function uri_params() {
  $url = parse_url($_SERVER['REQUEST_URI']);
  $params = array();
  foreach (explode('&', $url['query']) as $p) {
    list($k, $v) = explode('=', $p);
    $params[$k] =$v;
  }
  return $params;
}

function request_token($tmhOAuth) {
  $code = $tmhOAuth->apponly_request(array(
    'without_bearer' => true,
    'method' => 'POST',
    'url' => $tmhOAuth->url('oauth/request_token', ''),
    'params' => array(
      'oauth_callback' => php_self(false),
    ),
  ));

  if ($code != 200) {
    error("There was an error communicating with Twitter. {$tmhOAuth->response['response']}");
    return;
  }

  // store the params into the session so they are there when we come back after the redirect
  $_SESSION['oauth'] = $tmhOAuth->extract_params($tmhOAuth->response['response']);

  // check the callback has been confirmed
  if ($_SESSION['oauth']['oauth_callback_confirmed'] !== 'true') {
    error('The callback was not confirmed by Twitter so we cannot continue.');
  } else {
    $url = $tmhOAuth->url('oauth/authorize', '') . "?oauth_token={$_SESSION['oauth']['oauth_token']}";
	header('Location: '.$url);
?>
<p>Please <a href="<?php echo $url ?>">Login</a></p>
<?php
  }
}

function access_token($tmhOAuth) {
  $params = uri_params();
  if ($params['oauth_token'] !== $_SESSION['oauth']['oauth_token']) {
    error('The oauth token you started with doesn\'t match the one you\'ve been redirected with. do you have multiple tabs open?');
    session_unset();
    return;
  }

  if (!isset($params['oauth_verifier'])) {
    error('The oauth verifier is missing so we cannot continue. did you deny the appliction access?');
    session_unset();
    return;
  }

  // update with the temporary token and secret
  $tmhOAuth->reconfigure(array_merge($tmhOAuth->config, array(
    'token'  => $_SESSION['oauth']['oauth_token'],
    'secret' => $_SESSION['oauth']['oauth_token_secret'],
  )));

  $code = $tmhOAuth->user_request(array(
    'method' => 'POST',
    'url' => $tmhOAuth->url('oauth/access_token', ''),
    'params' => array(
      'oauth_verifier' => trim($params['oauth_verifier']),
    )
  ));

if ($code == 200) {
    $oauth_creds = $tmhOAuth->extract_params($tmhOAuth->response['response']);
    $_SESSION['oauth']['res_oauth_token'] = $oauth_creds['oauth_token'];
    $_SESSION['oauth']['res_oauth_token_secret'] = $oauth_creds['oauth_token_secret'];
  }
}
?>