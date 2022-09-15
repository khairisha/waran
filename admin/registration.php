<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="../resorce/css/style.css" rel="stylesheet">

    <title>WARAN PERJAWATAN KKM</title>
    <style>
    body, html {
    height: 100%;
    margin: 0;
    }

.bg {
  /* background-image: url("../kkmlogo.png"); */
  background-color: #cbcfe4;
  height: 100%; 
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  
}

</style>
  </head>
  <body >

  <!-- php script start -->
<?php 

      $email_err = $pass_err = $reg_Err = "";
      $email = $pass = "";

      if( $_SERVER["REQUEST_METHOD"] == "POST" ){
         
        if( empty($_REQUEST["email"]) ){
         $email_err = " <p style='color:red'> * Emel harus dilengkapkan</p> ";
        }else {
         $email = $_REQUEST["email"];
        }

        if ( empty($_REQUEST["password"]) ){
         $pass_err =  " <p style='color:red'> * Kata Laluan harus dilengkapkan</p> ";
        }else {
          $pass = $_REQUEST["password"];
        }

        if( !empty($email) && !empty($pass) ){

          // database connection
          require_once "../connection.php";

    $duplicate_query="select email from admin where email='$email'";
    $duplicate_result=mysqli_query($conn,$duplicate_query) or die(mysqli_error($conn));
    $rows_fetched=mysqli_num_rows($duplicate_result);
    if($rows_fetched>0){
        ?>
        <script>
            window.alert("Email Already Exists");
        </script>
         <meta http-equiv="refresh" content="1;url=registration.php" />
        <?php
    }else{
        $registration_query="insert into admin (email, password) values ('$email','$pass')";
        $registration_result=mysqli_query($conn,$registration_query) or die(mysqli_error($conn));
        echo "Successfully Registered";
        $_SESSION['email']=$email;
        header("Location: login.php?login-sucess");
        }
    
    }

}
?>
 <!-- php script end -->


<div class="bg">
  <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5 shadow">
                              
                                    <h4 class="text-center">DAFTAR AKAUN</h4>
                                    <div class="text-center my-5"> <?php echo $reg_Err; ?> </div>

                                <form method="POST" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                                
                                    <div class="form-group">
                                        <label >Emel :</label>
                                        <input type="email" class="form-control" value="<?php echo $email; ?>" name="email"> 
                                        <?php echo $email_err; ?>            
                                    </div>

                                    <div class="form-group">
                                        <label >Kata Laluan :</label>
                                        <input type="password" class="form-control" name="password" >
                                        <?php echo $pass_err; ?>            

                                    </div>

                                    <div class="form-group">
                                        <input type="submit" value="Daftar" class="btn btn-primary btn-lg w-100 " name="signup" >
                                    </div>
                                <p class=" login-form__footer"> <a href="../admin_index.php" class="text-primary">Log Masuk </a>Kembali</p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
 <!-- php script end -->
 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="./resorce/plugins/common/common.min.js"></script>
    <script src="./resorce/js/custom.min.js"></script>
    <script src="./resorce/js/settings.js"></script>
    <script src="./resorce/js/gleek.js"></script>
    <script src="./resorce/js/styleSwitcher.js"></script>
  </body>
</html>