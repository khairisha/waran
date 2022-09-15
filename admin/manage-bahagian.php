<?php
include '../connection.php';

$query = "SELECT * FROM bahagian";
$results = mysqli_query($conn, $query);

$i = 0;
$you = "";

?>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="assets/css/style2.css" rel="styelsheet" >
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
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

$sql = "SELECT * FROM bahagian";
$result = mysqli_query($conn , $sql);



?>
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
        $bil_waran  ="SELECT * FROM bahagian";
        $total_waran = mysqli_query($conn , $bil_waran);

        // bilangan pengisian
        $bil_isi = "SELECT * FROM bahagian";
        $total_isi = mysqli_query($conn , $bil_isi);

        // bilangan kekosongan
        $bil_kosong = "SELECT * FROM bahagian";
        $total_kosong = mysqli_query($conn , $bil_kosong);


?>





<div class="container bg-white shadow">
    <div class="py-4 mt-5"> 
    <div class='text-center pb-2'><h4>Bilangan Waran Bahagian</h4></div>
    <table style="width:100%" class="table-hover text-center ">
    <tr class="bg-dark">
    <table class="table datatable">
                <thead>
                <tr class="thead-light">
                <!-- <th>No.</th> -->
                <th>Bahagian</th>
                <th>Gred</th>
                <th>Bilangan Waran</th>
                <th>Bilangan Pengisian</th>
                <th>Bilangan Kekosongan</th> 
                <th>Tindakan</th>
             </tr>
              </thead>
              <tbody>
              
              <?php
              include '../connection.php';
              
            
              $sql = "SELECT * FROM data_bahagian INNER JOIN bahagian ON data_bahagian.id = bahagian.id_bahagian";  
              $results = mysqli_query($conn, $sql);
                    while($data_bahagian=mysqli_fetch_array($results)){
                    $id=$data_bahagian["id"];
                    $i++;
                    echo "<tr>";
                    //echo "<td>".$i."</td>";
                    echo "<td style=\"width:24.3%\">".$data_bahagian["bahagian"]."</td>";
                    echo "<td style=\"width:9%\" align=\"center\">".$data_bahagian["gred"]."</td>";
                    echo "<td style=\"width:16.3%\" align=\"center\">".$data_bahagian["bil_waran"]."</td>";
                    echo "<td style=\"width:19%\" align=\"center\">".$data_bahagian["bil_isi"]."</td>";
                    echo "<td style=\"width:21%\" align=\"center\">".$data_bahagian["bil_kosong"]."</td>";
                    echo "<td align=\"center\">","<a class=\"btn-sm btn-primary\" href=\"edit-bahagian.php?id= {$id}\" role=\"button\"><i class=\"fa fa-edit\"></i></a>"
                    ," &nbsp;	<a href=\"javascript:void(0)\" class=\"btn-sm btn-danger delete_btn_ajax\" role=\"button\"><i class=\"fa fa-trash\"></i></a>";
                    ?><input type="hidden" class="delete_id_value" value="<?php echo $data_bahagian['id'] ?>"><?php
                   
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
                            $total_waran = "SELECT SUM(bil_waran) FROM bahagian";
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
                            $total_isi = "SELECT SUM(bil_isi) FROM bahagian";
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
                            $total_kosong = "SELECT SUM(bil_kosong) FROM bahagian";
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

$sql = "SELECT * FROM bahagian";
$result = mysqli_query($conn , $sql);



?>


<?php

        // database connection
        require_once "../connection.php";

        // bilangan waran perjawatan
        $bil_waran  ="SELECT * FROM bahagian";
        $total_waran = mysqli_query($conn , $bil_waran);

        // bilangan pengisian
        $bil_isi = "SELECT * FROM bahagian";
        $total_isi = mysqli_query($conn , $bil_isi);

        // bilangan kekosongan
        $bil_kosong = "SELECT * FROM bahagian";
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
  <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!-- Delete Alert -->
<?php
        if (isset($_SESSION['status']) && $_SESSION['status'] !='')
        {
            ?>
            <script>
            Swal.fire({
                title: "<?php echo $_SESSION['status_title']; ?>",
                text: "<?php echo $_SESSION['status_text']; ?>",
                icon: "<?php echo $_SESSION['status_icon']; ?>",
                showConfirmButton: false,
                timerProgressBar: true,
                timer: 3000
            });
            </script>
            <?php
            unset($_SESSION['status']);
        }
    ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
            $(document).click(function () {
            
                $('.delete_btn_ajax').click(function (e) {
                    e.preventDefault();
                    
                    var deleteid = $(this).closest("tr").find('.delete_id_value').val();
                    console.log(deleteid);
                    
                    Swal.fire({
                    title: 'Adakah anda pasti?',
                    text: "Anda tidak akan dapat mengembalikan data ini selepas ia dihapuskan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak'
                    }).then((result) => {
                        if (result.isConfirmed) {
                        
                            $.ajax({
                                method: 'POST',
                                url: 'delete-bahagian.php',
                                data: {
                                    "delete_btn_set":1,
                                    "delete_id":deleteid,
                                },
                                
                                success: function (response) {
                                    console.log(response);
                                    if(response == 200)
                                    {
                                        window.location.href="alert-bahagian.php";
                                    }
                                    else if(response == 500)
                                    {
                                        Swal.fire({
                                            title: 'Gagal',
                                            text: "Data Tidak Berjaya Dihapuskan!",
                                            icon: 'error'
                                        });
                                    }
                                }
                            });
                        }
                    });
                    
                });
            });
    </script>
