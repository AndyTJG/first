<?php
include"koneksi.php";


$koneksi=mysqli_connect("localhost","root","","abses") or die("koneksi gagal");

//perintah mengambil value dari checkbox di masukkan kedalam array $gejalaygdipilih
$no=1;
$sql=mysqli_query($koneksi,"select * from gejala ");
while($rs=mysqli_fetch_array($sql))
    {
        if ($_POST[$no]=="") {}
        else{$gejalaygdipilih[]= $_POST[$no];}
$no=$no+1;
        }
?>



<table class="striped" >
        <thead>
          <tr>
              <th >No</th>
              <th >Gejala yang dipilih</th>
              <th >Densitas</th>
          </tr>
        </thead>

        <tbody>
 
<?php
for ($i=0; $i < count($gejalaygdipilih) ; $i++) { 
?>    
          <tr>
            <td><?php echo $i+1;?></td>
            <td><?php
        $sql1=mysqli_query($koneksi,"select * from gejala where Kodegejala='$gejalaygdipilih[$i]' ");
                    $rs1=mysqli_fetch_array($sql1);
             echo"[".$gejalaygdipilih[$i]."] ".$rs1['Namagejala'];?></td>
            <td><?php echo"$rs1[Nilaidensitas]";?></td>
          </tr>
 <?php $no=$no+1; } ?>         
        </tbody>
      </table>



  <?php /// perhitungan awal
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
<table >
        <thead>
          <tr>
              <th ><?php
        //guery untuk menampilkan kombinasi penyakit
        $sql2=mysqli_query($koneksi,"select * from basispengetahuan where Kodegejala='$gejalaygdipilih[$i]' ");
        while($rs2=mysqli_fetch_array($sql2))
    { $namapenyakit[]=$rs2['Kodepenyakit'];
}

              //query untuk menampilkan  nama gejala
        $sql1=mysqli_query($koneksi,"select * from gejala where Kodegejala='$gejalaygdipilih[$i]' ");
        $rs1=mysqli_fetch_array($sql1);


             echo$rs1['Namagejala']." { ".implode(", ", $namapenyakit). " }";?></th>
          </tr>
        </thead>

        <tbody>
          <tr>
              <th >#</th>
              <th ><?php //menyatakan gejala penyakit yang dipilih dan nilai densitas nya
             echo implode(",", $namapenyakit)." = ".$rs1['Nilaidensitas'];  ?></th>
              <th ><?php $pl=1-$rs1['Nilaidensitas'];  echo "ø = ". $pl; ?></th>
          </tr>

<?php 
 $sql3=mysqli_query($koneksi,"select * from temp");
        while($rs3=mysqli_fetch_array($sql3))
    { 
      //inisialisasi data temp dari database menjadi variabel
      $value=$rs3['nama'];
      $key=$rs3['nilai'];?>
          <tr>
              <th ><?php echo $rs3['nama']." = ".$rs3['nilai']; ?></th>
              <td ><?php 
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

            echo implode("", $komb);
            $kata[]=implode("", $komb);
            echo " = ";
            echo $rs1['Nilaidensitas']*$key;
            $nilai[]=$rs1['Nilaidensitas']*$key;
            unset($komb); 
            ?></td>
              <td ><?php
            echo $value;
            $kata[]=$value;
            echo" = ";
            echo$pl*$key;
            $nilai[]=$pl*$key;
            ?></td>
          </tr>
<?php }?>



     </tbody>
      </table>
</br>==================================================================================================</br>

      <?php //menyimpan hasil perkalian ke dalam array sekaligus menjumlahkan jika ada value yang sama
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
  echo"</br>";
  echo "Nilai ".$kata[$p]." => ".$nilai[$p];}



// menentukan faktor pembagi pada rumus Dempster Shafer
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
echo "</br>Nilai Pembagi = ".$xy;


mysqli_query($koneksi,"TRUNCATE temp");

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
mysqli_query($koneksi," UPDATE temp SET nilai='$nilai1'where nama ='$kata1'");

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
      $solusi=$rsqq['Solusi'];
    }    
echo "</br>";
echo "</br>";
echo "</br>==================================================================================================</br>";
echo "<h4>Diagnosa</h4>";
echo "==================================================================================================</br>";
      echo "</br>";
 echo "Dari Hasil Diagnosa Saudara ";
      echo $_SESSION['pasien'];
      echo " Mengidap :";
          echo "</br>";
      $persen=100*$rsq['nilai'] ;
      echo"Penyakit ".implode(" ", $pn)." dengan persentase <h5><strong>".$persen." % </strong></h5>";
      echo "</br>";
echo $solusi;
echo "Solusi";
        unset($pn);


?>
