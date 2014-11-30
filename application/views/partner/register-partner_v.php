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
	width: 331px;
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
<div id="login" class="partner">
	<div class="wrapper">
                <div class="title">
                	<h2> "Bantu kami untuk lebih baik, Bergabunglah menjadi "GUDNESS PARTNER" ayopeduli.com dan mari sebarkan semangat kebaikan."</h2>
                </div>
            
            <div class="item-aksi" style="width: 750px;float: none;margin: 0px auto 20px;padding: 20px;height: auto;overflow:inherit;">
                <div class="register styled">
                <?php if (!isset($success)){ ?>	
	                <?php if (!isset($error)){
					echo "";
					}else{?>
						<div class="alert alert-danger"><?php echo $error?></div>
					<?php }?>
					<h2 class="regis">Gabung Menjadi Gudness Partner ayopeduli.com</h2>
                    <div class="form">
	                	<?php echo validation_errors(); ?>
	   						<?php 
							$attributes = array('class' => 'formis', 'id' => 'myform');
							echo form_open_multipart('partner/register', $attributes); ?>
	                    	<!--<div id='imageloadstatus' style='display:none'><img src="loader.gif" alt="Uploading...."/></div>-->                    	
	                      <div class="form-group">
	                        <label for="exampleInputEmail1">Nama Perusahaan :</label>
	                        <div class="inp">
	                        	<input type="text" name="perusahaan" class="form-control required" id="perusahaan" placeholder="Nama Perusahaan" value="<?php if (!isset($perusahaan)){}else { echo $perusahaan ; } ?>">
	                        </div>
	                      </div>	                      
	                      <div class="form-group">
	                        <label for="exampleInputEmail1">Bidang atau Jasa :</label>
	                        <div class="inp">
	                        	<select name="bidang" class="form-control required" id="bidang" style="width:330px;" >
	                        		<?php if (!isset($bidang)){ }else { echo "<option value='$bidang'>$bidang</option>" ; } ?>                        		
	                        		<option value="kuliner">Kuliner</option>
	                        		<option value="distro">Distro</option>
	                        		<option value="IT">IT Service</option>
	                        		<option value="trip">Trip</option>
	                        		<option value="electronik">Electronik</option>
	                        		<option value="Kesehatan">Kesehatan</option>
	                        		<option value="lainnya">Lain-Lain</option>
	                        	</select>
	                        </div>
	                      </div>
	                      <!--<div class="form-group">
	                        <label for="exampleInputEmail1">Pilih Gudness Partner :</label>
	                        <div class="inp">
	                        	<select name="jenang" class="form-control required" id="jenang" style="width:330px;" >
	                        		<?php // if (!isset($jenang)){ }else { echo "<option value='$jenang'>$jenang</option>" ; } ?>          		
	                        		<option value="regular">Donasi Rp.500.000 / Tahun</option>
	                        		<option value="premium">Donasi Rp.1.500.000 / Tahun</option>
	                        		<option value="exclusive"> Donasi Rp.10.000.000 / Tahun</option>
	                        	</select>
	                        </div>-->
	                        <!--<div class="plans">
		                        <div class="plan">
							      <h3 class="plan-title">Regular</h3>
							      <p class="plan-price">Rp.500.000 <span class="plan-unit">Donasi per bulan</span></p>
							      <ul class="plan-features">
							        <li class="plan-feature">50 <span class="plan-feature-name">Gudness Voucher</span></li>
							        <li class="plan-feature">5 <span class="plan-feature-name">Tweet terima kasih</span></li>
							        <li class="plan-feature">1 <span class="plan-feature-name">Ads Banner Partner</span></li>
							        <li class="plan-feature">15% <span class="plan-feature-name">Donasi untuk Aksi</span></li>
							      </ul>						      
							      <a class="plan-button"><input type="radio" name="type"<?php// if (isset($type)){if ($type=='regular'){ echo "checked";}else{}}else{};?> style="width: 34px !important;
	margin: 0px 0px 1px -26px;" value="regular">Pilih Partner</a>
							    </div>
							    <div class="plan plan-highlight">
							      <p class="plan-recommended">Recommended</p>
							      <h3 class="plan-title">Premium</h3>
							      <p class="plan-price">Rp.1.500.000 <span class="plan-unit">Donasi per bulan</span></p>
							      <ul class="plan-features">
							       	<li class="plan-feature">250 <span class="plan-feature-name">Gudness Voucher</span></li>
							        <li class="plan-feature">35 <span class="plan-feature-name">Tweet terima kasih</span></li>
							        <li class="plan-feature">1 <span class="plan-feature-name">Ads Banner Partner</span></li>
							        <li class="plan-feature">25% <span class="plan-feature-name">Donasi untuk Aksi</span></li>
							      </ul>
							      <a class="plan-button"><input type="radio" name="type" <?php// if (isset($type)){if ($type=='premium'){ echo "checked";}else{}}else{};?>  style="width: 34px !important;
	margin: 0px 0px 1px -26px;" value="premium">Pilih Partner</a>
							    </div>
							    <div class="plan">
							      <h3 class="plan-title">Platinum</h3>
							      <p class="plan-price">Rp.3.500.000 <span class="plan-unit">Donasi per bulan</span></p>
							      <ul class="plan-features">
							        <li class="plan-feature">350 <span class="plan-feature-name">Gudness Voucher</span></li>
							        <li class="plan-feature">50 <span class="plan-feature-name">Tweet terima kasih</span></li>
							        <li class="plan-feature">2 <span class="plan-feature-name">Exclusive Ads </span></li>
							        <li class="plan-feature">30% <span class="plan-feature-name">Donasi untuk Aksi</span></li>
							      </ul>
							      <a class="plan-button"><input type="radio" name="type"<?php// if (isset($type)){if ($type=='platinum'){ echo "checked";}else{}}else{};?>  style="width: 34px !important;
	margin: 0px 0px 1px -26px;" value="exclusive">Pilih Partner</a>
							    </div>
							    <div class="clearfix"></div>
							</div>
	                      </div>-->
	                      <div class="form-group">
	                        <label for="exampleInputEmail1">Email :</label>
	                        <div class="inp">
	                        	<input type="email" name="email" class="form-control required" id="email" placeholder="Enter email" value="<?php if (!isset($email)){}else { echo $email ; } ?>">
	                        </div>
	                      </div>
                          <div class="form-group">
	                        <label for="exampleInputEmail1">Alamat Perusahaan :</label>
	                        <div class="inp">
                            	<textarea name="address" class="form-control required" id="address"><?php if (!isset($address)){}else { echo $address ; } ?></textarea>	
	                        </div>
	                      </div>
                          <div class="form-group">
	                        <label for="exampleInputEmail1">Nama anda :</label>
	                        <div class="inp">
	                        	<input type="text" name="owner" class="form-control required" id="owner" placeholder="Nama Lengkap" value="<?php  if (!isset($owner)){}else { echo $owner ; } ?>">
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label for="exampleInputEmail1">No Hp :</label>
	                        <div class="inp">
	                        	<input type="text" name="handphone" class="form-control required" id="handphone" placeholder="No Handphone" value="<?php if (!isset($handphone)){}else { echo $handphone ; } ?>">
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label for="exampleInputFile">Profile Picture : Max size 1024px x 1024px</label>
	                        <div id='imageloadbutton' class="inp">                        
	                        <input type="file" name="photoimg" id="photoimg" class="form-control required" />
	                        
	                        </div>
	                      </div>                      
	                      <div class="form-group">
	                        <label for="exampleInputPassword1">Password :</label>
	                        <div class="inp">
	                        	<input type="password" name="password" class="form-control password required" id="password-1" placeholder="Password">
	                      	</div>
	                      </div>
                          <div class="form-group">
	                        <label for="exampleInputPassword1">Password Again:</label>
	                        <div class="inp">
	                        	<input type="password" name="password_again" class="form-control password required" id="password-2" placeholder="Password">
	                      	</div>
	                      </div>
	                        
	                      <div class="form-group submit-partner">                    
	                      	<button type="submit" name="submit" id="submit" class="btn btn-primary">Gabung sekarang</button>
                            <a href="<?php // echo base_url (); ?>/partner/login" class="btn btn-primary">Login Partner</a>
	                      </div>
	                   </form>
                    </div>
                    <div class="describe">
                    <h3 style="margin:0px 0px 10px;">FAQ Gudness Partner :</h3>
                    <!-- Nav tabs -->
                    <div class="panel-group" id="accordion">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                              Apa itu Gudness Partner?
                            </a>
                          </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                          <div class="panel-body">
                            Gudness Partner adalah fitur yang menghubungkan antara produk anda dengan aksi-aksi kebaikan di ayopeduli.com, anda bisa donasikan produk anda secara langsung untuk aksi sosial ataupun untuk para donatur dan volunteer aksi sosial yang bisa ditukarkan dengan Gudness Poin yang mereka kumpulkan.
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                              Kenapa saya harus bergabung?
                            </a>
                          </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                          <div class="panel-body">
                            Ayopeduli.com mempunyai cara baru dan seru dalam berbagi kepedulian, dan kami menawarkan cara baru tersebut untuk produk anda, ada banyak sekali aksi sosial, volunteer dan donatur di ayopeduli.com tentunya akan lebih baik jika kami bisa membantu menawarkan produk anda kepada mereka sebagai campaign kepedulian usaha anda untuk aksi-aksi sosial yang berdampak baik. 
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                              Bagaimana Cara Kerjanya ?
                            </a>
                          </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                          <div class="panel-body">
                            Ok, Wait.....
                            Cara kerja Gudness Partner it's simple :
                            <ul>
                           	<li>1. Kamu bisa segera daftar menjadi gudness partner dengan mengisi form disamping</li>
                            <li>2. Buat campaign untuk produk anda, tentukan campaignya jumlah voucher</li>
                            <li>3. Selesai, campaign anda akan di approve oleh ayopeduli.com dan kami segera promosikan untuk para volunteer menukarkan Gudness Poin mereka dengan voucher anda melalui campaign</li>
                            </ul>
                            Untuk info lebih lanjut silahkan kirimkan email ke partner@ayopeduli.com
                          </div>
                        </div>
                      </div>
                    </div>                    
                    
                    </div>
                    <div class="clearfix"></div>
	                <?php }else{?>
					<div class="alert alert-success">Terima kasih, Pendaftaran anda sebagai Gudness Partner telah kami terima, mohon periksa email <i><?php echo $email ?></i> anda untuk pengaktifan akun Gudness Partner</div>
					<div class=""><a href="/" class="btn btn-primary">Go to Home</a></div>
				<?php }?>
                </div>
            </div><!--end .item-aksi-->
        </div>        
    </div><!--end .wrapper-->
</div><!-- end #content-->
<script src="/asset/js/jquery.validate.min.js"></script>
<script src="/asset/js/additional-methods.min.js"></script>
<script type="text/javascript">
$(document).ready(function() { 
	//jQuery.validator.setDefaults({
//	  debug: true,
//	  success: "valid"
//	});
//	$( "#myform" ).validate({
//	  rules: {
//		password: "required",
//		password_again: {
//		  equalTo: "#password"
//		}
//	  }	  
//	});
});
</script>