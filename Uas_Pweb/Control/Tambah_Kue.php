<?php include('Koneksi.php'); ?>

<center>
	<font size="6">Tambah Data Kue</font>
</center>
<hr>
<?php
if (isset($_POST['submit'])) {
	$Id_Produk		= $_POST['Id_Produk'];
	$Nama_Produk	= $_POST['Nama_Produk'];
	$Harga			= $_POST['Harga'];
	$Deskripsi		= $_POST['Deskripsi'];

	$cek = mysqli_query($conn, "SELECT * FROM Produk WHERE ID_PRODUK='$Id_Produk'") or die(mysqli_error($conn));

	if (mysqli_num_rows($cek) == 0) {
		$sql = mysqli_query($conn, "INSERT INTO Produk(Id_Produk, Nama_Produk, Harga, Deskripsi) VALUES('$Id_Produk', '$Nama_Produk', '$Harga', '$Deskripsi')") or die(mysqli_error($conn));
		if ($sql) {
			echo '<script>alert("Berhasil Menambahkan Data Kue.");</script>';
			$resep = mysqli_query($conn, "INSERT INTO Resep(Id_Produk, Telur, Tepung, Terigu, Mentega) VALUES ('$Id_Produk','1','1','1','1')") or die(mysqli_error($conn));
			if($resep){
				echo '<script>alert("Berhasil Menambahkan Data Bahan Kue Default."); document.location="Index.php?page=Tampil_Kue";</script>';
			}else{
				echo '<script>alert("Gagal Menambahkan Data Bahan Kue"); document.location="Index.php?page=Tampil_Kue";</script>';
			}
		} else {
			echo '<div class="alert alert-warning">Gagal Menambah Data.</div>';
		}
	} else {
		echo '<div class="alert alert-warning">Gagal, Id Kue Sudah terdaftar.</div>';
	}
}
?>

<form action="Index.php?page=Tambah_Kue" method="post">
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Id Produk</label>
		<div class="col-md-6 col-sm-6 ">
			<input type="text" name="Id_Produk" class="form-control" size="4" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Kue</label>
		<div class="col-md-6 col-sm-6">
			<input type="text" name="Nama_Produk" class="form-control" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Harga</label>
		<div class="col-md-6 col-sm-6">
			<input type="number" name="Harga" class="form-control" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Deskripsi</label>
		<div class="col-md-6 col-sm-6">
			<textarea name="Deskripsi" id="" cols="30" rows="10" style="width: 605px;" placeholder="Masukkan Deskripsi disini"></textarea>
		</div>
	</div>
	<div class="item form-group">
		<div class="col-md-6 col-sm-6 offset-md-3">
			<input type="submit" name="submit" class="btn btn-primary" value="Tambah">
		</div>
	</div>
</form>