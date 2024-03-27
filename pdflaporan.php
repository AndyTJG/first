<?php
include("koneksi.php");
echo '<br>';

?>

<style type="text/css">
      .box{
         border: 1px solid #000;
      }
      .header td{
         border-bottom: 1px solid #000;
      }
      .garis{
     border-bottom: 1px solid #000;
     border-top: 1px solid #000;
      }
      .garis1{
     border-bottom: 2px solid #000;
      }
      .box tr{
         border-bottom: 1px solid #000;
      }
   </style>
  <table width="800" cellspacing="18" class="box" align='center' valign='middle'>
  <?php
  echo '<tr>
  <td>
    
   </td>
   <td colspan="4"   align="center" cellspacing="15" valign="middle" style="padding: 5px 30px;"><h3>KLINIK SUDIARTO</h3></td></tr>';
echo '<tr><td colspan="6" class="garis" align="center" cellspacing="20"></td></tr>';
 echo '<tr>
 <td>
    
   </td>
     <td colspan="4"   align="center" cellspacing="15" valign="middle" style="padding: 5px 30px;"><h3> Laporan Hasil Diagnosa Penyakit Abses Periodontal</h3></td></tr>';
echo'<tr>
<th>No.</th>
              <th>Nama User</th>
              <th>Nilai </th>
              <th>No HP </th>
              <th align="center">Nama Penyakit</th>

  </tr>';
echo '<tr><td colspan="6" class="garis" align="center"></td></tr>';

$no = 1;
 $sql = "SELECT * FROM tamu";
        $result = mysqli_query($conn, $sql);
        while ($data = mysqli_fetch_array($result)) {
echo ' <tr>
 <td align="center">'.$no.'</td>
            <td align="left">'.$data['nama'].'</td>
            <td align="center">'.$data['nilai'].'</td>
            <td align="center">'.$data['nohp'].'</td>
            <td align="center">'.$data['namapenyakit'].'</td>

            </tr>';
$no++;
}
?>
</table>

 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <br>
 <br>
 <br>
 <br>
 <br>
 Dokter Gigi
 &nbsp;
 <br><br><br>
 <br><br><br>
  Drg. Henny  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
   <script>
      window.print();
   </script>
    </html>