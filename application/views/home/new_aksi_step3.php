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
               <script type="text/javascript">
					$(document).ready(function() {						
						
						$('#submit').click(function(e){
							//alert('submit');
						
							// Declare the function variables:
							// Parent form, form URL, email regex and the error HTML
							//var $formId = $(this).parents('form');
							var $formId = $('#form4');
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
								alert('Please fill the field');
							} else {
								$formId.submit();
								//alert('submit');
								log.console($formId.submit());
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
              <span class="bar done"></span>
              <div class="circle active">
                <span class="label">2</span>
                <span class="title">Photo</span>
              </div>
              <span class="bar done"></span>
              <div class="circle active">
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
            <h2 style="text-align:center;">Surat MOU Aksi Sosial ayopeduli.com</h2>  
            <?php echo validation_errors(); ?>
             <?php if (!isset($edit)){ ?>
       		<?php echo validation_errors(); ?>
	   						<?php 
							$attributes = array('class' => 'styled buataksi', 'id' => 'form');
							echo form_open_multipart('/home/new_act/step4', $attributes); ?>
       		
		   <?php }else{ ?>
                <?php echo validation_errors(); ?>
                                <?php 
                                $attributes = array('class' => 'styled buataksi', 'id' => 'form');
                                echo form_open_multipart('/home/edit_act/step4/'.$aksiid, $attributes); ?>
           
           <?php }?>
    	
        <div class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                  Lengkapi Surat MOU dibawah ini
                </a>
              </h4>
            </div>
            <div>
              <div class="panel-body">
                <h3 align="center" style="margin: 10px 0px 25px;line-height: 135%;">MEMORANDUM OF UNDERSTANDING <br />
                Kerjasama Aksi social di Ayopeduli.com</h3>
                <div class="intro">
                	<p>Pada hari ini, <?php setlocale(LC_ALL, 'IND'); echo strftime("%A");?>  tanggal <?php echo date('d') ?> Bulan <?php echo date('m') ?> Tahun <?php echo date('Y') ?>, kedua  belah pihak yang bertandatangan di bawah ini:</p>
                </div>
                <div class="intro">
               	 <span class="label">Nama Lembaga  </span>:   Ayopeduli.com<br />
                  <span class="label">Perwakilan  </span>: Jaenal Gufron<br />
                  <span class="label">Jabatan </span>:   Founder <br />
                  <span class="label">Alamat</span>:   Jln.Cut Mutiah Blok.D No.5 Rt.8/8 Kel.Margahayu Kec.Bekasi Timur Jawa Barat 17113 <br />
                  <span class="label">Telepon</span>:  081214939954<br />
                  <span class="label">Email </span>:  gufron@ayopeduli.com
                </div>
                <div class="intro">
                <p>Dalam hal ini bertindak untuk dan atas nama <strong>Ayopeduli.com </strong>yang untuk selanjutnya disebut sebagai <strong>Pihak Pertama</strong></p>
                	<div class="form-group">
                    	<span class="label"> Nama Aksi   </span>
                     	:<input type="text" name="namaaksi" value="<?php echo $judul ?>" disabled="disabled" class="input form-control required" placeholder="......">
                      	<input type="hidden" name="aid" value="<?php echo $aksiid; ?>" class="input form-control required" >
                     </div>
                     <div class="form-group">
                    	<span class="label"> Nama Fasilitator </span>
                         :<input type="text" name="namafasil" value="<?php echo $namafasil; ?>" class=" input form-control required" placeholder="......">
                 	 </div>
                  <div class="form-group">
                    	<span class="label">No. KTP</span>
                        :<input type="text" name="noktp" class=" input form-control required" placeholder="......">
                  </div>
              	  <div class="form-group">
                    	<span class="label">Alamat  </span>
                        :  <input type="text" name="alamat" class=" input form-control required" placeholder="......">
                  </div>
                  <div class="form-group">
                    	<span class="label">Telepon</span>
                        : <input type="text" name="telepon" class=" input form-control required" placeholder="......">
                  </div>
                  <div class="form-group">
                    	<span class="label">Email</span>
                        :  <input type="text" name="email" disabled="disabled" value="<?php echo $email ?>" class="input form-control required" placeholder="......"> 
                  </div>
          	
                  <p>Dalam hal ini bertindak untuk dan atas nama <strong>(Nama Aksi) </strong>untuk  selanjutnya disebut sebagai <strong>Pihak Kedua.</strong></p>
           	</div>
            
            <div class="intro">
                <p>PIHAK PERTAMA dan PIHAK KEDUA dengan terlebih  dahulu mempertimbangkan berbagai hal telah mencapai kata sepakat untuk mengadakan perjanjian  kerja sama dengan syarat-syarat dan ketentuan-ketentuan sebagai berikut :</p>
           	</div>
            
            <div class="intro">
                <h3 align="center"><strong>Pasal I</strong> <br />
                  <strong>Ruang Lingkup</strong></h3>
                  PIHAK PERTAMA dan PIHAK KEDUA telah sepakat untuk mengadakan kerja sama penggalangan dana untuk aksi sosial "<?php echo $judul ?>" yang akan selesai pada :<br />
                  Hari/Tanggal                   :<?php echo $selesai?>	 <br />
                  Selanjutnya disebut sebagai <strong>Aksi  Sosial </strong></p>
             </div>
             
             <div class="intro">
                <h3 style="text-align:center">Pasal II<br />
                <strong>JANGKA WAKTU PERJANJIAN</strong></h3>
                <ol>
                  <li>Jangka waktu  Perjanjian ini sesuai dengan waktu  yang Pihak Kedua targetkan yaitu terhitung sejak  tanggal <?php echo date("m/d/Y"); ?> sampai <?php echo $selesai?> .Jika jangka  waktu telah berakhir maka Pihak Pertama tidak punya kewajiban apapun yang harus  dipenuhi kepada Pihak Kedua. </li>
                </ol>
             </div>
             
             <div class="intro">
                <h3 style="text-align:center">Pasal III<br />
                Kewajiban  dan Hak Pihak Pertama <br />Pihak pertama berkewajiban untuk:</h3>
                <p>&nbsp;</p>
                <ol>
                  <li>Mendukung dan  mempromosikan <strong>Aksi Sosial  </strong>melalui account twitter @ayopeduli.</li>
                  <li>Memasang aksi social dalam  website <a href="http://www.ayopeduli.com">www.ayopeduli.com</a> sesuai dengan waktu yg  ditargetkan oleh Pihak Kedua.</li>
                  <li>Mempromosikan  untuk mendapatkan donatur dan volunteer . </li>
                </ol>
            </div>
            <div class="intro">
                <h3 align="center">Pasal IV <br /> Kewajiban dan  Hak  Pihak Kedua<br />
                Pihak kedua berkewajiban untuk :</h3>
                <ol>
                  <li>Mempertanggungjawabkan seluruh  informasi yg diisi melalui form terkait aksi social adalah benar . </li>
                  <li>Memberikan laporan keuangan  jika sudah menerima dan menggunakan uang donasi dari Pihak Pertama.</li>
                  <li>Mengirimkan dokumentasi berupa  foto atau video terkait Aksi Sosial yg sedang berlangsung kepada PIhak Pertama.</li>
                  <li>Bertanggung jawab penuh atas aksi social yang telah dibuat apabila  dikemudian hari ada permasalahan hukum maka hal tersebut diluar tanggung jawab  Pihak Pertama. </li>
                  <li>Mengingat bahwa Pihak Pertama hanya sebagai media yang mengusahakan agar  aksi sosial bisa mendapatkan bantuan berupa donasi atau volunteer  sebaik-baiknya dan Pihak Pertama tidak menjamin akan memenuhi jumlah donasi  yang telah ditargetkan oleh Pihak Kedua. </li>
                  <li>Pihak Kedua menyatakan bahwa aksi sosial yang dipasang di web <a href="http://www.ayopeduli.com">www.ayopeduli.com</a> tidak ada kaitannya dengan aksi  pencucian uang dan donasi sepenuhnya akan disalurkan kepada aksi sosial yang  terkait oleh Pihak Kedua.</li>
                </ol>
            </div>
         	<div class="intro">
                <h3 align="center"><strong>Pasal V</strong><br />
                  <strong>Wanprestasi</strong></h3>
                  Segala sesuatu hal di luar perjanjian  ini baik yang diatur maupun yang tidak diatur, maka kedua belah pihak sepakat untuk membuat <em>addendum</em> (tambahan) yang isinya mengikat  dan tidak terpisahkan dari tujuan sebelumnya. </p>
             </div>
             
             <div class="intro">
                <h3 align="center"><strong>Pasal VI</strong><br />
                  <strong>Force Majeure</strong></h3>
                  Pemutusan kerja sama ini tidak dapat  dilakukan secara sepihak, kecuali oleh sebab-sebab yang berada diluar kekuasaan  kedua belah pihak atau dikategorikan sebagai <em>force majeure </em>seperti kebijakan pemerintah, huru - hara, bencana  alam, dan kejadian lain di luar kekuasaan manusia. Jika terjadi resiko  berkaitan dengan peralatan PIHAK KEDUA, maka menjadi tanggung jawab PIHAK  KEDUA. </p>
             </div>
             
             <div class="intro">
                <h3 align="center"><strong>Pasal VII</strong><br />
                  <strong>Penyelesaian</strong></h3>
                <ol>
                  <li>Hal-hal yang belum  diatur dalam perjanjian ini akan dilakukan/dibicarakan secara musyawarah antara  kedua belah pihak.</li>
                </ol>
                <ol>
                  <li>Dengan itikad baik,  maka bila terjadi perselisihan antara kedua belah pihak berkenaan dengan  perjanjian ini, akan diselesaikan secara musyawarah.</li>
                </ol>
             </div>
             
             <div class="intro">
                <h3 align="center"><strong>Pasal VIII</strong> <br />
                  <strong>Penutup</strong></h3>
                  Surat Perjanjian ini ditandatangani  oleh kedua belah pihak dalam kondisi sadar dan tanpa paksaan dari pihak manapun  dan mempunyai kekuatan hukum yang sama. <br />
                  Jakarta,  <?php echo date("m/d/Y"); ?></p>
                <p align="center">&nbsp;</p>
                <table border="0" width="100%" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="50%" valign="top"><p align="center">PIHAK    PERTAMA</p>
                      <p align="center">&nbsp;</p>
                      <p align="center">&nbsp;</p>
                      <p align="center">&nbsp;</p>
                      <p align="center">Jaenal Gufron<br />
                        (Founder    Ayopeduli.com)</p></td>
                    <td width="50%" valign="top"><p align="center">PIHAK    KEDUA</p>
                      <p align="center">&nbsp;</p>
                      <p align="center">&nbsp;</p>
                      <p align="center">&nbsp;</p>
                      <p align="center"><?php echo $namafasil; ?><br />
                        (Fasilitator)</p></td>
                  </tr>
                </table>
            </div>
              </div>
            </div>
          </div>          
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                 Upload Scan KTP Anda
                </a>
              </h4>
            </div>
            <div id="collapseThree">
              <div class="panel-body">
                	<label for="exampleInputEmail1"><h4>Upload Scan KTP anda disini</h4></label>
                        <div class="inp">
                        	<input type="file" name="ktp" class="input form-control" placeholder="iframe">
                        </div>
                        <p>Sebagai proses validasi mohon untuk sertakan upload scan/photo ktp anda.</p>
                       <input type="hidden" name="uid" class="input form-control" id="uid" value="<?php echo $user_item['uid'] ?>" >
                       <input type="hidden" name="email" class="input form-control" id="email" value="<?php echo $user_item['email'] ?>" >
                       <input type="hidden" name="submitted" id="submitted" value="true" />
                      </div>
                    </div>
                  </div>
                </div> 
               <div class="submit">
               <a href="/home/edit_act/step2/<?php echo $aksiid; ?>" class="btn btn-submit button btn-primary">&lt; Back Step</a>
               		<button name="submit" id="submit" class="btn button btn-submit btn-primary"> Next Step &gt;</button>
               </div>
            </form>    
    </div>    
</div>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
 <!-- jQuery Version 1.11.0 
    <script src="/asset/home/js/jquery-1.11.0.js"></script>-->

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
    