<?php
include('Koneksi.php');

//jika benar mendapatkan GET id dari URL
if(isset($_GET['Id_Bahan'])){
	$Id_Bahan = $_GET['Id_Bahan'];

	$cek = mysqli_query($conn, "SELECT Id_Bahan FROM Inventory WHERE Id_Bahan='$Id_Bahan'") or die(mysqli_error($conn));
	if(mysqli_num_rows($cek) > 0){
		$del = mysqli_query($conn, "DELETE FROM Inventory WHERE Id_Bahan='$Id_Bahan'") or die(mysqli_error($conn));
		if($del){
			echo '<script>alert("Berhasil Menghapus data."); document.location="../Index.php?page=Tampil_Bahan";</script>';
		}else{
			echo '<script>alert("Gagal Menghapus data."); document.location="../Index.php?page=Tampil_Bahan";</script>';
		}
	}else{
		echo '<script>alert("Id Bahan tidak ditemukan."); document.location="../Index.php?page=Tampil_Bahan";</script>';
	}
}else{
	echo '<script>alert("Id Bahan tidak ditemukan di database."); document.location="../Index.php?page=Tampil_Bahan";</script>';
}
