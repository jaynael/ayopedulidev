<div id="content" class="page">
	<div class="wrapper">
    	<div class="right" style="width:100%;">
        	
        	<ul class="nav nav-tabs">
              <li class="active"><a href="#update" data-toggle="tab">Tambahkan Donasi</a>
              	
              </li>              
              <li><a href="#history" data-toggle="tab">Donasi Baru</a>
              <?php 
			  $count2 = count($aksi_donasi_all);
			  if ( $count2 == 0){ ?>
              <?php } else { ?> 
              <span class="badge pull-right" style="position: absolute;top: -8px;left: 70px;"><?php echo count($aksi_donasi_all)?></span>
              <?php } ?></li>
              
              </li>
               <li><a href="#app" data-toggle="tab">Donasi Approve</a><span class="badge pull-right" style="position: absolute;top: -8px;left: 70px;"><?php echo count($donasi_approve)?></span></li>
              <li><a href="#volunteer" data-toggle="tab">Follower</a></li>
              <li><a href="#redeem" data-toggle="tab">Add partner</a></li>
            </ul>            
            <div class="tab-content">
              
              <div class="tab-pane active" id="update">
              		<script>
						$(function(){
							//$('.donasi_aksi').number( true, 0 );
							//insert record							
							$('#loading').hide();
							$('#kirim').click(function(e){	
							
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
								var aid = $('#aid').val();
								var dari = $('#dari').val();
								var jumlah = $('#jumlah').val();								
								$.post('/donasi/addadmin',{action: "insert", aid:aid, dari:dari, jumlah:jumlah},function(res){
								$('#result').html(res);
								});
							//});
					 
							//show records
							$('#show').click(function(){
								$.post('/donasi/addadmin',{action: "show"},function(res){
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
              		<h3 style="margin:10px 0px 20px;">Silahkan isikan form donasi untuk <?php echo $judul ?></h3>
                    <div class="form-horizontal donasi styled" >
                    	<div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Aid</label>
                            <div class="col-sm-10">
                            	<div class="inp">
                                  <input type="email" class="form-control required" name="aid" id="aid" placeholder="Email" value="<?php echo $aid; ?>">
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Dari</label>
                            <div class="col-sm-10">
                                <div class="inp">
                                  <input type="text" class="form-control required" name="dari" id="dari" placeholder="dari" value="" >
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Jumlah</label>
                            <div class="col-sm-10">
                            	<div class="inp">
                              		<input type="text" class="form-control required" name="jumlah" id="jumlah" placeholder="jumlah">
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                            	<div class="inp">
                             	 <input type="submit" class="form-control btn btn-primary" name="kirim" id="kirim" value="Kirim">
                                 <span id="loading">Loading...</span>
                                </div>
                            </div>
                          </div>    
                   </div>                    
              </div>
              <div class="tab-pane fade" id="history">
              		<div class="row" >                      
                      <div class="col-lg-6" style="float:right;margin:10px 0px 20px;">
                        <div class="input-group">
                          <input type="text" style="height:34px;" class="form-control">
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Cari !</button>
                          </span>
                        </div><!-- /input-group -->
                      </div><!-- /.col-lg-6 -->
                      <div class="clearfix"></div>
                    </div><!-- /.row -->              		
                    <script type="text/javascript">
						$(function(){
							$(".repdon").each(function () {
							var $this = $(this).find('.approve');
							var $target = $(this).find('.did');
							var $poin = $(this).find('.poin');
							var $uid = $(this).find('.uid');
							var $aid = $(this).find('.aid');
							var $totaldon = $(this).find('.totaldon');
							var $parent = $this.parent();
							$this.click(function () {
								//alert($totaldon.val());
								$('#loading').show();
								var did = $target.val();
								var totaldon = $totaldon.val();
								var poin = $poin.val();
								var uid = $uid.val();
								var aid = $aid.val();																
								$.post('/donasi/update',{action: "update", did:did, poin:poin, uid:uid, aid:aid, totaldon:totaldon},function(res){
								$('#result').html(res);								
							});
							//});
					 
							//show records
							$('#show').click(function(){
								$.post('/donasi/update',{action: "show"},function(res){
									$('#result').html(res);
								});        
							});
							$(this).hide();
						});
													
							
					});
				});
					</script>
                    <div id="result"></div> 
                    <table class="table table-hover">
                    <thead>
                      <tr>
                      	<th>Donasi ID</th>
                        <th>Dari</th>
                        <th>User ID</th>
                        <th>Untuk</th>
                        <th>donasi aksi</th>
                        <th>donasi ap</th>
                        <th>Total Donasi</th>
                        <th>Tanggal</th>
                        <th>Tindakan</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php
					  for ($i=0;$i<count($aksi_donasi_all);$i++){
						// var_dump("$i=0;$i<count($aksi_donasi_all);$i++"); ?>
                      <tr class="repdon">
                      	<td><?php echo $aksi_donasi_all[$i]['did'] ?><input type="hidden" name="did" id="did" class="did" value="<?php echo $aksi_donasi_all[$i]['did'] ?>" />
                        <input type="hidden" name="poin" id="poin" class="poin" value="<?php echo $aksi_donasi_all[$i]['poin'] ?>" />
                        <input type="hidden" name="uid" id="uid" class="uid" value="<?php echo $aksi_donasi_all[$i]['uid'] ?>" />
                        <input type="hidden" name="aid" id="aid" class="aid" value="<?php echo $aksi_donasi_all[$i]['aid'] ?>" />
                        </td>
                        <td><?php echo $aksi_donasi_all[$i]['donatur'] ?></td>
                        <td><?php echo $aksi_donasi_all[$i]['uid'] ?></td>
                        <td><?php echo $aksi_donasi_all[$i]['namaaksi'] ?></td>
                        <td>Rp.<?php echo number_format($aksi_donasi_all[$i]['donasi_aksi']) ?></td>
                        <td>Rp.<?php echo number_format($aksi_donasi_all[$i]['donasi_ap']) ?></td>
                        <td>Rp.<?php echo number_format($aksi_donasi_all[$i]['totaldon']) ?><input type="hidden" class="totaldon" name="totaldon" id="totaldon" value="<?php echo $aksi_donasi_all[$i]['donasi_aksi'] ?>" /></td>
                        <td><?php echo $aksi_donasi_all[$i]['time1'] ?></td>
                        <td><a href="#" id="approve" class="btn approve btn-primary">Approve</a></td>
                      </tr>  
                      <p><?php // echo $links; ?></p>                    
                      <?php } ?>
                      <!--<tr>
                        <td>Samsul</td>
                        <td>Zildam Penderita Celebral Palsy</td>
                        <td>Rp.450.000</td>
                        <td>30/11/2013</td>
                        <td><a href="#" id="approve" class="btn btn-primary">Approve</a></td>
                      </tr>
                      <tr>
                        <td>Soleh</td>
                        <td>Hanna Penderita Leukimia</td>
                        <td>Rp.450.000</td>
                        <td>30/11/2013</td>
                        <td><a href="#" id="approve" class="btn btn-primary">Approve</a></td>
                      </tr>-->
                    </tbody>
                  </table>
              </div>
              <div class="tab-pane fade" id="app">
              		<div class="row" >                      
                      <div class="col-lg-6" style="float:right;margin:10px 0px 20px;">
                        <div class="input-group">
                          <input type="text" style="height:34px;" class="form-control">
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Cari !</button>
                          </span>
                        </div><!-- /input-group -->
                      </div><!-- /.col-lg-6 -->
                      <div class="clearfix"></div>
                    </div><!-- /.row -->              		
                    <script type="text/javascript">
						$(function(){
							$(".appdon").each(function () {
							var $this = $(this).find('.cancel');
							var $target = $(this).find('.did');
							var $poin = $(this).find('.poin');
							var $uid = $(this).find('.uid');
							var $aid = $(this).find('.aid');
							var $totaldon = $(this).find('.totaldon');
							var $parent = $this.parent();
							$this.click(function () {
								//alert($totaldon.val());
								$('#loading').show();
								var did = $target.val();
								var totaldon = $totaldon.val();
								var poin = $poin.val();
								var uid = $uid.val();
								var aid = $aid.val();																
								$.post('/donasi/cancel',{action: "update", did:did, poin:poin, uid:uid, aid:aid, totaldon:totaldon},function(res){
								$('#result2').html(res);								
							});
							//});
					 
							//show records
							$('#show').click(function(){
								$.post('/donasi/cancel',{action: "show"},function(res){
									$('#result2').html(res);
								});        
							});
							$(this).hide();
						});
													
							
					});
				});
					</script>
                    <div id="result2"></div> 
                    <table class="table table-hover">
                    <thead>
                      <tr>
                      	<th>Donasi ID</th>
                        <th>Dari</th>
                        <th>Untuk</th>
                        <th>donasi aksi</th>
                        <th>donasi ap</th>
                        <th>Total Donasi</th>
                        <th>Tanggal</th>
                        <th>Tindakan</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php
					  for ($i=0;$i<count($donasi_approve);$i++){
						// var_dump("$i=0;$i<count($aksi_donasi_all);$i++"); ?>
                      <tr class="appdon">
                      	<td><?php echo $donasi_approve[$i]['did'] ?><input type="hidden" name="did" id="did" class="did" value="<?php echo $donasi_approve[$i]['did'] ?>" />
                        <input type="hidden" name="poin" id="poin" class="poin" value="<?php echo $donasi_approve[$i]['poin'] ?>" />
                        <input type="hidden" name="uid" id="uid" class="uid" value="<?php echo $donasi_approve[$i]['uid'] ?>" />
                        <input type="hidden" name="aid" id="aid" class="aid" value="<?php echo $donasi_approve[$i]['aid'] ?>" />
                        </td>
                        <td><?php echo $donasi_approve[$i]['donatur'] ?></td>
                        <td><?php echo $donasi_approve[$i]['namaaksi'] ?></td>
                        <td>Rp.<?php echo number_format($donasi_approve[$i]['donasi_aksi']) ?></td>
                        <td>Rp.<?php echo number_format($donasi_approve[$i]['donasi_ap']) ?></td>
                        <td>Rp.<?php echo number_format($donasi_approve[$i]['totaldon']) ?><input type="hidden" class="totaldon" name="totaldon" id="totaldon" value="<?php echo $donasi_approve[$i]['donasi_aksi'] ?>" /></td>
                        <td><?php echo $donasi_approve[$i]['time1'] ?></td>
                        <td><a href="#" id="approve" class="btn cancel btn-danger">Cancel</a></td>
                      </tr>  
                      <p><?php // echo $links; ?></p>                    
                      <?php } ?>
                      <!--<tr>
                        <td>Samsul</td>
                        <td>Zildam Penderita Celebral Palsy</td>
                        <td>Rp.450.000</td>
                        <td>30/11/2013</td>
                        <td><a href="#" id="approve" class="btn btn-primary">Approve</a></td>
                      </tr>
                      <tr>
                        <td>Soleh</td>
                        <td>Hanna Penderita Leukimia</td>
                        <td>Rp.450.000</td>
                        <td>30/11/2013</td>
                        <td><a href="#" id="approve" class="btn btn-primary">Approve</a></td>
                      </tr>-->
                    </tbody>
                  </table>
              </div>
              <div class="tab-pane fade volunteer" id="volunteer">
              		
              		<div class="item-volunteer">
                    	<div class="pic">
                        	<a href="#"></a><img src="/asset/img/avatar.jpg" />
                        </div>
                        <h4 class="name"><a href="#">Hans Prayipta</a></h4>
                    </div><!--end .item-volunteer-->
                    <div class="item-volunteer">
                    	<div class="pic">
                        	<a href="#"></a><img src="/asset/img/gallery/photo1.jpg" />
                        </div>
                        <h4 class="name"><a href="#">Susanti</a></h4>
                    </div><!--end .item-volunteer-->
                    <div class="item-volunteer">
                    	<div class="pic">
                        	<a href="#"></a><img src="/asset/img/gallery/photo5.jpg" />
                        </div>
                        <h4 class="name"><a href="#">Jaenal gufron</a></h4>
                    </div><!--end .item-volunteer-->
                    <div class="item-volunteer">
                    	<div class="pic">
                        	<a href="#"></a><img src="/asset/img/avatar9.jpg" />
                        </div>
                        <h4 class="name"><a href="#">Darren</a></h4>
                    </div><!--end .item-volunteer-->
                    <div class="item-volunteer">
                    	<div class="pic">
                        	<a href="#"></a><img src="/asset/img/avatar.jpg" />
                        </div>
                        <h4 class="name"><a href="#">Simmons</a></h4>
                    </div><!--end .item-volunteer-->
                    <div class="item-volunteer">
                    	<div class="pic">
                        	<a href="#"></a><img src="/asset/img/avatar9.jpg" />
                        </div>
                        <h4 class="name"><a href="#">Abdul</a></h4>
                    </div><!--end .item-volunteer-->
                    
                    <div class="clearfix"></div>
              </div>
              <div class="tab-pane fade volunteer" id="redeem">              		
                    <h3>Daftar Partner :</h3>
                    <form name="redeem">
                        <div class="item-volunteer redeem">
                        	<input type="radio" class="radio" name="item" />
                        	<span class="jumpoin btn btn-primary">150 Poin</span>
                            <div class="pic">
                                <a href="#"></a><img src="/asset/images/redeem/lele-lela.jpg" />
                            </div>
                            <h4 class="name"><a href="#">Pecel Lela</a></h4>
                        </div><!--end .item-volunteer-->
                        <div class="item-volunteer redeem">
                        	<input type="radio" class="radio" name="item" />
                        	<span class="jumpoin btn btn-primary">350 Poin</span>
                            <div class="pic">
                                <a href="#"></a><img src="/asset/images/redeem/tripseru.png" />
                            </div>
                            <h4 class="name"><a href="#">Tripseru.com</a></h4>
                        </div><!--end .item-volunteer-->
                        <div class="item-volunteer redeem">
                        	<input type="radio" class="radio" name="item" />
                        	<span class="jumpoin btn btn-primary">250 Poin</span>
                            <div class="pic">
                                <a href="#"></a><img src="/asset/images/redeem/yot.jpg" />
                            </div>
                            <h4 class="name"><a href="#">Buku YOT</a></h4>
                        </div><!--end .item-volunteer-->
                        <div class="item-volunteer redeem">
                        	<input type="radio" class="radio" name="item" />
                        	<span class="jumpoin btn btn-primary">200 Poin</span>
                            <div class="pic">
                                <a href="#"></a><img src="/asset/images/redeem/chatime.jpg" />
                            </div>
                            <h4 class="name"><a href="#">Chatime</a></h4>
                        </div><!--end .item-volunteer-->
                        <div class="item-volunteer redeem">
                        	<input type="radio" class="radio" name="item" />
                        	<span class="jumpoin btn btn-primary">170 Poin</span>
                            <div class="pic">
                                <a href="#"></a><img src="/asset/images/redeem/kfc.jpg" />
                            </div>
                            <h4 class="name"><a href="#">KFC Burger Deluxe</a></h4>
                        </div><!--end .item-volunteer-->
                        <div class="item-volunteer redeem">
                        	<input type="radio" class="radio" name="item" />
                        	<span class="jumpoin btn btn-primary">350 Poin</span>
                            <div class="pic">
                                <a href="#"></a><img src="/asset/images/redeem/damn.jpg" />
                            </div>
                            <h4 class="name"><a href="#">Damn I love Indonesia</a></h4>
                        </div><!--end .item-volunteer-->
                        <div class="item-volunteer redeem">
                        	<input type="radio" class="radio" name="item" />
                        	<span class="jumpoin btn btn-primary">200 Poin</span>
                            <div class="pic">
                                <a href="#"></a><img src="/asset/images/redeem/hrc.jpg" />
                            </div>
                            <h4 class="name"><a href="#">Hardrock Cafe</a></h4>
                        </div><!--end .item-volunteer-->
                        <div class="item-volunteer redeem">
                        	<input type="radio" class="radio" name="item" />
                        	<span class="jumpoin btn btn-primary">350 Poin</span>
                            <div class="pic">
                                <a href="#"></a><img src="/asset/images/redeem/bluebird.png" />
                            </div>
                            <h4 class="name"><a href="#">Blue Bird Taxi</a></h4>
                        </div><!--end .item-volunteer-->
                        <div class="item-volunteer redeem">
                        	<input type="radio" class="radio" name="item" />
                        	<span class="jumpoin btn btn-primary">350 Poin</span>
                            <div class="pic">
                                <a href="#"></a><img src="/asset/images/redeem/map.png" />
                            </div>
                            <h4 class="name"><a href="#">MAP Voucher</a></h4>
                        </div><!--end .item-volunteer-->
                        <div class="item-volunteer redeem">
                        	<input type="radio" class="radio" name="item" />
                        	<span class="jumpoin btn btn-primary">350 Poin</span>
                            <div class="pic">
                                <a href="#"></a><img src="/asset/images/redeem/cofeetofee.jpg" />
                            </div>
                            <h4 class="name"><a href="#">Coffee Toffee</a></h4>
                        </div><!--end .item-volunteer-->
                    </form>
                    <div class="clearfix"></div>
                    <div class="keterangan" style="margin:20px 0px 0px;">
                    	<h3 style="margin:0px 0px 10px;">Keterangan</h3>
                        <p>- Poin yang sudah diredeem tidak dapat ditukar kembali.</p>
                    	<p>- Voucer akan kami kirimkan melalui alamat tempat tinggal anda, mohon mengisi lengkap alamat anda.</p>
                    </div>
                    <div class="gabung" style="margin:12px;">
              			<a href="#" class="btn btn-primary">Redeem Sekarang</a>
                    </div>
              </div>
            </div>
            <script type="text/javascript" src="/asset/js/bootstrap.min.js"></script>
			<script type="text/javascript" src="/asset/js/tab.js"></script>
            <script>
              $(function () {
                $('#myTab a:first').tab('show')
              })
            </script>
        </div>        
        <div class="clearfix"></div>
    </div><!--end .wrapper-->
</div><!-- end #content-->