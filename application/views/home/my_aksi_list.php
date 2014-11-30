<script type="text/javascript" src="/asset/js/jquery-1.7.1.min.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<!--<link rel="stylesheet" href="/asset/style/bootstrap.css" />
  <!--<script src="http://code.jquery.com/jquery-1.10.2.js"></script>-->
  <script src="/asset/home/js/jquery1.8.js"></script>
 <!-- <script src="http://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>-->
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
    <script src="/asset/home/js/easing.js"></script> 
    <script src="/asset/home/js/filterable.js"></script>  
    <script type="text/javascript">
		$(document).ready(function() {
        	$("#portfolio-list").filterable();
        });    	
	</script>
	<div id="page-wrapper">
	<div class="row right buataksi all">
    	<h2 style="text-align:center;">Aksi yang kamu buat</h2>
    </div>
 	<div class="row aksilist">
        <div class="navif"><?php echo $nav; ?> </div>
        <div class="col-lg-12">
        	<div class="category" id="portfolio-list">  
                <?php
				foreach($results as $datas) { ?>   
                <?php // for ($i=0;$i<count($results);$i++){?>   	           
        	   <div class="item-aksi <?php echo $datas->cat ?>" data-category="<?php echo $datas->cat ?>">
            	<div class="labelas">
                	<?php if ($datas->cat == 'kesehatan'){ ?>
                    	<img src="/asset/images/Kesehatan.png" />
                    <?php } ?>
                    <?php if ($datas->cat == 'pendidikan'){ ?>
                    	<img src="/asset/images/education.png" />
                    <?php } ?>
                    <?php if ($datas->cat == 'lingkungan'){ ?>
                    	<img src="/asset/images/lingkungan.png" />
                    <?php } ?>                	
                </div>
                <div class="image">
                    <a href="/home/aksi/<?php echo $datas->slug ?>"><img src="/upload/aksi/<?php echo $datas->pic ?>"></a>
                </div>
                <div class="title">
                    <a href="/home/aksi/<?php echo $datas->slug ?>"> <h2><?php echo $datas->judul ?></h2></a>         		</div>
                <div class="desc">
                    <div class="desc-top">
                    <?php 
						 $target_k = $datas->jumlahtarget;
						 $terkumpul_k = $datas->jumlahterkumpul;
						 $progress_k = $terkumpul_k/$target_k * '100';
						?>
                    	<div class="text">Target Donasi</div>
                        <div class="info target" style="float:right;">
                            <p>Rp.<?php echo number_format("$target_k") ?></p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="progress simpleProgress progressBlue ui-progressbar ui-widget ui-widget-content ui-corner-all" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="" style="width:100%"><div class="ui-progressbar-value ui-widget-header ui-corner-left" style="width: <?php echo "$progress_k"; ?>%;"></div></div>
                        <div class="info terkumpul" style="float:left;">
                            <p>Rp.<?php echo number_format("$terkumpul_k") ?></p>
                        </div>
                        <div class="text terkumpul"><?php echo intval($progress_k) ?>% Donasi Terkumpul</div>
                        <div class="clearfix"></div>
                    </div><!--end .desc-top-->
                    <div class="desc-bottom">
                    	<?php 
						$date = strtotime($datas->tgl);
						$remaining = $date - time();
						$days_remaining = floor($remaining / 86400);
					?>
                    <a href="/aksi/view/<?php echo $datas-> slug ?>/#donasi"><h4>
                    <?php if ( $days_remaining < 0 ) { echo 'Aksi telah berakhir'; } else { echo $days_remaining." Hari lagi Aksi Berakhir" ;}?></h4></a>
                    </div>
                    <div class="desc-bottom">
                    	<a href="/aksi/view/<?php echo $datas-> slug ?>"><h4>Dukung Aksi Ini</h4></a>
                    </div>
                    <div class="desc-middle">
                    	<div class="fasilitator">
                        	<div class="image">
                           <?php 
								//var_dump(!is_null($user_item['photo']));
								$photos = $datas->photo;
								if ($photos=='0'){ ?>
								<img width="300px" src="/upload/user/0cc783073edbff95b4b94868c1f4e49c.jpg" />                         
								<?php }else{?> 
								<img width="300px" src="/upload/user/<?php echo $photos?>" /> 
								<?php }?>
                            </div>
                            <div class="poin" style="position: absolute;z-index: 100000;color: #fff;bottom: 54px;left: 70px;background: rgb(103,194,239);padding: 9px;border: 1px solid #ccc;border-radius: 50px;opacity: 0.8;"><?php echo $datas-> poin ?></div>
                            <div class="desc">
                            	<a href="/profile/view/<?php echo $datas->uid ?>"><h3><?php echo $datas->fullname ?></h3></a>
                                <p>Fasilitator ayopeduli.com</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div><!--end .desc-middle-->                    
                </div><!-- .desc--> 
            </div><!--end .item-aksi-->
            <?php } ?>
            <div class="clearfix"></div>
            <div class="navif"><?php echo $nav; ?> </div>
        </div>
            
            </div>
                    <!-- /.col-lg-12 -->
        </div>	
      
</div>


    