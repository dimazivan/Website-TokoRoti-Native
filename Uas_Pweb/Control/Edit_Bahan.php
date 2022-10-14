<?php include('Koneksi.php'); ?>

<div class="container" style="margin-top:20px">
	<center>
		<font size="6">Edit Data</font>
	</center>

	<hr>

	<?php
	if (isset($_GET['Id_Bahan'])) {
		$Id_Bahan = $_GET['Id_Bahan'];

		$select = mysqli_query($conn, "SELECT * FROM Inventory WHERE Id_Bahan='$Id_Bahan'") or die(mysqli_error($conn));

		if (mysqli_num_rows($select) == 0) {
			echo '<div class="alert alert-warning">Id Bahan tidak ditemukan.</div>';
			exit();
		} else {
			$data = mysqli_fetch_assoc($select);
		}
	}
	?>

	<?php
	//jika tombol simpan di tekan/klik
	if (isset($_POST['submit'])) {
		$Nama_Bahan		= $_POST['Nama_Bahan'];
		$Jumlah_Stock	= $_POST['Jumlah_Stock'];
		$Harga_Bahan	= $_POST['Harga_Bahan'];

		$sql = mysqli_query($conn, "UPDATE Inventory SET Nama_Bahan='$Nama_Bahan', Jumlah_Stock='$Jumlah_Stock', Harga_Bahan='$Harga_Bahan' WHERE Id_Bahan='$Id_Bahan'") or die(mysqli_error($conn));

		if ($sql) {
			echo '<script>alert("Berhasil Merubah Data."); document.location="Index.php?page=Tampil_Bahan";</script>';
		} else {
			echo '<div class="alert alert-warning">Gagal Merubah Data.</div>';
		}
	}
	?>

	<form action="Index.php?page=Edit_Bahan&Id_Bahan=<?php echo $Id_Bahan; ?>" method="post">
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Id_Bahan</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="Id_Bahan" class="form-control" size="4" value="<?php echo $data['Id_Bahan']; ?>" readonly required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Bahan</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="Nama_Bahan" class="form-control" value="<?php echo $data['Nama_Bahan']; ?>" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Jumlah Stock</label>
			<div class="col-md-6 col-sm-6">
				<input type="number" name="Jumlah_Stock" class="form-control" value="<?php echo $data['Jumlah_Stock']; ?>" readonly required>
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
				<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
				<a href="Index.php?page=Tampil_Bahan" class="btn btn-warning">Kembali</a>
			</div>
		</div>
	</form>
</div>