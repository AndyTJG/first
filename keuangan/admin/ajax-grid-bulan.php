<?php
/* Database connection start */
include "koneksi.php";
/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name


	
	0 => 'id',
    1 => 'id_user', 
	2 => 'nama_penyetor',
    3 => 'januari', 
	4 => 'februari',
	5 => 'maret',
	6 => 'april',
	7 => 'mei',
    8 => 'juni'
    9 => 'juli', 
	10 => 'agustus',
	11 => 'september',
	12 => 'oktober',
	13 => 'november',
    14 => 'desember'





);

// getting total number records without any search
$sql = "SELECT id, id_user, nama_penyetor, januari, februari, maret, april, mei, juni, juli, agustus, september, oktober, november, desember";
$sql.=" FROM iuran ";
$query=mysqli_query($conn, $sql) or die("ajax-grid-bulan.php: get iuran ");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT id, id_user, nama_penyetor, januari, februari, maret, april, mei, juni, juli, agustus, september, oktober, november, desember";
	$sql.=" FROM iuran ";
	$sql.=" WHERE id LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter

		$sql.=" WHERE id_user LIKE '".$requestData['search']['value']."%' ";    // 
		$sql.=" WHERE nama_penyetor LIKE '".$requestData['search']['value']."%' ";    // 
		$sql.=" WHERE januari LIKE '".$requestData['search']['value']."%' ";    // 
	    $sql.=" WHERE februari LIKE '".$requestData['search']['value']."%' ";    // 
		$sql.=" WHERE maret LIKE '".$requestData['search']['value']."%' ";    // 
		$sql.=" WHERE april LIKE '".$requestData['search']['value']."%' ";    // 
		$sql.=" WHERE mei LIKE '".$requestData['search']['value']."%' ";    // 
		$sql.=" WHERE juni LIKE '".$requestData['search']['value']."%' ";    // 
		$sql.=" WHERE juli LIKE '".$requestData['search']['value']."%' ";    // 

		$sql.=" WHERE agustus LIKE '".$requestData['search']['value']."%' ";    // 
		$sql.=" WHERE september LIKE '".$requestData['search']['value']."%' ";    // 
		$sql.=" WHERE oktober LIKE '".$requestData['search']['value']."%' ";    // 
		$sql.=" WHERE november LIKE '".$requestData['search']['value']."%' ";    // 
		$sql.=" WHERE desember LIKE '".$requestData['search']['value']."%' ";    // 


	$query=mysqli_query($conn, $sql) or die("ajax-grid-bulan.php: get iuran ");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("ajax-grid-bulan.php: get iuran "); // again run query with limit
	
} else {	

	"SELECT id, id_user, nama_penyetor, januari, februari, maret, april, mei, juni, juli, agustus, september, oktober, november, desember";
	$sql.=" FROM iuran ";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("ajax-grid-bulan.php: get iuran ");   
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 



	$nestedData[] = $row["id"];
	$nestedData[] = $row["id_user"];
	$nestedData[] = $row["nama_penyetor"];
    $nestedData[] = $row["januari"];
	$nestedData[] = $row["februari"];
	$nestedData[] = $row["maret"];
	$nestedData[] = $row["april"];
	$nestedData[] = $row["mei"];
	$nestedData[] = $row["juni"];
	$nestedData[] = $row["juli"];
	$nestedData[] = $row["agustus"];
	$nestedData[] = $row["september"];
	$nestedData[] = $row["oktober"];
	$nestedData[] = $row["november"];
	$nestedData[] = $row["desember"];
	
    $nestedData[] = '<td><center>
    					
    				

                    


                   


	                 </center></td>';		
	
	$data[] = $nestedData;
    
}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
