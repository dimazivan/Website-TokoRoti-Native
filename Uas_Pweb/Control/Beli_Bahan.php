<?php include('Koneksi.php'); ?>

<div class="container" style="margin-top:20px">
	<center>
		<font size="6">Transaksi Pembelian</font>
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
		$Id_Bahan = $_GET['Id_Bahan'];
		$cekid = mysqli_query($conn, "SELECT Jumlah_Stock FROM Inventory WHERE Id_Bahan='$Id_Bahan'") or die(mysqli_error($conn));
		$date = date('Y-m-d H:i:s');
		$Id_Beli 		= $_POST['Id_Beli'];
		$Nama_Bahan		= $_POST['Nama_Bahan'];
		$stock 			= $_POST['Jumlah_Stock'];
		$Harga_Bahan	= $_POST['Harga_Bahan'];
		$Jumlah_Beli	= $_POST['Jumlah_Beli'];
		$Total 			= $_POST['Total_Harga'];
		$Nama_Supplier	= $_POST['Nama_Supplier'];
		$Stock_Baru		= $Jumlah_Beli + $stock;

		$sql = mysqli_query($conn, "UPDATE Inventory SET Jumlah_Stock='$Stock_Baru' WHERE Id_Bahan='$Id_Bahan'") or die(mysqli_error($conn));
		if ($sql) {
			echo '<script>alert("Berhasil Menambah Stock Bahan.");</script>';
			$inst = mysqli_query($conn, "INSERT INTO Pembelian(Id_Beli,Tanggal_Beli, Nama_Supplier, Nama_Bahan, Harga_Bahan, Jumlah_Beli, Total_Harga_Beli)VALUES('$Id_Beli', '$date', '$Nama_Supplier', '$Nama_Bahan', '$Harga_Bahan', '$Jumlah_Beli','$Total')") or die(mysqli_error($conn));
			if ($inst) {
				echo '<script>alert("Berhasil Menyimpan Data Pembelian."); document.location="Index.php?page=Tampil_Bahan";</script>';
			} else {
				echo '<div class="alert alert-warning">Gagal Menyimpan Data Pembelian.</div>';
			}
		} else {
			echo '<div class="alert alert-warning">Gagal Menambah Stock Bahan.</div>';
		}
	}
	?>

	<form action="Index.php?page=Beli_Bahan&Id_Bahan=<?php echo $Id_Bahan; ?>" method="post">
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Id Beli</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="Id_Beli" class="form-control" size="4" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Id Bahan</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="Id_Bahan" class="form-control" size="4" value="<?php echo $data['Id_Bahan'] ?>" readonly required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Bahan</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="Nama_Bahan" class="form-control" value="<?php echo $data['Nama_Bahan']; ?>" readonly required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Stock Sekarang</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="Jumlah_Stock" class="form-control" value="<?php echo $data['Jumlah_Stock']; ?>" readonly required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Jumlah Beli</label>
			<div class="col-md-6 col-sm-6">
				<input type="number" name="Jumlah_Beli" id="jumlah" onkeyup="totalharga()" class="form-control" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Harga Bahan</label>
			<div class="col-md-6 col-sm-6">
				<input type="number" name="Harga_Bahan" id="harga" class="form-control" value="<?php echo $data['Harga_Bahan']; ?>" readonly required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Total Harga</label>
			<div class="col-md-6 col-sm-6">
				<input type="number" name="Total_Harga" id="total" class="form-control" readonly required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Supplier</label>
			<div class="col-md-6 col-sm-6">
				<?php $query = mysqli_query($conn, "SELECT * FROM Supplier order by Nama_Supplier desc") or die(mysqli_error($conn));  ?>
				<select name="Nama_Supplier" class="form-control" required>
					<option value="0">- Pilih Supplier -</option>
					<?php
					if (mysqli_num_rows($query) != 0) {
						while ($data = mysqli_fetch_assoc($query)) {
							echo '<option>' . $data['Nama_Supplier'] . '</option>';
						}
					}
					?>
				</select>
			</div>
		</div>
		<div class="item form-group">
			<div class="col-md-6 col-sm-6 offset-md-3">
				<input type="submit" name="submit" class="btn btn-primary" value="Beli">
				<a href="Index.php?page=Tampil_Bahan" class="btn btn-warning">Kembali</a>
			</div>
		</div>
	</form>
</div>

<script>
	function totalharga() {
		var jmlbeli = document.getElementById('jumlah').value;
		var harga = document.getElementById('harga').value;
		var result = parseInt(jmlbeli) * parseInt(harga);
		if (!isNaN(result)) {
			document.getElementById('total').value = result;
		}
	}
</script>