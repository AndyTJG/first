<?php
session_start();
include"koneksi.php";
$username=$_POST['username'];
$password=$_POST['password'];

$sql=mysqli_query($conn,"select * from admin where Username = '$username' and password ='$password'");
$ds=mysqli_fetch_array($sql);
$_SESSION['nama']=$ds['Namaadmin'];

if(count($ds)>="1"){
	echo "<script>window.alert('Anda Berhasil Login');
	window.location=('index.php?konten=admin')</script>";}
else{echo "<script>window.alert('Anda Gagal Login');
	window.location=('index.php')</script>";}


?>