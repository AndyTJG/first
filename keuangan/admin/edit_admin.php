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
            Admin
            <small>Human Resource Mangement System</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Admin</li>
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
                  <h3 class="box-title">Edit Data Admin</h3>
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
            $id_user = $_GET['id_user'];
      $sql = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id_user='$id_user'");
      if(mysqli_num_rows($sql) == 0){
        header("Location: adminku.php");
      }else{
        $row = mysqli_fetch_assoc($sql);
      }
      
      if(isset($_POST['update'])){

        $namafolder="gambar_admin/"; //tempat menyimpan file
      
        if (!empty($_FILES["nama_file"]["tmp_name"]))
        {

      $jenis_gambar   =$_FILES['nama_file']['type'];       
      $id_user        = $_POST['id_user'];
      $nama           = $_POST['nama'];
      $alamat         = $_POST['alamat'];
      $username       = $_POST['username'];
      $password      = $_POST['password'];
      
      $level          = $_POST['level'];

      
        
        if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")
  {     
    $gambar = $namafolder . basename($_FILES['nama_file']['name']);   
    if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
      $sql="UPDATE pengguna SET nama='$nama', alamat='$alamat', username='$username', password='$password', level='$level', gambar='$gambar' WHERE id_user='$id_user'";
      $res=mysqli_query($koneksi, $sql) or die (mysqli_error());
      //echo "Gambar berhasil dikirim ke direktori".$gambar;
            echo "<script>alert('Data admin berhasil dimasukan!'); window.location = 'adminku.php'</script>";    
          } else {
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><p>Gambar gagal dikirim</p></div>';
         }
        } else {
         echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Jenis gambar yang anda kirim salah. Harus .jpg .gif .png</div>';
        }
     } else {
       echo '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Anda Belum Memilih Gambar</div>';
     }
    }
      
      //if(isset($_GET['pesan']) == 'sukses'){
      //  echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';
      //}
     ?>
                <div class="box-body">
                <form class="form-horizontal style-form" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Id User admin</label>
                              <div class="col-sm-4">
                                  <input name="id_user" type="text" id="id_user" class="form-control" value="<?php echo $row['id_user']; ?>" placeholder="Auto Number" autocomplete="off" autofocus="on" readonly="readonly" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Admin</label>
                              <div class="col-sm-4">
                            <input name="nama" type="text" id="nama" class="form-control" value="<?php echo $row['nama']; ?>" placeholder="Nama Admin" autocomplete="off" required />
                              
                            </div>
                          </div>

                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                              <div class="col-sm-4">
                            <input name="alamat" type="text" id="alamat" class="form-control" value="<?php echo $row['alamat']; ?>" placeholder="Alamat" autocomplete="off" required />
                              
                            </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Username</label>
                              <div class="col-sm-4">
                            <input name="username" type="text" id="username" class="form-control" value="<?php echo $row['username']; ?>" placeholder="Username" autocomplete="off" required />
                              
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">password</label>
                              <div class="col-sm-4">
                            <input name="password" type="password" id="password" class="form-control" value="<?php echo $row['password']; ?>"  placeholder="Password" autocomplete="off" required />
                              
                            </div>
                          </div>


                          
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Level</label>
                              <div class="col-sm-4">
                           <select name="level" id="level" class="form-control" required="required">
                           
                           <?php $leveluser = $row['level']; ?>
                            <option <?=($leveluser=='Admin')?'selected="selected"':''?>>Admin</option>
                            
                           </select>
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Gambar</label>
                              <div class="col-sm-4">


                            <input name="nama_file" type="file" id="nama_file" class="form-control" placeholder="Password" autocomplete="off" required />
                              
                            </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="update" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                                <a href="adminku.php" class="btn btn-sm btn-danger">Batal </a>
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

   
   <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>

    <script src="../plugins/datepicker/bootstrap-datepicker.js"></script>

    <script src="../plugins/select2/select2.full.min.js"></script>

    <script>
  //options method for call datepicker
  $(".input-group.date").datepicker({ autoclose: true, todayHighlight: true });
  
    </script>

  <script>
     $(function () {
    $(".select2").select2();
    });
    </script>
  </body>
</html>
