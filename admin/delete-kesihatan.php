<?php

session_start();
include '../connection.php';

if(isset($_POST['delete_btn_set']))
{
    $id = $_POST['delete_id'];
    
    $query="DELETE FROM kesihatan WHERE id = $id";
    
    if ($result=mysqli_query($conn,$query)) {
        echo 200;
    }
    else{
        echo 500;
    }
}

?>