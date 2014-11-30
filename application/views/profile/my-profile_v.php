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
    	<h2 style="text-align:center;">Edit Profile Saya</h2>
    	
        <div class="col-lg-12">
        	<div class="panel panel-default">
            	<div class="panel-heading">Edit Profile Kamu</div><!-- /.panel-heading -->
                <div class="panel-body">
                	<form action="/home/updateprofile" method="post" accept-charset="utf-8" enctype="multipart/form-data">                    	<!--<div id='imageloadstatus' style='display:none'><img src="loader.gif" alt="Uploading...."/></div>-->
                    	<div class="form-group">
                        <label for="exampleInputEmail1">Nama Lengkap :</label>
                        <div class="inp">
                        	<input type="text" name="fullname" class="form-control required" id="fullname" placeholder="Nama Lengkap" value="<?php echo $user_item['fullname']?>">
                        </div>
                      </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Nama Panggilan :</label>
                        <div class="inp">
                        	<input type="text" name="panggilan" class="form-control required" id="panggilan" placeholder="Nama Panggilan" value="<?php echo $user_item['panggilan']?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Alamat Email :</label>
                        <div class="inp">
                        	<input type="email" name="email" class="form-control required" id="email" placeholder="Enter email" value="<?php echo $user_item['email']?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">No Hp :</label>
                        <div class="inp">
                        	<input type="text" name="hp" class="form-control required" id="hp" placeholder="No Handphone" value="<?php echo $user_item['hp']?>">
                        </div>
                      </div>                                          
                      <div class="form-group">
                        <label for="exampleInputPassword1">Jenis Kelamin :</label>
                        <div class="inp">
                        	<select name="sex" class="form-control" id="sex">
                        	<option value="L" <?php if($user_item['sex']=="L") echo 'selected="selected"';?>>Laki-laki</option>
                            <option value="P" <?php if($user_item['sex']=="P") echo 'selected="selected"';?>>Perempuan</option>
                            </select>
                      	</div>
                      </div>  
                      <div class="form-group">
                        <label for="exampleInputPassword1">Kota :</label>
                        <div class="inp">
                        	<input type="text" name="city" class="form-control" id="city" placeholder="city" value="<?php echo $user_item['city']?>">
                      	</div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Photo Profil :</label>
                        <div class="inp"><img src="/upload/user/<?php echo $user_item['photo']; ?>" border="0" /><br />
                        	<input type="file" name="photo" class="form-control" id="photo" placeholder="photo">
                      	</div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Edit Password :</label>
                        <div class="inp">
                        	<input type="password" name="password" class="form-control" id="password" placeholder="Password" value="">
                      	</div>
                      </div>
                      <input type="hidden" name="uid" value="<?php echo $user_item['uid']; ?>" />
                      <div class="form-group">                    
                      	<button type="submit" name="submit" id="submit" class="btn btn-primary">Edit Sekarang</button>
                      </div>
                   </form>
                </div><!-- /.panel-body -->
           	</div><!-- /.panel -->
         </div><!-- /.col-lg-12 -->
    </div>	
      
</div>


    