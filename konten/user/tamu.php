
<div class="row">
  <div class="col-md-2">
  </div>
  <div class="col-md-8">
    <span class="card-title text-light"><h1><center><strong>Data Pengunjung Web</strong></center></h1></span>
  </div>
</div>
                     
  
<div class="container">
  <div class="row">
    <div class="col-sm-12">

        <table class="table table-striped table-dark" style="background: grey" >
  <thead>
    <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No Hp</th>
                <th>Nilai %</th>
                <th>Penyakit Yang Dialami</th>
            </tr>
        </thead>
        <tbody>
          <?php 
        $no=1;
        $sql=mysqli_query($conn,"select * from tamu");
        while($ds=mysqli_fetch_array($sql))
            {
        ?>
                  <tr>
                    <td> <?php echo $no;?></td>
                    <td> <?php echo $ds['nama'];?></td>
                    <td> <?php echo $ds['nohp'];?></td>
                    <td> <?php echo $ds['nilai'];?></td>
                    <td> <?php echo $ds['namapenyakit'];?></td>
                     <td >
                    
                    <a href="konten/proses.php?proses=hapus_tamu&id=<?php echo "$ds[nama] "?>">
                  <button type="button" class="btn btn-danger">Hapus</button> </a>
                 
        </td>          </tr>
                    <?php $no=$no+1; } ?> 
        
        </tbody>
      </table>
    </div>

  </div>
</div>

      