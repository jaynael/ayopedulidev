<!DOCTYPE HTML>
<html>
	<head>
		<title>ayopeduli.com | Membangun Surga di Muara Gembong</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
        <link rel="shortcut icon" href="http://new.ayopeduli.com/upload/user/71725d8b1327208c7ca5127589bfd17d.png"/>
		<!--<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,300italic" rel="stylesheet" type="text/css" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="asset/sangkur/js/jquery.min.js"></script>
		<script src="asset/sangkur/js/jquery.poptrox.min.js"></script>
		<script src="asset/sangkur/js/skel.min.js"></script>
		<script src="asset/sangkur/js/init.js"></script>
        <noscript>
			<link rel="stylesheet" href="asset/sangkur/css/skel-noscript.css" />
			<link rel="stylesheet" href="asset/sangkur/css/style.css" />
		</noscript>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "ur-556f6805-2c18-7a19-3ec3-464e9e6ee4a8", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body>
		<?php if(isset($emailSent) && $emailSent == true) { ?>
        	<div class="beres" style="width: 50%;margin: 58px auto -20px;background: #BCF;color: #fff;border: 1px solid #fff;border-radius: 13px;">
               <p style="padding: 10px;text-align: center;">Terima Kasih, Pendaftaran anda telah kami terima, mohon periksa email anda jika belum silahkan hubungi kami di No. 081214939954</p>
            </div>
        
        <?php } else { ?>							
        	<?php if(isset($hasError) || isset($captchaError)) { ?>
            <div class="error btn-warning" style="width: 50%;margin: 58px auto -20px;background: #ccc;color: #fff;border: 1px solid #fff;border-radius: 13px;">
               <p style="padding: 10px;text-align: center;"><?php echo validation_errors(); ?></p>
            </div>
            <?php } 
          }?>
          
          <?php if (!isset($success)){
				echo "";
				}else{?>
					<div class="beres" style="width: 50%;margin: 58px auto -20px;background: #BCF;color: #fff;border: 1px solid #fff;border-radius: 13px;">
               <p style="padding: 10px;text-align: center;"><?php echo $success; ?> <?php echo $nama; ?>, Anda telah terdaftar dalam #Sangkur (Sarang Kumpul Relawan) #Savemugo, silahkan lakukan pembayaran, detail pembayaran terkirim ke email anda <?php echo $email; ?> silahkan klik <a href="http://ayopeduli.com/home">disini</a> Untuk melihat Gudness Poin Anda </p>
            </div>
		<?php }?>
        
          
          <?php if (!isset($error)){
				echo "";
				}else{?>
					<div class="error btn-warning" style="width: 50%;margin: 58px auto -116px;background: #ccc;color: #fff;border: 1px solid #fff;border-radius: 13px;">
               <p style="padding: 10px;text-align: center;"><?php echo validation_errors(); ?><?php echo $error?></p>
               </div>
		<?php }?>
		<!-- Header -->
			<section id="header" style="padding:5em 0 14em 0;">
				<header>
					<h1>Membangun Surga di Muara Gembong</h1>
					<p>Collaborate to better life in Muara Gembong with ayopeduli.com</p>
				</header>
				<footer>
					<a href="#banner" class="button style2 scrolly">Sabtu, 21 Juni 2014 - Pantai Beting, Muara Gembong Kab. Bekasi</a>
				</footer>
			</section>
		
		<!-- Banner -->
        <style type="text/css">
			#banner p{
				margin: 0px 0px 10px !important;
				text-align: left !important;
			}
		</style>
			<section id="banner">
				<header>
                	<div class="image" style="width:150px;margin:0px auto;">
                		<img src="/asset/sangkur/images/savemugo.png">
                    </div>
					<h1>Ayopeduli.com | #SAVEMUGO</h1>
				</header>
				<p>Gerakan #SAVEMUGO adalah aksi penyelamatan lingkungan Muara Gembong yang saat ini dalam kondisi kritis, dengan semakin maraknya pembukaan lahan tambak dengan membabat habis hutan mangrove oleh tangan-tangan tidak bertanggung jawab, perburuan satwa langka lutung jawa serta Abrasi pantai yang parah sehingga mengakibatkan hilangnya 2 Dusun di Muara Gembong membuat kondisi Muara Gembong semakin parah.</p>

