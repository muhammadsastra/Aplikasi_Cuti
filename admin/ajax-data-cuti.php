<?php
include "koneksi.php";

// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'id',
    1 => 'nik', 
	2 => 'nama',
    3 => 'tanggal_cuti',
	4 => 'tanggal_masuk',
    5 => 'jumlah_cuti',
    6 => 'status'

);

// getting total number records without any search
$sql = "SELECT id, nik, nama, tanggal_cuti, tanggal_masuk, jumlah_cuti, status";
$sql.=" FROM cuti";
$query=mysqli_query($conn, $sql) or die("ajax-grid-cuti.php: get Cuti");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT id, nik, nama, tanggal_cuti, tanggal_masuk, jumlah_cuti, status";
	$sql.=" FROM cuti";
	$sql.=" WHERE id LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR nik LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR nama LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR tanggal_cuti LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR tanggal_masuk LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR jumlah_cuti LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR status LIKE '".$requestData['search']['value']."%' ";
	$query=mysqli_query($conn, $sql) or die("ajax-data-cuti.php: get Cuti");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("ajax-data-cuti.php: get Cuti"); // again run query with limit
	
} else {	

	$sql = "SELECT id, nik, nama, tanggal_cuti, tanggal_masuk, jumlah_cuti, status";
	$sql.=" FROM cuti";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("ajax-grid-karyawan.php: get Karyawan");   
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["id"];
    $nestedData[] = $row["nik"];
	$nestedData[] = $row["nama"];
    $nestedData[] = $row["tanggal_cuti"];
	$nestedData[] = $row["tanggal_masuk"];
    $nestedData[] = $row["jumlah_cuti"];
    $nestedData[] = $row["status"];
    $nestedData[] = '<td><center>
                     <a href="cuti.php?true=true&id='.$row['id'].'"  data-toggle="tooltip" title="Approve Cuti" onclick="return confirm(\'Anda yakin approve cuti '.$row['nama'].'?\')" class="btn btn-sm btn-info"> <i class="fa fa-check"> </i> Approve </a>
	                 <a href="cuti.php?false=false&id='.$row['id'].'"  data-toggle="tooltip" title="Reject Cuti" onclick="return confirm(\'Anda yakin reject cuti '.$row['nama'].'?\')" class="btn btn-sm btn-warning"> <i class="fa fa-close"> </i> Reject</a>
                     <a href="detail-cuti.php?id='.$row['nik'].'"  data-toggle="tooltip" title="View Detail" class="btn btn-sm btn-success"> <i class="fa fa-search"></i> </a>
                     <a href="edit-cuti.php?id='.$row['nik'].'&no='.$row['id'].'"  data-toggle="tooltip" title="Edit" class="btn btn-sm btn-primary"> <i class="fa fa-pencil"></i> </a>
				     <a href="cuti.php?aksi=delete&id='.$row['id'].'"  data-toggle="tooltip" title="Delete" onclick="return confirm(\'Anda yakin akan menghapus data '.$row['nama'].'?\')" class="btn btn-sm btn-danger"> <i class="fa fa-trash"> </i> </a>
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
