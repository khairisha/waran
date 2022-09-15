<?php 
    session_start();
    if( empty($_SESSION["email"]) ){
        header("Location: ./login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title> WARAN PERJAWATAN KKM</title>
    
    <link href="../resorce/css/style.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <style> 
     .hidden {
         display: none;
     }

     .nk-sidebar{
        text-decoration: none;
     }
    </style>

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

     





    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        <!-- ***********************************-->
        <div class="nav-header">

             <div class="brand-logo">
                <a >
                    <span class="brand-title">
                   
                    </span>
                </a>
            </div> 
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
               <div class="text-center">
                <h2 class="pt-3"> WARAN PERJAWATAN </h2>
                 </div>
                
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                   <br> <br>       
                    <li style="text-decoration: none;">
                        <a href="./dashboard.php"  >
                            <i class="icon-home menu-icon" style="text-decoration: none;"></i><span class="nav-text">Laman Utama</span>
                        </a>
                    </li>

                    <li style="text-decoration: none;">
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-plus menu-icon"></i><span class="nav-text">Tambah Waran</span>
                        </a>
                        <ul aria-expanded="false">
                            <li style="text-decoration: none;"><a href="./add-bahagian.php"> <i class="icon-plus menu-icon"></i><span class="nav-text">Bahagian</span></a></li>
                            <li><a href="./add-agensi.php"> <i class="icon-plus menu-icon"></i><span class="nav-text">Institusi & Agensi</span></a></li>
                            <li><a href="./add-jkn.php"> <i class="icon-plus menu-icon"></i><span class="nav-text">Jabatan Kesihatan Negeri</span></a></li>
                            <li><a href="./add-pkd.php"> <i class="icon-plus menu-icon"></i><span class="nav-text">Pejabat Kesihatan Daerah</span></a></li>
                            <li><a href="./add-hospital.php"> <i class="icon-plus menu-icon"></i><span class="nav-text">Hospital Kerajaan</span></a></li>
                            <li><a href="./add-kesihatan.php"> <i class="icon-plus menu-icon"></i><span class="nav-text">Klinik Kesihatan Kerajaan</span></a></li>
                            <li><a href="./add-komuniti.php"> <i class="icon-plus menu-icon"></i><span class="nav-text">Klinik Komuniti</span></a></li>
                            <li><a href="./add-pergigian.php"> <i class="icon-plus menu-icon"></i><span class="nav-text">Klinik Pergigian Kerajaan</span></a></li>
                            <li><a href="./add-institusi.php"> <i class="icon-plus menu-icon"></i><span class="nav-text">Institusi Latihan</span></a></li>
                        </ul>
                    </li>

                    <li style="text-decoration: none;">
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-tasks menu-icon"></i><span class="nav-text">Bilangan Waran</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./manage-bahagian.php"> <i class="fa fa-tasks menu-icon"></i><span class="nav-text">Bahagian</span></a></li>
                            <li><a href="./manage-agensi.php"> <i class="fa fa-tasks menu-icon"></i><span class="nav-text">Institusi & Agensi</span></a></li>
                            <li><a href="./manage-jkn.php"> <i class="fa fa-tasks menu-icon"></i><span class="nav-text">Jabatan Kesihatan Negeri</span></a></li>
                            <li><a href="./manage-pkd.php"> <i class="fa fa-tasks menu-icon"></i><span class="nav-text">Pejabat Kesihatan Daerah</span></a></li>
                            <li><a href="./manage-hospital.php"> <i class="fa fa-tasks menu-icon"></i><span class="nav-text">Hospital Kerajaan</span></a></li>
                            <li><a href="./manage-kesihatan.php"> <i class="fa fa-tasks menu-icon"></i><span class="nav-text">Klinik Kesihatan Kerajaan</span></a></li>
                            <li><a href="./manage-komuniti.php"> <i class="fa fa-tasks menu-icon"></i><span class="nav-text">Klinik Komuniti</span></a></li>
                            <li><a href="./manage-pergigian.php"> <i class="fa fa-tasks menu-icon"></i><span class="nav-text">Klinik Pergigian Kerajaan</span></a></li>
                            <li><a href="./manage-institusi.php"> <i class="fa fa-tasks menu-icon"></i><span class="nav-text">Institusi Latihan</span></a></li>
                            <li><a href="./manage-institusi.php"> <i class="fa fa-tasks menu-icon"></i><span class="nav-text">Rumah Bomoh</span></a></li>
                        </ul>
                    </li>

                    <li style="text-decoration: none;">
                        <a href="./logout.php" >
                            <i class="icon-logout menu-icon"></i><span class="nav-text">Logout</span>
                        </a>
                    </li>            
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

        <div class="modal fade" id="showModal" data-backdrop="static" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div id="modalHead" class="modal-header">
                    <button id="modal_cross_btn" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span  aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <p id="addMsg" class="text-center font-weight-bold"></p>
                </div>
                <div class="modal-footer ">
                    <div class="mx-auto">
                        <a type="button" id="linkBtn" href="#" class="btn btn-primary" >Add Expense For the Day</a>
                        <a type="button" id="closeBtn" href="#" data-dismiss="modal" class="btn btn-primary">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
            
            <!-- row -->

            <div class="container-fluid">