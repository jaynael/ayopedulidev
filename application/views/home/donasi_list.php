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
    	<h2 style="text-align:center;">List History Donasi</h2>        
    	<div class="col-lg-3 col-md-6">
            	<div class="panel panel-primary">
                	<div class="panel-heading">
                    	<div class="row">                                
                        	<p>Rp.<?php echo number_format($total_donasi['totaldon'],0); ?></p>
                       	</div>
                  	</div>
                    <a href="#">
                    	<div class="panel-footer">
                        	<span class="pull-left">Donasi yang kamu sumbangkan</span> 
                            <div class="clearfix"></div>
                       	</div>
                   	</a>
              	</div>
        </div>
        <div class="col-lg-3 col-md-6">
            	<div class="panel panel-green">
                	<div class="panel-heading">
                    	<div class="row">                                
                        	<p><?php echo count($jumlah_donasi); ?></p>
                       	</div>
                  	</div>
                    <a href="#">
                    	<div class="panel-footer">
                        	<span class="pull-left">Donasi yang telah kamu bayar</span> 
                            <div class="clearfix"></div>
                       	</div>
                   	</a>
              	</div>
        </div>
        
        <div class="col-lg-12">
        <?php // var_dump($total_donasi); ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data donasi yang telah kamu lakukan
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Id Donasi</th>
                                            <th>Aksi</th>
                                            <th>Donasi Terkumpul</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php for ($i=0;$i<count($donasi_user);$i++){ ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $donasi_user[$i]['did'] ?></td>
                                            <td><?php echo $donasi_user[$i]['namaaksi'] ?></td>
                                            <td>Rp.<?php echo number_format($donasi_user[$i]['totaldon']) ?></td>
                                            <td><?php echo $donasi_user[$i]['time1'] ?></td>
                                            <td><?php
                                             $stat = $donasi_user[$i]['statdon'];
                                             if ($stat==0){?>
                                             <span class="alert alert-warnning" style="padding:5px;">Belum Diterima</span>
                                             <?php }
                                             ?>
                                             <?php if ($stat==1){?>
                                             <span class="alert alert-success" style="padding:5px;"><span class="glyphicon glyphicon-ok" style="margin:0px 5px 0px 0px; "></span>Sudah Diterima</span>
                                             <?php }
                                             ?></td>
                                        </tr>
                                       <?php } ?>
                                       
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                                        
                </div>
                <!-- /.col-lg-8 -->
    </div>	
      
</div>


    