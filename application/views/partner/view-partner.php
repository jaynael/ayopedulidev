<div id="content" class="page">
	<div class="wrapper">
    	<div class="left" style="width:300px;">
    		<div class="profile-tab">
            	<div class="top">
                    <div class="pic">
                        <?php 
						//var_dump(!is_null($user_item['photo']));
						if ($user_item['photo']=='0'){ ?>
                        <img width="300px" src="upload/user/0cc783073edbff95b4b94868c1f4e49c.jpg" />                         
                        <?php }else{?> 
                        <img width="300px" src="upload/user/<?php echo $user_item['photo']?>" /> 
                        <?php }?>                 
                    </div>
                    <h4 style="margin:10px 0px;"><?php echo $user_item['fullname'] ?></h4>
                </div>
                <div class="poin">
                	<div class="angka">
                    	<span class="main"><?php echo number_format($user_item['poin'],0) ?></span> 
                                                   	
                        <span class="second">Gudness</span>                        
                    </div>
                </div>
            </div><!-- .end .profile-tab-->
        </div>
        <div class="right">
        	<?php
				//if (isset($_GET[action]){
				//}
			?>
        	<ul class="nav nav-tabs" id="myTab">
              <!--<li class="active"><a href="#buataksi" data-toggle="tab">Buat Aksi</a></li>-->
              <li><a href="#update" data-toggle="tab">Aksi yang telah dibuat</a></li>
              <li><a href="#volunteer" data-toggle="tab">Volunteer di Aksi</a></li>
            </ul>            
            <div class="tab-content">
              
              <div class="tab-pane fade" id="update">
              		<div class="aksi-landscape">
                    <?php if (count($aksi_user)> 0) {?>
						
                     <?php for ($i=0;$i<count($aksi_user);$i++){ ?>
                    	<div class="item-aksi">
                            <div class="image">
                                <img src="upload/aksi/<?php echo $aksi_user[$i]['pic'] ?>" />
                            </div>
                            <div class="desc-left">
                                <div class="title">
                                    <h2><?php echo $aksi_user[$i]['judul'] ?> </h2>            
                                </div>
                                <div class="desc">
                                    <div class="desc-top">
									<?php 
                                     $target_k = $aksi_user[$i]['jumlahtarget'];
                                     $terkumpul_k = $aksi_user[$i]['jumlahterkumpul'];
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
									$date = strtotime($aksi_user[$i]['tgl']);
									$remaining = $date - time();
									$days_remaining = floor($remaining / 86400);
									?>
                                        <a href="/aksi/view/<?php echo $aksi_user[$i]['slug']?>"><h4><?php echo $days_remaining ?> Hari lagi Aksi Berakhir</h4></a>
                                    </div>
                                    <div class="desc-bottom">
                                        <a href="/aksi/view/<?php echo $aksi_user[$i]['aid']?>"><h4>Dukung Aksi Ini</h4></a>
                                    </div>                                                     
                                </div><!-- .desc-->  
                            </div>         
                        </div><!--end .item-aksi-->
                        <?php } 
                   }else { ?>
                        <div class='alert alert-warning'><?php echo $user_item['fullname'] ?> belum memiliki Aksi</div>
                        <?php }?>
                        <div class="clearfix"></div>                 	
                    </div> <!--end .item aksi-landscape-->                    
              </div>
              
              <div class="tab-pane fade volunteer" id="volunteer">
              		<div class="aksi-landscape">
              		<?php if (count($volunteer_user) > 0) {?>
						
                     <?php for ($i=0;$i<count($volunteer_user);$i++){ 
					 		$aid = $volunteer_user[$i]['aid'] ?>
                    	
							
							<div class="item-aksi">
                            <div class="image">
                                <img src="upload/aksi/<?php echo $volunteer_user[$i]['pic'] ?>" />
                            </div>
                            <div class="desc-left">
                                <div class="title">
                                    <h2><?php echo $volunteer_user[$i]['judul'] ?> </h2>            
                                </div>
                                <div class="desc">
                                    <div class="desc-top">
									<?php 
                                     $target_k = $volunteer_user[$i]['jumlahtarget'];
                                     $terkumpul_k = $volunteer_user[$i]['jumlahterkumpul'];
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
									$date = strtotime($volunteer_user[$i]['tgl']);
									$remaining = $date - time();
									$days_remaining = floor($remaining / 86400);
									?>
                                        <a href="/aksi/view/<?php echo $volunteer_user[$i]['slug']?>"><h4><?php echo $days_remaining ?> Hari lagi Aksi Berakhir</h4></a>
                                    </div>
                                    <div class="desc-bottom">
                                        <a href="/aksi/view/<?php echo $volunteer_user[$i]['aid']?>"><h4>Dukung Aksi Ini</h4></a>
                                    </div>                                                     
                                </div><!-- .desc-->  
                            </div>         
                        </div><!--end .item-aksi-->
                        
						
                        <?php } 
                   }else { ?>
                        <div class='alert alert-warning'><?php echo $user_item['fullname'] ?> belum pernah menjadi volunteer</div>
                        <?php }?>
                        <div class="clearfix"></div>
                    </div>
              </div>
              <div class="tab-pane fade volunteer" id="redeem">
              		<div class="gabung" style="margin:12px;">
              			<a href="#" class="btn ">Poin anda saat ini sebanyak <?php echo "$poin"; ?> poin</a>
                    </div>
                    <h3>Silahkan pilih redeem poin anda :</h3>
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