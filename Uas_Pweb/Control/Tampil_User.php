<?php
include('Koneksi.php');
?>


<div class="container" style="margin-top:20px">
	<center>
		<font size="6">Data User</font>
	</center>
	<hr>
	<a href="Index.php?page=Tambah_User"><button class="btn btn-dark right">Tambah Data</button></a>
	<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>No.</th>
					<th>Id_User</th>
					<th>Nama User</th>
					<th>Username</th>
					<th>Status User</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel user urut berdasarkan id yang paling besar
				$sql = mysqli_query($conn, "SELECT ID_USER, NAMA_USER, USERNAME,ROLE_ID FROM user ORDER BY ID_USER DESC") or die(mysqli_error($conn));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if (mysqli_num_rows($sql) > 0) {
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while ($user_data = mysqli_fetch_assoc($sql)) {
						//menampilkan data perulangan
						echo "<tr>";
						echo "<td>" . $no . "</td>";
						echo "<td>" . $user_data['ID_USER'] . "</td>";
						echo "<td>" . $user_data['NAMA_USER'] . "</td>";
						echo "<td>" . $user_data['USERNAME'] . "</td>";	
						if($user_data['ROLE_ID']==1){
							echo "<td>User</td>";	
						}else{
							echo "<td>Admin</td>";
						}						
						echo'<td>
								<a href="Index.php?page=Edit_User&Id_User=' . $user_data['ID_USER'] . '" class="btn btn-secondary btn-sm">Edit</a>
								<a href="Control/Delete_User.php?Id_User=' . $user_data['ID_USER'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
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