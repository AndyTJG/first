<?php
include"koneksi.php";
session_start();
$nama=$_POST['nama'];
$nohp=$_POST['nohp'];
$antrilah=$_POST['antri'];
$nilai=$_POST['nilai'];
$namapenyakit=$_POST['namapenyakit'];

$_SESSION['user']=$nama;
$_SESSION['antri']=$antrilah;
$_SESSION['nohp']=$nohp;
$_SESSION['nilai']=$nilai;
$_SESSION['namapenyakit']=$namapenyakit;


  $simpan=mysqli_query($conn,"INSERT INTO tamu (antrian,nama,nohp,nilai,namapenyakit) 
    values(
    '$antrilah',
      '$nama',
      '$nohp',
      '$nilai',
      '$namapenyakit')");

?>
 <form method="post" action="index.php?konten=hasildiagnosa">
<table class="table">
          <tr>
              <th width="125px">Nomor Antrian</th>
              <th width="10px">:</th>
              <th ><?php echo $antrilah; ?></th>
          </tr>
          <tr>
              <th width="125px">Nama</th>
              <th width="10px">:</th>
              <th ><?php echo $nama; ?></th>
          </tr>
          <tr>
              <th >No HP</th>
              <th >:</th>
              <th ><?php echo $nohp; ?></th>
          </tr>



</table>



   
    
            
<table class="table" style="background: black" >
        <thead class="thead-dark">
          <tr>
              <th >No</th>
              <th  >Gejala</th>
               <th align="center">Aksi</th>
          </tr>
        </thead>

        <tbody>
          <?php 
$no=1;
$sql=mysqli_query($conn,"select * from gejala order by Kodegejala asc");
while($ds=mysqli_fetch_array($sql))
    {
?>

          <tr style="background: gold">
            <td> <?php echo $no;?> </td>
            <td><?php echo $ds['Namagejala'];?> </td>
            <td>
            <p>
      <input type="checkbox" class="filled-in" id="<?php echo $no;?>" name="<?php echo $no;?>" value="<?php echo $ds['Kodegejala'];?>" />
      <label class="black-text" for="<?php echo $no;?>"></label>
    </p>
          </tr>
           <?php $no=$no+1; } ?> 
        </tbody>
      </table>

<center><button type="submit" class="btn btn-primary">DIAGNOSA</button>                  <center>
    </form>