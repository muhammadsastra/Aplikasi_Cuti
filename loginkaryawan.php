<?php
include ("conn.php");
date_default_timezone_set('Asia/Jakarta');

session_start();

$nik = $_POST['nik'];
$password = $_POST['password'];

//$username = mysqli_real_escape_string($username);
//$password = mysqli_real_escape_string($password);

if (empty($username) && empty($password)) {
	header('location:index.php?error1');
	
} else if (empty($username)) {
	header('location:index.php?error=2');
	
} else if (empty($password)) {
	header('location:index.php?error=3');

}

$q = mysqli_query($koneksi, "select * from karyawan where nik='$nik' and password='$password'");
$row = mysqli_fetch_array ($q);

if (mysqli_num_rows($q) == 1) {
    $_SESSION['id']      = $row['id'];
    $_SESSION['user_id'] = $row['nik'];
	$_SESSION['username'] = $nik;
	$_SESSION['fullname'] = $row['nama'];
    $_SESSION['jabatan'] = $row['jabatan'];
    $level = $row['level'];		
    
    header('location:karyawan/index.php');
    
} else {
	header('location:index.php?error=4');
}
?>