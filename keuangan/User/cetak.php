<html>
<head>
	<title>Bengkel savana</title>



	<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "bengkel_savana";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_errno()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}   
?>
	<?php

     $id_trx = $_GET['id_trx'];
	 $query = mysqli_query($koneksi, "SELECT * FROM trx INNER JOIN  mekanik ON trx.id_mk = mekanik.id_mk
                           INNER JOIN  admin ON trx.id_user = admin.id_user WHERE id_trx='$_GET[id_trx]'");
     $data  = mysqli_fetch_array($query);
	// deskripsi halaman
	$pagedesc = "Cetak Bukti Transaksi";
	$pagetitle = str_replace(" ", "_", $pagedesc)

?>



 
	  <?php
            $query = mysqli_query($koneksi, "SELECT * FROM trx INNER JOIN  mekanik ON trx.id_mk = mekanik.id_mk
                           INNER JOIN  admin ON trx.id_user = admin.id_user WHERE id_trx='$_GET[id_trx]'");
            $data  = mysqli_fetch_array($query);
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
						
						<b>Bengkel Mantap Jiwa</b> <br>
						Bekasi<br>
						Telp: (021) 192819189<br>

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
			<center>
			<h4 class="text-center">Detail Transaksi</h4>
			</center>
			<br />


<table width="100%">
	<tr>

    <td width="20%"><b>ID. Transaksi</b></td>
    <td width="2%"><b>:</b></td>
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
             <table border style="width: 100%">
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
 
	<script>
		window.print();
	</script>
 
</body>
</html>