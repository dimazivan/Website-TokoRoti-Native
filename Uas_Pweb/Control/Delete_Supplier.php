<?php
include('Koneksi.php');

//jika benar mendapatkan GET id dari URL
if(isset($_GET['Id_Supplier'])){
	$Id_Supplier = $_GET['Id_Supplier'];

	$cek = mysqli_query($conn, "SELECT Id_Supplier FROM Supplier WHERE Id_Supplier='$Id_Supplier'") or die(mysqli_error($conn));
	if(mysqli_num_rows($cek) > 0){
		$del = mysqli_query($conn, "DELETE FROM Supplier WHERE Id_Supplier='$Id_Supplier'") or die(mysqli_error($conn));
		if($del){
			echo '<script>alert("Berhasil Menghapus data."); document.location="../Index.php?page=Tampil_Supplier";</script>';
		}else{
			echo '<script>alert("Gagal Menghapus data."); document.location="../Index.php?page=Tampil_Supplier";</script>';
		}
	}else{
		echo '<script>alert("Id Supplier tidak ditemukan."); document.location="../Index.php?page=Tampil_Supplier";</script>';
	}
}else{
	echo '<script>alert("Id Supplier tidak ditemukan di database."); document.location="../Index.php?page=Tampil_Supplier";</script>';
}
