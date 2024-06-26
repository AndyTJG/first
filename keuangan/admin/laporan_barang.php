<?php 
include "session.php";
?>
<!DOCTYPE html>
<html>
  <?php include "head.php"; ?>
  <body class="hold-transition skin-purple sidebar-mini">
    <div class="wrapper">

      <?php include "header.php"; ?>
      <!-- Left side column. contains the logo and sidebar -->
      <?php include "menu.php"; ?>
      
      <?php include "waktu.php"; ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Laporan
            <small>sistem bengkel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-home"></i> Dashboard</a></li>
            <li class="active">Laporan Data Barang</li>

          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">

              <!-- TO DO List -->
              <div class="box box-primary">
                <div class="box-header">
                  <i class="ion ion-clipboard"></i>
                  <h3 class="box-title">Laporan Data Barang</h3>
                  <div class="box-tools pull-right">
                  <form action='petaniku.php' method="POST">
                   <div class="input-group" style="width: 230px;">
                    <div class="input-group-btn">
                      </div>
                    </div>
                    </form>
                  </div> 
                </div><!-- /.box-header -->
                
                <div class="box-body">
                <!-- <form action='admin.php' method="POST">
          
         <input type='text' class="form-control" style="margin-bottom: 4px;" name='qcari' placeholder='Cari berdasarkan User ID dan Username' required /> 
           <input type='submit' value='Cari Data' class="btn btn-sm btn-primary" /> <a href='admin.php' class="btn btn-sm btn-success" >Refresh</i></a>
            </div>
            </form>-->

          
        
        <div class="row">
          <div class="col-lg-12"></div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-body">
                  <form method="get" name="laporan" onSubmit="return valid();"> 
                <div class="form-group">
                  <div class="col-sm-4">
                    <label>Tanggal Awal</label>
                    <input type="date" class="form-control" name="awal" placeholder="From Date(dd/mm/yyyy)" required>
                  </div>
                  <div class="col-sm-4">
                    <label>Tanggal Akhir</label>
                    <input type="date" class="form-control" name="akhir" placeholder="To Date(dd/mm/yyyy)" required>
                  </div>
                  <div class="col-sm-4">
                    <label>&nbsp;</label><br/>
                    <input type="submit" name="submit" value="Lihat Laporan" class="btn btn-primary">
                  </div>
                </div>
              </form>
              </div>
            </div>

            <?php
              if(isset($_GET['submit'])){
                $no=0;
                $mulai   = $_GET['awal'];
                $selesai = $_GET['akhir'];
              



                    $sql="select * FROM trxbarang INNER JOIN  supplier ON trxbarang.id_spl = supplier.id_spl
                           INNER JOIN  barang_jasa ON trxbarang.id_brg = barang_jasa.id_brg  AND 
                     trxbarang.tgl_trxbrg BETWEEN '$mulai' AND '$selesai' ORDER BY trxbarang.id_trxbrg DESC";

                $ress = mysqli_query($koneksi, $sql);




              ?>
        

            <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="tabel-data">
                  <thead>
                    <tr>
                      <th width="1%">No</th>
                      <th width="10%">ID Trx</th>
                      <th width="10%">Tgl Trx</th>
                      <th width="10%">Supplier</th>
                      <th width="10%">Barang</th>
                      <th width="5%">Jumlah</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $i = 1;
                      while($data = mysqli_fetch_array($ress)) {

                        echo '<tr>';
                        echo '<td class="text-center">'. $i .'</td>';
                        echo '<td class="text-center">'. $data['id_trxbrg'] .'</td>';
                        echo '<td class="text-center">'. ($data['tgl_trxbrg']) .'</td>';
                        echo '<td class="text-center">'. $data['nama_spl'] .'</td>';
                        echo '<td class="text-center">'. $data['nama'] .'</td>';
                        echo '<td class="text-center">'. $data['jml_brg'] .'</td>';
                        echo '</tr>';                       
                        $i++;
                      }
                    ?>
                  </tbody>
                </table>
            <div class="text-right">
                  <a href="data_transaksi.php" class="btn btn-sm btn-warning">Kembali <i class="fa 
                    fa-arrow-circle-right"></i></a>
           
                  <a href="cetak_barang2.php?awal=<?php echo $mulai;?>&akhir=<?php echo $selesai;?>" target="_blank" class="btn btn-warning">Cetak</a>
                
                  </div>
              </div>
  

       
      <div class="modal fade bs-example-modal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-body">
              <p>One fine body…</p>
            </div>
          </div>
        </div>
      </div>    
            </div><!-- /.panel -->
          </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
      <?php }?>
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
<!-- bottom of file -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#tabel-data').DataTable({
      "responsive": true,
      "processing": true,
      "columnDefs": [
        { "orderable": false, "targets": [4] }
      ]
    });
    
    $('#tabel-data').parent().addClass("table-responsive");
  });
</script>
<script>
    var app = {
      code: '0'
    };
</script>
          
              </div><!-- /.box -->

            </section><!-- /.Left col -->
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php include "footer.php"; ?>

      <?php include "sidecontrol.php"; ?>
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="../plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
  </body>
</html>
