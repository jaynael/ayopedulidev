<div id="content">
	<div class="wrapper">
    	<div class="category">
        	<div class="content-category">
            	<div class="image">
                	<a href="/aksi/category/kesehatan"><img src="asset/images/Kesehatan.png" /></a>
                </div>
                <div class="title">
                	<h2>Kesehatan</h2>
                </div>
                <div class="clearfix"></div>
            </div><!-- end.content-category-->            
            <div class="item-aksi" id="item">
                <div class="image">
                    <a href="/aksi/view/<?php echo $aksi_kesehatan['slug'] ?>"><img src="/upload/aksi/<?php echo $aksi_kesehatan['pic']?>" /></a>
                </div>
                <div class="title">
                    <a href="/aksi/view/<?php echo $aksi_kesehatan['slug'] ?>"><h2><?php echo $aksi_kesehatan['judul'] ?></h2></a>         		</div>
                <div class="desc">
                    <div class="desc-top">
                    	<?php 
						 $target_k = $aksi_kesehatan['jumlahtarget'];
						 $terkumpul_k = $aksi_kesehatan['jumlahterkumpul'];
						 $progress_k = $terkumpul_k/$target_k * '100';
						 $selesai = $aksi_kesehatan['tgl'];
						?>
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
									if($aksi_kesehatan['jumlahterkumpul']){                                                
									   print number_format($aksi_kesehatan['jumlahterkumpul'],0);
									}
									else{
									   print "0.00";
									} ?></p>
                        </div>
                        <div class="text terkumpul"><?php echo intval($progress_k) ?>%Donasi Terkumpul</div>
                        <div class="clearfix"></div>
                    </div><!--end .desc-top-->
                    <!--<script>
						$(function(){
							var daykes = new Date();
							daykes = new Date(<?php // echo $selesai?>);
							$('#daykesehatan').countdown({until: '+2d +4h'});
						});
					</script>-->
                    <div class="desc-bottom">
                    <?php 
						$date = strtotime($aksi_kesehatan['tgl']);
						$remaining = $date - time();
						$days_remaining = floor($remaining / 86400);
					?>
                    <a href="/aksi/view/<?php echo $aksi_kesehatan['slug'] ?>/#donasi"><h4><?php if ( $days_remaining < 0 ) { echo 'Aksi telah berakhir'; } else { echo $days_remaining." Hari lagi Aksi Berakhir" ;}?></h4></a>
                    </div>
                    <div class="desc-bottom">
                    	<a href="/aksi/view/<?php echo $aksi_kesehatan['slug'] ?>"><h4>Dukung Aksi Ini</h4></a>
                    </div>
                    <div class="desc-middle">
                    	<div class="fasilitator" style="position:relative;">
                        	<div class="image">
                            <?php 
								//var_dump(!is_null($user_item['photo']));
								if ($aksi_user_kesehatan['photo']=='0'){ ?>
								<img width="300px" src="/upload/user/0cc783073edbff95b4b94868c1f4e49c.jpg" />                         
								<?php }else{?> 
								<img width="300px" src="/upload/user/<?php echo $aksi_user_kesehatan['photo']?>" /> 
								<?php }?>
                            </div>
                            <div class="poin" style="position: absolute;z-index: 100000;color: #fff;bottom: 54px;left: 70px;background: rgb(103,194,239);padding: 9px;border: 1px solid #ccc;border-radius: 50px;opacity: 0.8;"><?php echo $aksi_user_kesehatan['poin'] ?></div>
                            <div class="desc">
                            	<a href="/profile/view/<?php echo $aksi_user_kesehatan['uid'] ?>"><h3><?php echo $aksi_user_kesehatan['fullname'] ?></h3></a>
                                <p>Fasilitator ayopeduli.com</p>
                            </div>
                            <div class="clearfix"></div>
                            <h4>Fasilitator</h4>
                        </div>
                    </div><!--end .desc-middle-->                    
                </div><!-- .desc--> 
            </div><!--end .item-aksi--> 
        </div>
        <div class="category">
        	<div class="content-category">
            	<div class="image">
                	<img src="asset/images/education.png" />
                </div>
                <div class="title">
                	<a href="/aksi/category/pendidikan"><h2>Pendidikan</h2></a>
                </div>
                <div class="clearfix"></div>
            </div><!-- end.content-category-->
            <div class="item-aksi">
                <div class="image">
                    <a href="/aksi/view/<?php echo $aksi_pendidikan['slug'] ?>"><img src="/upload/aksi/<?php echo $aksi_pendidikan['pic']?>" /></a>
                </div>
                <div class="title">
                    <a href="/aksi/view/<?php echo $aksi_pendidikan['slug'] ?>"><h2><?php echo $aksi_pendidikan['judul'] ?></h2></a>         		</div>
               <div class="desc">
                    <div class="desc-top">
                    	<?php 
						 $target_p = $aksi_pendidikan['jumlahtarget'];
						 $terkumpul_p = $aksi_pendidikan['jumlahterkumpul'];
						 $progress_p = $terkumpul_p/$target_p * '100';
						?>
                        <div class="text">Target Donasi</div>
                        <div class="info target" style="float:right;">
                            <p>Rp.<?php echo number_format("$target_p") ?></p>
                        </div>                   
                        
                        <div class="clearfix"></div>
                        <div class="progress simpleProgress progressBlue ui-progressbar ui-widget ui-widget-content ui-corner-all" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="89"><div class="ui-progressbar-value ui-widget-header ui-corner-left" style="width: <?php echo "$progress_p"; ?>%;"></div></div>
                        <div class="info terkumpul" style="float:left;">
                            <p>Rp.<?php 
								//$terkumpul = $aksi_slider[$i]['jumlahterkumpul'];
								//if (isset($terkumpul)){
//									echo "Rp.".number_format($terkumpul = $aksi_slider[$i]['jumlahterkumpul']);																		
//								}else{
//									echo("gak ada");
//									
//								}
									if($aksi_pendidikan['jumlahterkumpul']){                                                
									   print number_format($aksi_pendidikan['jumlahterkumpul'],0);
									}
									else{
									   print "0.00";
									} ?></p>
                        </div>
                        <div class="text terkumpul"><?php echo intval($progress_p) ?>% Donasi Terkumpul</div>
                        <div class="clearfix"></div>
                    </div><!--end .desc-top-->
                    <div class="desc-bottom">
                    	<?php 
						$date = strtotime($aksi_pendidikan['tgl']);
						$remaining = $date - time();
						$days_remaining = floor($remaining / 86400);
					?>
                    <a href="/aksi/view/<?php echo $aksi_pendidikan['slug']?>/#donasi"><h4><?php if ( $days_remaining < 0 ) { echo 'Aksi telah berakhir'; } else { echo $days_remaining." Hari lagi Aksi Berakhir" ;}?></h4></a>
                    </div>
                    <div class="desc-bottom">
                    	<a href="/aksi/view/<?php echo $aksi_pendidikan['slug'] ?>"><h4>Dukung Aksi Ini</h4></a>
                    </div>
                    <div class="desc-middle">
                    	<div class="fasilitator" style="position:relative;">
                        	<div class="image">
                            	<?php 
								//var_dump(!is_null($user_item['photo']));
								if ($aksi_user_pendidikan['photo']=='0'){ ?>
								<img width="300px" src="/upload/user/0cc783073edbff95b4b94868c1f4e49c.jpg" />                         
								<?php }else{?> 
								<img width="300px" src="/upload/user/<?php echo $aksi_user_pendidikan['photo']?>" /> 
								<?php }?>
                            </div>
                            <div class="poin" id="poin" style="position: absolute;z-index: 100000;color: #fff;bottom: 54px;left: 70px;background: rgb(103,194,239);padding: 9px;border: 1px solid #ccc;border-radius: 50px;opacity: 0.8;"><?php echo $aksi_user_pendidikan['poin'] ?> </div>
                            <div class="desc">
                            	<a href="/profile/view/<?php echo $aksi_user_pendidikan['uid'] ?>"><h3><?php echo $aksi_user_pendidikan['fullname'] ?></h3></a>
                                <p>Fasilitator ayopeduli.com</p>
                            </div>
                            <div class="clearfix"></div>
                            <h4>Fasilitator</h4>
                        </div>
                    </div><!--end .desc-middle-->                    
                </div><!-- .desc-->         
            </div><!--end .item-aksi-->
        </div>
        <div class="category">
        	<div class="content-category">
            	<div class="image">
                	<a href="/aksi/category/lingkungan"><img src="asset/images/lingkungan.png" /></a>
                </div>
                <div class="title">
                	<h2>Lingkungan</h2>
                </div>
                <div class="clearfix"></div>
            </div><!-- end.content-category-->
            <div class="item-aksi">
                <div class="image">
                     <a href="/aksi/view/<?php echo $aksi_lingkungan['slug'] ?>"><img src="/upload/aksi/<?php echo $aksi_lingkungan['pic'] ?>" /></a>
                </div>
                <div class="title">
                    <a href="/aksi/view/<?php echo $aksi_lingkungan['slug'] ?>"><h2><?php echo $aksi_lingkungan['judul'] ?></h2></a>       
                </div>
                <div class="desc">
                    <div class="desc-top">
                    	<?php 
						 $target_l = $aksi_lingkungan['jumlahtarget'];
						 $terkumpul_l = $aksi_lingkungan['jumlahterkumpul'];
						 $progress_l = $terkumpul_l/$target_l * '100';
						?>
                        <div class="text">Target Donasi</div>
                        <div class="info target" style="float:right;">
                            <p>Rp.<?php echo number_format("$target_l") ?></p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="progress simpleProgress progressBlue ui-progressbar ui-widget ui-widget-content ui-corner-all" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="89"><div class="ui-progressbar-value ui-widget-header ui-corner-left" style="width: <?php echo "$progress_l"; ?>%;"></div></div>
                        <div class="info terkumpul" style="float:left;">
                            <p>Rp.<?php 
								//$terkumpul = $aksi_slider[$i]['jumlahterkumpul'];
								//if (isset($terkumpul)){
//									echo "Rp.".number_format($terkumpul = $aksi_slider[$i]['jumlahterkumpul']);																		
//								}else{
//									echo("gak ada");
//									
//								}
									if($aksi_lingkungan['jumlahterkumpul']){                                                
									   print number_format($aksi_lingkungan['jumlahterkumpul'],0);
									}
									else{
									   print "0.00";
									} ?></p>
                        </div>
                        <div class="text terkumpul"><?php echo intval($progress_l) ?>%Donasi Terkumpul</div>
                        <div class="clearfix"></div>
                    </div><!--end .desc-top-->
                    <div class="desc-bottom">
                    	<?php 
						$date = strtotime($aksi_lingkungan['tgl']);
						$remaining = $date - time();
						$days_remaining = floor($remaining / 86400);
					?>
                    <a href="/aksi/view/<?php echo $aksi_lingkungan['slug']?>/#donasi"><h4><?php if ( $days_remaining < 0 ) { echo 'Aksi telah berakhir'; } else { echo $days_remaining." Hari lagi Aksi Berakhir" ;}?></h4></a>
                    </div>
                    <div class="desc-bottom">
                    	<a href="<?php //base_url(); ?>/aksi/view/<?php echo $aksi_lingkungan['slug']?>"><h4>Dukung Aksi Ini</h4></a>
                    </div>
                    <div class="desc-middle">
                    	<div class="fasilitator" style="position:relative">
                        	<div class="image">
                            	<?php 
								//var_dump(!is_null($user_item['photo']));
								if ($aksi_user_lingkungan['photo']=='0'){ ?>
								<img width="300px" src="/upload/user/0cc783073edbff95b4b94868c1f4e49c.jpg" />                         
								<?php }else{?> 
								<img width="300px" src="/upload/user/<?php echo $aksi_user_lingkungan['photo']?>" /> 
								<?php }?>
                            </div>
                            <div class="poin" style="position: absolute;z-index: 100000;color: #fff;bottom: 54px;left: 70px;background: rgb(103,194,239);padding: 9px;border: 1px solid #ccc;border-radius: 50px;opacity: 0.8;"><?php echo $aksi_user_lingkungan['poin'] ?></div>
                            <div class="desc">
                            	<a href="/profile/view/<?php echo $aksi_user_lingkungan['uid'] ?>"><h3><?php echo $aksi_user_lingkungan['fullname'] ?></h3></a>
                                <p>Fasilitator ayopeduli.com</p>
                            </div>
                            <div class="clearfix"></div>
                            <h4>Fasilitator</h4>
                        </div>
                    </div><!--end .desc-middle-->                    
                </div><!-- .desc-->           
            </div><!--end .item-aksi-->
        </div>        
        <div class="clearfix"></div>
       	<!--Gudness Partner-->
       	<div class="volunteer" id="gudness" >
       	<h2>Gudness Partner</h2>
       	        	<div class="item-volunteer redeem">
                        	<div class="pic">
                                <a href="http://www.deal.com.sg/deals/singapore/socialtrip-building-hope-muara-gembong-donate-help-school-renovation-preserve-ma"><img src="asset/images/redeem/deal-rev.png" /></a>
                            </div>
                        </div><!--end .item-volunteer-->
                        <div class="item-volunteer redeem">
                            <div class="pic">
                                <a href="http://tripseru.com"><img src="asset/images/redeem/tripseru.png" /></a>
                            </div>
                        </div><!--end .item-volunteer-->
                         <div class="item-volunteer redeem">
                            <div class="pic">
                                <a href="#"><img src="asset/images/redeem/livingsocial.png" /></a>
                            </div>
                        </div><!--end .item-volunteer-->
                        
                    <div class="clearfix"></div>
       	</div>
       	<div class="media volunteer" id="gudness" >
       		<h2>Featured on</h2>
            <div class="item-volunteer redeem">
            	<div class="pic">
                	<a href="http://marketplus.co.id" target="_new"><img src="asset/images/market+.png" /></a>
             	</div>
           	</div><!--end .item-volunteer-->
       		<div class="item-volunteer redeem">
            	<div class="pic">
                	<a href="http://dailysocial.net/post/ayopeduli-relaunching-ajak-pengguna-melakukan-aksi-sosial-lewat-konsep-crowdfunding" target="_new"><img src="asset/images/redeem/dslogo.png" /></a>
             	</div>
           	</div><!--end .item-volunteer-->
       	
       	</div>
       	<div class="clearfix"></div>
       	
       	<!-- end Gudness Partner-->
    </div><!--end .wrapper-->
</div><!-- end #content-->