<?php
include ("conn.php");
date_default_timezone_set('Asia/Jakarta');

session_start();

$username = $_POST['username'];
$password = $_POST['password'];


//$username = mysqli_real_escape_string($username);
//$password = mysqli_real_escape_string($password);

if (empty($username) && empty($password)) {
    header('location:login.php?error=Username dan Password Kosong!');
} else if (empty($username)) {
    header('location:login.php?error=Username Kosong!');
} else if (empty($password)) {
    header('location:login.php?error=Password Kosong!');
}

$q = mysqli_query($koneksi, "select * from pengguna where username='$username' and password='$password'");
$row = mysqli_fetch_array ($q);

if (mysqli_num_rows($q) == 1) {
    $_SESSION['id_user']        = $row['id_user'];
    $_SESSION['username']   = $username;
    $_SESSION['nama']       = $row['nama'];
    $_SESSION['alamat'] = $row['alamat'];
     
    $_SESSION['level']      = $row['level'];
    $_SESSION['gambar']     = $row['gambar'];
    


    // cek jika user login sebagai admin
    if($row['level']=="Admin"){

        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "Admin";
        // alihkan ke halaman dashboard admin
        header("location:admin/index.php");

    // cek jika user login sebagai pegawai
    }else if($row['level']=="User"){
        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "User";
        // alihkan ke halaman dashboard pegawai
        header("location:User/admin/");

    // cek jika user login sebagai pengurus
    }else if($row['level']==""){
        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "Dokter";
        // alihkan ke halaman dashboard pengurus
        header("Location:konten/admin/");
   }

} else {
    header('location:login.php?error=Anda Belum Terdaftar!');
}

?>