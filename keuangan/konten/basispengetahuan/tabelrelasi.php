<?php
$conn=mysqli_connect("localhost","root","","abses") or die("koneksi gagal");
include"koneksi.php";

?>
</br>
</br>
</br>
<div class="container">
  <div class="row">
    <div class="col-sm-12">

<form method="post" action="konten/proses.php?proses=tambahrelasi">
 <div class="form-group row">
<div class="input-field col s12">

	<select name="penyakit" class="form-control">
		<option value="" disabled selected> Pilih Penyakit</option>
	<?php 

$sql=mysqli_query($conn,"select * from penyakit ");
while($ds=mysqli_fetch_array($sql))
    { ?>

		<option name="" value="<?php echo "$ds[Kodepenyakit]"; ?> "><?php echo "$ds[Namapenyakit]";?> </option>
		
		<?php }
?>
	</select>
</div>
<div class="input-field col s12">
	<select name="gejala" class="form-control">
		<option value=""disabled selected> Pilih Gejala</option>
<?php 

$sql=mysqli_query($conn,"select * from gejala");
while($ds=mysqli_fetch_array($sql))
    { ?>

		<option value="<?php echo "$ds[Kodegejala]"; ?>"><?php echo "$ds[Namagejala]";?> </option>
	<?php 
}?>

	</select>


</div>
</br>
</br>

<div class="col s1 offset-s1">
<button type="submit"class="btn btn-primary">Simpan</button>
</div>
</div>
</form>
</div>
</div>
</div>