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
            Detail Transaksi
            <small>Sistem Informasi Bengkel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Detail transaksi</li>
          </ol>
        </section>

        <!-- Main content -->
        <!-- Main content -->
        <section class="content">
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">

              <!-- TO DO List -->
              <div class="box box-primary">
                <div class="box-header">
                 
                

                  <div class="box-tools pull-right">
                
                  </div> 

                  <div class="box-header">
                    
                  

                    
        <table id="lookup" class="table table-bordered table-hover table-striped">
        <tbody>
          <tr>
            <td class="text-left" width="20%">
              <img src="gambar_admin/5.jpg" alt="logo-dkm" width="70" />
            </td>
            <td class="text-center" width="60%">
            <b>Bengkel Savana </b> <br>
            Bumiayu<br>
            Telp: (021) 192819189<br>
            <td class="text-right" width="20%">
            </td>
            </tr>
        </tbody>
      </table>
      <hr class="line-top" />
         </div>

        
                

                <?php
            $query = mysqli_query($koneksi, "SELECT * FROM trx INNER JOIN  mekanik ON trx.id_mk = mekanik.id_mk
                           INNER JOIN  admin ON trx.id_user = admin.id_user WHERE id_trx='$_GET[id_trx]'");
            $data  = mysqli_fetch_array($query);
            ?>
                <div class="box-body">
                  <div class="form-panel">
                  <table width="100%">

                    
  
  

    <td width="20%"><b>ID. Transaksi</b></td>
    <td width="2%"></td>
    <td width="78%"><?php echo $data['id_trx'];?></td>
  </tr>
  <tr>
    <tr>
    <td width="20%"><b>nama customer </b></td>
    <td width="2%"><b>:</b></td>
    <td width="78%"><?php echo $data['nama_konsumen'];?></td>
   
  </tr>
    <td width="20%"><b>Tanggal</b></td>
    <td width="2%"><b>:</b></td>
    <td width="78%"><?php echo $data['tgl_trx'];?></td>
    
  </tr>
  <tr>
    <td width="20%"><b>nama mekanik </b></td>
    <td width="2%"><b>:</b></td>
    <td width="78%"><?php echo $data['nama_mk'];?></td>
   
  </tr>
  <tr>
    <td width="20%"><b>Kasir</b></td>
    <td width="2%"><b>:</b></td>
    <td width="78%"><?php echo $data['nama'];?></td>
   
  </tr>
</table>
</br>


 
<form action='detail.php' method="GET">

                                  
                          

                                <?php
                               
                                //Data mentah yang ditampilkan ke tabel
                                mysql_connect('localhost', 'root', '');
                                mysql_select_db('bengkel_savana');
 

                                

                                 $query1="SELECT * FROM tmp_trx  INNER JOIN  barang_jasa ON tmp_trx.id_brg = barang_jasa.id_brg";

                                  if(isset($_GET['id_trx'])){
                                   $id_trx=$_GET['id_trx'];
                                   $query1="SELECT * FROM tmp_trx  INNER JOIN  barang_jasa ON tmp_trx.id_brg = barang_jasa.id_brg

                                   where id_trx like '%$id_trx%'
                                    or id_trx like '%$id_trx%'  ";
                                    }
                              

  $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());

                    ?>
                <table id="lookup" class="table table-bordered table-hover table-striped">
                  <thead>
                      <tr>
                         



                        <th><center>No</center></th>
                        <th><left>Nama Barang/Jasa</center></th>
                        <th><center>Jumlah</center></th>
                        <th><left>Harga Satuan</center></th>
                        <th><center>Total</center></th>
                        
                      </tr>
                  </thead>
                     <?php 


                     $no=0;
                     $subtotal=0;
                     while($data=mysqli_fetch_array($tampil)) { 

                      $total = $data['harga'] * $data['jml'];
                      
                      $subtotal = $subtotal + $total;
                     
                      $no++; 
                      

                      ?>

                    <tbody>
                    <tr>
                        
                    <td><center><?php echo $no; ?></center></td>
                   
                    <td><left><?php echo $data['nama'];?></center></td>
                    <td><center><?php echo $data['jml'];?></center></td>
                   <td>Rp.<?php $harga = $data['harga']; echo number_format($harga,0,".","."); ?></td>
                    
                     
                      <td>Rp.<?php echo  number_format($total,0,".","."); ?></td>
                    
                    <tr>

                                  
                    
              

                                   
                                        
                                          
                                       
                      
    
  
    <?php   
                  } 
                  ?>
                   </tbody>
                   <th colspan="4" class="text-center">Grand Total </th>
                  
                   <td>Rp.<?php echo  number_format($subtotal,0,".","."); ?></td>
                </table>
                           
                    </div>
                </div>
            </div>
        </div>


  


                      <div class="text-right">
                  <a href="data_transaksi.php" class="btn btn-sm btn-warning">Kembali <i class="fa 
                    fa-arrow-circle-right"></i></a>


                  

                   <a class="btn btn-sm btn-primary" href="cetak.php?id_trx=<?php echo $id_trx;?>" target="_blank"><span class="glyphicon glyphicon-print"> Cetak</span></a> 

                  
                
                  </div>
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
