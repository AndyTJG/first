<div class="container">
  <div class="row">
    <div class="col-md-2">
      <img src="image/beranda/logo1.jpg" alt="..." class="img-rounded" style="width: 150px; margin-left: 140px;">
    </div>
    <div class="col-md-10">
      <h1 align="center"> KONSULTASI ONLINE <br> DIAGNOSA PENYAKIT <br> RINGAN</h1>
    </div>
  </div>
</div>

  


<form class="col s12"method="post" action="index.php?konten=diagnosa">
  <?php
include "config/koneksi.php";
  // mengambil data barang dengan kode paling besar
  $query = mysqli_query($koneksi, "SELECT max(antrian) as antrian FROM tamu");
  $data = mysqli_fetch_array($query);
    $kodeBarang = $data['antrian'];
  $urutan = (int) substr($kodeBarang, 1, 3);
  $urutan++;
  $huruf = "A";
  $kodeBarang = $huruf . sprintf("%02s", $urutan);
  ?>
 
  <div class="form-group row">
    <div class="col-md-2"></div>
    <label for="staticEmail" class="col-sm-2 col-form-label">Nomor Antrian</label>
    <div class="col-sm-6">
    <input  type="text" class="form-control" name="antri" value="<?php echo $kodeBarang ?>" readonly="true" >
    </div>
  </div>

<div class="form-group row">
    <div class="col-md-2"></div>
    <label for="staticEmail" class="col-sm-2 col-form-label">Nama Anda</label>
    <div class="col-sm-6">
    <input  type="text" class="form-control" name="nama" placeholder="Masukkan Nama Anda">
    </div>
  </div>
  
  <div class="form-group row">
    <div class="col-md-2"></div>
    <label for="staticEmail" class="col-sm-2 col-form-label">No HP</label>
    <div class="col-sm-6">
<input  type="text" class="form-control" name="nohp" placeholder="Masukkan no hp Anda">

    </div>
  </div>

<div class="row">
  <div class="col-md-4"></div>
    <div class="col-md-2">
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    <div class="col-md-2">  
      <button type="reset" class="btn btn-danger">Reset</button>
    </div>
  <div class="col-md-4"></div>
</div>
  

</form>