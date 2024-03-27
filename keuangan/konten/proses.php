<?php
session_start();

$conn=mysqli_connect("localhost","root","","abses") or die("koneksi gagal coy");

if($_GET['proses']=="hapus_gejala"){
	$hapus =mysqli_query($conn,"delete from gejala where Kodegejala='$_GET[id]'");
				if (!$hapus) {
				echo "<script>alert('Gagal Dihapus, silahkan coba beberapa saat lagi...');
				window.location=('../index.php?konten=gejala')</script>";
					}
		else {
		echo "<script>window.alert('Data Terhapus');
        window.location=('../index.php?konten=gejala')</script>";
}}

if($_GET['proses']=="hapus_penyakit"){
	$hapus =mysqli_query($conn,"delete from penyakit where Kodepenyakit='$_GET[id]'");
				if (!$hapus) {
				echo "<script>alert('Gagal Dihapus, silahkan coba beberapa saat lagi...');
				window.location=('../index.php?konten=penyakit')</script>";
					}
		else {
		echo "<script>window.alert('Data Terhapus');
        window.location=('../index.php?konten=penyakit')</script>";
}}
if($_GET['proses']=="hapus_basispengetahuan"){
	$hapus =mysqli_query($conn,"delete from basispengetahuan where id='$_GET[id]'");
				if (!$hapus) {
				echo "<script>alert('Gagal Dihapus, silahkan coba beberapa saat lagi...');
				window.location=('../index.php?konten=basispengetahuan')</script>";
					}
		else {
		echo "<script>window.alert('Data Terhapus');
        window.location=('../index.php?konten=basispengetahuan')</script>";
}}

if($_GET['proses']=="hapus_tamu"){
	$hapus =mysqli_query($conn,"delete from tamu where nama='$_GET[id]'");
				if (!$hapus) {
				echo "<script>alert('Gagal Dihapus, silahkan coba beberapa saat lagi...');
				window.location=('../index.php?konten=tamu')</script>";
					}
		else {
		echo "<script>window.alert('Data Terhapus');
        window.location=('../index.php?konten=tamu')</script>";
}}

if ($_GET['proses']=="tambahgejala") {
	$simpan=mysqli_query($conn,"INSERT INTO gejala (Kodegejala,Namagejala,Nilaidensitas) 
		values(
			'$_POST[kode]',
			'$_POST[nama]',
			'$_POST[nilai]')");
		if (!$simpan) {
	echo "<script>alert('Gagal Disimpan, silahkan coba beberapa saat lagi...');window.location=('../index.php?konten=gejala')</script>";
}
else{echo "<script>alert('Berhasil Disimpan');window.location=('../index.php?konten=gejala')</script>";
}
}

if ($_GET['proses']=="tambahpenyakit") {
	$simpan=mysqli_query($conn,"INSERT INTO penyakit (Kodepenyakit,Namapenyakit,Solusi) 
		values(
			'$_POST[kode]',
			'$_POST[nama]',
			'$_POST[solusi]')");
		if (!$simpan) {
	echo "<script>alert('Gagal Disimpan, silahkan coba beberapa saat lagi...');window.location=('../index.php?konten=penyakit')</script>";
}
else{echo "<script>alert('Berhasil Disimpan');window.location=('../index.php?konten=penyakit')</script>";
}
}



if ($_GET['proses']=="tambahrelasi") {
	$simpan=mysqli_query($conn,"INSERT INTO basispengetahuan (id,Kodepenyakit,Kodegejala) 
		values(
			'',
			'$_POST[penyakit]',
			'$_POST[gejala]')");
		if (!$simpan) {
	echo "<script>alert('Gagal Disimpan, silahkan coba beberapa saat lagi...');window.location=('../index.php?konten=basispengetahuan')</script>";
}
else{echo "<script>alert('Berhasil Disimpan');window.location=('../index.php?konten=basispengetahuan')</script>";
}
}

if($_GET['proses']=="editpenyakit"){
mysqli_query($conn,"UPDATE penyakit SET 
	Kodepenyakit='$_POST[kode]',
	Namapenyakit='$_POST[nama]',
	Solusi='$_POST[solusi]' where No='$_POST[no]'");
echo "<script>window.alert('Data penyakit Telah Diubah');
        window.location=('../index.php?konten=penyakit')</script>";

}


if($_GET['proses']=="editgejala"){
mysqli_query($conn,"UPDATE gejala SET 
	Namagejala='$_POST[nama]',
	Nilaidensitas='$_POST[nilai]' where Kodegejala='$_POST[kode]'");
echo "<script>window.alert('Data Gejala Telah Diubah');
        window.location=('../index.php?konten=gejala')</script>";

}



?>
