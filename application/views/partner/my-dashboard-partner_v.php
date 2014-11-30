<div id="content" class="page">
	<div class="wrapper">
    	<div class="left" style="width:215px;">
    		<div class="profile-tab">
            	<div class="top">                
                    <div class="pic">
                    	<?php 
						//var_dump(!is_null($user_item['photo']));
						if ($user_item['pic']== 'null'){ ?>
                        <img width="300px" src="/upload/user/0cc783073edbff95b4b94868c1f4e49c.jpg" />                         
                        <?php }else{?> 
                        <img width="300px" src="/upload/partner/<?php echo $user_item['pic']?>" /> 
                        <?php }?>                  
                    </div>
                    <h4 style="margin:10px 0px;"><?php echo $user_item['perusahaan'] ?> </h4>
                    <span style="font-size:14px;text-align:center;margin:5px 0px;">Partner ID : <?php echo $user_item['partid'] ?></span>
                </div>
                
            </div><!-- .end .profile-tab-->
        </div>
        <div class="right" style="width:730px;">
            <div class="nav-dash">
            	<a href="/partner/home" class="btn btn-primary"> My Promo</a>
                <a href="/partner/new_promo" class="btn "> + Create Promo</a>
                <a href="#" class="btn "> My Support</a>
                <a href="#" class="btn "> + Give Support</a>
                <a href="#" class="btn "> Setting</a>
            </div>
            <div class="content-dash" id="index">
            <?php /// var_dump($promo_item); ?>
            <?php if (count($promo_item) > 0) {?>
				<?php for ($i=0;$i<count($promo_item);$i++){ ?>
            	<div class="item-aksi" id="item">
                    <div class="image">
                        <a href="/promo/view/<?php echo $promo_item[$i]['promid'] ?>""><img src="/upload/partner/promo/<?php echo $promo_item[$i]['pic'] ?>"></a>
                    </div>
                    <div class="title">
                        <a href="/promo/view/<?php echo $promo_item[$i]['promid'] ?>""><h2><?php echo $promo_item[$i]['judul'] ?></h2></a></div>
                    <div class="desc">
                        <div class="desc-top">
                            <p>Voucher Tersedia : <?php echo $promo_item[$i]['tersedia'] ?></p>
                            <p>Voucher Teredeem : <?php echo $promo_item[$i]['teredeem'] ?></p>
                            <p>Voucher Tersisa : <?php echo $promo_item[$i]['tersisa'] ?></p>
                        </div><!--end .desc-top-->                   
                    </div><!-- .desc--> 
                </div><!-- end item-->
                <?php } 
                   }else { ?>
                        <div class='alert alert-warning'>Anda belum memiliki Promo</div>
                        <?php }?>
                <div class="clearfix">
                
            </div><!-- end content-dash-->
        </div>        
        <div class="clearfix"></div>
    </div><!--end .wrapper-->
    <div class="clearfix">
</div><!-- end #content-->