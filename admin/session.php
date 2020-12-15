<?php
session_start();
if ($_SESSION['level'] == "admin") {
	include "../conn.php";
} else {
    header('location:../login.php');
}
?>