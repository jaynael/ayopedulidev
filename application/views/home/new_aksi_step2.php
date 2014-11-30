<div id="page-wrapper">	
    <div class="row"> 
    	<div class="formaksi right buataksi">     
        <!-- progressbar -->
            <div class="progress-step">
              <div class="circle active">
                <span class="label">1</span>
                <span class="title">Mulai</span>
              </div>
              <span class="bar done"></span>
              <div class="circle active">
                <span class="label">2</span>
                <span class="title">Photo</span>
              </div>
              <span class="bar "></span>
              <div class="circle">
                <span class="label">3</span>
                <span class="title">Administrasi</span>
              </div>
              <span class="bar"></span>
              <div class="circle">
                <span class="label">4</span>
                <span class="title">Review</span>
              </div>
              <span class="bar"></span>
              <div class="circle">
                <span class="label">5</span>
                <span class="title">Publish</span>
              </div>
            </div>
            <div class="clearfix"></div> 
            <h2 style="text-align:center;">Tambahkan Photo dan Video</h2> 
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
        <?php if (!isset($edit)){ ?>
       		<?php echo validation_errors(); ?>
	   						<?php 
							$attributes = array('class' => 'styled buataksi', 'id' => 'form');
							echo form_open_multipart('/home/new_act/step3', $attributes); ?>
       		
       <?php }else{ ?>
       		<?php echo validation_errors(); ?>
	   						<?php 
							$attributes = array('class' => 'styled buataksi', 'id' => 'form');
							echo form_open_multipart('/home/edit_act/step3/'.$aid, $attributes); ?>
       
       <?php }?>
    	
        <div class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                  Tambahkan Photo
                </a>
              </h4>
            </div>
            <div>
              <div class="panel-body">  
              	<label for="exampleInputEmail1"><h3>Upload photo aksi :</h3></label>
                    <div class="inp">
                        <input type="file" name="picaksi" id="picaksi" class="input form-control required" size="20" />
                        <input type="hidden" name="submitted" id="submitted" value="true" />
                    </div>
                    <p>Upload photo aksimu dengan resolusi 1024px * 1024px untuk hasil yang lebih bagus</p>
                    
               </div>
            </div>
          </div> 
          <?php if (!isset($edit)){?> 
			<?php }else{?>             
             <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                  Photo yang sudah di upload
                </a>
              </h4>
            </div>
            <div>
              <div class="panel-body">  
              		<img width="100%" src="/upload/aksi/<?php echo $pic ?>" />
               </div>
            </div>
          </div>
          <?php ;} ?>         
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                  Tambahkan video
                </a>
              </h4>
            </div>
            <div id="collapseThree">
              <div class="panel-body">
                	<label for="exampleInputEmail1"><h4>Tambahkan code youtube embed</h4></label>
                        <div class="inp">
                        	<input type="text" name="vid" class=" input form-control" placeholder="iframe">
                        </div>
                        <p>Buat video campaign sosial kamu dan masukan embed video kamu disini</p>
                       <input type="hidden" name="aid" class="input form-control" id="uid" value="<?php echo $aksiid; ?>" >
                      </div>
                    </div>
                  </div>
                </div> 
               <div class="submit">
               <?php // var_dump($aksi_item); ?>
               <a href="/home/edit_act/step1/<?php echo $aksiid; ?>" class="btn btn-submit button btn-primary">&lt; Back Step</a>
               			<button name="submit" id="btn-aksi" class="btn button btn-submit btn-primary"> Next Step &gt;</button>
               </div>
            </form>    
    </div>    
</div>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
 <!-- jQuery Version 1.11.0 
    <script src="/asset/home/js/jquery-1.11.0.js"></script>-->

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

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
   
                <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>-->
  				<script type="text/javascript" src="/asset/js/jquery.number.js"></script>
                <script type="text/javascript">
					$(document).ready(function() {
						//$('.jumlahtarget').number( true, 0 );
						$('.collapse').collapse()
						$('#butuh').hide();
						$("#datepicker").datepicker();
						$('#donasi ').removeClass('required');
						$('.tidak .datepicker').removeClass('required');
						$('#donasi').change(function(){		
							$('.gak').hide();	
							$('#' + $(this).val()).show().addClass('butuh');
							$('.jumlahtarget').val('').addClass('required');
							//$('.datepicker').val('').addClass('required');
						});
						
					});
				</script>