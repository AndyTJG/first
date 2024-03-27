  <span class="card-title"><h1><center><strong>Data Penyakit</strong></center></h1></span>
                     
  <table class="table table-striped table-dark" style="background: grey;">
          <thead>
            <tr>
                <th width="10%">No</th>
                <th>Kode Penyakit</th>
                <th>Nama Penyakit</th>
                <th>Solusi</th>
                <th style="width: 20%;">Aksi</th>
            </tr>
          </thead>

          <tbody>
          	
  <?php 
  $no=1;
  $sql=mysqli_query($conn,"select * from penyakit order by Kodepenyakit asc");
  while($ds=mysqli_fetch_array($sql))
      {
  ?>
            <tr>
              <td> <?php echo $no;?></td>
              <td> <?php echo $ds['Kodepenyakit'];?></td>
              <td> <?php echo $ds['Namapenyakit'];?></td>
              <td> <?php echo $ds['Solusi'];?></td>
              <td>
              <a href="index.php?konten=editpenyakit&id=<?php echo "$ds[Kodepenyakit] "?>">
              <button type="button" class="btn btn-primary"> Ubah </button>

              <a href="konten/proses.php?proses=hapus_penyakit&id=<?php echo "$ds[Kodepenyakit] "?>">
              <button type="button" class="btn btn-danger">Hapus</button></a></td>
            </tr>
              <?php $no=$no+1; } ?>
          </tbody>
        </table>
        <br>
    
    <div class="container text-center">
      <a href="index.php?konten=tambahpenyakit" type="submit" class="btn btn-md btn-primary">
        + Tambah
      </a>
    </div>  
             
</div>




  