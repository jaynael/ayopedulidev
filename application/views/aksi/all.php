<div id="content">
	<div class="wrapper">   
    <?php foreach ($aksi as $aksi_item): ?>
    	<div class="category">        	           
            <div class="item-aksi">
                <div class="image">
                    <a href="/aksi/view/<?php echo $aksi_item['slug'] ?>"><img src="/upload/aksi/<?php echo $aksi_item['pic']?>" /></a>
                </div>
                <div class="title">
                    <a href="/aksi/view/<?php echo $aksi_item['slug'] ?>"><h2><?php echo $aksi_item['judul'] ?></h2></a>         		</div>
                <div class="desc">
                    <div class="desc-top">
                    	<?php 
						 $target_k = $aksi_item['jumlahtarget'];
						 $terkumpul_k = 500000;
						 $progress_k = $terkumpul_k/$target_k * '100';
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
//                                  echo "Rp.".number_format($terkumpul = $aksi_slider[$i]['jumlahterkumpul']);                                                                     
//                              }else{
//                                  echo("gak ada");
//                                  
//                              }
                                    if($aksi_item['jumlahterkumpul']){                                                
                                       print number_format($aksi_item['jumlahterkumpul'],0);
                                    }
                                    else{
                                       print "0.00";
                                    } ?></p>
                        </div>
                        <div class="text terkumpul"><?php echo intval($progress_k) ?>%Donasi Terkumpul</div>
                        <div class="clearfix"></div>
                    </div><!--end .desc-top-->
                    <div class="desc-bottom">
                    	<?php 
						$date = strtotime($aksi_item['tgl']);
						$remaining = $date - time();
						$days_remaining = floor($remaining / 86400);
					?>
                    <a href="/aksi/view/<?php echo $aksi_item['slug']?>/#donasi"><h4><?php echo $days_remaining ?> Hari lagi Aksi Berakhir</h4></a>
                    </div>
                    <div class="desc-bottom">
                    	<a href="/aksi/view/<?php echo $aksi_item['slug'] ?>"><h4>Dukung Aksi Ini</h4></a>
                    </div>
                    <div class="desc-middle">
                    	<div class="fasilitator">
                        	<div class="image">
                             <?php 
								//var_dump(!is_null($user_item['photo']));
								if ($aksi_item['photo']==0){ ?>
								<img width="300px" src="/upload/user/0cc783073edbff95b4b94868c1f4e49c.jpg" />                         
								<?php }else{?> 
								<img width="300px" src="/upload/user/<?php echo $aksi_item['photo']?>" /> 
								<?php }?>
                            </div>
                            <div class="desc">
                            	<a href="/profile/view/<?php echo $aksi_item['uid'] ?>"><h3><?php echo $aksi_item['fullname'] ?></h3></a>
                                <p>Fasilitator ayopeduli.com</p>
                            </div>
                            <div class="clearfix"></div>
                            <h4>Fasilitator</h4>
                        </div>
                    </div><!--end .desc-middle-->                    
                </div><!-- .desc--> 
            </div><!--end .item-aksi-->
        </div>
        <?php endforeach ?>
        <div class="clearfix"></div>
    </div><!--end .wrapper-->
</div><!-- end #content-->