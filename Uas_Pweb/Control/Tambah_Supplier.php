<?php include('Koneksi.php'); ?>

<center>
	<font size="6">Tambah Data</font>
</center>
<hr>
<?php
if (isset($_POST['submit'])) {
	$Id_Supplier	= $_POST['Id_Supplier'];
	$Nama_Supplier	= $_POST['Nama_Supplier'];
	$Alamat_Supplier= $_POST['Alamat_Supplier'];
	$No_Hp_Supplier	= $_POST['No_Hp_Supplier'];

	$cek = mysqli_query($conn, "SELECT * FROM Supplier WHERE ID_SUPPLIER='$Id_Supplier'") or die(mysqli_error($conn));

	if (mysqli_num_rows($cek) == 0) {
		$sql = mysqli_query($conn, "INSERT INTO Supplier(Id_Supplier, Nama_Supplier, Alamat_Supplier, No_Hp_Supplier) VALUES('$Id_Supplier', '$Nama_Supplier', '$Alamat_Supplier', '$No_Hp_Supplier')") or die(mysqli_error($conn));

		if ($sql) {
			echo '<script>alert("Berhasil Menambahkan Data Supplier."); document.location="Index.php?page=Tampil_Supplier";</script>';
		} else {
			echo '<div class="alert alert-warning">Gagal Menambah Data.</div>';
		}
	} else {
		echo '<div class="alert alert-warning">Gagal Menambahkan Data, Id Sudah terdaftar.</div>';
	}
}
?>

<form action="Index.php?page=Tambah_Supplier" method="post">
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Id Supplier</label>
		<div class="col-md-6 col-sm-6 ">
			<input type="text" name="Id_Supplier" class="form-control" size="4" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Supplier</label>
		<div class="col-md-6 col-sm-6">
			<input type="text" name="Nama_Supplier" class="form-control" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
		<div class="col-md-6 col-sm-6">
			<input type="text" name="Alamat_Supplier" class="form-control" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">No HandPhone</label>
		<div class="col-md-6 col-sm-6">
			<input type="number" name="No_Hp_Supplier" pattern="[0-9]{11,13}" title="Nomor handphone harus antara 11-13 digit" class="form-control">
		</div>
	</div>
	<div class="item form-group">
		<div class="col-md-6 col-sm-6 offset-md-3">
			<input type="submit" name="submit" class="btn btn-primary" value="Tambah">
		</div>
	</div>
</form>