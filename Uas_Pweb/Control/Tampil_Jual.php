<?php
include('Koneksi.php');
?>
<div class="container" style="margin-top:20px">
    <center>
        <font size="6">Data Penjualan</font>
    </center>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Id Penjualan</th>
                    <th>Tanggal Transaksi</th>
                    <th>Nama Pelanggan</th>
                    <th>Nama Kue</th>
                    <th>Jumlah Beli</th>
                    <th>Harga</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Hutang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //query ke database SELECT tabel Supplier urut berdasarkan id yang paling besar
                $sql = mysqli_query($conn, "SELECT ID_JUAL, TANGGAL_JUAL, NAMA_PELANGGAN, NAMA_PRODUK, JUMLAH_BELI, HARGA, TOTAL_HARGA_JUAL, STATUS, HUTANG FROM PENJUALAN ORDER BY TANGGAL_JUAL DESC") or die(mysqli_error($conn));
                //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
                if (mysqli_num_rows($sql) > 0) {
                    //membuat variabel $no untuk menyimpan nomor urut
                    $no = 1;
                    //melakukan perulangan while dengan dari dari query $sql
                    while ($dash_jual = mysqli_fetch_assoc($sql)) {
                        //menampilkan data perulangan
                        echo "<tr>";
                        echo "<td>" . $no . "</td>";
                        echo "<td>" . $dash_jual['ID_JUAL'] . "</td>";
                        echo "<td>" . $dash_jual['TANGGAL_JUAL'] . "</td>";
                        echo "<td>" . $dash_jual['NAMA_PELANGGAN'] . "</td>";
                        echo "<td>" . $dash_jual['NAMA_PRODUK'] . "</td>";
                        echo "<td>" . $dash_jual['JUMLAH_BELI'] . "</td>";
                        echo "<td>Rp." . $dash_jual['HARGA'] . "</td>";
                        echo "<td>Rp." . $dash_jual['TOTAL_HARGA_JUAL'] . "</td>";
                        echo "<td>" . $dash_jual['STATUS'] . "</td>";
                        if ($dash_jual['STATUS'] == 'Lunas') {
                            echo "<td>Tidak Ada Hutang</td>";
                        } else {
                            echo "<td>Rp." . $dash_jual['HUTANG'] . "</td>";
                        }
                        echo '<td>
								<a href="Index.php?page=Proses&Id_Jual=' . $dash_jual['ID_JUAL'] . '" class="btn btn-secondary btn-sm">Edit</a>
								<a href="Control/Delete_Jual.php?Id_Jual=' . $dash_jual['ID_JUAL'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
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