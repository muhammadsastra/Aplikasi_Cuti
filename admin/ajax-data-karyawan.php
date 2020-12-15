<?php
include "koneksi.php";

// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'id',
    1 => 'nik', 
	2 => 'masuk_kerja',
    3 => 'nama',
	4 => 'jenkel',
    5 => 'email',
    6 => 'jabatan',
    7 => 'departemen',
    8 => 'sisa_cuti'

);

// getting total number records without any search
$sql = "SELECT id, nik, masuk_kerja, nama, jenkel, email, jabatan, departemen, sisa_cuti";
$sql.=" FROM karyawan";
$query=mysqli_query($conn, $sql) or die("ajax-grid-karyawan.php: get Karyawan");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT id, nik, masuk_kerja, nama, jenkel, email, jabatan, departemen, sisa_cuti";
	$sql.=" FROM karyawan";
	$sql.=" WHERE id LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR nik LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR masuk_kerja LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR nama LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR jenkel LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR email LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR jabatan LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR departemen LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR sisa_cuti LIKE '".$requestData['search']['value']."%' ";
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get Karyawan");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("ajax-grid-karyawan.php: get Karyawan"); // again run query with limit
	
} else {	

	$sql = "SELECT id, nik, masuk_kerja, nama, jenkel, email, jabatan, departemen, sisa_cuti";
	$sql.=" FROM karyawan";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("ajax-grid-karyawan.php: get Karyawan");   
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["id"];
    $nestedData[] = $row["nik"];
	$nestedData[] = $row["masuk_kerja"];
    $nestedData[] = $row["nama"];
	$nestedData[] = $row["jenkel"];
    $nestedData[] = $row["email"];
    $nestedData[] = $row["jabatan"];
    $nestedData[] = $row["departemen"];
    $nestedData[] = $row["sisa_cuti"];
    $nestedData[] = '<td><center>
                     <a href="detail-karyawan.php?id='.$row['nik'].'"  data-toggle="tooltip" title="View Detail" class="btn btn-sm btn-success"> <i class="fa fa-search"></i> </a>
                     <a href="edit-karyawan.php?id='.$row['nik'].'"  data-toggle="tooltip" title="Edit" class="btn btn-sm btn-primary"> <i class="fa fa-pencil"></i> </a>
				     <a href="karyawan.php?aksi=delete&id='.$row['nik'].'"  data-toggle="tooltip" title="Delete" onclick="return confirm(\'Anda yakin akan menghapus data '.$row['nama'].'?\')" class="btn btn-sm btn-danger"> <i class="fa fa-trash"> </i> </a>
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
