<?php include('../Koneksi.php'); ?>

<div class="container" style="margin-top:20px">
	<center>
		<font size="6">Setting</font>
	</center>

	<hr>

	<?php
	//jika tombol simpan di tekan/klik
	if (isset($_POST['submit'])) {
		$Username	= $_POST['Username'];
		$Password	= $_POST['Kata_Sandi'];

		$sql = mysqli_query($conn, "UPDATE User SET Kata_Sandi='$Password' WHERE Username='$Username'") or die(mysqli_error($conn));
		if ($sql) {
			echo '<script>alert("Berhasil Merubah Password.");</script>';
			echo '<script>alert("Silahkan Login Ulang"); document.location="../../Login.php";</script>';
		} else {
			echo '<div class="alert alert-warning">Gagal Merubah Data.</div>';
		}
	}
	?>

	<form action="Index_User.php?page=Setting" method="post">
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Username</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="Username" class="form-control" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Password Baru</label>
			<div class="col-md-6 col-sm-6">
				<input type="password" name="Kata_Sandi" class="form-control" placeholder="Masukkan Kata Sandi Baru" required>
			</div>
		</div>
		<div class="item form-group">
			<div class="col-md-6 col-sm-6 offset-md-3">
				<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
				<a href="../Uas_Pweb/Index.php" class="btn btn-warning">Kembali</a>
			</div>
		</div>
	</form>
</div>