<?php
include"koneksi.php";
?>
<h2>Ubah Gejala</h2>
<?php 

$sql=mysqli_query($conn,"select * from gejala where Kodegejala ='$_GET[id]'");
$rs=mysqli_fetch_array($sql);
?>


<form method="post" action="konten/proses.php?proses=editgejala">
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Kode Gejala</label>
    <div class="col-sm-10">
<input  type="text" class="form-control" name="kode" value="<?php  echo "$rs[Kodegejala]";?>">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Nama Gejala</label>
    <div class="col-sm-10">
<input  type="text" class="form-control" name="nama" value="<?php  echo "$rs[Namagejala]";?>">

    </div>
  </div>
  
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Nilai Densitas</label>
    <div class="col-sm-10">
<input  type="text" class="form-control" name="nilai" value="<?php echo  "$rs[Nilaidensitas]";?>">

    </div>
  </div>
 
<button type="submit"class="btn btn-primary">Edit</button>
  
  
</form>