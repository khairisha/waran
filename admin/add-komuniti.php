<?php 
    require_once "include/header.php";
?>
 <form method="POST" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
<?php
//  database connection
require_once "../connection.php";
?>

    <?php
      $sql="SELECT komuniti
      FROM data_komuniti
      ORDER BY komuniti"; 
      $results = mysqli_query($conn, $sql); 
    ?>

             <div class="input-group">
             <select name="komuniti" style="width:500px;font-size:15px;">
             <!-- <option>Pilih komuniti</option>  -->
             <option selected disabled> --Pilih Klinik Komuniti--</option>
             <?php $results = mysqli_query($conn, "SELECT * FROM data_komuniti ORDER BY komuniti ASC"); ?>
             <?php while ($row = mysqli_fetch_array($results)) { ?> 
             <option value="<?php echo $row ['id'];?>" >
             - <?php echo $row['komuniti']; ?>
             </option>
             <?php } ?>
             </select>
             </div>
             <br>


<?php  

        
        
        $gredErr = $bil_waranErr = $bil_isiErr = $bil_kosongErr = "";
        $gred = $bil_waran = $bil_isi = $bil_kosong = "";

        if( $_SERVER["REQUEST_METHOD"] == "POST" ){

            if( empty($_REQUEST["gred"]) ){
                $gredErr = "<p style='color:red'> * Gred diperlukan</p>";
            }else {
                $gred = $_REQUEST["gred"];
            }

            if( empty($_REQUEST["bil_waran"]) ){
                $bil_waranErr = "<p style='color:red'> * Bilangan Waran diperlukan</p>";
                $bil_waran = "";
            }else {
                $bil_waran = $_REQUEST["bil_waran"];
            }

            /* if( empty($_REQUEST["bil_isi"]) ){
                $bil_isiErr = "<p style='color:red'> * Bilangan Pengisian diperlukan</p>";
                $bil_isi = "";
            }else {
                $bil_isi = $_REQUEST["bil_isi"];
            } */

            if (($_REQUEST["bil_isi"]) > ($_REQUEST["bil_waran"])) {
                $bil_isiErr = "<p style='color:red'> * Bilangan Pengisian perlu kurang daripada Bilangan Waran</p>";
                $bil_isi = "";
            }
            else {
                $bil_isi = $_REQUEST["bil_isi"];
            }

            if( empty($_REQUEST["bil_kosong"]) ){
                $bil_kosongErr = "<p style='color:red'> * Bilangan Pengosongan diperlukan</p>";
                $bil_kosong = "";
            }else {
                $bil_kosong = $_REQUEST["bil_kosong"];
            }



            if( !empty($gred) && !empty($bil_waran) && (-1<=($bil_isi)) && (($bil_waran) >= ($bil_isi)) ){

                // database connection
                require_once "../connection.php";
                    $komuniti=$_POST['komuniti'];
                    $sql = "INSERT INTO komuniti ( id_komuniti, gred, bil_waran, bil_isi, bil_kosong ) VALUES( '$komuniti' , '$gred' , '$bil_waran', '$bil_isi' , '$bil_kosong')  ";
                    $result = mysqli_query($conn , $sql);
                    if($result){
                     $gred = $bil_waran = $bil_isi = $bil_kosong = $komuniti = "";
                        echo "<script>
                        $(document).ready( function(){
                            $('#showModal').modal('show');
                            $('#modalHead').hide();
                            $('#linkBtn').attr('href', 'manage-komuniti.php');
                            $('#linkBtn').text('Paparkan Bilangan Waran');
                            $('#addMsg').text('Bilangan Waran Berjaya Disimpan!');
                            $('#closeBtn').text('Tambah Bilangan Waran?');
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
                                    <h4 class="text-center">Tambah Bilangan Waran Klinik Komuniti</h4>
                            
                                <div class="form-group">
                                    <label >Gred :</label>
                                    <select class="form-group form-control" aria-label="Default select example" name="gred">
                                        <option selected disabled> --GRED--</option>
                                        <option value="JUSA C">JUSA C</option>
                                        <option value="F54">F54</option>
                                        <option value="F52">F52</option>
                                        <option value="F48">F48</option>
                                        <option value="F44">F44</option>
                                        <option value="F41">F41</option>
                                        <option value="FA32">FA32</option>
                                        <option value="FA29">FA29</option>
                                        <option value="FT19">FT19</option>
                                    </select>
                                    <class="form-control" value="<?php echo $gred; ?>"  >
                                    <?php echo $gredErr; ?>
                                </div>

                                <div class="form-group">
                                    <label >Bilangan Waran :</label>
                                    <input type="number" class="form-control" value="<?php echo $bil_waran; ?>" min="1" max="999" name="bil_waran" id="a" onchange="cal(this.value)">  
                                    <?php echo $bil_waranErr; ?>            
                                </div>
                               
                                <div class="form-group">
                                    <label >Bilangan Pengisian :</label>
                                    <input type="number" class="form-control" value="<?php echo $bil_isi; ?>" min="-1" max="999" name="bil_isi" id="b" onchange="cal(this.value)" >  
                                    <?php echo $bil_isiErr; ?>            
                                </div>

                                <div class="form-group" >
                                    <label >Bilangan Pengosongan :</label>
                                    <input type="number" class="form-control" value="<?php echo $bil_kosong; ?>"  name="bil_kosong" id="c" readonly >              
                                </div>

                                <br>

                                <button type="submit" class="btn btn-primary btn-block">Tambah</button>
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
