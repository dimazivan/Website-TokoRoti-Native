<?php include('Koneksi.php'); ?>

<div class="container" style="margin-top:20px">
    <center>
        <font size="6">Proses Data</font>
    </center>

    <hr>

    <?php
    if (isset($_GET['Id_Jual'])) {
        $Id_Jual = $_GET['Id_Jual'];

        $select = mysqli_query($conn, "SELECT * FROM Penjualan WHERE Id_Jual='$Id_Jual'") or die(mysqli_error($conn));

        if (mysqli_num_rows($select) == 0) {
            echo '<div class="alert alert-warning">Id Jual tidak ditemukan.</div>';
            exit();
        } else {
            $data = mysqli_fetch_assoc($select);
            $nama_produk = $data['Nama_Produk'];
        }
    }
    ?>

    <?php
    //jika tombol simpan di tekan/klik
    if (isset($_POST['submit'])) {
        $Status         = 'Selesai';
        $Nama_Pelanggan = $_POST['Nama_Pelanggan'];
        $Nama_Produk    = $_POST['Nama_Produk'];
        $Jumlah_Beli    = $_POST['Jumlah_Beli'];
        // Bahan
        $resep = mysqli_query($conn, "select Telur, Terigu, Tepung, Mentega from resep a join produk b on a.id_produk = b.id_produk where nama_produk ='$Nama_Produk'") or die(mysqli_error($conn));
        $rincian = mysqli_fetch_assoc($resep);
        $reseptelur = $rincian['Telur'];
        $resepterigu = $rincian['Terigu'];
        $reseptepung = $rincian['Tepung'];
        $resepmentega = $rincian['Mentega'];

        // Ambil Stock
        $egg = mysqli_query($conn, "Select jumlah_stock as telur from inventory where id_bahan='B0009'") or die(mysqli_error($conn));
        $data = mysqli_fetch_array($egg);
        $awaltelur = $data['telur'];
        $wheat = mysqli_query($conn, "Select jumlah_stock as terigu from inventory where id_bahan='B0002'") or die(mysqli_error($conn));
        $data1 = mysqli_fetch_array($wheat);
        $awalterigu = $data1['terigu'];
        $flour = mysqli_query($conn, "Select jumlah_stock as tepung from inventory where id_bahan='B0005'") or die(mysqli_error($conn));
        $data2 = mysqli_fetch_array($flour);
        $awaltepung = $data2['tepung'];
        $margarin = mysqli_query($conn, "Select jumlah_stock as mentega from inventory where id_bahan='B0010'") or die(mysqli_error($conn));
        $data3 = mysqli_fetch_array($margarin);
        $awalmentega = $data3['mentega'];
        
        // Pengurangan Stock
        $sisatelur = $awaltelur - ($reseptelur * $Jumlah_Beli);
        $sisaterigu = $awalterigu - ($resepterigu * $Jumlah_Beli);
        $sisatepung = $awaltepung - ($reseptepung * $Jumlah_Beli);
        $sisamentega = $awalmentega - ($resepmentega * $Jumlah_Beli);

        $sql = mysqli_query($conn, "UPDATE Penjualan SET Status='$Status' WHERE Id_Jual='$Id_Jual'") or die(mysqli_error($conn));
        if ($sql) {
            echo '<script>alert("Berhasil Merubah Data.");</script>';
            $terigu = mysqli_query($conn, "UPDATE Inventory SET Jumlah_Stock='$sisaterigu' WHERE Id_Bahan= 'B0002'") or die(mysqli_error($conn));
            $tepung = mysqli_query($conn, "UPDATE Inventory SET Jumlah_Stock='$sisatepung' WHERE Id_Bahan= 'B0005'") or die(mysqli_error($conn));
            $telur = mysqli_query($conn, "UPDATE Inventory SET Jumlah_Stock='$sisatelur' WHERE Id_Bahan= 'B0009'") or die(mysqli_error($conn));
            $mentega = mysqli_query($conn, "UPDATE Inventory SET Jumlah_Stock='$sisamentega' WHERE Id_Bahan= 'B0010'") or die(mysqli_error($conn));
            if ($telur) {
                echo '<script>alert("Berhasil Mengurangi Stock."); document.location="Index.php?page=Tampil_Jual";</script>';
            } else {
                echo '<script>alert("Gagal Mengurangi Stock."); document.location="Index.php?page=Tampil_Jual";</script>';
            }
        } else {
            echo '<div class="alert alert-warning">Gagal Memproses Data.</div>';
        }
    } else if (isset($_POST['tolak'])) {
        $Status        = 'Ditolak';
        $Nama_Pelanggan = $_POST['Nama_Pelanggan'];
        $Nama_Produk    = $_POST['Nama_Produk'];
        $Jumlah_Beli    = $_POST['Jumlah_Beli'];


        $sql = mysqli_query($conn, "UPDATE Penjualan SET Status='$Status' WHERE Id_Jual='$Id_Jual'") or die(mysqli_error($conn));

        if ($sql) {
            echo '<script>alert("Berhasil Merubah Data."); document.location="Index.php?page=Tampil_Jual";</script>';
        } else {
            echo '<div class="alert alert-warning">Gagal Memproses Data.</div>';
        }
    }
    ?>

    <form action="Index.php?page=Proses&Id_Jual=<?php echo $Id_Jual; ?>" method="post">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Id_Jual</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="Id_Jual" class="form-control" size="4" value="<?php echo $data['Id_Jual']; ?>" readonly required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Pelanggan</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="Nama_Pelanggan" class="form-control" value="<?php echo $data['Nama_Pelanggan']; ?>" readonly required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Kue</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="Nama_Produk" class="form-control" value="<?php echo $data['Nama_Produk']; ?>" readonly required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Jumlah Beli</label>
            <div class="col-md-6 col-sm-6">
                <input type="number" name="Jumlah_Beli" class="form-control" value="<?php echo $data['Jumlah_Beli']; ?>" readonly required>
            </div>
        </div>
        <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-3">
                <input type="submit" name="submit" class="btn btn-primary" value="Proses">
                <input type="submit" name="tolak" class="btn btn-primary" value="Tolak">
                <a href="Index.php?page=Tampil_Jual" class="btn btn-warning">Batalkan</a>
            </div>
        </div>
    </form>
</div>