<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Platform kolaborasi aksi sosial media untuk membantu memudahkan penggalangan donasi secara online bagi aksi-aks sosial di Indonesia ">
<meta name="keywords" content="ayo peduli,ayopeduli,crowd funding,sosial,charity,donasi,mohon bantuan,bantuan sosial,penyakit,project sosial,sedekah,beramal,">
<meta name="author" content="Jaenal Gufron">
<meta charset="UTF-8">
<title>Ayopeduli.com | <?php  echo $title?></title>
<link rel="shortcut icon" href="http://new.ayopeduli.com/upload/user/71725d8b1327208c7ca5127589bfd17d.png"/>
<link rel="stylesheet" type="text/css" href="<?php //echo base_url(); ?>/asset/style/style.css" />
<link rel="stylesheet" type="text/css" href="<?php //echo base_url(); ?>/asset/style/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php //echo base_url(); ?>/asset/style/bootstrap-2.min.css" />
<link rel="stylesheet" type="text/css" href="<?php //echo base_url(); ?>/asset/style/bootstrap-responsive.min.css" />
<link href="/asset/style/bootstrap-tour.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php //echo base_url(); ?>/asset/js/jquery-1.7.1.min.js"></script>
    	<script src="<?php //echo base_url(); ?>/asset/js/jquery.roundabout.js"></script>
			<script>
                $(document).ready(function() {
                    $('ul#featured').roundabout();
                });
            </script>
<script type="text/javascript" src="<?php //echo base_url(); ?>/asset/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php //echo base_url(); ?>/asset/js/affix.js"></script>
<script type="text/javascript" src="<?php //echo base_url(); ?>/asset/js/tab.js"></script>
<!--<script type="text/javascript" src="/asset/js/tooltip.js"></script>
<script type="text/javascript" src="/asset/js/popover.js"></script>-->
<script type="text/javascript" src="/asset/js/bootstrap-tour.js"></script>
<link rel="stylesheet" href="/asset/js/jquery-ui.css">
<!--<script src="http://code.jquery.com/jquery-1.9.1.js"></script>-->
<script src="/asset/js/jquery-ui.js"></script>

</head>
<div id="header">
	<div class="wrapper">
    	<div class="logo" id="logo"><a href="<?php //echo base_url(); ?>/"><img src="<?php //echo base_url(); ?>/asset/images/logo.png" /></a></div>  
        <div class="main-menu" id="category">
        	<ul>
            	<li>
                	<a href="/aksi/category/kesehatan"><img src="<?php //echo base_url(); ?>/asset/images/Kesehatan.png" /><span>Kesehatan</span></a>
                </li>
                <li>
                	<a href="/aksi/category/pendidikan"><img src="<?php //echo base_url(); ?>/asset/images/education.png" /><span>Pendidikan</span></a>
                </li>
                <li>
                	<a href="/aksi/category/lingkungan"><img src="<?php //echo base_url(); ?>/asset/images/lingkungan.png" /><span>Lingkungan</span></a>
                </li>
                <div class="clearfix"></div>
            </ul>
        </div>      
        <div class="menu-top" id="menu-top">
        	<?php
			if($this->session->userdata('loggedpartner')){
				$data['item'] = $this->session->userdata('loggedpartner');
				$fullname = $data['item']['perusahaan'];
				$partid = $data['item']['partid'];
				//var_dump($data['item']);?>
			
			 <div class="profile-top" style="margin: 20px 0px 11px;text-align: right;">
             	Selamat Datang <a title="Go To My Profile" href="/partner/home/"><?php echo $fullname ?></a>, <a href="/partner/logout">Logout</a>
             </div>		
            
			<?php  } else { ?>
            <div class="login-sosial">
                        <!--Hi, <a href="<?php //echo base_url(); ?>/profile/myprofile">Jaenal </a>--> 
                        <a href="<?php //echo base_url(); ?>/partner/login" class="btn btn-primary">login</a> 
                        <a href="<?php //echo base_url(); ?>/partner" class="btn btn-primary" >Register</a>                          
            </div>
            <div class="clearfix"></div>				
			<?php } ?>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>

</div><!-- end #header-->
