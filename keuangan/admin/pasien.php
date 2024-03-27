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
            Data Pasien
            <small>Sistem Administrasi Pelayanan</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Data Admin </li>

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
                  <h3 class="box-title">Pasien</h3>
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
            <?php
             if(isset($_GET['aksi']) == 'hapus'){
        $id = $_GET['id'];
        $cek = mysqli_query($koneksi, "SELECT * FROM pasien WHERE nik='$id'");
        if(mysqli_num_rows($cek) == 0){
          echo '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
        }else{
          $delete = mysqli_query($koneksi, "DELETE FROM pasien WHERE nik='$id'");
          if($delete){
            
              echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil dihapus.</div>'; 



          }else{
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
          }
        }
      }
      ?>
<a href="input_pasien.php" class="btn btn-sm btn-warning"><i class="fa fa-file"></i> Tambah Data Pasien</a> <br /><br />
                   <table id="lookup" class="table table-bordered table-hover">  
                  <?php


                    

                    $query1="select * from pasien ";
                    
                    if(isset($_POST['qcari'])){
                 $qcari=$_POST['qcari'];
                 $query1="SELECT * FROM  daftar_user  
                 where fullname like '%$qcari%'
                 or nama like '%$qcari%'  ";
                    }
                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>
                  <table id="example" class="table table-responsive table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>No</center></th>
                        <th><center>NIK</center></th>
                        <th><center>Nama Pasien</center></th>
                        <th><center>Jenis Kelamin</center></th>
                        
                         <th><center>Alamat</center></th>
                        <th><center>Nomor Telepon</center></th>
                        <th><center>Keluhan</center></th>
                         <th><center>Aksi</center></th>

                     
                      </tr>
                  </thead>
                     <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; ?>
                    <tbody>

                     

                    <tr>
                    <td><center><?php echo $no; ?></center></td>
                 
                    <td><center><?php echo $data['nik'];?></center></td>
                    <td><center><?php echo $data['nama'];?></center></td>
                    <td><center><?php echo $data['jk'];?></center></td>
                    <td><center><?php echo $data['alamat'];?></center></td>
                      <td><center><?php echo $data['telp']; ?></center></td>
                             <td><center><?php echo $data['keluhan'];?></center></td>
                    


                        <td><center><div id="thanks"><a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Edit Data " href="edit_pasien.php?aksi=edit&nik=<?php echo $data['nik'];?>"><span class="glyphicon glyphicon-edit"></span></a>  

          

                         <a onclick="return confirm ('Yakin hapus pasien atas nama <?php echo $data['nama'];?>.?');" class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-toggle="tooltip" title="Hapus Data " href="pasien.php?aksi=hapus&id=<?php echo $data['nik'];?>"><span class="glyphicon glyphicon-trash"></a></center>






                        </td></tr></div>
                 <?php   
              } 
              ?>
                   </tbody>
                   </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix no-border">
                
                  </div>
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