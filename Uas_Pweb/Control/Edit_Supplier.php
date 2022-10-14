<?php include('Koneksi.php'); ?>

<div class="container" style="margin-top:20px">
	<center>
		<font size="6">Edit Data</font>
	</center>

	<hr>

	<?php
	if (isset($_GET['Id_Supplier'])) {
		$Id_Supplier = $_GET['Id_Supplier'];

		$select = mysqli_query($conn, "SELECT * FROM Supplier WHERE Id_Supplier='$Id_Supplier'") or die(mysqli_error($conn));

		if (mysqli_num_rows($select) == 0) {
			echo '<div class="alert alert-warning">Id Supplier tidak ditemukan.</div>';
			exit();
		} else {
			$data = mysqli_fetch_assoc($select);
		}
	}
	?>

	<?php
	//jika tombol simpan di tekan/klik
	if (isset($_POST['submit'])) {
		$Nama_Supplier		= $_POST['Nama_Supplier'];
		$Alamat_Supplier	= $_POST['Alamat_Supplier'];
		$No_Hp_Supplier		= $_POST['No_Hp_Supplier'];

		$sql = mysqli_query($conn, "UPDATE Supplier SET Nama_Supplier='$Nama_Supplier', Alamat_Supplier='$Alamat_Supplier', No_Hp_Supplier='$No_Hp_Supplier' WHERE Id_Supplier='$Id_Supplier'") or die(mysqli_error($conn));

		if ($sql) {
			echo '<script>alert("Berhasil Merubah Data."); document.location="Index.php?page=Tampil_Supplier";</script>';
		} else {
			echo '<div class="alert alert-warning">Gagal Merubah Data.</div>';
		}
	}
	?>

	<form action="Index.php?page=Edit_Supplier&Id_Supplier=<?php echo $Id_Supplier; ?>" method="post">
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Id_Supplier</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="Id_Supplier" class="form-control" size="4" value="<?php echo $data['Id_Supplier']; ?>" readonly required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Supplier</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="Nama_Supplier" class="form-control" value="<?php echo $data['Nama_Supplier']; ?>" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="Alamat_Supplier" class="form-control" value="<?php echo $data['Alamat_Supplier']; ?>" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">No Handphone</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="No_Hp_Supplier" pattern="[0-9]{11,13}" title="Nomor handphone harus antara 11-13 digit" class="form-control">
			</div>
		</div>
		<div class="item form-group">
			<div class="col-md-6 col-sm-6 offset-md-3">
				<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
				<a href="Index.php?page=Tampil_Supplier" class="btn btn-warning">Kembali</a>
			</div>
		</div>
	</form>
</div>