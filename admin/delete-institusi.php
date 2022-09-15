<?php 

require_once "../connection.php";

$id =  $_GET["id"];

$sql = "DELETE FROM institusi WHERE id = $id ";

mysqli_query($conn , $sql); 

header("Location: manage-institusi.php?delete-success-where-id=" .$id );


?>