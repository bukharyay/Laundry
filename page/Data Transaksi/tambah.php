<div class="mx-auto w-75 justify-content-center">
    <div class="card shadow">
        <h5 class="card-header">Pengeluaran Data Transaksi</h5>
        <div class="card-body">
            <h5 class="card-title" hidden>Silahkan Masukkan Pengeluaran Data!</h5>

            <form method="POST">
                <div class="form-group">
                    <label for="outlet">Outlet : </label>
                    <select class="form-control" name="id_outlet" required>
                        <option value="">- Pilih Outlet -</option>
                        <?php
                        $sql = $konek->query("SELECT * FROM tb_outlet");
                        while ($data = $sql->fetch_array()) {
                            echo "<option value='$data[id_outlet]'>$data[nama_outlet]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal terima">Tanggal Transaksi : </label>
                    <input type="date" class="form-control" name="tgl_transaksi" required>
                </div>

                <div class="form-group">
                    <label for="nominal">Nominal : </label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" class="form-control" name="pengeluaran" required>
                        <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="catatan">Catatan : </label>
                    <textarea name="catatan" rows="3" class="form-control" required></textarea>
                </div>
                <div class="mt-5 text-center">
                    <a href="?page=Data Transaksi" class="btn btn-secondary"><i class="fas fa-fw fa-chevron-left"></i> Back</a>
                    <button type="submit" name="simpan" class="btn btn-primary">Save <i class="fas fa-fw fa-magic"></i></button>
                </div>
            </form>

        </div>
    </div>

</div>

<?php

if (isset($_POST['simpan'])) {

    $idoutlet = $_POST['id_outlet'];
    $tgl_transaksi = $_POST['tgl_transaksi'];
    $pengeluaran = $_POST['pengeluaran'];
    $catatan = $_POST['catatan'];

    $sql = $konek->query("INSERT INTO `tb_transaksi` (`id_transaksi`, `id_user`, `id_outlet`, `tgl_transaksi`, `pengeluaran`, `keterangan`, `catatan`) VALUES (NULL, '$id_user', '$idoutlet', '$tgl_transaksi', '$pengeluaran', 'Pengeluaran' ,'$catatan')");

    if ($sql) {
?>
        <script type="text/javascript">
            // alert("Data berhasil di Tambahkan!");
            window.location.href = "?page=Data Transaksi&msg";
        </script>
<?php
    }
}
?>