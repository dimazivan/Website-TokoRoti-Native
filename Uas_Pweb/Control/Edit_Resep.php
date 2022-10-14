<?php include('Koneksi.php'); ?>

<div class="container" style="margin-top:20px">
	<center>
		<font size="6">Edit Data</font>
	</center>

	<hr>

	<?php
	if (isset($_GET['Id_Produk'])) {
		$Id_Kue = $_GET['Id_Produk'];

		$select = mysqli_query($conn, "SELECT * FROM Resep WHERE Id_Produk='$Id_Kue'") or die(mysqli_error($conn));

		if (mysqli_num_rows($select) == 0) {
			echo '<div class="alert alert-warning">Id Kue tidak ditemukan.</div>';
			exit();
		} else {
			$data = mysqli_fetch_assoc($select);
		}
	}
	?>

	<?php
	//jika tombol simpan di tekan/klik
	if (isset($_POST['submit'])) {
		$telur			= $_POST['Telur'];
		$tepung			= $_POST['Tepung'];
		$terigu			= $_POST['Terigu'];
		$mentega		= $_POST['Mentega'];

		$sql = mysqli_query($conn, "UPDATE Resep SET telur='$telur', tepung='$tepung', terigu='$terigu', mentega='$mentega' WHERE Id_Produk='$Id_Kue'") or die(mysqli_error($conn));

		if ($sql) {
			echo '<script>alert("Berhasil Merubah Data."); document.location="Index.php?page=Tampil_Kue";</script>';
		} else {
			echo '<div class="alert alert-warning">Gagal Merubah Data.</div>';
		}
	}
	?>

	<form action="Index.php?page=Edit_Resep&Id_Kue=<?php echo $Id_Kue; ?>" method="post">
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Id Kue</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="Id_Kue" class="form-control" size="4" value="<?php echo $data['Id_Produk']; ?>" readonly required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Telur</label>
			<div class="col-md-6 col-sm-6">
				<input type="number" name="Telur" class="form-control" value="<?php echo $data['Telur']; ?>" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Tepung</label>
			<div class="col-md-6 col-sm-6">
				<input type="number" name="Tepung" class="form-control" value="<?php echo $data['Tepung']; ?>" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Terigu</label>
			<div class="col-md-6 col-sm-6">
				<input type="number" name="Terigu" class="form-control" value="<?php echo $data['Terigu']; ?>" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Mentega</label>
			<div class="col-md-6 col-sm-6">
				<input type="number" name="Mentega" class="form-control" value="<?php echo $data['Mentega']; ?>" required>
			</div>
		</div>
		<div class="item form-group">
			<div class="col-md-6 col-sm-6 offset-md-3">
				<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
				<a href="Index.php?page=Tampil_Kue" class="btn btn-warning">Kembali</a>
			</div>
		</div>
	</form>
</div>