<?php include "session.php"; ?>
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
            Data Kas Masuk 
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Edit Data Kas Masuk</li>
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
                  <h3 class="box-title">Edit Data </h3>
                  <div class="box-tools pull-right">
                  <!-- <form action='admin.php' method="POST">
                   <div class="input-group" style="width: 230px;">
                      <input type="text" name="qcari" class="form-control input-sm pull-right" placeholder="Cari Usename Atau Nama">
                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-sm btn-default tooltips" data-placement="bottom" data-toggle="tooltip" title="Cari Data"><i class="fa fa-search"></i></button>
                        <a href="admin.php" class="btn btn-sm btn-success tooltips" data-placement="bottom" data-toggle="tooltip" title="Refresh"><i class="fa fa-refresh"></i></a>
                      </div>
                    </div>
                    </form> -->
                  </div> 
                </div><!-- /.box-header -->


                 <?php


            $id_trx = $_GET['id_trx'];
      $sql = mysqli_query($koneksi, "SELECT * FROM tb_kasmasuk WHERE id_trx='$id_trx'");
      if(mysqli_num_rows($sql) == 0){
        header("Location: kasmasuk.php");
      }else{
        $row = mysqli_fetch_assoc($sql);
      }
      if(isset($_POST['update'])){

         $nomor_trx = $_POST['nomor_trx'];
                    $nama_penyetor  = $_POST['nama_penyetor'];
                    $jenis_bank    = $_POST['jenis_bank'];
                    
                    $tgl_masuk   = $_POST['tgl_masuk'];
                    $jumlah  = $_POST['jumlah'];
                    $keterangan = $_POST['keterangan'];


    

                
        $update = mysqli_query($koneksi, "UPDATE tb_kasmasuk SET nomor_trx='$nomor_trx', nama_penyetor='$nama_penyetor' ,  tgl_masuk='$tgl_masuk', jumlah='$jumlah', keterangan='$keterangan' WHERE id_trx='$id_trx'") or die(mysqli_error());

        if($update){
         echo "<script>alert('Data Berhasil di ubah gan!'); window.location = 'kasmasuk.php'</script>";  
             

        }else{
          echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';
        }
      }
      
      //if(isset($_GET['pesan']) == 'sukses'){
      //  echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';
      //}
      ?>
                <div class="box-body">
                <form class="form-horizontal style-form" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">No Trx</label>
                              <div class="col-sm-4">
                                  <input name="nomor_trx" type="text" id="nomor_trx" class="form-control" value="<?php echo $row['nomor_trx']; ?>" placeholder="Auto Number" autocomplete="off" autofocus="on" readonly="readonly" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Pasien</label>
                              <div class="col-sm-4">
                            <input name="nama_penyetor" type="text" id="nama_penyetor" class="form-control" value="<?php echo $row['nama_penyetor']; ?>" placeholder="Nama penyetor" autocomplete="off" required />
                              
                            </div>
                          </div>

                                                 

                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tanggal Masuk</label>
                              <div class="col-sm-4">
                            <input name="tgl_masuk" type="text" id="tgl_masuk" class="form-control" value="<?php echo $row['tgl_masuk']; ?>" placeholder="tgl_masuk" autocomplete="off" required />
                              
                            </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jumlah </label>
                              <div class="col-sm-4">
                            <input name="jumlah" type="text" id="jumlah" class="form-control" value="<?php echo $row['jumlah']; ?>" placeholder="jumlah" autocomplete="off" required />
                              
                            </div>
                          </div>
                          
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Keterangan </label>
                              <div class="col-sm-4">
                            <input name="keterangan" type="text" id="keterangan" class="form-control" value="<?php echo $row['keterangan']; ?>" placeholder="keterangan" autocomplete="off" required />
                              
                            </div>
                          </div>

                         


                         

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="update" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                                <a href="kasmasuk.php" class="btn btn-sm btn-danger">Batal </a>
                              </div> 
                          </div>
                      </form>
                </div><!-- /.box-body -->
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
    <script src="../css/jquery-ui.min.js"></script>
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

    <script>
  //options method for call datepicker
  $(".input-group.date").datepicker({ autoclose: true, todayHighlight: true });
  
    </script>
  </body>
</html>
