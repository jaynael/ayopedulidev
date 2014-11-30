<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>-->
<script type="text/JavaScript">
$(document).ready(function() { 


	$('.btn-submit').click(function(e){
	
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
<div id="quote">
	<div class="wrapper">
        <div class="center">
            <h1 class="quote" style="text-align:center;margin:45px 0px;">
                Buat Dan Kampanyekan Aksi Sosialmu <br /> Untuk Dapatkan Dukungan Lebih Banyak!.
            </h1>
        </div>
    </div>
</div>
<div id="content" class="buataksi">	
	<div class="wrapper">
    	<div class="left" id="left" style="width:300px;">
        	<div class="title"><h3 style="text-align: center;margin: 12px 0px;">Pratinjau</h3></div>
    		<div class="item-aksi">
                <div class="image">
                    <a href="aksi-detail.php"><img src="/asset/images/zildam.png" /></a>
                </div>
                <div class="title">
                    <a href="aksi-detail.php"><h2>Zildam </h2></a>         
                </div>
                <div class="desc">
                    <div class="desc-top">
                        <div class="text">Target Donasi</div>
                        <div class="info target" style="float:right;">
                            <p>Rp.2.100.000</p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="progress simpleProgress progressBlue ui-progressbar ui-widget ui-widget-content ui-corner-all" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="89">80<div class="ui-progressbar-value ui-widget-header ui-corner-left" style="width: 50%;"></div></div>
                        <div class="info terkumpul" style="float:left;">
                            <p>Rp.500.000</p>
                        </div>
                        <div class="text terkumpul">Donasi Terkumpul</div>
                        <div class="clearfix"></div>
                    </div><!--end .desc-top-->
                    <div class="desc-bottom">
                    	<a href="#"><h4>40 Hari lagi Aksi Berakhir</h4></a>
                    </div>
                    <div class="desc-bottom">
                    	<a href="aksi-detail.php"><h4>Dukung Aksi Ini</h4></a>
                    </div>
                    <div class="desc-middle">
                    	<div class="fasilitator">
                        	<div class="image">
                            	<img src="/asset/img/avatar9.jpg" />
                            </div>
                            <div class="desc">
                            	<h3>Jaenal Gufron</h3>
                                <p>Founder ayopeduli.com, proven fasilitator ayopeduli wilayah Jakarta</p>
                            </div>
                            <div class="clearfix"></div>
                            <h4>Fasilitator</h4>
                        </div>
                    </div><!--end .desc-middle-->                    
                </div><!-- .desc--> 
            </div><!--end .item-aksi-->
        </div>
        <div class="right buataksi">
        	<?php echo validation_errors(); ?>
			<?php // echo form_open('aksi/save'); ?>
        	<form name="buataksi" method="post" class="styled" action="/aksi/save" enctype="multipart/form-data">
            <div class="section">
                <h2 style="text-align:center;">Pilih Kategori Aksi</h2>
                    <div class="category">
                    	<div class="inp">
                        	<input type="radio" name="cat" class="radio required" value="kesehatan" />
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
                        	<input type="radio" name="cat" class="radio required" value="pendidikan" />
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
                        	<input type="radio" name="cat" class="radio required" value="lingkungan" />
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
                    
				</div><!--end .section-->
                <div class="section">
                	<label for="exampleInputEmail1"><h3>Judul / Nama aksi :</h3></label>
                    <div class="inp">
                    	<input type="text" name="judul" class="input form-control required" id="judul" >
                    </div>
                    <p>Tuliskan judul aksimu sesingkat dan sejelas mungkin, Agar mudah dimengerti oleh donatur dan volunteer, Tersedia <span id="chars">30</span> Karakter</p>                
                   	</div>
                <div class="section">
                	<label for="exampleInputEmail1"><h3>Deskripsi singkat aksi :</h3></label>
                    <!--<textarea name="descsingkat" class="desc" style="width: 595px;height: 130px;" ></textarea>-->
                    <div class="inp">
                    	<input type="text" name="descsing" class="input form-control required" id="descsing" >
                    </div>
                    <p>Tuliskan descripsi singkat tentang aksimu, Tersedia <span id="elemdescing">70</span> Karakter</p> </p>               
                </div>
                <div class="section">
                	<label for="exampleInputEmail1"><h3>Upload photo aksi :</h3></label>
                    <!--<textarea name="descsingkat" class="desc" style="width: 595px;height: 130px;" ></textarea>-->
                    <div class="inp">
                    	<!--<input type="file" name="pic" class="input form-control" id="pic" >-->
                        <input type="file" name="picaksi" id="picaksi" class="input form-control required" size="20" />
                        <input type="hidden" name="submitted" id="submitted" value="true" />
                    </div>
                    <p>Upload photo aksimu dengan resolusi 1024px * 1024px untuk hasil yang lebih bagus</p>               
                </div>
                <div class="section">
                	<label for="exampleInputEmail1"><h3>Apakah aksi ini mebutuhkan donasi?</h3></label>
                    <div class="inp">
                        <select name="donasi" class="input form-control required" id="donasi">
                            <option value="">Pilih</option>
                            <option value="butuh">Ya, Kami membutuhkan dukungan donasi</option>
                            <option value="tidak">Tidak, Kami tidak membutuhkan dukungan donasi</option>                    
                        </select>
                    </div>
                    <p>Pilih apakah aksi kamu membutuhkan donasi publik?</p>               
                </div>
                <script src="/asset/ckeditor/ckeditor.js"></script>
                <script>
					// Remove advanced tabs for all editors.
					CKEDITOR.config.removeDialogTabs = 'image:advanced;link:advanced;flash:advanced;creatediv:advanced;editdiv:advanced';
					CKEDITOR.replace( 'desc' );
				</script>
                <script type="text/javascript">
					$(document).ready(function() {
						$('#butuh').hide();
						$('#donasi ').removeClass('required');
						$('.tidak .datepicker').removeClass('required');
						$('#donasi').change(function(){		
							$('.gak').hide();	
							$('#' + $(this).val()).show().addClass('butuh');
							$('.jumlahtarget').val('').addClass('required');
							//$('.datepicker').val('').addClass('required');
						});
						$(".datepicker").datepicker();
					});
				</script>
                <div id="butuh" class="gak">
                    <div class="section">
                        <label for="exampleInputEmail1"><h3>Target donasi terkumpul :</h3></label>
                        <div class="input-prepend input-append" style="width: 595px;">
                            <span class="add-on" style="width: 51px;height: 30px;">Rp</span><input id="appendedPrependedInput" class="jumlahtarget" name="jumlahtarget" size="16" type="text" style="width: 520px;height: 30px;">
                        </div>
                        <p>Pastikan target yang ingin anda capai adalah rasional untuk aksi anda.</p>               
                    </div>                    
                </div>
                <div class="section">
                        <label for="exampleInputEmail1"><h3>Kapan Kampanye Aksi ini akan berakhir :</h3></label>
                        <div class="inp">
                        	<input type="text" name="tgl" class="datepicker input form-control required">
                        </div>
                        <p>Kapan penggalangan dana ini akan berakhir, pastikan seminggu sebelum pelaksanaan aksi kamu.</p>              
                </div>
                <div class="section">
                	<label for="exampleInputEmail1"><h3>Deskripsi aksi</h3></label>
                    <div class="inp">
                    <textarea  cols="80" id="desc" name="deskripsi" rows="20" class="form-control required"><h2><strong><span style="line-height:1.2em">Short Summary :</span></strong></h2>

<p>Contributors fund ideas they can be passionate about and to people they trust. Here are some things to do in this section:</p>

<ul>
	<li>Introduce yourself and your background.</li>
	<li>Briefly describe your campaign and why it&#39;s important to you.</li>
	<li>Express the magnitude of what contributors will help you achieve.</li>
</ul>

<p>Remember, keep it concise, yet personal. Ask yourself: if someone stopped reading here would they be ready to make a contribution?</p>

<h2><strong>What We Need &amp; What You Get :</strong></h2>

<p>Break it down for folks in more detail:</p>

<ul>
	<li>Explain how much funding you need and where it&#39;s going. Be transparent and specific&mdash;people need to trust you to want to fund you.</li>
	<li>Tell people about your unique perks. Get them excited!</li>
	<li>Describe where the funds go if you don&#39;t reach your entire goal.</li>
</ul>

<h2><strong>The Impact</strong></h2>

<p>Feel free to explain more about your campaign and let people know how the difference their contribution will make:</p>

<ul>
	<li>Explain why your project is valuable to the contributor and to the world.</li>
	<li>Point out your successful track record with projects like this (if you have one).</li>
	<li>Make it real for people and build trust.</li>
</ul>

<h2><strong>Other Ways You Can Help</strong><br />
<span style="font-size:13px; line-height:1.6em">Some people just can&#39;t contribute, but that doesn&#39;t mean they can&#39;t help:</span></h2>

<ul>
	<li>Ask folks to get the word out and make some noise about your campaign.</li>
	<li>Remind them to use the Indiegogo share tools!</li>
</ul>

<p>&nbsp;</p>

<h2><strong>And that&#39;s all there is to it.</strong></h2>
</textarea>
</div>
                    <p>Jelaskan secara lengkap tentang aksi ini</p>    
                    <script>
						// Remove advanced tabs for all editors.
						//CKEDITOR.config.removeDialogTabs = 'image:advanced;link:advanced;flash:advanced;creatediv:advanced;editdiv:advanced';
						CKEDITOR.replace( 'desc' );
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
					</script>           
                </div>
                <div class="section">
                        <label for="exampleInputEmail1"><h3>Tambahkan url video / youtube</h3></label>
                        <div class="inp">
                        	<input type="text" name="vid" class=" input form-control">
                        </div>
                        <p>Buat video campaign sosial kamu dan masukan url link video kamu</p>               
               </div>
               <div class="section">
                        <h2 style="text-align:center;margin:0px 0px 20px;">Tentang Anda sebagai Fasilitator</h2>
                        <div class="group">
                            <label for="exampleInputEmail1"><h3>Nama lengkap</h3></label>
                            <div class="inp">
                            	<input type="text" name="fullname" class="input form-control required" id="exampleInputEmail1">
                            </div>
                        </div>
                        <div class="group">
                            <label for="exampleInputEmail1"><h3>Nama panggilan</h3></label>
                            <div class="inp">
                            	<input type="text" name="panggilan" class="input form-control required" id="exampleInputEmail1">
                            </div>
                        </div>
                        <div class="group">
                            <label for="exampleInputEmail1"><h3>Email address</h3></label>
                            <div class="inp">
                            	<input type="email" name="email" class="input form-control required email" id="exampleInputEmail1" >
                            </div>
                        </div> 
                        <div class="group">
                            <label for="exampleInputEmail1"><h3>Password</h3></label>
                            <div class="inp">
                            	<input type="password" name="password" class="input form-control required password" id="exampleInputEmail1" >
                            </div>
                            <input type="hidden" name="uid" class="input form-control" id="uid" >
                       </div>               
               </div>
               <div class="submit">
               			<button name="submit" class="btn btn-submit btn-primary"> Buat Aksi Sekarang </button> Sudah punya akun ayopeduli.com silahkan <a href="<?php echo base_url(); ?>login"> Login</a>
               </div>
            </form>
        </div>
<script src="/asset/js/jquery.tinylimiter.js"></script>
<script>
$(document).ready( function() {
	var elem = $("#chars");
	$("#judul").limiter(30, elem);
	
	var elemdescing = $("#elemdescing");
	$("#descsing").limiter(70, elemdescing);
});
</script>
        <div class="clearfix"></div>
    </div><!--end .wrapper-->
</div><!-- end #content-->