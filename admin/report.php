<?php 
require_once "include/header.php";
?>

<?php
//  database connection
require_once "../connection.php";
?>


    <?php
      $sql="SELECT *
      FROM report
      ORDER BY gred"; 
      $results = mysqli_query($conn, $sql); 
    ?>

             <div class="input-group">
             <select name="gred" style="width:500px;font-size:15px;">
             <option>Pilih Skim (F)</option>
             <?php $results = mysqli_query($conn, "SELECT * FROM report"); ?>
             <?php while ($row = mysqli_fetch_array($results)) { ?> 
             <option value="<?php echo $row ['gred'];?>" >
             -<?php echo $row['gred']; ?>
             </option>
             <?php } ?>
             </select>
             </div>

<div class="container bg-black shadow">
    <div class="py-4 mt-5"> 
    <div class='text-center pb-2'><h4>Jumlah Keseluruhan Waran Perjawatan</h4></div>
    <table style="width:100%" class="table-hover text-center ">
    <tr class="bg-dark">
        <th>No.</th>
        <th>Gred</th>
        <th>Bilangan Waran</th>
        <th>Bilangan Pengisian</th>
        <th>Bilangan Kekosongan</th> 
        <th>Fasiliti</th> 
        <th>Action</th>
    </tr>

    

<?php 
require_once "include/footer.php";
?>