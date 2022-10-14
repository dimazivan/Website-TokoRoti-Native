<?php
include('Koneksi.php');
?>


<div class="container" style="margin-top:20px">
	<center>
		<font size="6">Data Omset</font>
	</center>
	<hr>
	<a href="Index.php?page=Index.php"><button class="btn btn-dark right">Home</button></a>
	<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nominal</th>
					<th>Status</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel user urut berdasarkan id yang paling besar
				$a = mysqli_query($conn, "SELECT SUM(Total_Harga_Beli) as beli FROM Pembelian") or die(mysqli_error($conn));
				$data = mysqli_fetch_array($a);
				$beli = $data['beli'];
				$b = mysqli_query($conn, "SELECT SUM(Total_Harga_Jual)as jual FROM Penjualan") or die(mysqli_error($conn));
				$data1 = mysqli_fetch_array($b);
				$jual = $data1['jual'];
				
				$omzet = $jual - $beli;
				if ($omzet != null) {
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					echo "<tr>";
					echo "<td>" . $no . "</td>";
					echo "<td>Rp." . $omzet . "</td>";
					if ($jual > $beli) {
						echo "<td>Untung</td>";
					} else {
						echo "<td>Rugi</td>";
					}
					echo '<td>
								<a href="Index.php?page=Index.php" class="btn btn-secondary btn-sm">Cetak</a>
							</td>
						</tr>
						';
				
				} else {
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
	</div>
</div>