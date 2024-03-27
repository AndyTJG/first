<span class="card-title"><h1><center><strong>Basis Pengetahuan</strong></center></h1></span>
      
<br>
    
    <div class="container text-center ">
      <a href="index.php?konten=tabelrelasi" type="submit" class="btn btn-md btn-primary">
        + Tambah
      </a>
    </div>              

<br>

<div class="container">
  <div class="row">
    <div class="col-sm-12">

<table class="table table-striped table-dark" style="background: grey" >
        <thead>
          <tr>
              <th >No</th>
              <th >Penyakit</th>
              <th >Gejala</th>
               <th align="center">Aksi</th>
          </tr>
        </thead>

        <tbody>
          <?php 
$no=1;
$sql=mysqli_query($conn,"select * from basispengetahuan order by Kodepenyakit asc ");
while($ds=mysqli_fetch_array($sql))
    {
?>

          <tr>
            <td> <?php echo $no;?></td>
            <td><?php $kode=$ds['Kodepenyakit']; 

$sql1=mysqli_query($conn,"select * from penyakit where Kodepenyakit ='$kode'");
$rs1=mysqli_fetch_array($sql1);
echo $rs1['Namapenyakit'];


?>

            </td>
            <td> <?php $kode2=$ds['Kodegejala']; 
$sql2=mysqli_query($conn,"select * from gejala where Kodegejala ='$kode2'");
$rs2=mysqli_fetch_array($sql2);
echo $rs2['Namagejala'];


?>
            </td>
            <td>
            
           <a href="konten/proses.php?proses=hapus_basispengetahuan&id=<?php echo "$ds[id] "?>">
            <button type="button" class="btn btn-danger">Hapus</button> </a></td></tr>
          </tr>
            <?php $no=$no+1; } ?>
        </tbody>
      </table>
            
            </div>
  </div>
</div>




      