        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12" style="margin:20px 0px;">
                    <a href="/home/new_act/step1" class="btn btn-primary">+ Buat Aksi Baru</a>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">                                
                                <p>Rp.<?php echo number_format($total_donasi['totaldon'],0); ?></p>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Donasi dari kamu</span>                                
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">                                
                                <p><?php echo number_format($user_item['poin'],0) ?></p>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Gudness Poin</span>                                
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <p><?php echo count($aksi_user); ?></p>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Aksi Sosial Kamu</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
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
                            	<span class="pull-left">Aksi yang telah kamu donasi</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Aksi yang telah kamu buat
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Id Aksi</th>
                                            <th>Judul Aksi</th>
                                            <th>Donasi Terkumpul</th>
                                            <th>Donasi Target</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php for ($i=0;$i<count($aksi_user);$i++){ ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $aksi_user[$i]['aid'] ?></td>
                                            <td><?php echo $aksi_user[$i]['judul'] ?></td>
                                            <td>Rp.<?php echo number_format($aksi_user[$i]['jumlahterkumpul']) ?></td>
                                            <td>Rp.<?php echo number_format($aksi_user[$i]['jumlahtarget']) ?></td>
                                            <td><?php
                                             $stat = $aksi_user[$i]['stat'];
                                             if ($stat==0){?>
                                             <span class="alert alert-warnning" style="padding:5px;">Belum Active</span>
                                             <?php }
                                             ?>
                                             <?php if ($stat==1){?>
                                             <span class="alert alert-success" style="padding:5px;"><span class="glyphicon glyphicon-ok" style="margin:0px 5px 0px 0px; "></span>Sudah Aktif</span>
                                             <a href="#" class="btn btn-primary">Edit</a>
                                             <?php } ?>
                                             <?php if ($stat==2){?>
                                             <span class="alert alert-warning" style="padding:5px;"><span class="glyphicon glyphicon-pencil" style="margin:0px 5px 0px 0px; "></span>Belum Aktif</span>
                                             	<a href="/home/edit_act/step1/<?php echo $aksi_user[$i]['aid'] ?>" class="btn btn-primary">Aktifkan Sekarang</a>
                                             <?php } ?></td>
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
            <!-- /.row -->
            <div class="row">            	
                <div class="col-lg-8">
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
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Notifications Panel
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                               
                            </div>
                            <!-- /.list-group -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->  
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="asset/home/js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="asset/home/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="asset/home/js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript
    <script src="asset/home/js/plugins/morris/raphael.min.js"></script>
    <script src="asset/home/js/plugins/morris/morris.min.js"></script>
    <script src="asset/home/js/plugins/morris/morris-data.js"></script> -->
    <!-- DataTables JavaScript -->
    <script src="asset/home/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="asset/home/js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="asset/home/js/sb-admin-2.js"></script>    

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>

</body>

</html>
