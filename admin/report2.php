<?php 
    require_once "include/header.php";
?>


<?php 
    require_once "include/header.php";
?>

<?php 
 
//  database connection
require_once "../connection.php";

$sql = "SELECT * FROM institusiagensi";
$result = mysqli_query($conn , $sql);

$i = 1;
$you = "";


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
        $bil_waran  ="SELECT * FROM institusiagensi";
        $total_waran = mysqli_query($conn , $bil_waran);

        // bilangan pengisian
        $bil_isi = "SELECT * FROM institusiagensi";
        $total_isi = mysqli_query($conn , $bil_isi);

        // bilangan kekosongan
        $bil_kosong = "SELECT * FROM institusiagensi";
        $total_kosong = mysqli_query($conn , $bil_kosong);


?>

    <?php
      $sql="SELECT institusiagensi
      FROM data_institusiagensi
      ORDER BY institusiagensi"; 
      $results = mysqli_query($conn, $sql); 
    ?>

             <div class="input-group">
             <select name="agensi" style="width:500px;font-size:15px;">
             <option>Pilih Institusi/Agensi</option>
             <?php $results = mysqli_query($conn, "SELECT institusiagensi FROM data_institusiagensi"); ?>
             <?php while ($row = mysqli_fetch_array($results)) { ?> 
             <option value="<?php echo $row ['institusiagensi'];?>">
             - <?php echo $row['institusiagensi']; ?>
             </option>
             <?php } ?>
             </select>
             </div> 



<div class="container bg-white shadow">
    <div class="py-4 mt-5"> 
    <div class='text-center pb-2'><h4> Bilangan Waran Institusi/Agensi</h4></div>
    <table style="width:100%" class="table-hover text-center ">
    <tr class="bg-dark">
        <th>No.</th>
        <th>Gred</th>
        <th>Bilangan Waran</th>
        <th>Bilangan Pengisian</th>
        <th>Bilangan Kekosongan</th> 
        <th>Tindakan</th>
    </tr>
    <?php 
    
    if( mysqli_num_rows($result) > 0){
        while( $rows = mysqli_fetch_assoc($result) ){
            $id = $rows["id"];
            $gred= $rows["gred"];
            $bil_waran= $rows["bil_waran"];
            $bil_isi= $rows["bil_isi"];
            $bil_kosong = $rows["bil_kosong"];     
    ?>

    
        <tr>
        <td><?php echo "{$i}."; ?></td>
        <td><?php echo $gred ; ?></td>
        <td><?php echo $bil_waran ; ?></td>
        <td><?php echo $bil_isi; ?></td>
        <td><?php echo $bil_kosong; ?></td>

        <td>  
            <?php 
                $edit_icon = "<a href='edit-agensi.php?id={$id}' class='btn-sm btn-primary float-center'><i class='fa fa-edit '></i></a>";
                $delete_icon = " <a href='delete-agensi.php?id={$id}' id='bin' class='btn-sm btn-primary float-center'><i class='fa fa-trash'></i></a>";
                echo $edit_icon . $delete_icon;
             ?> 
        </td>      
        

    <?php 
            $i++;
            }
        }else{
            echo "<script>
            $(document).ready( function(){
                $('#showModal').modal('show');
                $('#linkBtn').attr('href', 'add-agensi.php');
                $('#linkBtn').text('Tambah Waran');
                $('#addMsg').text('Tiada Data Dijumpai!');
                $('#closeBtn').text('Kemaskini Kemudian!');
            })
         </script>
         ";
        }
    ?>
     </tr>
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
                            $total_waran = "SELECT SUM(bil_waran) FROM institusiagensi";
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
                    <li class="list-group-item text-center">Bilangan Waran</li>
                    <li class="list-group-item">
                        <?php 
                            // bilangan pengisian
                            $total_isi = "SELECT SUM(bil_isi) FROM institusiagensi";
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
                            $total_kosong = "SELECT SUM(bil_kosong) FROM institusiagensi";
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