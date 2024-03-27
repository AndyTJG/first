<h2>Ubah Penyakit</h2>
<?php 
include"koneksi.php";

$sql=mysqli_query($conn,"select * from penyakit where Kodepenyakit ='$_GET[id]'");
$rs=mysqli_fetch_array($sql);
?>



<form method="post" action="konten/proses.php?proses=editpenyakit">
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">No Penyakit</label>
    <div class="col-sm-10">
<input  type="text" class="form-control" name="no" value="<?php  echo "$rs[No]";?>">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Kode Penyakit</label>
    <div class="col-sm-10">
<input  type="text" class="form-control" name="kode" value="<?php  echo "$rs[Kodepenyakit]";?>">

    </div>
  </div>
  
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Nama Penyakit</label>
    <div class="col-sm-10">
<input  type="text" class="form-control" name="nama" value="<?php  echo "$rs[Namapenyakit]";?>">

    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Solusi</label>
    <div class="col-sm-10">
    	<textarea  id="textarea1" class="form-control" name="solusi" value="" data-length="500"> <?php echo  "$rs[Solusi]";?></textarea>

    </div>
  </div>
  
<button type="submit"class="btn btn-primary">Edit</button>
  
</form>