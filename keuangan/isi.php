<?php
if(!$_GET['konten']){
	include "home.php";}

if($_GET['konten']=="tamu"){
	include "konten/user/tamu.php";}

if($_GET['konten']=="isibukutamu"){
	include "konten/user/isibukutamu.php";}

if($_GET['konten']=="admin"){
	include "konten/admin/admin.php";}
	
if($_GET['konten']=="penyakit"){
	include "konten/penyakit/penyakit.php";}

if($_GET['konten']=="gejala"){
	include "konten/gejala/gejala.php";}

if($_GET['konten']=="basispengetahuan"){
	include "konten/basispengetahuan/basispengetahuan.php";}

if($_GET['konten']=="editgejala"){
	include "konten/gejala/editgejala.php";}

if($_GET['konten']=="editpenyakit"){
	include "konten/penyakit/editpenyakit.php";}

if($_GET['konten']=="tambahpenyakit"){
	include "konten/penyakit/tambahpenyakit.php";}

if($_GET['konten']=="diagnosa"){
	include "konten/diagnosa/diagnosa.php";}

if($_GET['konten']=="hasildiagnosa"){
	include "konten/diagnosa/hasildiagnosa.php";}

if($_GET['konten']=="tambahgejala"){
	include "konten/gejala/tambahgejala.php";}

if($_GET['konten']=="tabelrelasi"){
	include "konten/basispengetahuan/tabelrelasi.php";}



?>

