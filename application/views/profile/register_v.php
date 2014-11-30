<?php 
	//include('connection.php');
//			session_start();
//			if (isset($_SESSION['uid'])){
//            header('location:my-profile.php');
//}
?>
<?php $this->load->helper('url');
 $this->load->helper('html');
 $this->load->library('session');
 ?>
<script type="text/JavaScript">
$(document).ready(function() { 


	$('#submit').click(function(e){
	
		// Declare the function variables:
		// Parent form, form URL, email regex and the error HTML
		var $formId = $(this).parents('form');
		var formAction = $formId.attr('action');
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		var $error = $('<span class="error"></span>');

		// Prepare the form for validation - remove previous errors
		$('li',$formId).removeClass('error');
		$('span.error').remove();

		// Validate all inputs with the class "required"
		$('.required',$formId).each(function(){
			var inputVal = $(this).val();
			var $parentTag = $(this).parent();
			if(inputVal == ''){
				$parentTag.addClass('error').append($error.clone().text('Required Field'));
			}
			
			// Run the email validation using the regex for those input items also having class "email"
			if($(this).hasClass('email') == true){
				if(!emailReg.test(inputVal)){
					$parentTag.addClass('error').append($error.clone().text('Enter valid email'));
				}
			}
			
			// Check passwords match for inputs with class "password"
			if($(this).hasClass('password') == true){
				var password1 = $('#password-1').val();
				var password2 = $('#password-2').val();
				if(password1 != password2){
				$parentTag.addClass('error').append($error.clone().text('Passwords must match'));
				}
			}
		});

		// All validation complete - Check if any errors exist
		// If has errors
		if ($('span.error').length > 0) {
			
			$('span.error').each(function(){
				
				// Set the distance for the error animation
				var distance = 5;
				
				// Get the error dimensions
				var width = $(this).outerWidth();
				
				// Calculate starting position
				var start = width + distance;
				
				// Set the initial CSS
				$(this).show().css({
					display: 'block',
					opacity: 0,
					right: -start+'px'
				})
				// Animate the error message
				.animate({
					right: -width+'px',
					opacity: 1
				}, 'slow');
				
			});
		} else {
			$formId.submit();
		}
		// Prevent form submission
			e.preventDefault();
	});
	
	// Fade out error message when input field gains focus
	$('.required').focus(function(){
		var $parent = $(this).parent();
		$parent.removeClass('error');
		$('span.error',$parent).fadeOut();
	});
	$('#left').affix({
					offset: {
					  top: 250
					, bottom: function () {
						return (this.bottom = $('.bs-footer').outerHeight(true))
					  }
					}
				  })
});
</script>
<style type="text/css">
/* Tutorial CSS */
/*Form styles*/
.styled {
}
.styled fieldset { 
padding: 0 25px 20px 25px; 
position: relative;
}
.styled fieldset h3 { 
color: #555;
margin-bottom: 0.5em;
}
/* Form rows */
.styled .inp {
position: relative;
}
.styled label {
display: block; 
font-weight: bold; 
line-height: 24px; 
padding-top: 4px; 
color: #555;
}
.styled label.double {
padding-top: 0; 
line-height: 20px; 
margin-top: -3px;
}
.styled fieldset li.button-row {
margin-bottom: 0; 
padding: 5px 0 0; 
text-align: right;
}
/* Text input styles */
/* Default */
.styled input.text-input {
height: 22px;
width: 254px;
padding: 5px 8px; 
background: url(images/bg_input.png) no-repeat 0 0;  
border: none;   
font: normal 15px Arial, sans-serif;
color: #333;
line-height: 1em;
}
	/* Form Validation */
.styled span.error {
	font: bold 11px Arial, sans-serif;
	color:#fff;
	text-shadow: 1px 1px 1px #000;
	display: none; 
	background: url(/asset/images/arrow_error.png) no-repeat 0 center; 
	height: 11px;
	padding: 7px 15px 20px 20px; 
	line-height: 1em; 
	position: absolute; 
	top: 3px; 
	right: 0; 
	border-right: 1px solid #6c0202;
}
.styled fieldset li.error input.text-input {
background-position: 0 -64px;
}
</style>

