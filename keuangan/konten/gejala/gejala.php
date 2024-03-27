<?php
include"koneksi.php";
?><span class="card-title"><h1><center><strong>Data Gejala</strong></center></h1></span>

<table class="table table-striped table-dark" style="background: grey ;">
        <thead>
          <tr>
              <th>Kode Gejala</th>
              <th  >Gejala</th>
              <th >Nilai Densitas</th>
              <th align="center">Aksi</th>
          </tr>
        </thead>

        <tbody>
        	<?php 
$no=1;
$sql=mysqli_query($conn,"select * from gejala order by Kodegejala ASC ");
while($ds=mysqli_fetch_array($sql))
    {
?>

          <tr>
            <td> <?php echo $ds['Kodegejala'];?></td>
            <td> <?php echo $ds['Namagejala'];?></td>
            <td> <?php echo $ds['Nilaidensitas'];?></td>
            <td>
            <a href="index.php?konten=editgejala&id=<?php echo "$ds[Kodegejala] "?>">
            <button type="button" class="btn btn-primary  ">Ubah</button>
            
            <a href="konten/proses.php?proses=hapus_gejala&id=<?php echo "$ds[Kodegejala] "?>">
            <button type="button" class="btn btn-danger">Hapus</button></a></td>
          </tr>
           <?php $no=$no+1; } ?> 
        </tbody>
      </table>
      <br>
<!-- <div align="">       
  <a  class="modal-trigger" href="index.php?konten=tambahgejala">
    <button type="submit" class="btn light-blue darken-4">+ Tambah</button>
  </a>  
</div> -->

    <div class="container text-center">
      <a href="index.php?konten=tambahgejala" type="submit" class="btn btn-md btn-primary">
        + Tambah
      </a>
    </div>                 
 