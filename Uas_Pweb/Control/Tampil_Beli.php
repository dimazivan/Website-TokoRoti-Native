<?php
include 'Koneksi.php';
?>
<div class="container" style="margin-top:20px">
    <center>
        <font size="6">Data Pembelian</font>
    </center>
    <hr>
    <a href="Index.php?page=Tampil_Bahan"><button class="btn btn-dark right">Lihat Stock</button></a>
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Id Pembelian</th>
                    <th>Tanggal Transaksi</th>
                    <th>Nama Supplier</th>
                    <th>Nama Bahan</th>
                    <th>Harga Bahan </th>
                    <th>Jumlah Beli</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //query ke database SELECT tabel Supplier urut berdasarkan id yang paling besar
                $sql = mysqli_query($conn, "SELECT ID_BELI,TANGGAL_BELI, NAMA_SUPPLIER, NAMA_BAHAN, HARGA_BAHAN, JUMLAH_BELI, TOTAL_HARGA_BELI FROM PEMBELIAN ORDER BY TANGGAL_BELI DESC") or die(mysqli_error($conn));
                //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
                if (mysqli_num_rows($sql) > 0) {
                    //membuat variabel $no untuk menyimpan nomor urut
                    $no = 1;
                    //melakukan perulangan while dengan dari dari query $sql
                    while ($dash_beli = mysqli_fetch_assoc($sql)) {
                        //menampilkan data perulangan
                        echo "<tr>";
                        echo "<td>" . $no . "</td>";
                        echo "<td>" . $dash_beli['ID_BELI'] . "</td>";
                        echo "<td>" . $dash_beli['TANGGAL_BELI'] . "</td>";
                        echo "<td>" . $dash_beli['NAMA_SUPPLIER'] . "</td>";
                        echo "<td>" . $dash_beli['NAMA_BAHAN'] . "</td>";
                        echo "<td>Rp." . $dash_beli['HARGA_BAHAN'] . "</td>";
                        echo "<td>" . $dash_beli['JUMLAH_BELI'] . "</td>";
                        echo "<td>Rp." . $dash_beli['TOTAL_HARGA_BELI'] . "</td>";
                        echo '<td>
								<a href="Control/Delete_Beli.php?Id_Beli=' . $dash_beli['ID_BELI'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Hapus</a>
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