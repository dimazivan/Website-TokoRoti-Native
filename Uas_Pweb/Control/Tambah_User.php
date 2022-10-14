<?php include('Koneksi.php'); ?>

<center>
	<font size="6">Tambah Data</font>
</center>
<hr>
<?php
if (isset($_POST['submit'])) {
	$Id_User		= $_POST['Id_User'];
	$Nama_User		= $_POST['Nama_User'];
	$Username		= $_POST['Username'];
	$Password		= $_POST['Kata_Sandi'];
	$Role_Id		= $_POST['Role_Id'];

	$cek = mysqli_query($conn, "SELECT * FROM User WHERE ID_USER='$Id_User' OR USERNAME ='$Username'") or die(mysqli_error($conn));

	if (mysqli_num_rows($cek) == 0) {
		$sql = mysqli_query($conn, "INSERT INTO User(Id_User, Nama_User, Username, Kata_Sandi, Role_Id) VALUES('$Id_User', '$Nama_User', '$Username', '$Password','$Role_Id')") or die(mysqli_error($conn));

		if ($sql) {
			echo '<script>alert("Berhasil Menambahkan User."); document.location="Index.php?page=Tampil_User";</script>';
		} else {
			echo '<div class="alert alert-warning">Gagal Menambah Data.</div>';
		}
	} else {
		echo '<div class="alert alert-warning">Gagal, Username atau Id Sudah terdaftar.</div>';
	}
}
?>

<form action="Index.php?page=Tambah_User" method="post">
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Id User</label>
		<div class="col-md-6 col-sm-6 ">
			<input type="text" name="Id_User" class="form-control" size="4" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Nama User</label>
		<div class="col-md-6 col-sm-6">
			<input type="text" name="Nama_User" class="form-control" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Username</label>
		<div class="col-md-6 col-sm-6">
			<input type="text" name="Username" class="form-control" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Password</label>
		<div class="col-md-6 col-sm-6">
			<input type="password" name="Kata_Sandi" class="form-control" required>
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
			<input type="submit" name="submit" class="btn btn-primary" value="Tambah">
		</div>
	</div>
</form>