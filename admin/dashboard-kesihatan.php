<?php
include '../connection.php';

$query = "SELECT * FROM kesihatan";
$results = mysqli_query($conn, $query);

$i = 0;
$you = "";
?>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- <link href="simple-datatables/style.css" rel="stylesheet"> -->
  <!-- Vendor CSS Files -->
  <!-- <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet"> -->
  <link href="assets/css/style2.css" rel="styelsheet" >
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
<style>.dropbtn {
  background-color: #d0cfe0;
  color: white;
  font-size: 16px;
  border: none;
  width: 50px;
  height: 10%;
}
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
</head>

<?php 
    require_once "include/header.php";
?>


<?php 
    require_once "include/header.php";
?>

<?php 
 
//  database connection
require_once "../connection.php";

$sql = "SELECT * FROM kesihatan";
$result = mysqli_query($conn , $sql);



?>

<div class="dropdown">
  <!-- <button class="dropbtn">Sila Pilih</button>  -->
  <button type="button"  class="btn btn-secondary dropdown-toggle" style="width: 200px; background-color:#7571f9" >Klinik Kesihatan Kerajaan</button> 
  <div class="dropdown-content">
    <a href="./dashboard-bahagian.php">Bahagian</a> 
    <a href="./dashboard-agensi.php" >Institusi & Agensi </a>
    <a href="./dashboard-jkn.php" >Jabatan Kesihatan Negeri </a>
    <a href="./dashboard-pkd.php" >Pejabat Kesihatan Daerah </a>
    <a href="./dashboard-hospital.php" >Hospital Kerajaan </a>
    <!-- <a href="./dashboard-kesihatan.php" >Klinik Kesihatan Kerajaan </a> -->
    <a href="./dashboard-komuniti.php" >Klinik Komuniti </a>
    <a href="./dashboard-pergigian.php" >Klinik Pergigian Kerajaan </a>
  </div>
</div>
<style>
table, th, td {
  border: 1px solid black;
  padding: 15px;
}
table {
  border-spacing: 10px;
}
</style>

<?php

        // database connection
        require_once "../connection.php";

        // bilangan waran perjawatan
        $bil_waran  ="SELECT * FROM kesihatan";
        $total_waran = mysqli_query($conn , $bil_waran);

        // bilangan pengisian
        $bil_isi = "SELECT * FROM kesihatan";
        $total_isi = mysqli_query($conn , $bil_isi);

        // bilangan kekosongan
        $bil_kosong = "SELECT * FROM kesihatan";
        $total_kosong = mysqli_query($conn , $bil_kosong);


?>