<div id="login">
	<div class="wrapper">
    	<div class="category">
        	<div class="content-category" style="width:400px; float:none; margin:15px auto 10px; text-align:center;">
                <div class="title">
                	<h2 style="font-weight:normal;margin:15px 0px;">Register</h2>
                </div>
                <div class="log-fb">
                	<?php
					//var_dump($user_profile);			
			// if (@$user_profile):  // call var_dump($user_profile) to view all data
			//var_dump($user_profile); ?>
            <!--<ul class="nav nav-pills">
              <li class="dropdown">
              	Selamat Datang <?php //$user_profile['first_name']?>,
                <a class="dropdown-toggle" href="/dashboard">
                  <img class="img-thumbnail" data-src="holder.js/140x140" alt="140x140" src="https://graph.facebook.com/<?php// $user_profile['id']?>/picture?type=large" style="width: 40px; height: 40px; padding:0px;"> <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                  <a href="/welcome/logout">Logout</a>
                </ul>
              </li>
            </ul>
                <!--<div class="row">
                    <div class="col-lg-12 text-center">
                        Selamat Datang <a href="<?php//$user_profile['link']?>" class=""><?php//$user_profile['first_name']?></a>, <img class="img-thumbnail" data-src="holder.js/140x140" alt="140x140" src="https://graph.facebook.com/<?php//$user_profile['id']?>/picture?type=large" style="width: 40px; height: 40px; padding:0px;">
                        
                       <!-- <a href="<?= $logout_url ?>" class="btn btn-lg btn-primary btn-block" role="button">Logout</a>
                    </div>
                </div>-->
            <!--<?php  //else: ?>
                <a href="<?php // echo $login_url; ?>" class="btn btn-lg btn-primary btn-block" role="button">Login Facebook</a>
            <?php // endif; ?> -->
                </div>
                <div class="clearfix"></div>
            </div><!-- end.content-category-->
            <div class="item-aksi" style="width: 400px;float: none;margin: 0px auto 20px;padding: 20px;height: auto;overflow:inherit;">            
                <div class="register styled">
                <?php if (!isset($error)){
				echo "";
				}else{?>
					<div class="alert alert-danger"><?php echo $error?></div>
				<?php }?>
                	<?php echo validation_errors(); ?>
   						<?php echo form_open_multipart('register/new_user'); ?>
                    	<!--<div id='imageloadstatus' style='display:none'><img src="loader.gif" alt="Uploading...."/></div>-->
                    	<div class="form-group">
                        <label for="exampleInputEmail1">Nama Lengkap :</label>
                        <div class="inp">
                        	<input type="text" name="fullname" class="form-control required" id="fullname" placeholder="Nama Lengkap" value="<?php if (!isset($fullname)){}else { echo $fullname ; } ?>">
                        </div>
                      </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Nama Panggilan :</label>
                        <div class="inp">
                        	<input type="text" name="panggilan" class="form-control required" id="panggilan" placeholder="Nama Panggilan" value="<?php if (!isset($panggilan)){}else { echo $panggilan ; } ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Alamat Email :</label>
                        <div class="inp">
                        	<input type="email" name="email" class="form-control required" id="email" placeholder="Enter email" value="<?php if (!isset($email)){}else { echo $email ; } ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">No Hp :</label>
                        <div class="inp">
                        	<input type="text" name="handphone" class="form-control required" id="handphone" placeholder="No Handphone" value="<?php if (!isset($handphone)){}else { echo $handphone ; } ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile">Profile Picture</label>
                        <div id='imageloadbutton' class="inp">                        
                        <input type="file" name="photoimg" id="photoimg" class="form-control required" />
                        
                        </div>
                      </div>                      
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password :</label>
                        <div class="inp">
                        	<input type="password" name="password" class="form-control required" id="password" placeholder="Password">
                      	</div>
                      </div>
                        
                      <div class="form-group">                    
                      	<button type="submit" name="submit" id="submit" class="btn btn-primary">Gabung sekarang</button>
                      </div>
                   </form>
                </div>
            </div><!--end .item-aksi-->
        </div>        
    </div><!--end .wrapper-->
</div><!-- end #content-->