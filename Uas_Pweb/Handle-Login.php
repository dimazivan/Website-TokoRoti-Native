<?php

session_start();

include 'Control/Koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];


$user_cek = mysqli_query($conn, "Select username as user from user where username = '$username'");
$datauser = mysqli_fetch_array($user_cek);
$user = $datauser['user'];
$pass_cek = mysqli_query($conn, "Select kata_sandi as sandi from user where username = '$username' and kata_sandi = '$password'");
$datapass = mysqli_fetch_array($pass_cek);
$pass = $datapass['sandi'];
$role_cek = mysqli_query($conn, "Select role_id as role from user where username ='$username'");
$datarole = mysqli_fetch_array($role_cek);
$role = $datarole['role'];

// $user = 'dimazivan';
// $pass = 'manukan';
// $role = 0;

if ($username == $user && $password == $pass) {
    session_start();
    $_SESSION['username'] = $username;
    if ($role == 0) {
        header("Location: Index.php");
    } else {
        header("Location: Index_User.php");
    }
} else {
    echo "Username atau Password Anda Salah";
    header("Location: Login.php");
}
