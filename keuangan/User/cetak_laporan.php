<html>
<head>
  <title>DATA KAS MASUK</title>



      <?php
//fungsi format rupiah 
/**function format_rupiah($rp) {
  $hasil = "Rp." . number_format($rp, 0, "", ".") . ",00";
  return $hasil;
    }
    **/
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "db_keuangan";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_errno()){
  echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}   
?>



 <?php
    
                $no=0;
                $mulai   = $_GET['awal'];
                $selesai = $_GET['akhir'];
              

                
                     $sql="select * FROM tb_kasmasuk INNER JOIN pengguna ON tb_kasmasuk.id_user = pengguna.id_user AND tb_kasmasuk.tgl_masuk BETWEEN '$mulai' AND '$selesai' ORDER BY tb_kasmasuk.id_trx DESC";



                $ress = mysqli_query($koneksi, $sql);
              ?>

  
                <div class="box-body">
                  <div class="form-panel">
                  <table width="100%">

                    
  
  <html lang="en">
<head>
  

  <title><?php echo $pagetitle ?></title>

  <link href="foto/logo.png" rel="icon" type="images/x-icon">


  
</head>

<body>
  <section id="header-kop">
    <div class="container-fluid">
      <table class="table border">
        <tbody>
          
            
            <tr>
            <left>
              
            </left>
            
            
                
            <center>
            
            DATA KAS MASUK

          </center>
      
            
            </td>
          </tr>
        </tbody>
      </table>
      <hr class="line-top" />
    </div>
  </section>
  <section id="body-of-report">
    <div class="container-fluid">

     
    
             <table border style="width: 100%">
                  <thead>
                      <tr>
                         



                      <th><center>No</center></th>
                        <th><center>Nomor Trx</center></th>
                        <th><center>nama penyetor</center></th>
                        <th><center>no rekening</center></th>
                        
                         <th><center>tgl masuk</center></th>
                        <th><center>jumlah</center></th>
                      
                        
                      </tr>
                  </thead>
                     <?php 

                      $i = 1;
                      $subtotal=0;
                     while($data=mysqli_fetch_array($ress)) { 

                      $total = $data['jumlah'] * 1;
                      
                      $subtotal = $subtotal + $total;
                      ?>

                    <tbody>
                    <tr>
                        
                    <td><center><?php echo $i; ?></center></td>     
                    <td><center><?php echo $data['nomor_trx'];?></center></td>
                    <td><center><?php echo $data['nama_penyetor'];?></center></td>
                    <td><center><?php echo $data['kd_rekening'];?></center></td>
                    <td><center><?php echo $data['tgl_masuk'];?></center></td>
                      <td><center><?php $harga = $data['jumlah']; echo number_format($harga,0,".","."); ?></center></td>
                   
                    
                    <tr>

                                  
                    
              

                                   
                                        
                                          
                                       
                      
    
  
    
    <?php   
                  $i++;
                  } 
                 
                  ?>
                   </tbody>
                   
                  <th colspan="5" class="text-center">Total </th>
                   

                  <td><center>Rp.<?php echo $subtotal; ?></center></td>
                   
                </table>
                           
                    </div>
                </div>
          
            </div>
        </div>
 
  <script>
    window.print();
  </script>
 
</body>
</html>