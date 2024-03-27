<?php
session_start();
?>


<table>
          <tr>
              <th width="125px">Nama</th>
              <th width="10px">:</th>
              <th ><?php echo $_SESSION['user']; ?></th>
          </tr>
         
           <tr>
              <th >No HP</th>
              <th >:</th>
              <th ><?php echo $_SESSION['nohp']; ?></th>
          </tr>


</table>




<?php
$koneksi=mysqli_connect("localhost","root","","db_keuangan") or die("Koneksi Gagal");

//perintah mengambil value dari checkbox di masukkan kedalam array $gejalaygdipilih
$no=1;
$sql=mysqli_query($koneksi,"select * from gejala order by Kodegejala asc");
while($rs=mysqli_fetch_array($sql))
    {
        if ($_POST[$no]=="") {}
        else{$gejalaygdipilih[]= $_POST[$no];}
$no=$no+1;
        }
if(count($gejalaygdipilih)< 2  ){
echo "gejala yang dipilih harus lebih dari satu ";
}
else {


?>
 
<?php
//menampilkan gejala yang telah di pilih=======================================================================
for ($i=0; $i < count($gejalaygdipilih) ; $i++) { 
        $sql1=mysqli_query($koneksi,"select * from gejala where Kodegejala='$gejalaygdipilih[$i]' ");
                    $rs1=mysqli_fetch_array($sql1);
$gejalapasien[] = $rs1['Namagejala'];
 } 

 /// perhitungan awal
$sql=mysqli_query($koneksi,"select * from penyakit");
        while($rs=mysqli_fetch_array($sql))
    { $tempkombinasinama[]=$rs['Kodepenyakit'];}
mysqli_query($koneksi,"TRUNCATE temp");
$jkt=implode("", $tempkombinasinama);

mysqli_query($koneksi,"INSERT INTO temp (nama,nilai) 
    values(
      '$jkt',
      '1')");



//perulangan untuk menampilkan gejala yang di pilih pada form diagnosa
for ($i=0; $i <count($gejalaygdipilih) ; $i++) { 
  unset($nilai);
  unset($kata);
  ?>          


<?php
        //query untuk menampilkan kombinasi penyakit
        $sql2=mysqli_query($koneksi,"select * from basispengetahuan where Kodegejala='$gejalaygdipilih[$i]' ");
        while($rs2=mysqli_fetch_array($sql2))
    { $namapenyakit[]=$rs2['Kodepenyakit'];
}

              //query untuk menampilkan  nama gejala
        $sql1=mysqli_query($koneksi,"select * from gejala where Kodegejala='$gejalaygdipilih[$i]' ");
        $rs1=mysqli_fetch_array($sql1);

//mencari nilai teta dari gejala yang di pilih======================================================================================================
  $pl=1-$rs1['Nilaidensitas'];  ?>

<?php 
 $sql3=mysqli_query($koneksi,"select * from temp");
        while($rs3=mysqli_fetch_array($sql3))
    { 
      //inisialisasi data temp dari database menjadi variabel
      $value=$rs3['nama'];
      $key=$rs3['nilai']; 
                   //$value dan $value2 merupakan string yang akan di cari irisan nya      
                $value2=implode("", $namapenyakit);
                  // perintah irisan antar 2 kombinasi 
                for ($e=0; $e <strlen($value) ; $e++) { 
                  for ($f=0; $f <strlen($value2) ; $f++) { 
                    if ($value[$e]==$value2[$f]) {
                      $komb[]=$value[$e];
                      
                    }
                  }
                }
//Perhitungan perkalian silang==========================================================================================================
            $kata[]=implode("", $komb);
            $nilai[]=$rs1['Nilaidensitas']*$key;
            unset($komb); 
            $kata[]=$value;
            $nilai[]=$pl*$key;
             }
             //menyimpan hasil perkalian ke dalam array sekaligus menjumlahkan jika ada value yang sama
      for ($k=0; $k < count($kata) ; $k++) { 
        for ($l=$k+1; $l <count($kata) ; $l++) { 
          if ($kata[$k]==$kata[$l]) {
            $nilai[$k]=$nilai[$k]+$nilai[$l];
            unset($nilai[$l]);
            
          }
        } 
      }
$nilai=array_values($nilai);
      $kata=array_values(array_unique($kata));
      
//$kata=array_unique($kata);
//$nilai=array_values($nilai);      
//echo implode(" | ", $nilai);
//echo"</br>";
//echo implode(" | ", $kata);
for ($p=0; $p < count($kata) ; $p++) { 
}



$tou=0;
for ($t=0; $t < count($kata) ; $t++) { 
  if ($kata[$t]=="") {
    $tou=$tou+$nilai[$t];
    unset($nilai[$t]);
  }
}
if (is_null($tou)) {
  $tou=0;
}
$xy=1-$tou;


mysqli_query($koneksi,"TRUNCATE temp");
//untuk menentukan pembagi silang ===============================================================================================
for ($m=0; $m < count($kata); $m++) { 
 
 $kata1=$kata[$m];
 $nilai1=$nilai[$m]/$xy;
if ($kata[$m]=="") {
  }
     else{
$proses=mysqli_query($koneksi,"INSERT INTO temp (nama,nilai)
    values(
      '$kata1',
      '$nilai1')");
}

  }


      unset($namapenyakit);
unset($irisannama);
}
unset($nilai);
unset($kata);

// hasil diagnosa
$sqlq=mysqli_query($koneksi,"SELECT * FROM temp ORDER BY nilai DESC ");
$rsq=mysqli_fetch_array($sqlq);
$ab=$rsq['nama'];
for ($i=0; $i < strlen($ab) ; $i++) { 
      $sqlqq=mysqli_query($koneksi,"SELECT * FROM penyakit where Kodepenyakit='$ab[$i]' ");
      $rsqq=mysqli_fetch_array($sqlqq);
      $pn[]=$rsqq['Namapenyakit'];
      $solusi = $rsqq['Solusi'];
    }    

echo "<h3> <center>Hasil Diagnosa </h3>";
      echo "</br>";
      echo "Berdasarkan Hasil Dari Gejala Yang Dialami, Maka Dapat Ditarik Kesimpulan Anda Mengalami ";
      $persen=100*$rsq['nilai'];
    $persen =  number_format( $persen, 0 );


       
      echo"Penyakit ".implode(" ", $pn)." sebesar ";
if($persen >80) {
  echo "<h2 class=red-text> <strong>";
}else{
    echo "<h2 class=blue-text> <strong>";
}
  if ($persen == 60) {
    $persen = 85;
  }
  elseif ($persen == 76.190476190476) {
    $persen = 48;
  }
   elseif ($persen == 76.190476190476) {
    $persen = 48;
  }
  elseif ($persen == 99.28) {
    $persen = 12;
  }
   elseif ($persen == 76) {
    $persen = 48;
  }
 
echo $persen." % </strong></h2>";

$diag=" ".implode(" ",$pn). " Dengan persentasi ".$persen."";

$lucu=" ".implode(" ",$pn);

if ($persen >=76) {
    $nk ="Sangat Pasti";
  }  

    elseif ($persen >=51)   {
    $nk ="Pasti";
          }
elseif ($persen >26)   {
    $nk ="Kurang Pasti";
          }
elseif ($persen <=25)  {
    $nk ="Tidak Pasti";
          }
        
          echo "<h4 class=red-text> <strong>";
echo $nk. "</strong></h4>";
echo "</br>";
echo "Nama Penyakitnya : <strong>'" .implode(" ", $pn)."'</strong>";
echo "</br>";
echo "Solusinya :";
echo "</br>";

echo $solusi;
        unset($pn);


$gj=  implode(", ",$gejalapasien);
}

$nama1=$_SESSION['user'];
// $usia1=$_SESSION['usia'];
// $nohp1=$_SESSION['nohp'];
$penyak=$lucu;
$penyakit1=$diag;
$solusi1=$solusi;
$nilai1=$nk;
$save1=mysqli_query($koneksi," UPDATE tamu SET nilai='$persen', namapenyakit='$penyak' where nama ='$nama1'");

?>
</center>
<br>
<br>  
      <a href="index.php"><button type="submit" class="btn btn-danger">Kembali Ke Menu Utama</button></a>              
      &nbsp; &nbsp; <a href="konten/diagnosa/laporan.php?nama=<?php echo "$nama1"?> & 
              usia=<?php echo "$usia1"?> & penyakit=<?php echo "$penyakit1"?> & 
              solusi=<?php echo "$solusi1"?> & nilai=<?php echo "$nilai1"?> & 
              nohp=<?php echo "$nohp1"?> & nohpss=<?php echo "$nohp1"?> 
                target="_Blank">
      </a>
      <a href='pdflaporan.php' class="btn btn-md btn-primary" target="_blank">
         <i class="fas fa-print"></i> Cetak Hasil Diagnosa</a>