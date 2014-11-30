<link rel="stylesheet" type="text/css" href="/asset/style/tabs.css" />
<link rel="stylesheet" type="text/css" href="/asset/style/tabstyles.css" />
<script src="/asset/js/modernizr.custom.js"></script>
    
<script type="text/javascript">
	$(document).ready(function() {
    	// Instance the tour
		var tour = new Tour({
		  
		  });
		
		// Add your steps. Not too many, you don't really want to get your users sleepy
		tour.addSteps([
		  {
			element: "#logo", // string (jQuery selector) - html element next to which the step popover should be shown
			title: "Selamat datang di ayopeduli.com", // string - title of the popover
			content: "ayopeduli.com adalah sebuah platform website untuk kolaborasi aksi sosial", // string - content of the popover
		  	placement:"bottom",
		  },
		  {
			element: ".main-menu",
			title: "Aksi sosial apa yang ayopeduli fokuskan?.",
			content: "Kami percaya 3 element penting ini dapat meningkatkan kesejahteraan masyarakat.",
		  },
		  {
			element: "#item",
			title: "Solusi apa yang kami tawarkan?.",
			content: "Informasi mengenai Aksi kami tampilkan dengan lebih jelas dan transparan.",
			placement:"top",
		  },
		  {
			element: "#poin",
			title: "Mengapa saya harus bergabung?.",
			content: "Mari berkolaborasi untuk membantu aksi sosial dan kumpulkan gudnes poin untuk dapatkan penawaran menarik dari partner kami.",
			placement:"top",
		  },
		  {
			element: "#buat",
			title: "Bergabunglah bersama kami",
			content: "Tunggu apa lagi, ayo buat aksi sosialmu dan sebarkan untuk dapatkan dukungan lebih banyak, buat aksi sekarang, atau...",
			placement:"bottom",
		  },
		  {
			element: "#loginson",
			title: "Login atau Register",
			content: "Gabung dan join bersama ribuan volunteer dan fasilitator di seluruh Nusantara untuk lakukan hal yang lebih baik.",
			placement:"bottom",
		  }	  
		]);
		
		
		// Initialize the tour
		tour.init();
		
		// Start the tour
		tour.start();
		$("#slideshow > div:gt(0)").hide();
	
			setInterval(function() { 
			  $('#slideshow > div:first')
			    .fadeOut(700)
			    .next()
			    .fadeIn(700)
			    .end()
			    .appendTo('#slideshow');
			},  7000);
	});
