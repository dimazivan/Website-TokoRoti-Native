<?php
include('Koneksi.php');

//jika benar mendapatkan GET id dari URL
if(isset($_GET['Id_User'])){
	$Id_User = $_GET['Id_User'];

	$cek = mysqli_query($conn, "SELECT Id_User FROM User WHERE Id_User='$Id_User'") or die(mysqli_error($conn));
	if(mysqli_num_rows($cek) > 0){
		$del = mysqli_query($conn, "DELETE FROM User WHERE Id_User='$Id_User'") or die(mysqli_error($conn));
		if($del){
			echo '<script>alert("Berhasil Menghapus data."); document.location="../Index.php?page=Tampil_User";</script>';
		}else{
			echo '<script>alert("Gagal Menghapus data."); document.location="../Index.php?page=Tampil_User";</script>';
		}
	}else{
		echo '<script>alert("User Id tidak ditemukan."); document.location="../Index.php?page=Tampil_User";</script>';
	}
}else{
	echo '<script>alert("User Id tidak ditemukan di database."); document.location="../Index.php?page=Tampil_User";</script>';
}
