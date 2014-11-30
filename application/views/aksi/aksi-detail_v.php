<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "ur-777b8135-96f4-e1df-ea6d-7b726bbba31f", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

<div id="content" class="page">
	<div class="wrapper">
    	        <div class="right">
        	<div class="status" style="text-align:right;margin:10px 0px -35px;">
       	<?php
       	$date = strtotime($aksi_item['tgl']);
                            $remaining = $date - time();                            
                            $days_remaining = floor($remaining / 86400);
                            $day_end = $aksi_item['tgl'];
                            $day_mulai = $aksi_item['now'];                             
                            $day_awal = strtotime($aksi_item['now']);
                            $remaining_awal =  $date - $day_awal ;
                            $day_awal_remaining = floor($remaining_awal/86400);
                            $progress_day = $days_remaining/$day_awal_remaining * '100';
            if ( $days_remaining < 0 ) { ?> 
                            <button class="alert alert-danger">Status Aksi : <span class="glyphicon glyphicon-ok"></span> Telah Telah selesai</button> <?php } else { ?> 
            	  <?php 								
									if($aksi_item['verified'] == '0'){ ?>                                                
									   <button class="alert alert-warning">Status Aksi : Belum divalidasi</button>
									<?php } ?>
                <?php                 
                  if($aksi_item['verified'] == '1'){ ?>                                                
                     <button class="alert alert-success">Status Aksi : <span class="glyphicon glyphicon-ok"></span> Telah divalidasi</button>
                <?php } ?>
                <?php                 
                  if($aksi_item['verified'] == '2'){ ?>                                                
                     <button class="alert alert-danger">Status Aksi : <span class="glyphicon glyphicon-ok"></span> Telah Telah selesai</button>
                <?php } ?>
	<?php }?>							
            </div>
        	<h1 style="margin:10px 0px;"><?php echo $aksi_item['judul'] ?></h1>
            <h4 style="margin:10px 0px;"><?php echo $aksi_item['descsing'] ?></h4>            
            <div id="tabulat">
                <ul class="nav nav-tabs" id="myTab">
                  <li class="active"><a href="#home" data-toggle="tab">Deskripsi Aksi</a></li>                  
                  <li><a href="#donasi" class="btn btn-primary" data-toggle="tab">Donasi Sekarang</a></li>
                  <!--<li><a href="#update" data-toggle="tab">Update Aksi</a></li>-->
                  <li><a href="#datadonasi" data-toggle="tab">Data Donasi</a></li>
                  <li><a href="#volunteer" data-toggle="tab">Jadi Volunteer</a></li>
                  <li><a href="#diskusi" class="btn" data-toggle="tab">Diskusi</a></li>
                </ul>  
            </div>          
            <div class="tab-content">            	
              <div class="tab-pane active" id="home">
              	<div  style="margin:10px 0px">
                	<div class="img">
                    <?php
					//var_dump($aksi_item['vid']);
					 if ( $aksi_item['vid'] == '' ) { ?> 
                    	<img src="/upload/aksi/<?php echo $aksi_item['pic'] ?>" width="100%" />
                    <?php } else{ ?>
                    	<?php echo $aksi_item['vid']?>
					<?php } ?>
                    	<!--<iframe width="100%" height="350" src="//www.youtube.com/embed/t0WXpO2-POs" frameborder="0" allowfullscreen></iframe>-->
                    </div>
                    <div class="date" style="margin:10px 0px 0px;">
                        Waktu dimulai <span><?php echo $aksi_item['now'] ?></span> - Waktu Berakhir <span><?php echo $aksi_item['tgl'] ?></span>
                    </div>
                </div><!--end .slide-->
                <div class="deskripsi">
                <?php 
				$input = str_replace('&lt;','<',$aksi_item['deskripsi']);
				$input = str_replace('&gt;','>',$input);
				$input = str_replace('&amp;','&',$input);
				$input = str_replace('&quot;','"',$input);
				function br2nl($input) {
					return preg_replace('/<br\\s*?\/??>/i', '', $input);
				}				
				echo $input;				
				?>
                </div>

              </div>
              <div class="tab-pane fade" id="datadonasi">
                <?php if(count($aksi_donasi_item)>0){?>
              		<table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Kode Donasi</th>
                        <th>Nama Donatur</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php for ($i=0;$i<count($aksi_donasi_item);$i++){ ?>
                      <tr>
                        <td><?php echo $aksi_donasi_item[$i]['did'] ?></td>
                        <td><?php
						//var_dump($aksi_donasi_item[$i]['sembunyi']);
						 if ($aksi_donasi_item[$i]['sembunyi'] == '1' ){ 
						 	echo $aksi_donasi_item[$i]['donatur']; 
								}else{
							echo 'Hamba alloh';
						}?></td>
                        <td>Rp.<?php echo number_format($aksi_donasi_item[$i]['donasi_aksi']) ?></td>
                        <td><?php echo $aksi_donasi_item[$i]['time1'] ?></td>
                      </tr>                      
                      <?php } ?>
                   <?php } else {?>
                 	<p>Belum Ada Donasi</p>
                 <?php }?>
                      
                    </tbody>
                  </table>
              </div>
              <div class="tab-pane fade volunteer" id="volunteer">
              <div class="gabung" style="margin:10px 0px;">
              		<?php 
					if($this->session->userdata('logged_in')){
						$data['item'] = $this->session->userdata('logged_in');						
					$fullname = $data['item']['fullname'];
					$uid2 = $data['item']['uid'];
					$aid2 = $aksi_item['aid'];
					//$this->load->model(array('volunteer_m'));
					//$dataid = $this->volunteer_m->getvolunuid($uid2, $aid2);
					//$uid3 = $data['volunteer_id']['uid'];
					//var_dump($aid2);
					
					?>
                    <script type="text/javascript">
					$(function(){
						$('#loading').show();															
								$('#submitvolun').click(function(e){
								//	alert('clicked');
								var aid = $('#aid').val();
								var uid = $('#uid').val();
								var fullname = $('#fullname').val();
								$.post('/volunteer/new_volunteer',{action: "insert", aid:aid, fullname:fullname, uid:uid},function(res){
								$('#result').html(res);
								});
							//});
					 
							//show records
							$('#show').click(function(){
								$.post('/volunteer/new_volunteer',{action: "show"},function(res){
									$('#result').html(res);
								});        
							});
					});
					});
					</script>
                    <div id="result"></div>
                    	<?php 
						$data['volunteer_id'] = $this->volunteer_m->getvolunuid($uid2, $aid2);
						//var_dump(count($volunteer_id));
						if (count($data['volunteer_id'])>0){
							?>
                        	<div class="alert alert-success">Anda telah menjadi volunteer di aksi ini</div>
						<?php }else {?>
                          
                            <input type="hidden" name="uid" class="form-control" id="uid" value="<?php echo $uid2 ?>">
                            <input type="hidden" name="aid" class="form-control" id="aid" value="<?php echo $aksi_item['aid'] ?>">
                            <input type="hidden" name="fullname" class="form-control" id="fullname" value="<?php echo $fullname ?>">
                                                                         
                          <button type="submit" name="submit" id="submitvolun" class="btn btn-primary">Gabung Jadi Volunteer Sekarang</button>
                       </form>
                       <?php } ?>
					<?php }else{ ?>
					<a href="/register" class="btn btn-primary"> Daftar sekarang dan jadi volunteer di aksi ini</a>
					<?php } ?>
                </div>
               <?php if(count($volunteer_item)>0){?>
			   
                <?php for ($i=0;$i<count($volunteer_item);$i++){ ?>
              		<div class="item-volunteer">
                    	<div class="pic">
                        	<a href="/profile/view/<?php echo $volunteer_item[$i]['uid'] ?>">
                             <?php 
								//var_dump(!is_null($user_item['photo']));
								if ($volunteer_item[$i]['photo']=='0'){ ?>
									<img src="/upload/user/0cc783073edbff95b4b94868c1f4e49c.jpg" />                         
								<?php }else{?> 
									<img src="/upload/user/<?php echo $volunteer_item[$i]['photo'] ?>" />
								<?php }?>                           
                            
                            </a>
                        </div>
                        <h4 class="name"><a href="/profile/view/<?php echo $volunteer_item[$i]['uid'] ?>"><?php echo $volunteer_item[$i]['fullname'] ?></a></h4>
                    </div><!--end .item-volunteer-->
                    <?php } ?>
                 <?php } else {?>
                 	<p>Belum Ada Volunteer</p>
                 <?php }?>
                    
                    <div class="clearfix"></div>
              </div>
              <div class="tab-pane fade" id="donasi">
              <script type="text/javascript" src="/asset/js/jquery.number.js"></script>
              <?php if ( $days_remaining < 0 ) { ?> 
                            <button class="alert alert-danger">Status Aksi : <span class="glyphicon glyphicon-ok"></span> Telah Telah selesai</button> <?php } else { ?> 
              <?php                 
                  if($aksi_item['verified'] == '2'){ ?>                                                
                     <button class="alert alert-danger">Status Aksi : <span class="glyphicon glyphicon-ok"></span> Telah Telah selesai, Donasi untuk aksi ini sudah di tutup</button>
                <?php } else { ?>
                  <div class="infodon alert alert-success">
                    <h4> Untuk membantu donasi aksi ini ada 2 opsi, yaitu : </h4>
                    <p>1. Isi form dibawah untuk mendapatkan Gudness Poin.</p><br>
                    <p>2. Donasi langsung , Sertakan angka <?php echo $aksi_item['kode'] ?> dalam donasi anda ex. Rp.50.000 menjadi Rp.50.<?php echo $aksi_item['kode'] ?> sebagai penanda donasi anda ke rekening : <br>
                     BRI Acc. 0139.01.002011.30.7<br>a.n Yayasan Ayo Peduli Nusantara KCP Bekasi - Juanda <br>
                     Dengan Donasi langsung anda tidak akan mendapatkan Gudness Poin. Maka kami sarankan untuk mengisi form dibawah ini.
                   </p>
                   <p>Apabila sudah mohon konfirmasi via sms dengan format : Donasi_Jumlah Donasi_nama aksi_nama pendnor kirim ke 081214939954</p>
                   <p>Petunjuk donasi akan dikirimkan melalui email anda.</p>
                  </div>
                  <hr></hr>
			  	       <?php if($this->session->userdata('logged_in')){
      					   $data['item'] = $this->session->userdata('logged_in');
      				    $fullname = $data['item']['fullname'];
      				    $uid = $data['item']['uid'];
      				?>
                <script>
						$(function(){
							//$('.donasi_aksi').number( true, 0 );							
							$('#loading').hide();
							$('#submitdon').click(function(e){	
							
							// Declare the function variables:
							// Parent form, form URL, email regex and the error HTML
							var $formId = $(this).parents('.donasi');
							//var formAction = $formId.attr('action');
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
			//$formId.submit();
			//validation
								$('#loading').show();	
																
								
								//var email = $('#email').val();
								var uid = $('#uid').val();
								var fullname = $('#fullname').val();
								var panggilan = $('#panggilan').val();		
								var donasi_aksi = $('.donasi_aksi').val();
								var donasi_ap = $('input:radio[name=donasi_ap]').val();
								var totaldon = $('#totaldon').val();
								var aid = $('#aid').val();
								var namaaksi = $('#namaaksi').val();
								var sembunyi = $('#sembunyi').val();
								//var donasi_ap = $(function() {
//									var $radios = $('input:radio[name=donasi_ap]');
//										if($radios.is(':checked') === false) {
//											$radios.filter('[value=0]').prop('checked', true);
//										}
//									});
								
					 
								//syntax - $.post('filename', {data}, function(response){});
								//$.post('datadonanon.php',{action: "insert", email:email, password:password, fullname:fullname, panggilan:panggilan,  donasi_aksi:donasi_aksi, donasi_ap:donasi_ap,},function(res){
//									$('#result').html(res);
//								});
								$.post('/donasi/donlogin',{action: "insert", donasi_aksi:donasi_aksi, totaldon:totaldon, aid:aid, fullname:fullname, uid:uid, namaaksi:namaaksi, sembunyi:sembunyi},function(res){
								$('#resultdonasi').html(res);
								});
							//});
					 
							//show records
							$('#show').click(function(){
								$.post('/donasi/donlogin',{action: "show"},function(res){
									$('#resultdonasi').html(res);
								});        
							});
								}
								// Prevent form submission
									e.preventDefault();
							});
						});
					</script>
                <div id="resultdonasi"></div> 
              		<h3 style="margin:10px 0px 20px;">Silahkan isikan form donasi anda :</h3>
                    <div class="form-horizontal donasi styled" >
					<div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Jumlah Donasi</label>
                            <div class="col-sm-10">                              
                              <div class="input-prepend input-append">
                              		<div class="inp">
									<span class="add-on">Rp</span><input id="appendedPrependedInput" class="donasi_aksi required" name="donasi_aksi" size="16" type="text" onkeyup="var n=Math.random()*1000;document.getElementById('totaldon').value= Number(document.getElementById('appendedPrependedInput').value)+Number(n.toFixed(0));">
                                    </div>
								</div>
                            </div>*Tanpa koma Ex.100000
                          </div>                          
                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Pilih Donasi</label>
                            <div class="col-sm-10">
                                 <div class="radio">
                                  <label>
                                    <input type="radio" name="donasi_ap" class="donasi_ap" value="0" onclick="var n=Math.random()*1000;document.getElementById('totaldon').value= Number(document.getElementById('appendedPrependedInput').value)+Number(n.toFixed(0));">
                                    <span>Saya hanya akan donasi untuk Aksi ini</span>
                                  </label>
                                </div>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="donasi_ap" class="donasi_ap" value="1" onclick="var n=Math.random()*1000;document.getElementById('totaldon').value=(0.1*document.getElementById('appendedPrependedInput').value)+ Number(document.getElementById('appendedPrependedInput').value)+Number(n.toFixed(0));">
                                    <span>Saya akan menambahkan 10% donasi untuk operational cost ayopeduli.com</span>
                                  </label>
                                </div>
                            </div>
                            <div class="form-group" style="margin:0px;">
                                <label for="inputEmail3" class="col-sm-2 control-label">Total Donasi</label>
                                <div class="col-sm-10">
                                    <div class="input-prepend input-append">
                                            <span class="add-on">Rp</span><input readonly="readonly" id="totaldon" size="16" type="text">
                                    </div>
                                </div>                           
                          </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="sembunyi" value="1" id="sembunyi"> Sembunyikan nama saya dalam list donatur
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                        	<input type="hidden" name="aid" id="aid" value="<?php echo $aksi_item['aid']?>" />                            
                            <input type="hidden" name="namaksi" id="namaaksi" value="<?php echo $aksi_item['judul'] ?>" />
                            <input type="hidden" name="uid" id="uid" value="<?php echo $uid ?>" />
                            <input type="hidden" name="fullname" id="fullname" value="<?php echo $fullname ?>" />
                          <button type="submit" class="btn btn-primary" id="submitdon">Bantu Donasi</button>
                        </div>
                      </div>
                      </div>
				<?php }else{
			  ?>
              		<script>
						$(function(){
							//$('.donasi_aksi').number( true, 0 );
							//insert record
							$('#total2').hide();
							$('#total').change(function(){		
								$('.totals').hide();		
								$('#' + $(this).val()).show();
							});
							$('#loading').hide();
							$('#submit').click(function(e){	
							
							// Declare the function variables:
							// Parent form, form URL, email regex and the error HTML
							var $formId = $(this).parents('.donasi');
							//var formAction = $formId.attr('action');
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
			//$formId.submit();
			//validation
								$('#loading').show();	
																
								
								var email = $('#email').val();
								var password = $('#password').val();
								var fullname = $('#fullname').val();
								var panggilan = $('#panggilan').val();		
								var donasi_aksi = $('.donasi_aksi').val();
								var donasi_ap = $('input:radio[name=donasi_ap]').val();
								var totaldon = $('#totaldon').val();
								var aid = $('#aid').val();
								var namaaksi = $('#namaaksi').val();
								//var photoimg = $('#photoimg').val();
								//var donasi_ap = $(function() {
//									var $radios = $('input:radio[name=donasi_ap]');
//										if($radios.is(':checked') === false) {
//											$radios.filter('[value=0]').prop('checked', true);
//										}
//									});
								
					 
								//syntax - $.post('filename', {data}, function(response){});
								//$.post('datadonanon.php',{action: "insert", email:email, password:password, fullname:fullname, panggilan:panggilan,  donasi_aksi:donasi_aksi, donasi_ap:donasi_ap,},function(res){
//									$('#result').html(res);
//								});
								$.post('/donasi/nonlog',{action: "insert", email:email, password:password, fullname:fullname, panggilan:panggilan,  donasi_aksi:donasi_aksi, donasi_ap:donasi_ap, totaldon:totaldon, aid:aid, namaaksi:namaaksi},function(res){
								$('#result').html(res);
								});
							//});
					 
							//show records
							$('#show').click(function(){
								$.post('/donasi/nonlog',{action: "show"},function(res){
									$('#result').html(res);
								});        
							});
								}
								// Prevent form submission
									e.preventDefault();
							});
						});
					</script>
                    <div id="result"></div> 
              		<h3 style="margin:10px 0px 20px;">Silahkan isikan form donasi anda</h3>
                    <div class="form-horizontal donasi styled" >
                    	<div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                            	<div class="inp">
                                  <input type="email" class="form-control required" name="email" id="email" placeholder="Email">
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <div class="inp">
                                  <input type="password" class="form-control required" name="password" id="password" placeholder="Password">
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                            	<div class="inp">
                              		<input type="text" class="form-control required" name="fullname" id="fullname" placeholder="Nama Lengkap">
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Nama Panggilan</label>
                            <div class="col-sm-10">
                            	<div class="inp">
                             	 <input type="text" class="form-control required" name="panggilan" id="panggilan" placeholder="Nama Panggilan">
                                </div>
                            </div>
                          </div>
                          <!--<div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Profile Picture</label>
                            <div class="col-sm-10">
                            	<div class="inp">
                             	 <input type="file" name="photoimg" id="photoimg" class="form-control required" />
                                </div>
                            </div>
                          </div>-->
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Jumlah Donasi</label>
                            <div class="col-sm-10">                              
                              <div class="input-prepend input-append">
                              		<div class="inp">
									<span class="add-on">Rp</span><input id="appendedPrependedInput" class="donasi_aksi required" name="donasi_aksi" size="16" type="text" onkeyup="var n=Math.random()*1000;document.getElementById('totaldon').value= Number(document.getElementById('appendedPrependedInput').value)+Number(n.toFixed(0));">
                                    </div>
								</div>
                            </div>*Tanpa koma Ex.100000
                          </div>
                          
                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Pilih Donasi</label>
                            <div class="col-sm-10">
                                 <div class="radio">
                                  <label>
                                    <input type="radio" name="donasi_ap" class="donasi_ap" value="0" onclick="var n=Math.random()*1000;document.getElementById('totaldon').value= Number(document.getElementById('appendedPrependedInput').value)+Number(n.toFixed(0));">
                                    <span>Saya hanya akan donasi untuk Aksi ini</span>
                                  </label>
                                </div>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="donasi_ap" class="donasi_ap" value="1" onclick="var n=Math.random()*1000;document.getElementById('totaldon').value=(0.1*document.getElementById('appendedPrependedInput').value)+ Number(document.getElementById('appendedPrependedInput').value)+Number(n.toFixed(0));">
                                    <span>Saya akan menambahkan 10% donasi untuk operational cost ayopeduli.com</span>
                                  </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Total Donasi</label>
                                <div class="col-sm-10">
                                    <div class="input-prepend input-append">
                                            <span class="add-on">Rp</span><input readonly="readonly" id="totaldon" size="16" type="text">
                                    </div>
                                </div>                           
                          </div>
                      </div>
                          <!--<div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Jumlah Donasi</label>
                            <div class="col-sm-10">                              
                              <div class="input-prepend input-append">
                              		<div class="inp">
									<span class="add-on">Rp</span><input id="appendedPrependedInput" class="donasi_aksi required" name="donasi_aksi" size="16" type="text" onkeyup="var n=Math.random()*1000;document.getElementById('totaldon').value= Number(document.getElementById('appendedPrependedInput').value)+Number(n.toFixed(0));">
                                    </div>
								</div>
                            </div>*Tanpa koma Ex.100000
                          </div>
                          
                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Pilih Donasi</label>
                            <div class="col-sm-10">
                                 <div class="radio">
                                  <label>
                                    <input type="radio" name="donasi_ap" class="donasi_ap" value="0" onclick="var n=Math.random()*1000;document.getElementById('totaldon').value= Number(document.getElementById('appendedPrependedInput').value)+Number(n.toFixed(0));">
                                    <span>Saya hanya akan donasi untuk Aksi ini</span>
                                  </label>
                                </div>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="donasi_ap" class="donasi_ap" value="1" onclick="var n=Math.random()*1000;document.getElementById('totaldon').value=(0.1*document.getElementById('appendedPrependedInput').value)+ Number(document.getElementById('appendedPrependedInput').value)+Number(n.toFixed(0));">
                                    <span>Saya akan menambahkan 10% donasi untuk operational cost ayopeduli.com</span>
                                  </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Total Donasi</label>
                                <div class="col-sm-10">
                                    <div class="input-prepend input-append">
                                            <span class="add-on">Rp</span><input readonly="readonly" id="totaldon" size="16" type="text">
                                    </div>
                                </div>                           
                          </div>
                      </div>-->
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> Saya menyetujui Terms &amp; Condition yang berlaku
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                        	<input type="hidden" name="aid" id="aid" value="<?php echo $aksi_item['aid']?>" />
                            
                            <input type="hidden" name="namaksi" id="namaaksi" value="<?php echo $aksi_item['judul'] ?>" />
                          <button type="submit" class="btn btn-primary" id="submit">Bantu Donasi</button>
                        </div>
                      </div>
                   </div>
                   <?php } 

                 }
                 }?>
              </div>
              
              <div class="tab-pane active" id="diskusi">
                    <div  style="margin:10px 0px">
                         <div id="fb-root"></div>
						<script>(function(d, s, id) {
                          var js, fjs = d.getElementsByTagName(s)[0];
                          if (d.getElementById(id)) return;
                          js = d.createElement(s); js.id = id;
                          js.src = "//connect.facebook.net/id_ID/all.js#xfbml=1&appId=1413006532248466";
                          fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script>
                        <fb:comments href="http://ayopeduli.com/aksi/view/<?php echo $aksi_item['slug'] ?>" width="auto" numposts="20" colorscheme="light"></fb:comments>
                    </div>
                </div>
            </div>
            
            <script type="text/javascript">
              $(function () {
                $('#myTab a:first').tab('show');	
				//$('#myTab a[href="#home"]').tab('show');	
				//$('#myTab a[href="#datadonasi"]').tab('show');
				//$('#myTab a[href="#volunteer"]').tab('show');		
				//$('#myTab a[href="#donasi"]').tab('show');
				$('#tabulat').affix({
					offset: {
					  top: 250
					, bottom: function () {
						return (this.bottom = $('.bs-footer').outerHeight(true))
					  }
					}
				  })
              })
			  
            </script>
        </div> 
        
        <div class="left">
    	<div class="category" style="margin:10px 0px;">        	
            <div class="item-aksi">
                <!--<div class="image">
                    <img src="images/pic.png" />
                </div>
                <div class="title">
                    <h2>Save Muara Gembong </h2>            
                </div>-->
                <div class="desc">
                    <div class="desc-top">
                    	<?php 
						 $target_k = $aksi_item['jumlahtarget'];
						 $terkumpul_k = $aksi_item['jumlahterkumpul'];
						 $progress_k = $terkumpul_k/$target_k * '100';
						 $selesai = $aksi_item['tgl'];
                         $donasi = $aksi_item['donasi'];
						?>
                        <?php 
                            //$date = strtotime($aksi_item['tgl']);
                            //$remaining = $date - time();                            
                           // $days_remaining = floor($remaining / 86400);
                            //$day_end = $aksi_item['tgl'];
                           // $day_mulai = $aksi_item['now'];                             
                            //$day_awal = strtotime($aksi_item['now']);
                            //$remaining_awal =  $date - $day_awal ;
                            //$day_awal_remaining = floor($remaining_awal/86400);
                           // $progress_day = $days_remaining/$day_awal_remaining * '100';
                        ?>
                        <?php if ($donasi == 'butuh'){ ?>
                        <div class="text">Target Donasi</div>
                        <div class="info target" style="float:right;">
                            <p>Rp.<?php echo number_format("$target_k") ?></p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="progress simpleProgress progressBlue ui-progressbar ui-widget ui-widget-content ui-corner-all" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="89"><div class="ui-progressbar-value ui-widget-header ui-corner-left" style="width: <?php echo "$progress_k"; ?>%;"></div></div>
                        <div class="info terkumpul" style="float:left;">
                            <p>Rp.<?php 
								//$terkumpul = $aksi_slider[$i]['jumlahterkumpul'];
								//if (isset($terkumpul)){
//									echo "Rp.".number_format($terkumpul = $aksi_slider[$i]['jumlahterkumpul']);																		
//								}else{
//									echo("gak ada");
//									
//								}
									if($aksi_item['jumlahterkumpul']){                                                
									   print number_format($aksi_item['jumlahterkumpul'],0);
									}
									else{
									   print "0.00";
									} ?></p>
                        </div>
                        <div class="text terkumpul"><?php echo intval($progress_k) ?>% Donasi Terkumpul</div>
                        <?php } else { ?>                        
                        
                        <div class="text">Aksi Selesai</div>
                        <div class="info target" style="float:right;width:110px;">
                            <p><?php echo $day_end ?></p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="progress simpleProgress progressBlue ui-progressbar ui-widget ui-widget-content ui-corner-all" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="89">
                            <div class="ui-progressbar-value ui-widget-header ui-corner-left" style="width: <?php echo "$progress_day"; ?>%;"></div></div>
                        <div class="info terkumpul" style="float: left;width: 99px;height: 31px;overflow: hidden;">
                            <p><?php echo $day_mulai ?></p>
                        </div>
                        <div class="text terkumpul">Aksi Dimulai</div>
                        <?php } ?>
                        <div class="clearfix"></div>
                    </div><!--end .desc-top-->
                    <div class="desc-bottom">
                    <?php 
						$date = strtotime($aksi_item['tgl']);
						$remaining = $date - time();
						$days_remaining = floor($remaining / 86400);
					?>
                    <a href="/aksi/view/<?php echo $aksi_item['slug']?>/#donasi"><h4>
                    <?php if ( $days_remaining < 0 ) { echo 'Aksi telah berakhir'; } else { echo $days_remaining." Hari lagi Aksi Berakhir" ;}?></h4></a>                    	
                    </div>                    
                    <div class="desc-bottom">
                        <span class='st_facebook_vcount' displayText='Facebook'></span>
                        <span class='st_twitter_vcount' displayText='Tweet'></span>
                        <span class='st_email_vcount' displayText='Email'></span>
                    </div>
                    <div class="desc-middle" style="margin: 30px 0px;">
                    	<div class="fasilitator">
                        	<div class="image">
                            <?php 
								//var_dump(!is_null($user_item['photo']));
								if ($aksi_user['photo']=='0'){ ?>
								<img width="300px" src="/upload/user/0cc783073edbff95b4b94868c1f4e49c.jpg" />                         
								<?php }else{?> 
								<img width="300px" src="/upload/user/<?php echo $aksi_user['photo']?>" /> 
								<?php }?>                            	
                            </div>
                            <div class="desc">
                            	<a href="/profile/view/<?php echo $aksi_user['uid'] ?>"><h3><?php echo $aksi_user['fullname'] ?></h3></a>
                                <p>fasilitator ayopeduli.com</p>                              

                            </div>
                            <h3 style="margin:5px 0px 10px;text-align:center;">Hubungi Fasilitator :</h3>
                            <p class="contact alert alert-success" style="text-align:center">
                                <?php
                                  if($this->session->userdata('logged_in')){ ?>
                                  Hp : <?php echo $aksi_user['hp'] ?><br>
                                  Email : <?php echo $aksi_user['email'] ?>
                                  <?php }else{ ?>
                                  Silahkan login untuk menghubungi <?php echo $aksi_user['panggilan'] ?> <br>
                                  <a href="<?php //echo base_url(); ?>/login" class="btn btn-primary">login</a> 
                                <?php } ?>
                            </p>
                            <div class="clearfix"></div>
                            <h4>Fasilitator</h4>
                        </div>
                    </div><!--end .desc-middle-->                    
                </div><!-- .desc-->           
            </div><!--end .item-aksi-->
        </div>
        </div><!--end .left-->
       
        <div class="clearfix"></div>
    </div><!--end .wrapper-->
    <div id="loading" style="position:fixed;width:100%;height:100%;background:#222;opacity:0.8;">
</div><!-- end #content-->

</div>