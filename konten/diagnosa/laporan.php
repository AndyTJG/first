<?php
require_once('TCPDF/tcpdf.php');
//konfigurasi TCPDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
//menambahkan halaman
$pdf->AddPage();
//isi pdf
$nama=$_GET['nama'];
$usia=$_GET['usia'];
$penyakit=$_GET['penyakit'];
$solusi=$_GET['solusi'];
$nilai=$_GET['nilai'];
$nohp=$_GET['nohp'];
$nama=$_GET['nama'];
session_start();
$teks =  '<html>
  
  <body>'.	
  '<div align="center">
    <img src="logo.png" height="100px" width="180px;">
  </div>
  <div align="center">
    <h2>Laporan Diagnosa Pengunjung</h2>
  </div>'.
  '<br>Dengan Hormat,<br> Dengan ini kami menyampaikan Laporan Diagnosa Atas :<br><table >
  <tr>
  <td width="60px" > Nama </td>
  <td width="10x"> : </td>
  <td width="350px"> '.$nama.' </td>
  </tr>
  <tr>
  <td> Penyakit </td>
  <td> : </td>
  <td>'.$penyakit.' </td>
  </tr>
  
   <tr>
  <td> Tingkatan </td>
  <td> : </td>
  <td>'.$nilai. ' </td>
  </tr>
  
   <tr>
  <td> solusi</td>
  <td> : </td>
  <td>'.$solusi.' </td>
  </tr>

 
  </table>'.
  
  '</body></html>';

  
//print teks
$pdf->writeHTMLCell(0, 0, '', '', $teks, 0, 1, 0, true, '', true);
//hasil print
$pdf->Output('hasillaporan.pdf','I');


?>