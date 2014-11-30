<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Platform kolaborasi aksi sosial media untuk membantu memudahkan penggalangan donasi secara online bagi aksi-aks sosial di Indonesia ">
<meta name="keywords" content="ayo peduli,ayopeduli,crowd funding,sosial,charity,donasi,mohon bantuan,bantuan sosial,penyakit,project sosial,sedekah,beramal,">
<meta name="author" content="Jaenal Gufron">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<meta name="google-translate-customization" content="3c96cf38daa8e69a-28333a0d505bdc6b-gedf1dd4c660b0da5-10"></meta>
<title>Ayopeduli.com | <?php  echo $title?></title>
<link rel="shortcut icon" href="http://new.ayopeduli.com/upload/user/71725d8b1327208c7ca5127589bfd17d.png"/>
<link rel="stylesheet" type="text/css" href="<?php //echo base_url(); ?>/asset/style/style.css" />
<link rel="stylesheet" type="text/css" href="<?php //echo base_url(); ?>/asset/style/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php //echo base_url(); ?>/asset/style/bootstrap-2.min.css" />
<link rel="stylesheet" type="text/css" href="<?php //echo base_url(); ?>/asset/style/bootstrap-responsive.min.css" />
<link href="/asset/style/style-responsive.css" rel="stylesheet" type="text/css">
<link href="/asset/style/bootstrap-tour.css" rel="stylesheet" type="text/css">
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
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
<link rel="stylesheet" href="/asset/style/jquery-ui.css">
<!--<script src="http://code.jquery.com/jquery-1.9.1.js"></script>-->
<script src="/assset/js/jquery-ui.js"></script>

<!-- responsive-->
<!--<link type="text/css" rel="stylesheet" href="/asset/js/menu-mobile/demo/demo.css" />-->
		<link type="text/css" rel="stylesheet" href="/asset/js/menu-mobile/src/css/jquery.mmenu.css" />
		<link type="text/css" rel="stylesheet" href="/asset/js/menu-mobile/src/css/extensions/jquery.mmenu.widescreen.css" media="all and (min-width: 900px)" />
		<link type="text/css" rel="stylesheet" href="/asset/js/menu-mobile/src/css/extensions/jquery.mmenu.themes.css" media="all and (min-width: 900px)" />

		<style type="text/css">
			@media all and (min-width: 900px) {
				html, body {
					height: 100%;
				}
				#menu {
					background: #eee;
				}
				#page {
					border-left: 1px solid #ccc;
					min-height: 100%;
				}
				/* hide open-button */
				a[href="#menu"]
				{
					/*display: none !important;*/
				}
				#header #logo a#menu
				{
					background: center center no-repeat transparent;
					background-image: url( data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAADhJREFUeNpi/P//PwOtARMDHQBdLGFBYtMq3BiHT3DRPU4YR4NrNAmPJuHRJDyahEeT8Ii3BCDAAF0WBj5Er5idAAAAAElFTkSuQmCC );
				
					display: block;
					width: 40px;
					height: 40px;
					position: absolute;
					top: 0;
					left: 10px;
				}
			}
		</style>

		
		<script type="text/javascript" src="/asset/js/menu-mobile/src/js/jquery.mmenu.js"></script>
		<script type="text/javascript">
			$(function() {
				//$('nav#menu').mmenu({
//					classes: 'mm-light'
//				});
			});
		</script>

</head>
<?php
			if($this->session->userdata('logged_partner')){
				$data['item'] = $this->session->userdata('logged_partner');
				$fullname = $data['item']['perusahaan'];
				$partid = $data['item']['partid'];
				//var_dump($data['item']);?>
			
			 <div class="profile-top" style="width:400px;margin:10px auto;">
             	silahkan klik <a title="Go To My Profile" class="btn btn-primary" href="/partner/home/"><?php //echo $fullname ?> Disini</a> untuk masuk halaman partner 
             </div>		
            
			<?php  } ?>
