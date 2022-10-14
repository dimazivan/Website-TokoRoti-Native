<?php
include('Koneksi.php');
?>


<div class="container" style="margin-top:20px">
	<center>
		<font size="6">Data Supplier</font>
	</center>
	<hr>
	<a href="Index.php?page=Tambah_Supplier"><button class="btn btn-dark right">Tambah Data</button></a>
	<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>No.</th>
					<th>Id_Supplier</th>
					<th>Nama Supplier</th>
					<th>Alamat</th>
					<th>Nomor Handphone</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel Supplier urut berdasarkan id yang paling besar
				$sql = mysqli_query($conn, "SELECT ID_SUPPLIER, NAMA_SUPPLIER, ALAMAT_SUPPLIER, NO_HP_SUPPLIER FROM SUPPLIER ORDER BY ID_SUPPLIER DESC") or die(mysqli_error($conn));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if (mysqli_num_rows($sql) > 0) {
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while ($Supplier_data = mysqli_fetch_assoc($sql)) {
						//menampilkan data perulangan
						echo "<tr>";
						echo "<td>" . $no . "</td>";
						echo "<td>" . $Supplier_data['ID_SUPPLIER'] . "</td>";
						echo "<td>" . $Supplier_data['NAMA_SUPPLIER'] . "</td>";
						echo "<td>" . $Supplier_data['ALAMAT_SUPPLIER'] . "</td>";	
						if($Supplier_data['NO_HP_SUPPLIER']==null){
							echo "<td>Tidak Ada Nomor Hp</td>";	
						}else{
							echo "<td>".$Supplier_data['NO_HP_SUPPLIER']."</td>";
						}						
						echo'<td>
								<a href="Index.php?page=Edit_Supplier&Id_Supplier=' . $Supplier_data['ID_SUPPLIER'] . '" class="btn btn-secondary btn-sm">Edit</a>
								<a href="Control/Delete_Supplier.php?Id_Supplier=' . $Supplier_data['ID_SUPPLIER'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
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