</script>
<div id="slider">	
    <div class="wrapper">
    	<div class="centertext">
        	<h1>Ayo Berkolaborasi Untuk Negeri!</h1>
            <div class="userap">
                <h4>Bergabunglah dengan pelaku kebaikan bersama kami</h4>
                <ul>
                	<?php
                    	for ($i=0;$i<count($pelaku_kebaikan);$i++){ 	
					?>
                    <li>
                        <div class="image">
                            <?php 
												//var_dump(!is_null($user_item['photo']));
												if ($pelaku_kebaikan[$i]['photo']=='0'){ ?>
												<img width="300px" src="/upload/user/0cc783073edbff95b4b94868c1f4e49c.jpg" />                         
												<?php  }else{?> 
												<img src="/upload/user/<?php echo $pelaku_kebaikan[$i]['photo']?>" />
							<?php  }?>
                        </div>
                        <h3><?php echo $pelaku_kebaikan[$i]['panggilan'] ?></h3>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <a class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="buat"> Buat Aksi Sosialmu Sekarang</a>
            <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <div id="login">                        
                            <div class="category">
                                <div class="content-category" style="width:350px; float:none; margin:15px auto 10px; text-align:center;">                                    <div class="title">
                                        <h2 style="color:#fff;">Sign In</h2>
                                    </div>
                                    <div class="clearfix"></div>
                                </div><!-- end.content-category-->
                                <div class="item-aksi" style="width: 375px;float: none;margin: 0px auto 100px;padding: 20px;height: auto;">				
                                	<a href="/addons/facebook/fbconnect.php"><img src="/asset/images/facebook.png" /></a>       
                                    <div id="#result"></div>
                                    <div class="register">
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
                                          <a href="<?php // echo base_url (); ?>/register" class="btn reg btn-primary">Register</a>
                                       </form>                   
                                    </div>
                                    <p style="margin:20px 0px 0px;">Tidak terima kasih , <button type="button" class="btn btn-default" data-dismiss="modal">Close</button></p>
                                    
                                </div><!--end .item-aksi-->            
                            </div>
                    </div><!-- end #content-->
                      
                    </div>
                  </div>
                </div>
        </div>         
    </div>
</div>
<div id="tabnya">
	<div class="wrapper">
    	<section>
			<div class="tabs tabs-style-iconbox">
					<nav>
						<ul>
							<li class=""><a href="#section-iconbox-1" class=""><span>Aksi Pilihan </span></a></li>
							<li class=""><a href="#section-iconbox-2" class=""><span>Aksi Terbaru</span></a></li>
                            <li class=""><a href="#section-iconbox-3" class=""><span>Aksi Kategori</span></a></li>
						</ul>
					</nav>
					<div class="content-wrap">
						<section id="section-iconbox-1" class="">
                        <?php
                        	for ($i=0;$i<count($aksi_slider);$i++){ 	
						?>
                        	<div class="item-aksi" id="item">
                                <div class="image">
                                    <a href="/aksi/view/<?php echo $aksi_slider[$i]['slug'] ?>"><img src="/upload/aksi/<?php echo $aksi_slider[$i]['pic'] ?>"></a>
                                </div>
                                <div class="title">
                                    <a href="/aksi/view/<?php echo $aksi_slider[$i]['slug'] ?>"><h2><?php echo $aksi_slider[$i]['judul'] ?></h2></a>         		</div>
                                <div class="desc">
                                    <div class="desc-top">
                                    <?php 
										 $target_k = $aksi_slider[$i]['jumlahtarget'];
										 $terkumpul_k = $aksi_slider[$i]['jumlahterkumpul'];
										 $progress_k = $terkumpul_k/$target_k * '100';
										 $selesai = $aksi_slider[$i]['tgl'];
										?>
                                                                <div class="text">Target Donasi</div>
                                        <div class="info target" style="float:right;">
                                            <p>Rp.<?php echo number_format("$target_k") ?></p>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="progress simpleProgress progressBlue ui-progressbar ui-widget ui-widget-content ui-corner-all" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="89"><div class="ui-progressbar-value ui-widget-header ui-corner-left" style="width: <?php echo "$progress_k"; ?>%;"></div></div>
                                        <div class="info terkumpul" style="float:left;">
                                            <p>Rp.<?php
											if($aksi_slider[$i]['jumlahterkumpul']){                                                
											   print number_format($aksi_slider[$i]['jumlahterkumpul'],0);
											}
											else{
											   print "0.00";
											} ?></p>
                                        </div>
                                        <div class="text terkumpul"><?php echo intval($progress_k) ?>% Donasi Terkumpul</div>
                                        <div class="clearfix"></div>
                                    </div><!--end .desc-top-->                                    
                                    <div class="desc-bottom">
                                    	<?php 
											$date = strtotime($aksi_slider[$i]['tgl']);
											$remaining = $date - time();
											$days_remaining = floor($remaining / 86400);
										?>
                                  		<a href="/aksi/view/<?php echo $aksi_slider[$i]['slug'] ?>/#donasi"><h4><?php if ( $days_remaining < 0 ) { echo 'Aksi telah berakhir'; } else { echo $days_remaining." Hari lagi Aksi Berakhir" ;}?></h4></a>
                                    </div>
                                    <div class="desc-bottom">
                                        <a href="/aksi/view/<?php echo $aksi_slider[$i]['slug'] ?>"><h4>Dukung Aksi Ini</h4></a>
                                    </div>
                                    <div class="desc-middle">
                                        <div class="fasilitator" style="position:relative;">
                                            <div class="image">
                                            	<?php 
												//var_dump(!is_null($user_item['photo']));
												if ($aksi_slider[$i]['photo']=='0'){ ?>
												<img width="300px" src="/upload/user/0cc783073edbff95b4b94868c1f4e49c.jpg" />										<?php  }else{?> 
												<img width="300px" src="/upload/user/<?php echo $aksi_slider[$i]['photo']?>" />
												<?php  }?>
                                            </div>
                                            <div class="poin" style="position: absolute;z-index: 100000;color: #fff;bottom: 54px;left: 70px;background: rgb(103,194,239);padding: 9px;border: 1px solid #ccc;border-radius: 50px;opacity: 0.8;"><?php echo $aksi_slider[$i]['poin'] ?></div>
                                            <div class="desc">
                                                <a href="/profile/view/<?php echo $aksi_slider[$i]['uid'] ?>">
                                                	<h3><?php echo $aksi_slider[$i]['panggilan'] ?></h3>
                                                </a>
                                                <p>Fasilitator ayopeduli.com</p>
                                            </div>
                                            <div class="clearfix"></div>
                                            <h4>Fasilitator</h4>
                                        </div>
                                    </div><!--end .desc-middle-->                    
                                </div><!-- .desc--> 
                            </div>
                        <?php } ?>
                        </section>
						<section id="section-iconbox-2" class="">
                        	<?php
                        		for ($i=0;$i<count($aksi_terbaru);$i++){ 	
							?>
                        	<div class="item-aksi" id="item">
                                <div class="image">
                                    <a href="/aksi/view/<?php echo $aksi_terbaru[$i]['slug'] ?>"><img src="/upload/aksi/<?php echo $aksi_terbaru[$i]['pic'] ?>"></a>
                                </div>
                                <div class="title">
                                    <a href="/aksi/view/<?php echo $aksi_terbaru[$i]['slug'] ?>"><h2><?php echo $aksi_terbaru[$i]['judul'] ?></h2></a>         		</div>
                                <div class="desc">
                                    <div class="desc-top">
                                    <?php 
										 $target_k = $aksi_terbaru[$i]['jumlahtarget'];
										 $terkumpul_k = $aksi_terbaru[$i]['jumlahterkumpul'];
										 $progress_k = $terkumpul_k/$target_k * '100';
										 $selesai = $aksi_terbaru[$i]['tgl'];
										?>
                                                                <div class="text">Target Donasi</div>
                                        <div class="info target" style="float:right;">
                                            <p>Rp.<?php echo number_format("$target_k") ?></p>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="progress simpleProgress progressBlue ui-progressbar ui-widget ui-widget-content ui-corner-all" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="89"><div class="ui-progressbar-value ui-widget-header ui-corner-left" style="width: <?php echo "$progress_k"; ?>%;"></div></div>
                                        <div class="info terkumpul" style="float:left;">
                                            <p>Rp.<?php
											if($aksi_terbaru[$i]['jumlahterkumpul']){                                                
											   print number_format($aksi_terbaru[$i]['jumlahterkumpul'],0);
											}
											else{
											   print "0.00";
											} ?></p>
                                        </div>
                                        <div class="text terkumpul"><?php echo intval($progress_k) ?>% Donasi Terkumpul</div>
                                        <div class="clearfix"></div>
                                    </div><!--end .desc-top-->                                    
                                    <div class="desc-bottom">
                                    	<?php 
											$date = strtotime($aksi_terbaru[$i]['tgl']);
											$remaining = $date - time();
											$days_remaining = floor($remaining / 86400);
										?>
                                  		<a href="/aksi/view/<?php echo $aksi_terbaru[$i]['slug'] ?>/#donasi"><h4><?php if ( $days_remaining < 0 ) { echo 'Aksi telah berakhir'; } else { echo $days_remaining." Hari lagi Aksi Berakhir" ;}?></h4></a>
                                    </div>
                                    <div class="desc-bottom">
                                        <a href="/aksi/view/<?php echo $aksi_terbaru[$i]['slug'] ?>"><h4>Dukung Aksi Ini</h4></a>
                                    </div>
                                    <div class="desc-middle">
                                        <div class="fasilitator" style="position:relative;">
                                            <div class="image">
                                            	<?php 
												//var_dump(!is_null($user_item['photo']));
												if ($aksi_terbaru[$i]['photo']=='0'){ ?>
												<img width="300px" src="/upload/user/0cc783073edbff95b4b94868c1f4e49c.jpg" />                         
												<?php  }else{?> 
												<img width="300px" src="/upload/user/<?php echo $aksi_terbaru[$i]['photo']?>" />
												<?php  }?>
                                            </div>
                                            <div class="poin" style="position: absolute;z-index: 100000;color: #fff;bottom: 54px;left: 70px;background: rgb(103,194,239);padding: 9px;border: 1px solid #ccc;border-radius: 50px;opacity: 0.8;"><?php echo $aksi_terbaru[$i]['poin'] ?></div>
                                            <div class="desc">
                                                <a href="/profile/view/<?php echo $aksi_terbaru[$i]['uid'] ?>">
                                                	<h3><?php echo $aksi_terbaru[$i]['panggilan'] ?></h3>
                                                </a>
                                                <p>Fasilitator ayopeduli.com</p>
                                            </div>
                                            <div class="clearfix"></div>
                                            <h4>Fasilitator</h4>
                                        </div>
                                    </div><!--end .desc-middle-->                    
                                </div><!-- .desc--> 
                            </div>
                        <?php } ?>
                        </section>
						<section id="section-iconbox-3" class="">
                        	<div id="content" style="margin: -30px 0px 0px;">
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
       	      	
       	<!-- end Gudness Partner-->
    </div><!--end .wrapper-->
</div><!-- end #content-->
                        
                        
                        </section>
					</div><!-- /content -->
				</div>
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
                        <div class="item-volunteer redeem">
                            <div class="pic">
                                <a href="#"><img src="asset/images/newbee.jpg" /></a>
                            </div>
                        </div><!--end .item-volunteer-->
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
                        
                    <div class="clearfix"></div>
       	</div>
       	
		</section>
    </div>
</div>
<script src="/asset/js/cbpFWTabs.js"></script>
<script>
	(function() {
		[].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
		new CBPFWTabs( el );
		});
	})();
</script>
