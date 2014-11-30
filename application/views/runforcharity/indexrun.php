<?php 
	$target = 780;
	$uangtotal = $target * 100000;
	$uangsaatini = 68300000;
	$totaluang = $uangsaatini / $uangtotal;
	$totalpersen = $totaluang * 100;
	$kmsaatini = $uangsaatini / 100000;
	
?>

<script type="text/javascript">
	$(document).ready(function() {
	    $('#myTab a:last').tab('show');
		$('.progress-bar').animate({
			width: '<?php echo number_format($totalpersen); ?>%',
		},"slow");
    })
</script>
<link rel="stylesheet" type="text/css" href="/asset/style/style-run.css" />
<div id="run">
	<div class="wrapper">
    	<div class="title">
            <h1>#RunforCharity2014</h1>
            <h3>@ Jakarta Marathon, 26 Oct 2014</h3>
        </div>
        <div class="progress" style="height:20px !important;">
          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
            <div class="inprog">
                <img style="width: 197px;margin: 30px -53px 0px 0px;" src="/asset/images/run.gif" />
                <img style="width: 197px;margin: 30px -53px 0px 0px;" src="/asset/images/run.gif" />
                <img src="/asset/images/run.gif" />
                <div class="info target" style="float:right;">
                   Rp.<?php echo number_format($uangsaatini); ?><br />
                   <?php echo number_format($totalpersen); ?> % Tercatat<br />
                   <?php echo number_format($kmsaatini); ?> KM
                   <a target="_new" style="position: absolute;top: -66px;width: 85px;right: -69px;" title="Tweet for supporting Us!" href="http://ctt.ec/0aM2f"><img src="http://clicktotweet.com/img/tweet-graphic-1.png" alt="Tweet: Saya dukung #RunforCharity untuk Aksi di  #ayopedulidotcom Let's Support Our Runners!  disini>> http://ctt.ec/cMe1j+" /></a>
                </div>
            </div>                        
          </div>
          <div class="info terkumpul" style="float:left;">
                    Rp.78.000.000<br />
                    100% Target<br />
                    780 KM
           	</div>
        </div>  
        <div class="contents">
        	<ul class="nav nav-tabs" role="tablist" id="myTab">
              <li class="active"><a href="#home" role="tab" data-toggle="tab">About</a></li>
              <li><a href="#pelari" role="tab" data-toggle="tab">Runners</a></li>
              <li><a href="#donasi" class="btn btn-primary" role="tab" data-toggle="tab">Let's Support Our Runners!</a></li>
            </ul>
            
            <div class="tab-content" style="overflow:inherit;">
              <div class="tab-pane active" id="home">
              	<img src="/asset/images/runforcharity.jpg" />
              </div>
              <div class="tab-pane" id="pelari">
              	<div class="panel panel-default">
                  <!-- Default panel contents -->
                  <div class="panel-heading">Daftar Pelari #RunForCharity</div>                
                  <!-- Table -->
                  <table class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Kategori</th>
                        <th>Km</th>
                      </tr>
                    </thead>                    
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Indra Uno</td>
                        <td>Full Marathon</td>
                        <td>42</td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Yasha Chatab</td>
                        <td>Full Marathon</td>
                        <td>42</td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>Dolly Lesmana</td>
                        <td>Full Marathon</td>
                        <td>42</td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td>Harry Anggie</td>
                        <td>Full Marathon</td>
                        <td>42</td>
                      </tr>
                      <tr>
                        <td>5</td>
                        <td>Duddy Abdullah</td>
                        <td>Full Marathon</td>
                        <td>42</td>
                      </tr>
                      <tr>
                        <td>6</td>
                        <td>Tania Sadikin </td>
                        <td>Full Marathon</td>
                        <td>42</td>
                      </tr>
                      <tr>
                        <td>7</td>
                        <td>Iqbal Tanjung</td>
                        <td>Full Marathon</td>
                        <td>42</td>
                      </tr>
                      <tr>
                        <td>8</td>
                        <td>Aryo Hartawan (Hari)</td>
                        <td>Full Marathon</td>
                        <td>42</td>
                      </tr>
                      <tr>
                        <td>9</td>
                        <td>Mella Purwanaika</td>
                        <td>Full Marathon</td>
                        <td>42</td>
                      </tr>
                      
                      <tr>
                        <td>10</td>
                        <td>Akbar Nasution</td>
                        <td>Full Marathon</td>
                        <td>42</td>
                      </tr>
                      <tr>
                        <td>11</td>
                        <td>Yusuf Ijsseldijk</td>
                        <td>Full Marathon</td>
                        <td>42</td>
                      </tr>
                      <tr>
                        <td>12</td>
                        <td>Sandiaga Uno</td>
                        <td>Half Marathon</td>
                        <td>22</td>
                      </tr>
                      <tr>
                        <td>13</td>
                        <td>Rio Febrian</td>
                        <td>Half Marathon</td>
                        <td>22</td>
                      </tr>
                      <tr>
                        <td>14</td>
                        <td>Trisnadi Mulia</td>
                        <td>Half Marathon</td>
                        <td>22</td>
                      </tr>
                      <tr>
                        <td>15</td>
                        <td>Florentina Niradewi</td>
                        <td>Half Marathon</td>
                        <td>22</td>
                      </tr>
                      <tr>
                        <td>16</td>
                        <td>Jurian Andika</td>
                        <td>Half Marathon</td>
                        <td>22</td>
                      </tr>
                      <tr>
                        <td>17</td>
                        <td>Michael Supit</td>
                        <td>Half Marathon</td>
                        <td>22</td>
                      </tr>
                      <tr>
                        <td>18</td>
                        <td>Doli Nainggolan</td>
                        <td>Half Marathon</td>
                        <td>22</td>
                      </tr>
                      <tr>
                        <td>19</td>
                        <td>Rizki Ananda</td>
                        <td>Half Marathon</td>
                        <td>22</td>
                      </tr>
                      <tr>
                        <td>20</td>
                        <td>Denny Maruhum Pasaribu</td>
                        <td>Half Marathon</td>
                        <td>22</td>
                      </tr>
                      <tr>
                        <td>21</td>
                        <td>Billy Boen</td>
                        <td>10K</td>
                        <td>10</td>
                      </tr>
                      <tr>
                        <td>22</td>
                        <td>Just Silly</td>
                        <td>10K</td>
                        <td>10</td>
                      </tr>
                      <tr>
                        <td>23</td>
                        <td>Jaenal Gufron</td>
                        <td>10K</td>
                        <td>10</td>
                      </tr>
                      <tr>
                        <td>24</td>
                        <td>Rizjami Putera</td>
                        <td>10K</td>
                        <td>10</td>
                      </tr>
                      <tr>
                        <td>25</td>
                        <td>Bitina</td>
                        <td>10K</td>
                        <td>10</td>
                      </tr>
                      <tr>
                        <td>26</td>
                        <td>Paulina Pungky</td>
                        <td>10K</td>
                        <td>10</td>
                      </tr>
                      <tr>
                        <td>27</td>
                        <td>Agus Siswanto</td>
                        <td>10K</td>
                        <td>10</td>
                      </tr>
                      <tr>
                        <td>28</td>
                        <td>Julia Nurdin</td>
                        <td>10K</td>
                        <td>10</td>
                      </tr>
                      <tr>
                        <td>29</td>
                        <td>Subhan Firdaus</td>
                        <td>10K</td>
                        <td>10</td>
                      </tr>
                      <tr>
                        <td>30</td>
                        <td>Dini Alamanda</td>
                        <td>10K</td>
                        <td>10</td>
                      </tr>
                      <tr>
                        <td>31</td>
                        <td>Dede Febriana</td>
                        <td>10K</td>
                        <td>10</td>
                      </tr>
                      <tr>
                        <td>32</td>
                        <td>Yudhi Agus Adetria</td>
                        <td>10K</td>
                        <td>10</td>
                      </tr>
                      <tr>
                        <td>33</td>
                        <td>Firmansyah</td>
                        <td>10K</td>
                        <td>10</td>
                      </tr>
                      <tr>
                        <td>34</td>
                        <td>Sirly Nasir</td>
                        <td>10K</td>
                        <td>10</td>
                      </tr> 
                      <tr>
                        <td>35</td>
                        <td>Daniel Nugroho</td>
                        <td>10K</td>
                        <td>10</td>
                      </tr>                      
                    </tbody>
                  </table>
                </div>
              
              </div>             
              <div class="tab-pane" id="donasi">
              	<script type="text/javascript" src="/asset/js/jquery.number.js"></script>                
                  <div class="infodon alert alert-success">
                    <h4> Untuk membantu donasi aksi ini ada 2 opsi, yaitu : </h4>
                    <p>1. Isi form dibawah untuk mendapatkan Gudness Poin.</p><br>
                    <p>2. Donasi langsung , Sertakan angka 250 dalam donasi anda ex. Rp.100.000 menjadi Rp.100.250 sebagai penanda donasi anda ke rekening : <br>
                     BRI Acc. 0139.01.002011.30.7<br>a.n Yayasan Ayo Peduli Nusantara KCP Bekasi - Juanda <br>
                     Dengan Donasi langsung anda tidak akan mendapatkan Gudness Poin. Maka kami sarankan untuk mengisi form dibawah ini.
                   </p>
                   <p>Apabila sudah mohon konfirmasi via sms dengan format : Donasi_Jumlah Donasi_nama aksi_nama pendnor kirim ke 081214939954</p>
                   <p>Petunjuk donasi akan dikirimkan melalui email anda.</p>
                  </div>
                  <hr></hr>
			  	    
              		<script>
						$(function(){
							//$('.donasi_aksi').number( true, 0 );
							//insert record
							$('#total2').hide();
							$('#total').change(function(){		
								$('.totals').hide();		
								$('#' + $(this).val()).show();
							});
							$('#loading').hide();
							$('#submit').click(function(e){	
							
							// Declare the function variables:
							// Parent form, form URL, email regex and the error HTML
							var $formId = $(this).parents('.donasi');
							//var formAction = $formId.attr('action');
							var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
							var $error = $('<span class="error"></span>');
					
							// Prepare the form for validation - remove previous errors
							$('li',$formId).removeClass('error');
							$('span.error').remove();
					
							// Validate all inputs with the class "required"
							$('.required',$formId).each(function(){
								var inputVal = $(this).val();
								var $parentTag = $(this).parent();
								if(inputVal == ''){
									$parentTag.addClass('error').append($error.clone().text('Required Field'));
								}
								
								// Run the email validation using the regex for those input items also having class "email"
								if($(this).hasClass('email') == true){
									if(!emailReg.test(inputVal)){
										$parentTag.addClass('error').append($error.clone().text('Enter valid email'));
									}
								}
								
								// Check passwords match for inputs with class "password"
								if($(this).hasClass('password') == true){
									var password1 = $('#password-1').val();
									var password2 = $('#password-2').val();
									if(password1 != password2){
									$parentTag.addClass('error').append($error.clone().text('Passwords must match'));
									}
								}
							});
					
							// All validation complete - Check if any errors exist
							// If has errors
							if ($('span.error').length > 0) {
								
								$('span.error').each(function(){
									
									// Set the distance for the error animation
									var distance = 5;
									
									// Get the error dimensions
									var width = $(this).outerWidth();
									
									// Calculate starting position
									var start = width + distance;
									
									// Set the initial CSS
									$(this).show().css({
										display: 'block',
										opacity: 0,
										right: -start+'px'
									})
									// Animate the error message
									.animate({
										right: -width+'px',
										opacity: 1
									}, 'slow');
									
								});
							} else {
			//$formId.submit();
			//validation
								$('#loading').show();	
																
								
								var email = $('#email').val();
								var password = $('#password').val();
								var fullname = $('#fullname').val();
								var panggilan = $('#panggilan').val();		
								var donasi_aksi = $('.donasi_aksi').val();
								var donasi_ap = $('input:radio[name=donasi_ap]').val();
								var totaldon = $('#totaldon').val();
								var aid = $('#aid').val();
								var namaaksi = $('#namaaksi').val();
								//var photoimg = $('#photoimg').val();
								//var donasi_ap = $(function() {
//									var $radios = $('input:radio[name=donasi_ap]');
//										if($radios.is(':checked') === false) {
//											$radios.filter('[value=0]').prop('checked', true);
//										}
//									});
								
					 
								//syntax - $.post('filename', {data}, function(response){});
								//$.post('datadonanon.php',{action: "insert", email:email, password:password, fullname:fullname, panggilan:panggilan,  donasi_aksi:donasi_aksi, donasi_ap:donasi_ap,},function(res){
//									$('#result').html(res);
//								});
								$.post('/donasi/nonlog',{action: "insert", email:email, password:password, fullname:fullname, panggilan:panggilan,  donasi_aksi:donasi_aksi, donasi_ap:donasi_ap, totaldon:totaldon, aid:aid, namaaksi:namaaksi},function(res){
								$('#result').html(res);
								});
							//});
					 
							//show records
							$('#show').click(function(){
								$.post('/donasi/nonlog',{action: "show"},function(res){
									$('#result').html(res);
								});        
							});
								}
								// Prevent form submission
									e.preventDefault();
							});
						});
					</script>
                    <div id="result"></div> 
              		<h3 style="margin:10px 0px 20px;">Dukung runner kami dengan mengisi form donasi dibawah ini!</h3>
                    <div class="form-horizontal donasi styled" >
                    	<div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                            	<div class="inp">
                                  <input type="email" class="form-control required" name="email" id="email" placeholder="Email">
                                  <input type="hidden" class="form-control required" value="runforcharity" name="password" id="password" placeholder="Password">
                                  <input type="hidden" class=" donasi_aksi form-control required" value="250" name="donasi_aksi">
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                            	<div class="inp">
                              		<input type="text" class="form-control required" name="fullname" id="fullname" placeholder="Nama Lengkap">
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Nama Panggilan</label>
                            <div class="col-sm-10">
                            	<div class="inp">
                             	 <input type="text" class="form-control required" name="panggilan" id="panggilan" placeholder="Nama Panggilan">
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Total Donasi</label>
                                <div class="col-sm-10">
                                <select name="totaldon" id="totaldon">
                                            	<option value="100250">1 KM, Rp.100.250</option>
                                                <option value="200250">2 KM, Rp.200.250</option>
                                                <option value="300250">3 KM, Rp.300.250</option>
                                                <option value="400250">4 KM, Rp.400.250</option>
                                                <option value="500250">5 KM, Rp.500.250</option>
                                                <option value="600250">6 KM, Rp.600.250</option>
                                                <option value="700250">7 KM, Rp.700.250</option>
                                                <option value="800250">8 KM, Rp.800.250</option>
                                                <option value="900250">9 KM, Rp.900.250</option>
                                                <option value="1000250">10 KM, Rp.1.000.250</option>
                                                <option value="2200250">Half Marathon 22KM, Rp.2.200.250</option>
                                                <option value="4200250">Full Marathon 42KM, Rp.4.200.250</option>
                                            </select>
                                    <!--<div class="input-prepend input-append">
                                            <!--<span class="add-on">Rp</span><input readonly="readonly" id="totaldon" size="16" type="text">
                                            
                                    </div>-->
                                </div>                           
                          </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> Saya menyetujui Terms &amp; Condition yang berlaku
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                        	<input type="hidden" name="aid" id="aid" value="AAP00036" />
                            <input type="hidden" name="namaksi" id="namaaksi" value="RunForCharity" />
                          <button type="submit" class="btn btn-primary" id="submit">Bantu Donasi</button>
                        </div>
                      </div>
                   </div>
              </div>
            </div>
            
        </div><!-- end .contents-->
        <div class="support">
        	<div class="wrapper">
            	<div class="martket">
                	Organized by :
            		<img src="/asset/images/market+.png" />
                </div>
        		<!--<img src="/asset/images/footer-run.png" />-->
            </div>
        </div>
</div><!-- end #run-->
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