<p>Selain melakukan penanaman mangrove, kami juga mengkampanyekan potensi wisata di Muara Gembong yang menarik dan seru. Ada beberapa destinasi menarik yang ada di Muara Gembong seperti halnya Pantai Beting, Muara  Kuntul serta Muara Mekar dimana terdapat satwa langka Lutung Jawa.</p>

<p>Kegiatan ini akan dikemas dengan trip wisata  alam  ke Muara Gembong. Anda akan disuguhi pemandangan alam Muara Gembong dan perjalanan wisata yang seru.</p>

<p>Dari potensi tersebutlah kami ingin mengajak Anda untuk peduli terhadap Muara Gembong dengan penanam mangrove agar dapat mengurangi dampak kerusakan lingkungan, untuk mengurangi intensitas banjir rob, mengurangi resiko abrasi, serta menyelamatkan satwa lutung jawa dari kepunahan.</p>

				<footer>
					<a href="#first" class="button style2 scrolly">Act on this message</a>
				</footer>
			</section>
		
		<!-- Feature 1 -->
			<article id="first" class="container box style1 right">
				<a href="#" class="image full"><img src="http://tripseru.com/wp-content/uploads/2014/03/bg-300x214.jpg" alt="" /></a>
				<div class="inner">
					<header>
						<h2>Permasalahan Utama</h2>
					</header>
					<p>Abrasi yang parah, penebangan hutan bakau, serta perburuan lutung jawa membuat Muara Gembong semakin kritis</p>
				</div>
			</article>
		
		<!-- Feature 2 -->
			<article class="container box style1 left">
				<a href="#" class="image full"><img src="https://fbcdn-sphotos-d-a.akamaihd.net/hphotos-ak-prn2/t1/1507963_809592509056278_452043949_n.jpg" alt="" /></a>
				<div class="inner">
					<header>
						<h2>Solusi</h2>
					</header>
					<p>Jadilah bagian dari Solusi penyelamatan Muara Gembong, Agar generasi selanjutnya dapat menikmati.</p>
				</div>
			</article>
            
            <!-- Feature 3 -->
			<article id="first" class="container box style1 right">
				<a href="#" class="image full"><img src="http://tripseru.com/wp-content/uploads/2014/03/mugo.jpg" alt="" /></a>
				<div class="inner">
					<header>
						<h2>Potensi Alam <br> Yang Menakjubkan </h2>
					</header>
					<p>Nikmati pesona alam Muara Gembong yang indah dan menakjubkan. Potensi wisata ini sangat kami rekomendasikan untuk anda</p>
				</div>
			</article>
            
		
		<!-- Portfolio -->
			<article class="container box style2">
				<header>
					<h2>"Membangun Surga di Muara Gembong"</h2>
					<span>Akan dilaksanakan </span><br>
                    <span>Di</span><br>
                    <span>Pantai Beting, Muara Gembong Sabtu 21 Juni 2014</span><br>
                    <span>Donasi Rp.175.000/Pax</span><br>
                    <span>Titik Kumpul : Summarecon Bekasi</span>
				</header>				
			</article>
            
            <article class="container box style2">
				<header>
					<h2>Info Lebih lengkap hubungi</h2>					
                    <span> Gufron : 0812 1493 9954 </span> <br>
                    <span>Zapul : 0812 8299 9674 </span><br>
				</header>				
			</article>
			
			<article class="container box style2">
				<header>
					<h2>Ittinery, Sabtu - 21 Juni 2014</h2>
					<span>Ittinery “Membangun Surga di Muara Gembong” ;</span><br>
			<span>06.00 – 07.00 : Meeting Poin GOR KOTA Bekasi</span><br>
			<span>07.00 – 09.30 : Perjalanan ke Muara Gembong, sampai di Dermaga Kecamatan</span><br>
			<span>09.30 – 11.00 : Perjalanan ke Pantai Beting, Makan siang, liat pembibitan mangrove</span><br>
			<span>11.30– 13.00 : Sampai di Sekolah SDN 4 Pantai Bahagia</span><br>
			<span>13.00 – 14.00 : Mangrooving </span><br>
			<span>14.00 – 14.30 : Pengibaran Bandera 68meter x 2meter </span><br>
			<span>14.30 – 16.30 : Perjalanan kembali ke dermaga Kec. Muara Gembong </span><br>
			<span>16.30 – 18.30 : Perjalanan menuju bekasi – Selesai</span>
			<br><br><br><br>
			
			<h2>Perlengkapan yang harus dibawa :</h2>
			<span>- Sandal</span><br>
			<span>- Celana Pendek</span><br>
			<span>- Sun Block</span><br>
			<span>- Baju Pantai</span><br>
			<span>- Obat-obatan pribadi</span>					
                    
				</header>				
			</article>
			
			<article class="container box style2">
				<header>
					<h2>Cara Terlibat</h2>					
                    <span> - Membayar Donasi Rp.149.000/pax/orang </span> <br>
                    <span> - Transfer ke BCA Acc. 1330-165-592 A.n Jaenal Khupron (Founder Ayopeduli.com)</span> <br>
                    <span> - Konfirmasi kirim sms Savemugo_Nama_jumlah peserta_jumlah transfer</span> <br>
                    <span> - kirim ke 0812 149 399 54</span> <br>
				</header>				
			</article>
		
		<!-- Contact -->
			<article class="container box style3">
				<header>
					<h2>Bergabunglah dalam Aksi Sangkur #SAVEMUGO</h2>
				</header>
                <div id="message_ajax"></div>				
   				<?php echo form_open_multipart('sangkur/daftar'); ?>
					<div class="row half">
						<div class="6u"><span>Nama</span><input type="text" class="text" name="nama" placeholder="Nama" value="<?php if (!isset($nama)){}else { echo $nama ; } ?>" /></div>
                        <div class="6u"><span>Komunitas</span><input type="text" class="text" name="komunitas" placeholder="Dari Komunitas" value="<?php if (!isset($komunitas)){}else { echo $komunitas ; } ?>" /></div>
						<div class="6u"><span>Email</span><input type="text" class="text" name="email" placeholder="Email" value="<?php if (!isset($email)){}else { echo $email ; } ?>" /></div>                        
                        <div class="6u"><span>Hp</span><input type="text" class="text" name="hp" placeholder="No Handphone" value="<?php if (!isset($hp)){}else { echo $hp ; } ?>" /></div>
                        <div class="6u"><span>Photo Profile</span><input type="file" class="text" name="photoimg" placeholder="Photo Profile" /> <span>Maksimal 600px * 600px</span></div>
					</div>
					<div class="row half">
						<div class="12u">
							<textarea name="message" placeholder="Pesan"></textarea>
						</div>
					</div>
					<div class="row">
						<div class="12u">
							<ul class="actions">
								<li><button type="submit" class="button form" id="submit" name="submit">Gabung sekarang</button></li>
                                <input type="hidden" name="submitted" id="submitted" value="true" />
							</ul>
						</div>
					</div>
				</form>
                
                <header>
					<!--<h2>Relawan yang telah terdaftar</h2>-->
                    <style type="text/css">
						.relawan{
							margin:20px 0px;
						}
						.relawan li{
							float: left;
							border: 1px solid #ccc;
							width: 150px;
							margin: 5px;
							height: 170px;
						}
						.relawan li p{
							background: none;
							margin: -10px 0px 35px 0px;
							padding: 11px 0px;
							text-align: center;
							font-size: 12px;
							display: inherit;
							line-height: 135%;
						}
						.clear{
							clear:both;
						}
					</style>
                    <!--<ul class="relawan">
                     <?php // for ($i=0;$i<count($volunteer);$i++){ ?>
                    	<li style="">
                        	<div class="image">
                            	<img src="http://ayopeduli.com/upload/user/53ba7040c166c4e1386a25eae8790990.jpg">
                            </div>
                            <p>Muhammad Hafidz <br> - Para Gembel - </p>
                        </li>
                        <?php // } ?>
                        
                        <div class="clear"></div>
                    </ul>-->
				</header>
			</article>
		
		<!-- Generic -->
		<!--
			<article class="container box style3">
				<header>
					<h2>Generic Box</h2>
					<p>Just a generic box. Nothing to see here.</p>
				</header>
				<section>
					<header>
						<h3>Paragraph</h3>
						<p>This is a byline</p>
					</header>
					<p>Phasellus nisl nisl, varius id <sup>porttitor sed pellentesque</sup> ac orci. Pellentesque 
					habitant <strong>strong</strong> tristique <b>bold</b> et netus <i>italic</i> malesuada <em>emphasized</em> ac turpis egestas. Morbi 
					leo suscipit ut. Praesent <sub>id turpis vitae</sub> turpis pretium ultricies. Vestibulum sit 
					amet risus elit.</p>
				</section>
				<section>
					<header>
						<h3>Blockquote</h3>
					</header>
					<blockquote>Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget.
					tempus euismod. Vestibulum ante ipsum primis in faucibus.</blockquote>
				</section>
				<section>
					<header>
						<h3>Divider</h3>
					</header>
					<p>Donec consectetur <a href="#">vestibulum dolor et pulvinar</a>. Etiam vel felis enim, at viverra 
					ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel. Praesent nec orci 
					facilisis leo magna. Cras sit amet urna eros, id egestas urna. Quisque aliquam 
					tempus euismod. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices 
					posuere cubilia.</p>
					<hr />
					<p>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra 
					ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel. Praesent nec orci 
					facilisis leo magna. Cras sit amet urna eros, id egestas urna. Quisque aliquam 
					tempus euismod. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices 
					posuere cubilia.</p>
				</section>
				<section>
					<header>
						<h3>Unordered List</h3>
					</header>
					<ul class="default">
						<li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
						<li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
						<li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
						<li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
					</ul>
				</section>
				<section>
					<header>
						<h3>Ordered List</h3>
					</header>
					<ol class="default">
						<li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
						<li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
						<li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
						<li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
					</ol>
				</section>
				<section>
					<header>
						<h3>Table</h3>
					</header>
					<div class="table-wrapper">
						<table class="default">
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Description</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>45815</td>
									<td>Something</td>
									<td>Ut porttitor sagittis lorem quis nisi ornare.</td>
									<td>29.99</td>
								</tr>
								<tr>
									<td>24524</td>
									<td>Nothing</td>
									<td>Ut porttitor sagittis lorem quis nisi ornare.</td>
									<td>19.99</td>
								</tr>
								<tr>
									<td>45815</td>
									<td>Something</td>
									<td>Ut porttitor sagittis lorem quis nisi ornare.</td>
									<td>29.99</td>
								</tr>
								<tr>
									<td>24524</td>
									<td>Nothing</td>
									<td>Ut porttitor sagittis lorem quis nisi ornare.</td>
									<td>19.99</td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="3"></td>
									<td>100.00</td>
								</tr>
							</tfoot>
						</table>
					</div>
				</section>
				<section>
					<header>
						<h3>Form</h3>
					</header>
					<form method="post" action="#">
						<div class="row">
							<div class="6u">
								<input class="text" type="text" name="name" id="name" value="" placeholder="John Doe" />
							</div>
							<div class="6u">
								<input class="text" type="text" name="email" id="email" value="" placeholder="johndoe@domain.tld" />
							</div>
						</div>
						<div class="row">
							<div class="12u">
								<select name="department" id="department">
									<option value="">Choose a department</option>
									<option value="1">Manufacturing</option>
									<option value="2">Administration</option>
									<option value="3">Support</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="12u">
								<input class="text" type="text" name="subject" id="subject" value="" placeholder="Enter your subject" />
							</div>
						</div>
						<div class="row">
							<div class="12u">
								<textarea name="message" id="message" placeholder="Enter your message"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="12u">
								<ul class="actions">
									<li><a href="#" class="button form">Submit</a></li>
									<li><a href="#" class="button style3 form-reset">Clear Form</a></li>
								</ul>
							</div>
						</div>
					</form>
				</section>
			</article>
		-->
        




		
		<section id="footer">
			<ul class="icons">
				<span class='st__hcount' displayText=''></span>
                                <span class='st_facebook_hcount' displayText='Facebook'></span>
                                <span class='st_twitter_hcount' displayText='Tweet'></span>
			</ul>
			<div class="copyright">
				<ul class="menu">
					<li>&copy; <a href="ayopeduli.com">ayopeduli.com</a>. All rights reserved.</li>					
				</ul>
			</div>
		</section>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-5095553-5']);
  _gaq.push(['_setDomainName', 'ayopeduli.com']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
	</body>
</html>