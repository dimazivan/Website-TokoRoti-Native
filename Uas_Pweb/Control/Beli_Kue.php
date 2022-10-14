<?php include('Koneksi.php'); ?>

<div class="container" style="margin-top:20px">
	<center>
		<font size="6">Order List</font>
	</center>

	<hr>

	<?php
	if (isset($_GET['Id_Produk'])) {
		$Id_Produk = $_GET['Id_Produk'];

		$select = mysqli_query($conn, "SELECT * FROM Produk WHERE Id_Produk='$Id_Produk'") or die(mysqli_error($conn));
		// $user = mysqli_query($conn, "SELECT * FROM User") or die(mysqli_error($conn));

		if (mysqli_num_rows($select) == 0) {
			echo '<div class="alert alert-warning">Id Produk tidak ditemukan.</div>';
			exit();
		} else {
			$data = mysqli_fetch_assoc($select);
			// $datauser = mysqli_fetch_assoc($user);
		}
	}
	?>

	<?php

	//jika tombol simpan di tekan/klik
	if (isset($_POST['submit'])) {
		// $Id_Jual = $_GET['Id_Jual'];
		$Id_Produk = $_GET['Id_Produk'];
		$date = date('Y-m-d H:i:s');
		$Id_Jual		= $_POST['Id_Jual'];
		// $Id_User        = $_POST['Id_User'];
		$Nama_Kue		= $_POST['Nama_Produk'];
		// $Stock 			= $_POST['Jumlah_Stock'];
		$Harga      	= $_POST['Harga'];
		$Jumlah_Beli	= $_POST['Jumlah_Beli'];
		$Total 			= $_POST['Total_Harga'];
		$Nama_Pelanggan	= $_POST['Nama_Pelanggan'];
		$Kembalian      = $_POST['Kembalian'];
		$Status 		= 'Proses';
		// if($Kembalian < 0){
		//     $Status = 'Hutang';
		//     $Hutang = $Kembalian;
		// }else{
		//     $Status = 'Lunas';
		//     $Hutang = '0';
		// }
		// $Stock_Baru		= $Jumlah_Beli - $stock;

		// $sql = mysqli_query($conn, "UPDATE Inventory SET Jumlah_Stock='$Stock_Baru' WHERE Id_Bahan='$Id_Bahan'") or die(mysqli_error($conn));
		// if ($sql) {
			echo '<script>alert("Berhasil Melakukan Pembelian.");</script>';
			$inst = mysqli_query($conn, "INSERT INTO Penjualan(Id_Jual,Tanggal_Jual, Nama_Pelanggan, Nama_Produk, Jumlah_Beli, Harga, Total_Harga_Jual, Status, Hutang)VALUES('$Id_Jual', '$date', '$Nama_Pelanggan', '$Nama_Kue', '$Jumlah_Beli', '$Harga', '$Total','$Status', '$Hutang')") or die(mysqli_error($conn));
			if ($inst) {
				echo '<script>alert("Berhasil Menyimpan Data Pembelian."); document.location="Index_User.php?page=Tampil_Order";</script>';
			} else {
				echo '<div class="alert alert-warning">Gagal Menyimpan Data Pembelian.</div>';
			}
		// } else {
		// 	echo '<div class="alert alert-warning">Gagal Mengurangi Stock.</div>';
		// }
	}
	?>

	<form action="Index.php?page=Beli_Kue&Id_Produk=<?php echo $Id_Produk; ?>" method="post">
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Id Penjualan</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="Id_Jual" class="form-control" size="4" required>
			</div>
		</div>
		<!-- <div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Id Pelanggan</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="Id_User" class="form-control" size="4" value="<?php echo $datauser['Id_User'] ?>" required>
			</div>
        </div> -->
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Pembeli</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="Nama_Pelanggan" class="form-control" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Kue</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="Nama_Produk" class="form-control" value="<?php echo $data['Nama_Produk']; ?>" readonly required>
			</div>
		</div>
		<!-- <div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Stock Sekarang</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="Jumlah_Stock" class="form-control" value="<?php echo $data['Jumlah_Stock']; ?>" readonly required>
			</div>
		</div> -->
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Jumlah Beli</label>
			<div class="col-md-6 col-sm-6">
				<input type="number" name="Jumlah_Beli" id="jumlah" onkeyup="totalharga()" class="form-control" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Harga Kue</label>
			<div class="col-md-6 col-sm-6">
				<input type="number" name="Harga" id="harga" class="form-control" value="<?php echo $data['Harga']; ?>" readonly required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Total Harga</label>
			<div class="col-md-6 col-sm-6">
				<input type="number" name="Total_Harga" id="total" class="form-control" readonly required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Masukkan Nominal</label>
			<div class="col-md-6 col-sm-6">
				<input type="number" name="Bayar" id="bayar" onkeyup="totalharga()" class="form-control" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Kembalian Anda</label>
			<div class="col-md-6 col-sm-6">
				<input type="number" name="Kembalian" id="kembalian" class="form-control" readonly required>
			</div>
		</div>
		<div class="item form-group">
			<div class="col-md-6 col-sm-6 offset-md-3">
				<input type="submit" name="submit" class="btn btn-primary" value="Beli">
				<a href="Index.php?page=Tampil_Kue" class="btn btn-warning">Kembali</a>
			</div>
		</div>
	</form>
</div>

<script>
	function totalharga() {
		var jmlbeli = document.getElementById('jumlah').value;
		var harga = document.getElementById('harga').value;
		var result = parseInt(jmlbeli) * parseInt(harga);
		var byr = document.getElementById('bayar').value;
		var kembalian = parseInt(byr) - parseInt(result);
		if (!isNaN(result)) {
			document.getElementById('total').value = result;
			document.getElementById('kembalian').value = kembalian;
		}else{
			document.getElementById('kembalian').value = kembalian;
		}
	}

	// function kembalian() {
	// 	var result = document.getElementById('total').value;
	// 	var bayar = document.getElementById('bayar').value;
	// 	var kembalian = parseInt(bayar) - parseInt(result);
	// 	if (!isNaN(kembalian)) {
	// 		document.getElementById('kembalian').value = kembalian;
	// 	}
	// }
</script>