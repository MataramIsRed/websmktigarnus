<?php
session_start();
include "../connn.php";
if(isset($_SESSION['login'])){
  $query0 = mysqli_query($conn,"SELECT * FROM pengguna WHERE id='".$_SESSION['id']."'");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../Logo.png" type="image" />

    <title>Home</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          
          <div class="left_col scroll-view">
            <div class="navbar nav_title user-profile" style="border: 0;">
              <a href="index.php" class="site_title">
                <span>SMK TI GARNUS</span>
              </a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../Logo.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">

              
                <span>Selamat datang,</span>
                <h2><?php
                  while($data = mysqli_fetch_array($query0,MYSQLI_BOTH)){
                    echo $data['username'];
                  }
                ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                  <li><a><i class="fa fa-edit"></i> Forms (Coming Soon)<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">E-Learning</a></li>
                      <li><a href="#">Perpustakaan</a></li>
                      <li><a href="tambah_berita.php">Berita</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Absen <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="absen.php">Absen Hari ini</a></li>
                    <li><a href="riwayatAbsen.php">Laporan Absen</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Data <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="data_siswa.php">Data Siswa</a></li>
                    <li><a href="data_alumni.php">Data Alumni</a></li>
                    <li><a href="data_staff.php">Data Staff</a></li>
                    <li><a href="data_guru.php">Data Guru</a></li>
                    <?php
                    if($_SESSION['kedudukan'] == 'superadmin'){
                      echo "<li><a href='data_admin.php'>Data Admin</a></li>";
                    }
                    ?>
                    
                    </ul>
                  </li>
                  <li><a><i class="fa fa-cog"></i> Pengaturan <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="edit_export.php">Edit Export</a></li>
                    
                    </ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="../logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="../Logo.png" alt="">SMK TI GARNUS 
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="../logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <?php
}else{
  header('Location: ../index.php');
  exit();
}
        ?>