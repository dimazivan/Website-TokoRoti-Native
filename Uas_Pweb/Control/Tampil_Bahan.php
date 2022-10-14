<?php
include('Koneksi.php');
?>


<div class="container" style="margin-top:20px">
	<center>
		<font size="6">Data Bahan</font>
	</center>
	<hr>
	<a href="Index.php?page=Tambah_Bahan"><button class="btn btn-dark right">Tambah Data</button></a>
	<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>No.</th>
					<th>Id Bahan</th>
					<th>Nama Bahan</th>
					<th>Jumlah Stock</th>
					<th>Harga Bahan</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel bahan urut berdasarkan id yang paling besar
				$sql = mysqli_query($conn, "SELECT ID_BAHAN, NAMA_BAHAN, JUMLAH_STOCK, HARGA_BAHAN FROM INVENTORY ORDER BY ID_BAHAN DESC") or die(mysqli_error($conn));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if (mysqli_num_rows($sql) > 0) {
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while ($bahan_data = mysqli_fetch_assoc($sql)) {
						//menampilkan data perulangan
						echo "<tr>";
						echo "<td>" . $no . "</td>";
						echo "<td>" . $bahan_data['ID_BAHAN'] . "</td>";
						echo "<td>" . $bahan_data['NAMA_BAHAN'] . "</td>";
						if($bahan_data['JUMLAH_STOCK']==null){
							echo "<td>Tidak Ada Stock</td>";	
						}else{
							echo "<td>".$bahan_data['JUMLAH_STOCK']."</td>";
						}
						echo "<td>Rp." . $bahan_data['HARGA_BAHAN'] . "</td>";							
						echo'<td>
								<a href="Index.php?page=Edit_Bahan&Id_Bahan=' . $bahan_data['ID_BAHAN'] . '" class="btn btn-secondary btn-sm">Edit</a>
								<a href="Index.php?page=Beli_Bahan&Id_Bahan=' . $bahan_data['ID_BAHAN'] . '" class="btn btn-warning btn-sm">Beli</a>
								<a href="Control/Delete_Bahan.php?Id_Bahan=' . $bahan_data['ID_BAHAN'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						$no++;
					}
					//jika query menghasilkan nilai 0
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