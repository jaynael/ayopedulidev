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
    	<h2 style="text-align:center;">List History Redeem</h2>
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
        <div class="col-lg-12">
        	<div class="panel panel-default">
            	<div class="panel-heading">Aksi yang telah kamu buat</div><!-- /.panel-heading -->
                <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Voucher Id</th>
                                            <th>Diredeem dengan</th>
                                            <th>Poin yang ditukar </th>
                                            <th>Waktu</th>
                                            <th>link voucher</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php for ($i=0;$i<count($redeem_list);$i++){ ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $redeem_list[$i]['vocerid'] ?></td>
                                            <td><?php echo $redeem_list[$i]['title'] ?></td>
                                            <td><?php echo $redeem_list[$i]['poin'] ?></td>
                                            <td><?php echo $redeem_list[$i]['time'] ?></td>
                                            <td><a href="/redeem/voucher/<?php echo $redeem_list[$i]['url'] ?>" target="_new" class="btn btn-primary"> Klik Disini</a></td>
                                            <td></td>
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
                <!-- /.col-lg-12 -->
    </div>	
      
</div>


    