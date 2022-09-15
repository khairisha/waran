<?php

session_start();
include '../connection.php';

$_SESSION['status'] = "Berjaya";
$_SESSION['status_title'] = "Berjaya";
$_SESSION['status_text'] = "Data Klinik Komuniti Berjaya Dihapuskan";
$_SESSION['status_icon'] = "success";
header('Location: manage-komuniti.php');

?>