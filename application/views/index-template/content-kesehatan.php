<div id="content">
	<div class="wrapper">
    	<div class="category">
        	<div class="content-category">
            	<div class="image">
                	<img src="asset/images/Kesehatan.png" />
                </div>
                <div class="title">
                	<h2>Kesehatan</h2>
                </div>
                <div class="clearfix"></div>
            </div><!-- end.content-category-->
            <?php
				//$result=mysql_query("select aid from ap_aksi where cat='kesehatan' order by id DESC limit 1 ")or die (mysql_error());//query sang database	
//				//$count=mysql_num_rows($result);//isipon kn may tyakto sa query
//				$row=mysql_fetch_array($result);//ma return row sa database		
//						
//				while($data=mysql_fetch_assoc($row))
// 			 {
//				 $judul=$data['judul'];
//				$jumlahtarget=$data['jumlahtarget'];
//				$aid=$data['aid']; 
//			 }
			//$this->load->model(array('aksi_m'));
			//$this->aksi_m->aksi_home_kesehatan();			
			?>
            <?php // foreach ($aksis as $aksi):?>
            <div class="item-aksi">
                <div class="image">
                    <a href="aksi-detail.php?aid=<?php // echo "$aid"; ?>"><img src="asset/images/zildam.png" /></a>
                </div>
                <div class="title">
                    <a href="aksi-detail.php?aid=<?php // echo "$aid"; ?>"><h2><?php // echo "$judul"; ?> Zildam</h2></a>         
                </div>
                <div class="desc">
                    <div class="desc-top">
                        <div class="text">Target Donasi</div>
                        <div class="info target" style="float:right;">
                            <p>Rp.2.100.000</p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="progress simpleProgress progressBlue ui-progressbar ui-widget ui-widget-content ui-corner-all" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="89">80<div class="ui-progressbar-value ui-widget-header ui-corner-left" style="width: 50%;"></div></div>
                        <div class="info terkumpul" style="float:left;">
                            <p>Rp.500.000</p>
                        </div>
                        <div class="text terkumpul">Donasi Terkumpul</div>
                        <div class="clearfix"></div>
                    </div><!--end .desc-top-->
                    <div class="desc-bottom">
                    	<a href="<?php base_url(); ?>aksi/detail"><h4>40 Hari lagi Aksi Berakhir</h4></a>
                    </div>
                    <div class="desc-bottom">
                    	<a href="<?php base_url(); ?>aksi/detail"><h4>Dukung Aksi Ini</h4></a>
                    </div>
                    <div class="desc-middle">
                    	<div class="fasilitator">
                        	<div class="image">
                            	<img src="asset/img/avatar9.jpg" />
                            </div>
                            <div class="desc">
                            	<h3>Jaenal Gufron</h3>
                                <p>Founder ayopeduli.com, proven fasilitator ayopeduli wilayah Jakarta</p>
                            </div>
                            <div class="clearfix"></div>
                            <h4>Fasilitator</h4>
                        </div>
                    </div><!--end .desc-middle-->                    
                </div><!-- .desc--> 
            </div><!--end .item-aksi-->
            <?php // endforeach;?>
            <a href="#">Semua Aksi Kesehatan</a>
        </div>