<div id="header" >
	<div class="wrapper">
    	<div class="logo" id="logo"> <a href="<?php //echo base_url(); ?>/"><img src="<?php //echo base_url(); ?>/asset/images/logo.png" /></a></div>  
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
        <!-- google translate-->
        	<div id="google_translate_element" class="translate"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'id', includedLanguages: 'en,id', gaTrack: true, gaId: 'UA-5095553'}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
            <!-- end google translate-->
        	<?php
			if($this->session->userdata('logged_in')){
				$data['item'] = $this->session->userdata('logged_in');
				$fullname = $data['item']['fullname'];
				$uid = $data['item']['uid'];
				//var_dump($fullname);?>
			
			 <div class="profile-top" style="margin: 20px 0px 11px;text-align: right;">
             	Hi <a title="Go To My Profile" href="/home/"><?php echo $fullname ?></a>, <a href="/home/logout">Logout</a>
             </div>		
            
			<?php  } else { ?>
            <div class="login-sosial" id="loginson">
                        <!--Hi, <a href="<?php //echo base_url(); ?>/profile/myprofile">Jaenal </a>--> 
                        <a href="<?php //echo base_url(); ?>/login" class="btn btn-primary">login</a> 
                        <a href="<?php //echo base_url(); ?>/register" class="btn btn-primary" >Register</a>                          
            </div>
            <div class="clearfix"></div>				
			<?php } ?>
            
            <?php
			//var_dump($user_profile);			
			if (@$user_profile):  // call var_dump($user_profile) to view all data
			//var_dump($user_profile); ?>
            <ul class="nav nav-pills">
              <li class="dropdown">
              	Selamat Datang <?=$user_profile['first_name']?>,
                <a class="dropdown-toggle" href="/dashboard">
                  <img class="img-thumbnail" data-src="holder.js/140x140" alt="140x140" src="https://graph.facebook.com/<?=$user_profile['id']?>/picture?type=large" style="width: 40px; height: 40px; padding:0px;"> <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                  <a href="/welcome/logout">Logout</a>
                </ul>
              </li>
            </ul>
                <!--<div class="row">
                    <div class="col-lg-12 text-center">
                        Selamat Datang <a href="<?=$user_profile['link']?>" class=""><?=$user_profile['first_name']?></a>, <img class="img-thumbnail" data-src="holder.js/140x140" alt="140x140" src="https://graph.facebook.com/<?=$user_profile['id']?>/picture?type=large" style="width: 40px; height: 40px; padding:0px;">
                        
                       <!-- <a href="<?= $logout_url ?>" class="btn btn-lg btn-primary btn-block" role="button">Logout</a>
                    </div>
                </div>-->
            <?php else: ?>
                <!--<a href="<?= $login_url ?>" class="btn btn-lg btn-primary btn-block" role="button">Login Facebook</a>-->
                <!--<div class="login-sosial" id="loginson">
                            <!--Hi, <a href="<?php //echo base_url(); ?>/profile/myprofile">Jaenal </a> 
                            <a href="<?php //echo base_url(); ?>/login" class="btn btn-primary">login</a> 
                            <a href="<?php //echo base_url(); ?>/register" class="btn btn-primary" >Register</a>                          
                </div>
                <div class="clearfix"></div>-->
            <?php endif; ?>
        	       	
            
            <div class="clearfix"></div>
        	<!--<ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Cara Kerja</a></li>        
                <li><a href="#">Aksi Sosial</a></li>
                <li><a href="#">Partner</a></li>
                <li class="last"><a href="#">Donasi</a></li>
                <div class="clearfix"></div>
            </ul>-->
        </div>
        <div class="clearfix"></div>
        <!--<div class="banner">
        	<a href="http://ayopeduli.com/savemugo" target="_blank"><img src="http://ayopeduli.com/asset/sangkur/images/banner-ayopeduli.png"></a>
        </div>-->
    </div>

</div><!-- end #header-->