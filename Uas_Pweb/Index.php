<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: Login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- icon -->
  <link rel="icon" href="assets/images/bread.png" type="image/ico" />

  <title> Sistem Informasi Toko Kue </title>

  <!-- Bootstrap -->
  <link href="assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="assets/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="assets/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- bootstrap-progressbar -->
  <link href="assets/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- Custom Theme Style -->
  <link href="assets/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <center>
              &nbsp; <a href="Index.php" class="fa fa-cutlery fa-2x" style="color:#fff;"><span>
                  <font size="4.95" color="white" face="Helvetica Neue">APLIKASI JUAL BELI</font>
                </span></a>
            </center>
          </div>

          <div class="clearfix"></div>

          <!-- Menu profile -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="assets/images/profileatas.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2>Dimaz Ivan</h2>
            </div>
          </div>

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <ul class="nav side-menu">
                <li><a href="Index.php"><i class="fa fa-home"></i> Home <span class="fa fa-chevron"></span></a>
                </li>
                <li><a href="#"><i class="fa fa-desktop"></i> Data User <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="Index.php?page=Tampil_User">Tampil Data User</a></li>
                    <li><a href="Index.php?page=Tambah_User">Tambah Data user</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-desktop"></i> Data Supplier <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="Index.php?page=Tampil_Supplier">Tampil Data Supplier</a></li>
                    <li><a href="Index.php?page=Tambah_Supplier">Tambah Data Supplier</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-table"></i> Data Bahan dan Kue <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="Index.php?page=Tampil_Bahan">Tampil Data Bahan</a></li>
                    <li><a href="Index.php?page=Tambah_Bahan">Tambah Data Bahan</a></li>
                    <li><a href="Index.php?page=Tambah_Kue">Tambah Data Kue</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-tasks"></i> Data Transaksi <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="Index.php?page=Tampil_Jual">Transaksi Penjualan</a></li>
                    <li><a href="Index.php?page=Tampil_Beli">Transaksi Pembelian</a></li>
                    <li><a href="Index.php?page=Omset">Omset</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-shopping-cart"></i> Order Now <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="Index.php?page=Tampil_Kue">Lihat Menu</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-gear"></i> Pengaturan <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="Index.php?page=Setting">Setting</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>

          <!-- Menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings" href="#">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen" href="#">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="" href="#">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="Handle-Logout.php">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>

        </div>
      </div>

      <!-- Top Navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
          <nav class="nav navbar-nav">
            <ul class=" navbar-right">
              <li class="nav-item dropdown open">
                <a href="#" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                  <img src="assets/images/profile.jpg" alt="profile">Dimaz Ivan
                </a>
                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#"> Profile</a>
                  <a class="dropdown-item" href="#">
                    <span>Settings</span>
                  </a>
                  <a class="dropdown-item" href="Handle-Logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                </div>
              </li>
            </ul>
          </nav>
        </div>
      </div>

      <!-- page content - HALAMAN UTAMA -->
      <div class="right_col" role="main">
        <?php
        $queries = array();
        parse_str($_SERVER['QUERY_STRING'], $queries);
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        switch ($queries['page']) {
          case 'Tampil_User':
            include 'Control/Tampil_User.php';
            break;
          case 'Tambah_User':
            include 'Control/Tambah_User.php';
            break;
          case 'Tampil_Supplier':
            include 'Control/Tampil_Supplier.php';
            break;
          case 'Tambah_Supplier':
            include 'Control/Tambah_Supplier.php';
            break;
          case 'Tampil_Bahan':
            include 'Control/Tampil_Bahan.php';
            break;
          case 'Tampil_Beli':
            include 'Control/Tampil_Beli.php';
            break;
          case 'Tampil_Jual':
            include 'Control/Tampil_Jual.php';
            break;
          case 'Tambah_Bahan':
            include 'Control/Tambah_Bahan.php';
            break;
          case 'Tambah_Kue':
            include 'Control/Tambah_Kue.php';
            break;
          case 'Beli_Bahan':
            include 'Control/Beli_Bahan.php';
            break;
          case 'Tampil_Kue':
            include 'Control/Tampil_Kue.php';
            break;
          case 'Beli_Kue':
            include 'Control/Beli_Kue.php';
            break;
          case 'Edit_Resep':
            include 'Control/Edit_Resep.php';
            break;
          case 'Edit_User':
            include 'Control/Edit_User.php';
            break;
          case 'Edit_Supplier':
            include 'Control/Edit_Supplier.php';
            break;
          case 'Edit_Bahan':
            include 'Control/Edit_Bahan.php';
            break;
          case 'Edit_Kue':
            include 'Control/Edit_Kue.php';
            break;
          case 'Proses':
            include 'Control/Proses.php';
            break;
          case 'Delete_User':
            include 'Control/Delete_User.php';
            break;
          case 'Delete_Bahan':
            include 'Control/Delete_Bahan.php';
            break;
          case 'Delete_Kue':
            include 'Control/Delete_Kue.php';
            break;
          case 'Omset':
            include 'Control/Omset.php';
            break;
          case 'Setting':
            include 'Control/User/Setting.php';
            break;
          case 'Tampil_Order':
            include 'Control/Tampil_Order.php';
            break;
          case 'Tampil_Kue_User':
            include 'Control/Tampil_Kue_User.php';
            break;
          case 'Beli_Kue':
            include 'Control/Beli_Kue.php';
            break;
          default:
            #code...
            include 'view/Home.php';
            break;
        }
        ?>
      </div>
      <!-- /page content -->

      <!-- footer content -->
      <footer>
        <div class="pull-right">
          Copyright @ 2020 Dimaz Ivan P
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>

  <!-- jQuery -->
  <script src="assets/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- FastClick -->
  <script src="assets/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="assets/nprogress/nprogress.js"></script>
  <!-- bootstrap-progressbar -->
  <script src="assets/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
  <!-- iCheck -->
  <script src="assets/iCheck/icheck.min.js"></script>
  <!-- Skycons -->
  <script src="assets/skycons/skycons.js"></script>
  <!-- Custom Theme Scripts -->
  <script src="assets/js/custom.min.js"></script>

</body>

</html>