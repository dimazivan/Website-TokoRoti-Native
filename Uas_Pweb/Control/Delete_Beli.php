<?php
include('Koneksi.php');

//jika benar mendapatkan GET id dari URL
if(isset($_GET['Id_Beli'])){
	$Id_Beli = $_GET['Id_Beli'];

	$cek = mysqli_query($conn, "SELECT Id_Beli FROM Pembelian WHERE Id_Beli='$Id_Beli'") or die(mysqli_error($conn));
	if(mysqli_num_rows($cek) > 0){
		$del = mysqli_query($conn, "DELETE FROM Pembelian WHERE Id_Beli='$Id_Beli'") or die(mysqli_error($conn));
		if($del){
			echo '<script>alert("Berhasil Menghapus data."); document.location="../Index.php?page=Tampil_Beli";</script>';
		}else{
			echo '<script>alert("Gagal Menghapus data."); document.location="../Index.php?page=Tampil_Beli";</script>';
		}
	}else{
		echo '<script>alert("Id Bahan tidak ditemukan."); document.location="../Index.php?page=Tampil_Beli";</script>';
	}
}else{
	echo '<script>alert("Id Bahan tidak ditemukan di database."); document.location="../Index.php?page=Tampil_Beli";</script>';
}
