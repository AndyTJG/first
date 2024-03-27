


<?php

 session_start();



$server = "localhost";
$user = "root";
$pass = "";
$dbname = "db_keuangan";


    
//$base_url = "http://localhost/koperasi/";

$koneksi = mysqli_connect($server,$user,$pass,$dbname);

if(mysqli_connect_errno()){
    echo "Koneksi database gagal".mysqli_connect_error();
}
/*if (mysqli_connect($server,$user,$pass)){
    #echo ":)";
    mysqli_select_db($dbname) or die("database not found");
}else{
    echo "Database Not Found";
}*/

?>


     <?php
            $query = mysqli_query($koneksi, "SELECT * FROM tb_kasmasuk  WHERE id_trx='$_GET[id_trx]'");
            $data  = mysqli_fetch_array($query);

           
            

            ?>             


<html>
<head>
    <title>Transaksi <?php echo $data['nomor_trx'];?> </title>
</head>
<body>
 

                               
       
                                

                                <br>

<CENTER><h1>NOTA KAS MASUK</h1></CENTER>
 <center><table border="2"></center>

 
  
   


    <tr>
    <td width="40%"><b>Nomor Transaksi</b></td>
    <td width="2%"><b>:</b></td>
    <td width="80%"> <?php echo $data['nomor_trx'];?></td>
    
  </tr>


  <tr>

   

    <td width="40%"><b>Diterima Dari </b></td>
    <td width=""><b>:</b></td>
    <td  width="80">  <?php echo $data['nama_penyetor'];?></td>

  </tr>

  <tr>

   

    <td width="40%"><b>jumlah </b></td>
    <td width=""><b>:</b></td>
    <td  width="80"><?php echo $data['jumlah'];?></td>

  </tr>


   <tr>
    <td width="40%"><b>Keterangan</b></td>
    <td width="2%"><b>:</b></td>
    
    <td width="80%"><?php echo $data['keterangan'];?></td>
   
  </tr>

 
 
  
  


    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
<div class="col-xs-7">
        


        </div>


<br>

<br>
<?php
            $querysu= mysqli_query($koneksi, "SELECT * FROM setting ");
            $datasu  = mysqli_fetch_array($querysu);
            ?>

            
         <div class="col-xs-7">
        
            <strong> <LEFT>Tanda Tangan</LEFT>  </strong>
            
          
          
          
          <p class="w" style="margin-top: 10px;">
          <LEFT> <img width="80px" src="<?php echo $datasu['gambar']; ?>">  </LEFT>
          

<br>
            <strong> <LEFT>Pimpinan</LEFT>  </strong>
          </p>

        </div>


        </div>
         
                  
                



                  



                 


            </section>


                 


                  


              




    <script>
        window.print();
    </script>
    
</body>
</html>
