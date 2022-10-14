<?php include('Koneksi.php'); ?>

<div class="container" style="margin-top:20px">
	<center>
		<font size="6">Edit Data</font>
	</center>

	<hr>

	<?php
	if (isset($_GET['Id_User'])) {
		$Id_User = $_GET['Id_User'];

		$select = mysqli_query($conn, "SELECT * FROM User WHERE Id_User='$Id_User'") or die(mysqli_error($conn));

		if (mysqli_num_rows($select) == 0) {
			echo '<div class="alert alert-warning">User Id tidak ditemukan.</div>';
			exit();
		} else {
			$data = mysqli_fetch_assoc($select);
		}
	}
	?>

	<?php
	//jika tombol simpan di tekan/klik
	if (isset($_POST['submit'])) {
		$Nama_User		= $_POST['Nama_User'];
		$Password		= $_POST['Kata_Sandi'];
		$Role_Id		= $_POST['Role_Id'];

		$sql = mysqli_query($conn, "UPDATE User SET Nama_User='$Nama_User', Kata_Sandi='$Password', Role_Id='$Role_Id' WHERE Id_User='$Id_User'") or die(mysqli_error($conn));

		if ($sql) {
			echo '<script>alert("Berhasil Merubah Data."); document.location="Index.php?page=Tampil_User";</script>';
		} else {
			echo '<div class="alert alert-warning">Gagal Merubah Data.</div>';
		}
	}
	?>

	<form action="Index.php?page=Edit_User&Id_User=<?php echo $Id_User; ?>" method="post">
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Id_User</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="Id_User" class="form-control" size="4" value="<?php echo $data['Id_User']; ?>" readonly required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Nama User</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="Nama_User" class="form-control" value="<?php echo $data['Nama_User']; ?>" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Password</label>
			<div class="col-md-6 col-sm-6">
				<input type="password" name="Kata_Sandi" class="form-control" placeholder="Masukkan Kata Sandi Baru" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
			<div class="col-md-6 col-sm-6 ">
				<div class="btn-group" data-toggle="buttons">
					<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
						<input type="radio" class="join-btn" name="Role_Id" value="0" required>Admin
					</label>
					<label class="btn btn-primary " data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
						<input type="radio" class="join-btn" name="Role_Id" value="1" required>User
					</label>
				</div>
			</div>
		</div>
		<div class="item form-group">
			<div class="col-md-6 col-sm-6 offset-md-3">
				<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
				<a href="Index.php?page=Tampil_User" class="btn btn-warning">Kembali</a>
			</div>
		</div>
	</form>
</div>