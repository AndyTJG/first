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
           Input Kas masuk
            <small>Sistem Keuangan</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-home"></i> Dashboard</a></li>
            <li class="active">Data Kas Masuk</li>
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
                  <h3 class="box-title">Input Data Kas Masuk</h3>
                </div><!-- /.box-header -->
<?php


// Menghubungkan ke database
$conn = mysqli_connect('localhost', 'root', '', 'db_keuangan');

// Cek Koneksi
if (!$conn) {
    echo "Gagal terhubung ke database!";
    die;
}
// Mencari data (kode) yang paling besar (terakhir) dari database
$query = mysqli_query($conn, "SELECT max(nomor_trx) as max_kode FROM tb_kasmasuk");
$data = mysqli_fetch_array($query);
// Sudah dapat nih gan
$nomor_trx = $data['max_kode'];

// Oke sekarang kita ambil bagian angkanya saja dan membuang string yang ada diawal
$no = substr($nomor_trx, 2, 4);
// Contoh kodenya 'B0001'
// Setelah dibuang string 'B', hasilnya menjadi '0001'
// maksud substr diatas adalah mengambil 4 katakter dimulai dari index ke 1 (karakter ke-2)

// Selanjutnya kita convert ke tipe data Integer agar bisa di Increment (ditambah)
$no = (int) $no;
// Ditambah 1
$no += 1;
/**
 * Atau bisa gunakan cara ini 
 * $no++;
 * $no = $no + 1;
 * bebas ya, silahkan pilih sesuai selera :v
 */

//  Oke next kita bakal generate kode otomatisnya
$str = 'KM';

// perintah sprintf("%04s", $no); digunakan untuk memformat string sebanyak 4 karakter
// misal sprintf("%04s", 2); maka akan dihasilkan '0002'
// atau misal sprintf("%04s", 1); maka akan dihasilkan string '0001'
$newKode = $str . sprintf("%03s", $no);


 ?>

                <?php
                    if(isset($_POST['simpan'])){
                    

                  
                      $id_user  = $_SESSION['id_user'];
                    $nomor_trx = $_POST['nomor_trx'];
                      

                    $nama_penyetor  = $_POST['nama_penyetor'];
                    $jenis_bank     = $_POST['jenis_bank'];
                    
                    $tgl_masuk   = $_POST['tgl_masuk'];
                    $jumlah  = $_POST['jumlah'];
                    $keterangan = $_POST['keterangan'];

                    
         

 

    $cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM tb_kasmasuk WHERE  nomor_trx='$nomor_trx'"));

    if ($cek > 0){
    echo "<script>window.alert('nomor_trx  sudah ada')
    window.location='input_kasmasuk.php'</script>";
    }else {
    mysqli_query($koneksi, "INSERT INTO tb_kasmasuk (id_user,nomor_trx, nama_penyetor,  tgl_masuk, jumlah, keterangan) VALUES ( '$id_user', '$nomor_trx','$nama_penyetor','$tgl_masuk', '$jumlah', '$keterangan')");
    echo "<script>window.alert('DATA BERHASIL DISIMPAN')
    window.location='kasmasuk.php'</script>";
    }
    }
         


                ?>



         






                <div class="box-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="input_kasmasuk.php" method="post" enctype="multipart/form-data" name="form1" id_brg="form1">
                         
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nomor Trx</label>
                              <div class="col-sm-4">
                                  <input name="nomor_trx" type="text" id="nomor_trx" value="<?php echo $newKode; ?>" class="form-control"  autofocus="on" readonly   autocomplete="off" required />


                                   
                                
                                   <input type='hidden' class="form-control" type="text" name="id_user" id="id_user"  value="<?PHP ECHO $_SESSION['id_user']; ?>" readOnly />



                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>

                         

                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Pasien </label>
                              <div class="col-sm-4">
                                  
                             <input name="nama_penyetor" type="text" id="nama_penyetor"  class="form-control"  autofocus="on"    autocomplete="off" required />

                              </div>
                          </div>


                           

                      


                   <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"> Tanggal Masuk </label>
                              <div class="col-sm-4">
                                  <input name="tgl_masuk" type="date" id="tgl_masuk" class="form-control" autocomplete="off" required />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>

                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"> Jumlah </label>
                              <div class="col-sm-4">
                                  <input name="jumlah" type="text" id="jumlah" class="form-control" autocomplete="off" required />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>

                                <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"> Keterangan </label>
                              <div class="col-sm-4">
                                  <input name="keterangan" type="text" id="keterangan" class="form-control" autocomplete="off" required />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>


                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="simpan" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
	                              <a href="kasmasuk.php" class="btn btn-sm btn-danger">Batal </a>
                              </div>
                          </div>
                      </form>
                  </div>
                </div><!-- /.box-body -->
                <!-- <div class="box-footer clearfix no-border">
                  <a href="#" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Tambah Admin</a>
                </div> -->
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

     <script>
  //options method for call datepicker
  $(".input-group.date").datepicker({ autoclose: true, todayHighlight: true });
  
    </script>

 <script>
function sum() {
      var txtFirstNumberValue = document.getElementById('total').value;
      var txtSecondNumberValue = document.getElementById('bayar').value;
      var result = parseInt(txtSecondNumberValue) - parseInt(txtFirstNumberValue);
      if (!isNaN(result)) {
         document.getElementById('txt3').value = result;
      }
}
</script>


  </body>
</html>
