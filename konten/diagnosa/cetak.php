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
  <td width="60" align="center" colspan="2">
     <img src="img/logo.png" width="150" height="150">
   </td>
   <td colspan="4"   align="center" cellspacing="15" valign="middle" style="padding: 5px 30px;"><h3>DATA LAPORAN DIAGNOSA PENGUNJUNG</h3></td></tr>';
echo '<tr><td colspan="6" class="garis" align="center" cellspacing="20"></td></tr>';
echo'<tr>
<th>No.</th>
              <th>Nama User</th>
              <th>Nilai CF</th>
              <th align="center">Nama Penyakit</th>

  </tr>';
echo '<tr><td colspan="6" class="garis" align="center"></td></tr>';

$no = 1;
 $sql = "SELECT * FROM tbl_diagnosa";
        $result = mysqli_query($mysql, $sql);
        while ($data = mysqli_fetch_array($result)) {
echo ' <tr>
 <td align="center">'.$no.'</td>
            <td align="left">'.$data['nama_user'].'</td>
            <td align="center">'.$data['nilai_cf'].'</td>
            <td align="center">'.$data['nama_penyakit'].'</td>

            </tr>';
$no++;
}
?>
</table>
<script>
    window.print();
</script>
    </html>