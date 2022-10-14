<?php
include('Koneksi.php');
?>


<div class="container" style="margin-top:20px">
	<center>
		<font size="6">Menu Kue</font>
	</center>
	<hr>
	<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>No.</th>
					<th>Id Kue</th>
					<th>Nama Kue</th>
					<th>Harga Kue</th>
					<th>Deskripsi</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql = mysqli_query($conn, "SELECT ID_PRODUK, NAMA_PRODUK, HARGA, DESKRIPSI FROM PRODUK ORDER BY NAMA_PRODUK DESC") or die(mysqli_error($conn));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if (mysqli_num_rows($sql) > 0) {
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while ($user_data = mysqli_fetch_assoc($sql)) {
						//menampilkan data perulangan
						echo "<tr>";
						echo "<td>" . $no . "</td>";
						echo "<td>" . $user_data['ID_PRODUK'] . "</td>";
						echo "<td>" . $user_data['NAMA_PRODUK'] . "</td>";
						echo "<td>Rp." . $user_data['HARGA'] . "</td>";
						echo "<td>" . $user_data['DESKRIPSI'] . "</td>";
						echo '<td>
								<a href="Index_User.php?page=Beli_Kue&Id_Produk=' . $user_data['ID_PRODUK'] . '" class="btn btn-secondary btn-sm">Beli</a>
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