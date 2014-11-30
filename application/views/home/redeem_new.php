<script type="text/javascript" src="/asset/js/jquery-1.7.1.min.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
  <!--<script src="http://code.jquery.com/jquery-1.10.2.js"></script>-->
  <script src="http://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
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
<div id="page-wrapper">
	<div class="row">
    	<h2 style="text-align:center;">Redeem Gudness Poin kamu disini</h2> 
        <?php if (!isset($thanks)){
				echo "";
			}else{?>
				<div class="alert alert-success"><?php echo $thanks?></div>
			<?php } ?>
            <?php if (!isset($error)){
				echo "";
			}else{?>
				<div class="alert alert-danger"><?php echo $error?></div>
			<?php }			
			?>
            <?php if (!isset($success)){
				echo "";
			}else{?>
				<div class="alert alert-success"><?php echo $success?></div>
			<?php }			
			?>
    	<div class="col-lg-3 col-md-6">
            	<div class="panel panel-primary">
                	<div class="panel-heading">
                    	<div class="row">                                
                        	<p><?php echo number_format($user_item['poin'],0) ?></p>
                       	</div>
                  	</div>
                    <a href="#">
                    	<div class="panel-footer">
                        	<span class="pull-left">Gudness Poin Kamu</span> 
                            <div class="clearfix"></div>
                       	</div>
                   	</a>
              	</div>
            </div>
    </div>	
    <div class="row"> 
    	<div class="formaksi right">  
            <div class=""> 
              <div class="tab-pan active volunteer" id="redeem">
                    <?php echo form_open_multipart('redeem/poin'); ?> 
                        <div class="form-group">
                            <!--<label for="exampleInputEmail1">Kirim Ke Alamat lengkap :</label>
                            <div class="inp">
                                <textarea type="text" name="alamat" class="form-control required" id="alamat" ><?php // if (!isset($alamat)){}else { echo $alamat ; } ?></textarea>
                        	</div>-->
                            <!--<div class="inp">
                                <input type="text" name="kota" class="form-control required" id="alamat" placeholder="Kota" value="<?php //  if (!isset($fullname)){}else { echo $fullname ; } ?>">
                        	</div>
                             <div class="inp">
                                <input type="text" name="pos" class="form-control required" id="alamat" placeholder="Kode Pos" value="<?php // if (!isset($fullname)){}else { echo $fullname ; } ?>">
                                <input type="hidden" name="uid" class="form-control required" id="uid" value="<?php// echo $user_item['uid'] ?>" />
                        	</div>-->
                        </div>  
                        <h3>Silahkan pilih redeem poin anda  :</h3>                                      
                        <?php
						  for ($i=0;$i<count($product);$i++){
							// var_dump("$i=0;$i<count($aksi_donasi_all);$i++"); ?>
							<div class="item-volunteer redeem">
								<input type="radio" class="radio" name="item" value="<?php echo $product[$i]['promid'] ?>" />
								<span class="jumpoin btn btn-primary"><?php echo $product[$i]['poin'] ?> Poin</span>
								<div class="pic">
									<a href="#"></a><img src="/upload/partner/promo/<?php echo $product[$i]['pic'] ?>" />
								</div>
								<h4 class="name"><a href="#"><?php echo $product[$i]['judul'] ?></a></h4>
							</div><!--end .item-volunteer-->                        
						   <?php } ?>
                    <div class="clearfix"></div>
                    <div class="keterangan" style="margin:40px 0px 0px;">
                    	<h3 style="margin:0px 0px 10px;">Keterangan</h3>
                        <p>- Poin yang sudah diredeem tidak dapat ditukar kembali.</p>
                    	<p>- Online voucer akan dikirimkan melalui alamat email anda.</p>
                    </div>
                    <div class="gabung" style="margin:12px;">
                    	<input type="hidden" name="uid" value="<?php echo $user_item['uid'] ?>" />
                    	<input type="submit" name="submit" value="Redeem Sekarang" class="btn btn-primary" />              			
                    </div>
                     </form>
              </div>
            </div>
    	    
    </div>    
</div>


    