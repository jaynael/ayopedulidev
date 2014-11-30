<div id="content">
	<div class="wrapper">   
    <?php 
	
	for ($i=0;$i<count($aksi_item);$i++){ ?>
    	<div class="category">        	           
            <div class="item-aksi">
                <div class="image">
                    <a href="/aksi/view/<?php echo $aksi_item[$i]['slug'] ?>"><img src="/upload/aksi/<?php echo $aksi_item[$i]['pic']?>" /></a>
                </div>
                <div class="title">
                    <a href="/aksi/view/<?php echo $aksi_item[$i]['slug'] ?>"><h2><?php echo $aksi_item[$i]['judul'] ?></h2></a>         		</div>
                <div class="desc">
                    <div class="desc-top">
                    	<?php 
						 $target_k = $aksi_item[$i]['jumlahtarget'];
						 $terkumpul_k = $aksi_item[$i]['jumlahterkumpul'];
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
						$date = strtotime($aksi_item[$i]['tgl']);
						$remaining = $date - time();
						$days_remaining = floor($remaining / 86400);
					?>
                    <a href="/aksi/view/<?php echo $aksi_item[$i]['slug'] ?>/#donasi"><h4>
                    <?php if ( $days_remaining < 0 ) { echo 'Aksi telah berakhir'; } else { echo $days_remaining." Hari lagi Aksi Berakhir" ;}?></h4></a>
                    </div>
                    <div class="desc-bottom">
                    	<a href="/aksi/view/<?php echo $aksi_item[$i]['slug'] ?>"><h4>Dukung Aksi Ini</h4></a>
                    </div>
                    <div class="desc-middle">
                    	<div class="fasilitator">
                        	<div class="image">
                           <?php 
								//var_dump(!is_null($user_item['photo']));
								$photos = $aksi_item[$i]['photo'];
								if ($photos=='0'){ ?>
								<img width="300px" src="/upload/user/0cc783073edbff95b4b94868c1f4e49c.jpg" />                         
								<?php }else{?> 
								<img width="300px" src="/upload/user/<?php echo $photos?>" /> 
								<?php }?>
                            </div>
                            <div class="poin" style="position: absolute;z-index: 100000;color: #fff;bottom: 54px;left: 70px;background: rgb(103,194,239);padding: 9px;border: 1px solid #ccc;border-radius: 50px;opacity: 0.8;"><?php echo $aksi_item[$i]['poin'] ?></div>
                            <div class="desc">
                            	<a href="/profile/view/<?php echo $aksi_item[$i]['uid'] ?>"><h3><?php echo $aksi_item[$i]['fullname'] ?></h3></a>
                                <p>Fasilitator ayopeduli.com</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div><!--end .desc-middle-->                    
                </div><!-- .desc--> 
            </div><!--end .item-aksi-->
        </div>
        <?php } ?>
        <div class="clearfix"></div>
    </div><!--end .wrapper-->
</div><!-- end #content-->