<div class="container bg-white shadow">
    <div class="py-4 mt-5"> 
    <div class='text-center pb-2'><h4>Bilangan Waran Klinik Kesihatan Kerajaan</h4></div>
    <table style="width:100%" class="table-hover text-center ">
    <tr class="bg-dark">
    <table class="table datatable">
                <thead>
                <tr class="thead-light">
                <!-- <th>No.</th> -->
                <th>Klinik Kesihatan Kerajaan</th>
                <th>Gred</th>
                <th>Bilangan Waran</th>
                <th>Bilangan Pengisian</th>
                <th>Bilangan Kekosongan</th> 
                <!-- <th>Action</th> -->
             </tr>
              </thead>
              <tbody>
              
              <?php
              include '../connection.php';
              
            //   $query = "SELECT * FROM kesihatan";
            //   $results = mysqli_query($conn, $query);

              $sql = "SELECT * FROM data_kesihatan INNER JOIN kesihatan ON data_kesihatan.id = kesihatan.id_kesihatan";  
              $results = mysqli_query($conn, $sql);
                    while($data_kesihatan=mysqli_fetch_array($results)){
                    $id=$data_kesihatan["id"];
                    $i++;
                    echo "<tr>";
                    //echo "<td>".$i."</td>";
                    echo "<td style=\"width:24.3%\">".$data_kesihatan["kesihatan"]."</td>";
                    echo "<td style=\"width:9%\" align=\"center\">".$data_kesihatan["gred"]."</td>";
                    echo "<td style=\"width:16.3%\" align=\"center\">".$data_kesihatan["bil_waran"]."</td>";
                    echo "<td style=\"width:19%\" align=\"center\">".$data_kesihatan["bil_isi"]."</td>";
                    echo "<td style=\"width:21%\" align=\"center\">".$data_kesihatan["bil_kosong"]."</td>";
                    // echo "<td align=\"center\">","<a class=\"btn-sm btn-primary\" href=\"edit-agensi.php?id= {$id}\" role=\"button\"><i class=\"fa fa-edit\"></i></a>"
                    // ," &nbsp;	<a class=\"btn-sm btn-danger\" href=\"delete-agensi.php?id={$id}\" role=\"button\"><i class=\"fa fa-trash\"></i></a>";
                    //echo "<td>"
            
                // $edit_icon = "<a href='edit-kesihatan.php?id= {$id}' class='btn-sm btn-primary float-center'><i class='fa fa-edit '></i></a>",
                // $delete_icon = " <a href='delete-kesihatan.php?id={$id}' id='bin' class='btn-sm btn-primary float-center'><i class='fa fa-trash '></i></a>",
                // echo $edit_icon . $delete_icon
             
       //" </td>";
        echo "</tr>";
                    
                    }
                
                  ?>
                
     </tbody>
    </table>

<div class="container">

    <div class="row mt-5">
        <div class="col-4">
            <div class="card shadow " style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">Bilangan Waran</li>
                    <li class="list-group-item">
                        <?php 
                            // bilangan waran perjawatan
                            $total_waran = "SELECT SUM(bil_waran) FROM kesihatan";
                            $result = mysqli_query ($conn , $total_waran);
                            //display data on web page
                            while($row = mysqli_fetch_array($result)){
                                echo " Jumlah Bilangan Waran: ". $row['SUM(bil_waran)'];
                                echo ""; 
                            }
                        ?>
                     </li>
                </ul>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow " style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">Bilangan Pengisian</li>
                    <li class="list-group-item">
                        <?php 
                            // bilangan pengisian
                            $total_isi = "SELECT SUM(bil_isi) FROM kesihatan";
                            $result = mysqli_query ($conn , $total_isi);
                            //display data on web page
                            while($row = mysqli_fetch_array($result)){
                                echo " Jumlah Bilangan Pengisian: ". $row['SUM(bil_isi)'];
                                echo "";
                            }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow " style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">Bilangan Kekosongan</li>
                    <li class="list-group-item">
                        <?php 
                            //bilangan kekosongan
                            $total_kosong = "SELECT SUM(bil_kosong) FROM kesihatan";
                            $result = mysqli_query ($conn , $total_kosong);
                            //display data on web page
                            while($row = mysqli_fetch_array($result)){
                                echo " Jumlah Bilangan Kekosongan: ". $row['SUM(bil_kosong)'];
                                echo "";
                            }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>
</div>
</div>

<?php 
    require_once "include/footer.php";
?>

<?php 
    require_once "include/footer.php";
?>

<?php
//  database connection
require_once "../connection.php";

$sql = "SELECT * FROM kesihatan";
$result = mysqli_query($conn , $sql);

// $i = 0;
// $you = "";


?>


<?php

        // database connection
        require_once "../connection.php";

        // bilangan waran perjawatan
        $bil_waran  ="SELECT * FROM kesihatan";
        $total_waran = mysqli_query($conn , $bil_waran);

        // bilangan pengisian
        $bil_isi = "SELECT * FROM kesihatan";
        $total_isi = mysqli_query($conn , $bil_isi);

        // bilangan kekosongan
        $bil_kosong = "SELECT * FROM kesihatan";
        $total_kosong = mysqli_query($conn , $bil_kosong);


?>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script> 
  <script src="assets/js/main.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
