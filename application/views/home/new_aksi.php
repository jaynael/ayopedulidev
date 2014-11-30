<script type="text/javascript" src="/asset/js/jquery-1.7.1.min.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
  <!--<script src="http://code.jquery.com/jquery-1.10.2.js"></script>-->
  <script src="http://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
 <!-- jQuery Version 1.11.0 
    <script src="/asset/home/js/jquery-1.11.0.js"></script>-->
   <script src="/asset/js/jquery.validate.min.js"></script>
<script src="/asset/js/additional-methods.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/asset/home/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/asset/home/js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript
    <script src="asset/home/js/plugins/morris/raphael.min.js"></script>
    <script src="asset/home/js/plugins/morris/morris.min.js"></script>
    <script src="asset/home/js/plugins/morris/morris-data.js"></script> -->

    <!-- Custom Theme JavaScript -->
    <script src="/asset/home/js/sb-admin-2.js"></script>    
<script src="/asset/ckeditor/ckeditor.js"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
                <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>-->
  				<script src="/asset/js/jquery.tinylimiter.js"></script>
                <script type="text/javascript">
					$(document).ready(function() {
						CKEDITOR.config.removeDialogTabs = 'image:advanced;link:advanced;flash:advanced;creatediv:advanced;editdiv:advanced';
						CKEDITOR.replace( 'descis' );
						CKEDITOR.plugins.add('ajaxsave',
						{
							init: function(editor)
							{
								var pluginName = 'ajaxsave';
								editor.addCommand( pluginName,
								{
									exec : function( editor )
									{
										$.post("result.php", {
											data : editor.getSnapshot()
										} );
									},
									canUndo : true
								});
								editor.ui.addButton('Ajaxsave',
								{
									label: 'Save Ajax',
									command: pluginName,
									className : 'cke_button_save'
								});
							}
						});
						//$('.jumlahtarget').number( true, 0 );
						var elem = $("#chars");
						$("#judul").limiter(30, elem);
						
						var elemdescing = $("#elemdescing");
						$("#descsing").limiter(70, elemdescing);
						$('.collapse').collapse()
						$('#butuh').hide();
						$("#datepicker").datepicker();
						$('#donasi ').removeClass('required');
						$('.tidak .datepicker').removeClass('required');
						$('#donasi').change(function(){		
							$('.gak').hide();	
							$('#' + $(this).val()).show().addClass('butuh');
							$('.jumlahtarget').val('').addClass('required');
							//$('.datepicker').val('').addClass('required');
						});
						
						$('#submit').click(function(e){
							//alert('submit');
						
							// Declare the function variables:
							// Parent form, form URL, email regex and the error HTML
							//var $formId = $(this).parents('form');
							var $formId = $('#form');
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
								//alert('submit');
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
<div id="page-wrapper">	
    <div class="row"> 
    	<div class="formaksi right buataksi">     
        <!-- progressbar -->
            <div class="progress-step">
              <div class="circle active">
                <span class="label">1</span>
                <span class="title">Mulai</span>
              </div>
              <span class="bar"></span>
              <div class="circle">
                <span class="label">2</span>
                <span class="title">Photo</span>
              </div>
              <span class="bar "></span>
              <div class="circle">
                <span class="label">3</span>
                <span class="title">Administrasi</span>
              </div>
              <span class="bar"></span>
              <div class="circle">
                <span class="label">4</span>
                <span class="title">Review</span>
              </div>
              <span class="bar"></span>
              <div class="circle">
                <span class="label">5</span>
                <span class="title">Publish</span>
              </div>
            </div>
            <div class="clearfix"></div> 
            <h2 style="text-align:center;">Buat Aksi Sosial, Buat Positive Impact!</h2>  
            <?php if (!isset($thanks)){
				echo "";
			}else{?>
				<div class="alert alert-success"><?php echo $thanks?></div>
			<?php } ?>
            <?php if (!isset($error)){
				echo "";
			}else{?>
				<div class="alert alert-danger"><?php echo $error?></div>
			<?php }			
			?>
            <?php if (!isset($success)){
				echo "";
			}else{?>
				<div class="alert alert-success"><?php echo $success?></div>
			<?php }			
			?>
    	<!--<form name="buataksi" method="post" class="styled buataksi" action="/home/new_act/step2" enctype="multipart/form-data">-->
       <?php if (!isset($edit)){ ?>
       		<?php echo validation_errors(); ?>
	   						<?php 
							$attributes = array('class' => 'styled buataksi', 'id' => 'form');
							echo form_open_multipart('/home/new_act/step2', $attributes); ?>
       		
       <?php }else{ ?>
       		<?php echo validation_errors(); ?>
	   						<?php 
							$attributes = array('class' => 'styled buataksi', 'id' => 'form');
							echo form_open_multipart('/home/edit_act/step2/'.$aid, $attributes); ?>
       
       <?php }?>             
        
        <div class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                  Pilih Kategori Aksi Kamu!
                </a>
              </h4>
            </div>
            <div>
              <div class="panel-body">  
              	<div class="cat">           
                    <div class="category">
                    	<div class="inp">
                        	<input type="radio" name="cat" class="radio required"                           
                            <?php if (!isset($cat)){}else { 
									if ($cat == 'kesehatan'){ ?>
                                    checked="checked"
							<?php }
							}?>
                             value="kesehatan" />
                        </div>
                        <div class="content-category">
                            <div class="image">
                                <img src="/asset/images/Kesehatan.png" />
                            </div>
                            <div class="title">
                                <h2>Kesehatan</h2>
                            </div>
                            <div class="clearfix"></div>
                        </div><!-- end.content-category-->            
                    </div>
                    <div class="category">
                    	<div class="inp">
                        	<input type="radio" name="cat" <?php if (!isset($cat)){}else { 
									if ($cat == 'pendidikan'){ ?>
                                    checked="checked"
							<?php }							
							 } ?>class="radio required" value="pendidikan" />
                        </div>
                        <div class="content-category">
                            <div class="image">
                                <img src="/asset/images/education.png" />
                            </div>
                            <div class="title">
                                <h2>Pendidikan</h2>
                            </div>
                            <div class="clearfix"></div>
                        </div><!-- end.content-category-->            
                    </div>
                    <div class="category">
                    	<div class="inp">
                        	<input type="radio" name="cat" class="radio required" <?php if (!isset($cat)){}else { 
									if ($cat == 'lingkungan'){ ?>
                                    checked="checked"
							<?php }							
							 } ?> value="lingkungan" />
                        </div>
                        <div class="content-category">
                            <div class="image">
                                <img src="/asset/images/lingkungan.png" />
                            </div>
                            <div class="title">
                                <h2>Lingkungan</h2>
                            </div>
                            <div class="clearfix"></div>
                        </div><!-- end.content-category-->            
                    </div>        
                    <div class="clearfix"></div> 
                </div>                   
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                 Judul dan Deskripsi Aksi Sosial
                </a>
              </h4>
            </div>
            <div id="collapseTwo">
              <div class="panel-body">
                	<label for="exampleInputEmail1"><h4>Judul / Nama aksi :</strong></h4></label>
                    <div class="inp">
                    	<input type="text" name="judul" class="input form-control required" id="judul"  value="<?php if (!isset($judul)){}else { echo $judul ; } ?>">
                         <input type="hidden" name="uid" class="input form-control" id="uid"  value="<?php echo $user_item['uid']?>">
                    </div>
                    <p>Tuliskan judul aksimu sesingkat dan sejelas mungkin, Agar mudah dimengerti oleh donatur dan volunteer, Tersedia <span id="chars">30</span> Karakter</p>
                	<label for="exampleInputEmail1"><h4>Deskripsi singkat aksi :</strong></h4></label>
                    <!--<textarea name="descsingkat" class="desc" style="width: 595px;height: 130px;" ></textarea>-->
                    <div class="inp">
                    	<input type="text" name="descsing" class="input form-control required" id="descsing" value="<?php if (!isset($descsing)){}else { echo $descsing ; } ?>">
                    </div>
                    <p>Tuliskan descripsi singkat tentang aksimu, Tersedia <span id="elemdescing">70</span> Karakter</p>                	<label for="exampleInputEmail1"><h3>Deskripsi aksi</h3></label>
                    <div class="inp">
                    <textarea  cols="100" id="descis" name="deskripsi" rows="40" class="form-control">
                    <?php if (!isset($deskripsi)){?> 
					<?php }else{?>
                    <?php echo $deskripsi;
                    } ?>
                    </textarea>
                    </div>
                    <p>Jelaskan secara lengkap tentang aksi ini</p>    
                               
                </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                  Target Donasi
                </a>
              </h4>
            </div>
            <div id="collapseThree">
              <div class="panel-body">
                	<label for="exampleInputEmail1"><h4>Target donasi terkumpul :</h4></label>                       
                        <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon">Rp.</div>
                              <input class="form-control required" type="number" value="<?php if (!isset($jumlahtarget)){}else { echo $jumlahtarget ; } ?>" name="jumlahtarget" placeholder="1000000">
                            </div>
                          </div>
                        <p>Pastikan target yang ingin anda capai adalah rasional untuk aksi anda. TANPA titik dan koma Ex.Rp.500000</p>
                        
                        <label for="exampleInputEmail1"><h4>Kapan Kampanye Aksi ini akan berakhir :</h4></label>
                        <div class="inp">
                        	<input type="text" placeholder="01/30/2014" name="tgl" id="datepicker" class="datepicker input form-control required" value="<?php if (!isset($selesai)){}else { echo $selesai ; } ?>">
                        </div>
                        <p>Kapan penggalangan dana ini akan berakhir, pastikan seminggu sebelum pelaksanaan aksi kamu.</p>             
                        <!--<label for="exampleInputEmail1"><h4>Tambahkan code youtube embed</h4></label>
                        <div class="inp">
                        	<input type="text" name="vid" class=" input form-control" placeholder="iframe">
                        </div>
                        <p>Buat video campaign sosial kamu dan masukan embed video kamu disini ex. <code></code></p>-->
                       <input type="hidden" name="uid" class="input form-control" id="uid" value="<?php echo $user_item['uid'] ?>" >
                       <input type="hidden" name="email" class="input form-control" id="email" value="<?php echo $user_item['email'] ?>" >
                        <?php if (!isset($aid)){?> 
							<?php }else{?>
                            <input type="hidden" name="aid" id="aid" value="<?php echo $aid ?>" />
                        <?php ;} ?>
                       <input type="hidden" name="submitted" id="submitted" value="true" />
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                  Tentang diri anda sebagai fasilitator
                </a>
              </h4>
            </div>
            <div id="collapseThree">
              <div class="panel-body">
                	<label for="exampleInputEmail1"><h4>Ceritakan siapa diri anda</h4></label>                       
                        <div class="form-group">
                            <textarea name="fasil" cols="80" id="fasil" rows="5" class="form-control required"><?php if (!isset($fasil)){}else { echo $fasil ; } ?></textarea>
                          </div>
                        
                        <label for="exampleInputEmail1"><h4>Apa peran anda dalam Aksi sosial ini?</h4></label>
                        <div class="inp">
                        	<input type="text" placeholder="Ketua/Sekretaris/Bendahara/dll" name="peran" id="peran" class="form-control required" value="<?php if (!isset($peranfasil)){}else { echo $peranfasil ; } ?>">
                        </div>                        
                      </div>
                    </div>
                  </div>
                </div>            
               <div class="submit">
               			<button name="submit" id="submit" class="btn btn-submit button btn-primary"> Next </button>
               </div>
            </form>    
    </div>    
</div>

    