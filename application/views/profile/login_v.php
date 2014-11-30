<?php 
	//include('connection.php');
//			session_start();
//			if (isset($_SESSION['uid'])){
//            header('location:my-profile.php');
//}
?>
<div id="login">
	<div class="wrapper">
    	<div class="category">
        	<div class="content-category" style="width:350px; float:none; margin:15px auto 10px; text-align:center;">
            	
                <div class="title">
                	<h2>Login</h2>
                </div>
                <div class="clearfix"></div>
            </div><!-- end.content-category-->
            <div class="item-aksi" align="center" style="width: 375px;float: none;margin: 0px auto 100px;padding: 20px;height: auto;">           <a href="/addons/facebook/fbconnect.php"><img src="/asset/images/facebook.png" border="0" /></a><br /><a href="/addons/facebook/tw_connect.php"><img src="/asset/images/twitter.png" border="0" /></a><br /><br /> 
                <div id="#result"></div>
                <div class="register">
                	<!--<form role="form" method="post" action="/login/validate/">   -->                    
                    <!--Facebook Botton-->
                    <!--<div class="login-social" style="margin: 0px 0px 20px;">
                   		<a href="#"><img src="<?php // echo base_url(); ?>asset/images/facebook.png" id="facebook"></a>							
							
							
							<div id="fb-root"></div>
							
							   <script type="text/javascript">
							  window.fbAsyncInit = function() {
								  //Initiallize the facebook using the facebook javascript sdk
								 FB.init({ 
								   appId:'<?php // echo $this->config->item('appID'); ?>', // App ID 
								   cookie:true, // enable cookies to allow the server to access the session
								   status:true, // check login status
								   xfbml:true, // parse XFBML
								   oauth : true //enable Oauth 
								 });
							   };
							   //Read the baseurl from the config.php file
							   (function(d){
									   var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
									   if (d.getElementById(id)) {return;}
									   js = d.createElement('script'); js.id = id; js.async = true;
									   js.src = "//connect.facebook.net/en_US/all.js";
									   ref.parentNode.insertBefore(js, ref);
									 }(document));
								//Onclick for fb login
							 $('#facebook').click(function(e) {
								FB.login(function(response) {
								  if(response.authResponse) {
									  parent.location ='<?php // echo base_url(); ?>login/fblogin'; //redirect uri after closing the facebook popup
								  }
							 },{scope: 'email,read_stream,publish_stream,user_birthday,user_location,user_work_history,user_hometown,user_photos'}); //permissions for facebook
							});
							   </script>
                     </div>
											   <!--end .facebook-->
                    <?php echo validation_errors(); ?>
   					<?php echo form_open('login/verifylogin'); ?>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Alamat Email :</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password :</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        <input type="hidden" name="submitted" id="submitted" value="true" />
                      </div>                     
                      <button type="submit" name="submit" id="submit" class="btn btn-primary">Login sekarang</button>
                      <a href="<?php // echo base_url (); ?>/register" class="btn btn-primary">Register</a>
                   </form>                   
                </div>
                <p style="margin:20px 0px 0px;">Lupa Password ?, Klik <a href="#">Disini</a></p>
            </div><!--end .item-aksi-->            
        </div>        
    </div><!--end .wrapper-->
</div><!-- end #content-->