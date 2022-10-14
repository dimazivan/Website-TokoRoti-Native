<?php
session_start();
$_SESSION['username']='';
unset($_SESSION['username']);
session_unset();
session_destroy();
header("Location: Login.php");
