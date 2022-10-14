<?php
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="assets/images/bread.png" type="image/ico" />

  <title>Welcome To Our System</title>

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
  <!-- Animate.css -->
  <link href="assets/animate.css/animate.min.css" rel="stylesheet">
  <!-- Custom Theme Style -->
  <link href="assets/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form action="Handle-Login.php" method="post">
            <h1>Login Page</h1>
            <div>
              <input type="text" class="form-control" name="username" placeholder="Username" required="" />
            </div>
            <div>
              <input type="password" class="form-control" name="password" placeholder="Password" required="" />
            </div>
            <div>
              <input type="submit" value="Login" class="btn btn-default submit">
              <!-- <a class="btn btn-default submit" href="../Index.php">Log in</a> -->
              <a class="reset_pass" href="#">Forgot your password?</a>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link">Dont have any account ?
                <a href="#signup" class="to_register"> Create Account </a>
              </p>

              <div class="clearfix"></div>
              <br />

              <div>
                <h1><i class="fa fa-paw"></i>Dimaz Ivan P</h1>
                <p>Copyright @ 2020 Dimaz Ivan P</p>
              </div>
            </div>
          </form>
        </section>
      </div>

      <div id="register" class="animate form registration_form">
        <section class="login_content">
          <form action="" method="post">
            <h1>Create Account</h1>
            <div>
              <input type="text" class="form-control" name="Id_User" placeholder="User Id" required="" />
            </div>
            <div>
              <input type="text" class="form-control" name="Nama_User" placeholder="Nama Anda" required="" />
            </div>
            <div>
              <input type="text" class="form-control" name="Username" placeholder="Username" required="" />
            </div>
            <div>
              <input type="password" class="form-control" name="Password" placeholder="Password" required="" />
            </div>
            <div>
              <!-- <a class="btn btn-default submit" href="index.php">Submit</a> -->
              <input type="submit" name="daftar" value="Daftar" class="btn btn-default submit">
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link">Already have an account ?
                <a href="#signin" class="to_register"> Log in </a>
              </p>

              <div class="clearfix"></div>
              <br />

              <div>
                <h1><i class="fa fa-paw"></i>Dimaz Ivan P</h1>
                <p>Copyright @ 2020 Dimaz Ivan P</p>
              </div>
            </div>
          </form>
        </section>
      </div>
    </div>
  </div>
  <?php
  include 'Control/Koneksi.php';
  if (isset($_POST['daftar'])) {
    $Id_User   = $_POST['Id_User'];
    $Nama_User = $_POST['Nama_User'];
    $Username  = $_POST['Username'];
    $Password  = $_POST['Password'];
    $cek = mysqli_query($conn, "SELECT * FROM user WHERE ID_USER='$Id_User'") or die(mysqli_error($conn));

    if (mysqli_num_rows($cek) == 0) {
      $sql = mysqli_query($conn, "INSERT INTO User(Id_User, Nama_User, Username, Kata_Sandi, Role_id) VALUES('$Id_User', '$Nama_User', '$Username', '$Password','1')") or die(mysqli_error($conn));
      if ($sql) {
        echo '<script>alert("Berhasil Mendaftar.");</script>';
      } else {
        echo '<div class="alert alert-warning">Gagal Mendaftar.</div>';
      }
    } else {
      echo '<div class="alert alert-warning">Gagal, Id User Sudah terdaftar.</div>';
    }
  }

  ?>



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