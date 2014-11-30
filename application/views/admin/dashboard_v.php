<div id="content" class="page">
	<div class="wrapper">
    	<div class="right" style="width:100%;">
        	
        	<ul class="nav nav-tabs" id="myTab">
              <li class="active"><a href="#update" data-toggle="tab">Aksi Baru</a>
              <?php 
			  $count = count($aksi);
			  if ($count==0){ ?>
              <?php } else { ?> 
              <span class="badge pull-right" style="position: absolute;top: -8px;left: 70px;"><?php echo count($aksi)?></span>              
              <?php } ?>
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
              		<div class="aksi-landscape">
                    <?php for ($i=0;$i<count($aksi);$i++){ ?>
                    	<div class="item-aksi">
                            <div class="image">
                                <img src="/upload/aksi/<?php echo $aksi[$i]['pic'] ?>" />
                            </div>
                            <div class="addon" style="float:left;">
                            	<a href="/atur/adddonasi/<?php echo $aksi[$i]['aid'] ?>"> Tambahkan manual donasi</a>
                            </div>
                            <div class="desc-left">
                                <div class="title">
                                    <h2><?php echo $aksi[$i]['judul'] ?></h2>            
                                </div>
                                <div class="desc">
                                    <div class="desc-top">
										<?php 
                                         $target_k = $aksi[$i]['jumlahtarget'];
                                         $terkumpul_k = $aksi[$i]['jumlahterkumpul'];
                                         $progress_k = $terkumpul_k/$target_k * '100';
                                        ?>
                                        <div class="text">Target Donasi</div>
                                        <div class="info target" style="float:right;">
                                            <p>Rp.<?php echo number_format("$target_k") ?></p>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="progress simpleProgress progressBlue ui-progressbar ui-widget ui-widget-content ui-corner-all" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="89"><div class="ui-progressbar-value ui-widget-header ui-corner-left" style="width: <?php echo "$progress_k"; ?>%;"></div></div>
                                        <div class="info terkumpul" style="float:left;">
                                            <p>Rp.<?php echo number_format("$terkumpul_k") ?></p>
                                        </div>
                                        <div class="text terkumpul"><?php echo intval($progress_k) ?>%Donasi Terkumpul</div>
                                        <div class="clearfix"></div>
                                    </div><!--end .desc-top-->
                                    <div class="desc-bottom">
                                        <?php 
											$date = strtotime($aksi[$i]['tgl']);
											$remaining = $date - time();
											$days_remaining = floor($remaining / 86400);
										?>
										<a href="/aksi/view/<?php echo $aksi[$i]['slug'] ?>/#donasi"><h4><?php echo $days_remaining ?> Hari lagi Aksi Berakhir</h4></a>
                                    </div>
                                    <div class="desc-bottom">
                                    <?php if ($aksi[$i]['verified'] == '0' ) {?>
                                        <a href="/atur/viewaksi/<?php echo $aksi[$i]['slug'] ?>"><h4>Validasi Aksi Ini</h4></a>
                                    <?php }else{ ?>
                                       	<h4>Sudah di validasi</h4>
                                    <?php } ?>
                                    </div>                                                     
                                </div><!-- .desc-->  
                            </div>         
                        </div><!--end .item-aksi-->
                        
                        <?php } ?>
                        
                        <div class="clearfix"></div>                 	
                    </div> <!--end .item aksi-landscape-->                    
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