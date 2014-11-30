<div id="content" class="page">
	<div class="wrapper">
    	<div class="left" style="width:215px;">
    		<div class="profile-tab">
            	<div class="top">                
                    <div class="pic">
                    	<?php 
						//var_dump(!is_null($user_item['photo']));
						if ($user_item['photo']=='0'){ ?>
                        <img width="300px" src="/upload/user/0cc783073edbff95b4b94868c1f4e49c.jpg" />                         
                        <?php }else{?> 
                        <img width="300px" src="/upload/user/<?php echo $user_item['photo']?>" /> 
                        <?php }?>                  
                    </div>
                    <h4 style="margin:10px 0px;"><?php echo $user_item['fullname'] ?> </h4>
                    <span style="font-size:14px;text-align:center;margin:5px 0px;">AP ID : <?php echo $user_item['uid'] ?></span>
                </div>
                <div class="poin">
                	<div class="angka">
                    	<span class="main"><?php echo number_format($user_item['poin'],0) ?></span> 
                                                   	
                        <span class="second">Gudness</span>                        
                    </div>
                    <p>Lakukan donasi dan volunteering untuk meningkatkan jumlah poin kamu</p>
                    <p></p>
                </div>
            </div><!-- .end .profile-tab-->
        </div>
        <div class="right" style="width:730px;">
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
				<div class="alert alert-success"><?php echo $success?> </div>
			<?php }			
			?>
        	<ul class="nav nav-tabs" role="tablist">
              <li><a href="/home" >Buat Aksi</a></li>
              <li><a href="#update" data-toggle="tab">Aksi saya</a></li>
              <li><a href="#history" data-toggle="tab">Hystori Donasi</a></li>              
              <li class="active"><a href="/home/redeem" >Redeem Poin</a></li>
              <li><a href="#volunteer" data-toggle="tab">Edit Profile</a></li>
            </ul>            
            <div class="tab-conte"> 
              <div class="tab-pan active volunteer" id="redeem">
              		<div class="gabung" style="margin:12px;">
              			<a href="#" class="btn ">Gudness Poin anda saat ini sebanyak <?php echo number_format($user_item['poin'],0) ?> poin</a>
                    </div>                    
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
                    <div class="keterangan" style="margin:20px 0px 0px;">
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
            <script type="text/javascript" src="/asset/js/bootstrap.min.js"></script>
			<!--<script type="text/javascript" src="/asset/js/tab.js"></script>-->
            <script>
              $(function () {
                //$('#mytab a:first').tab('show')
              })
            </script>
        </div>        
        <div class="clearfix"></div>
    </div><!--end .wrapper-->
</div><!-- end #content-->