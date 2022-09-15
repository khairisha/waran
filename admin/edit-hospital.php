<?php 
    require_once "include/header.php";
?>

<?php 
    require_once "include/header.php";
?>
    
<?php
    require_once "include/header.php";
?>


<?php  


         $id = $_GET["id"];
        require_once "../connection.php";

        $sql = "SELECT * FROM hospital WHERE id = $id ";
        $result = mysqli_query($conn , $sql);

        if(mysqli_num_rows($result) > 0 ){
        
            while($rows = mysqli_fetch_assoc($result) ){
                $gred = $rows["gred"];
                $bil_waran = $rows["bil_waran"];
                $bil_isi = $rows["bil_isi"];
                $bil_kosong = $rows["bil_kosong"];
            }
        }

        $gredErr =  $bil_waranErr = $bil_isiErr = $bil_kosongErr = "";      

        if( $_SERVER["REQUEST_METHOD"] == "POST" ){

            if( empty($_REQUEST["gred"]) ){
                $gredErr = "<p style='color:red'> * Gred diperlukan</p>";
                $gred = "";
            }else {
                $gred = $_REQUEST["gred"];
            }

            if( empty($_REQUEST["bil_waran"]) ){
                $bil_waranErr = "<p style='color:red'> * Bilangan Waran diperlukan/p>";
                $bil_waran = "";
            }else {
                $bil_waran = $_REQUEST["bil_waran"];
            }

            /*  if( empty($_REQUEST["bil_isi"]) ){
                $bil_isiErr = "<p style='color:red'> * Bilangan Pengisian diperlukan</p> ";
                $bil_isi = "";
            }else{
                $bil_isi = $_REQUEST["bil_isi"];
            } */ 

             if( empty($_REQUEST["bil_kosong"]) ){
                //$bil_kosongErr = "<p style='color:red'> * Bilangan Kekosongan diperlukan</p> ";
                $bil_kosong = "";
            }else{
                $bil_kosong = $_REQUEST["bil_kosong"];
            } 

            if (($_REQUEST["bil_isi"]) > ($_REQUEST["bil_waran"])) {
                $bil_isiErr = "<p style='color:red'> * Bilangan Pengisian perlu kurang daripada Bilangan Waran</p>";
                $bil_isi = "";
            }
            else {
                $bil_isi = $_REQUEST["bil_isi"];
            }


            if( !empty($gred) && !empty($bil_waran) && (-1<=($bil_isi)) && (($bil_waran) >= ($bil_isi)) ){

                // database connection
                require_once "../connection.php";

                $sql_select_query = "SELECT id FROM hospital WHERE id = '$id' ";
                $r = mysqli_query($conn , $sql_select_query);

                    $sql = "UPDATE hospital SET gred = '$gred' , bil_waran = '$bil_waran' , bil_isi ='$bil_isi' , bil_kosong='$bil_kosong' WHERE id = $_GET[id] ";
                    $result = mysqli_query($conn , $sql);
                    if($result){
                        echo "<script>
                        $(document).ready( function(){
                            $('#showModal').modal('show');
                            $('#modalHead').hide();
                            $('#linkBtn').attr('href', 'manage-hospital.php');
                            $('#linkBtn').text('Paparkan Bilangan Waran');
                            $('#addMsg').text('Profile Berjaya Dikemaskini!');
                            $('#closeBtn').text('Kemaskini Semula?');
                        })
                     </script>
                     ";
                    }
                    
                }

            }
        

?>

<script>
    function cal(value){
        var a1, b1, c1;
        

        a1= document.getElementById("a").value;
        b1= document.getElementById("b").value;
        c1= a1-b1;
        document.getElementById("c").value= c1;

    }
</script>

<div style=""> 
<div class="login-form-bg h-100">
        <div class="container  h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-4 shadow">                       
                                    <h4 class="text-center">Kemaskini Bilangan Waran Hospital Kerajaan</h4>
                                <form method="POST" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                            
                                <div class="form-group">
                                    <label >Gred :</label>
                                    <input type="text" class="form-control" value="<?php echo $gred; ?>"  name="gred" readonly >
                                   <?php echo $gredErr; ?>
                                </div>

                                <div class="form-group">
                                    <label >Bilangan Waran :</label>
                                    <input type="number" class="form-control" value="<?php echo $bil_waran; ?>" min="1" max="999" name="bil_waran" id="a"  onchange="cal(this.value)" >
                                    <?php echo $bil_waranErr; ?>            
                                </div>

                                <div class="form-group">
                                    <label >Bilangan Pengisian:</label>
                                    <input type="number" class="form-control" value="<?php echo $bil_isi; ?>"  name="bil_isi" id="b"  onchange="cal(this.value)">  
                                    <?php echo $bil_isiErr; ?>            
                                </div>

                                <div class="form-group">
                                    <label >Bilangan Kekosongan :</label>
                                    <input type="number" class="form-control" value="<?php echo $bil_kosong; ?>"  name="bil_kosong" id="c" readonly>  
                                              
                                </div>
                               
                                <br>

                                <button type="submit" class="btn btn-primary btn-block">Kemaskini</button>
                                  </form>
                            </div>
                        </div>
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
    require_once "include/footer.php";
?>