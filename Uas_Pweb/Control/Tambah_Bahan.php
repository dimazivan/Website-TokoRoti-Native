<?php include('Koneksi.php'); ?>

<center>
	<font size="6">Tambah Data</font>
</center>
<hr>
<?php
if (isset($_POST['submit'])) {
	$Id_Bahan		= $_POST['Id_Bahan'];
	$Nama_Bahan		= $_POST['Nama_Bahan'];
	$Jumlah_Stock	= $_POST['Jumlah_Stock'];
	$Harga_Bahan	= $_POST['Harga_Bahan'];

	$cek = mysqli_query($conn, "SELECT * FROM Inventory WHERE ID_BAHAN='$Id_Bahan' OR NAMA_BAHAN ='$Nama_Bahan'") or die(mysqli_error($conn));

	if (mysqli_num_rows($cek) == 0) {
		$sql = mysqli_query($conn, "INSERT INTO Inventory(Id_Bahan, Nama_Bahan, Jumlah_Stock, Harga_Bahan) VALUES('$Id_Bahan', '$Nama_Bahan', '$Jumlah_Stock', '$Harga_Bahan')") or die(mysqli_error($conn));

		if ($sql) {
			echo '<script>alert("Berhasil Menambahkan Data Bahan."); document.location="Index.php?page=Tampil_Bahan";</script>';
		} else {
			echo '<div class="alert alert-warning">Gagal Menambah Data.</div>';
		}
	} else {
		echo '<div class="alert alert-warning">Gagal Menambahkan Data, Id Bahan atau Nama Bahan Sudah terdaftar.</div>';
	}
}
?>

<form action="Index.php?page=Tambah_Bahan" method="post">
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Id Bahan</label>
		<div class="col-md-6 col-sm-6 ">
			<input type="text" name="Id_Bahan" class="form-control" size="4" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Bahan</label>
		<div class="col-md-6 col-sm-6">
			<input type="text" name="Nama_Bahan" class="form-control" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Jumlah Stock</label>
		<div class="col-md-6 col-sm-6">
			<input type="number" name="Jumlah_Stock" class="form-control">
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Harga Bahan</label>
		<div class="col-md-6 col-sm-6">
			<input type="number" name="Harga_Bahan" class="form-control" required>
		</div>
	</div>
	<div class="item form-group">
		<div class="col-md-6 col-sm-6 offset-md-3">
			<input type="submit" name="submit" class="btn btn-primary" value="Tambah">
		</div>
	</div>
</form>