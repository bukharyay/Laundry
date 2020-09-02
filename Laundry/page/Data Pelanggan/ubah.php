<?php
$kode = $_GET['id'];
$sql = $konek->query("SELECT * FROM tb_pelanggan WHERE kode_pelanggan='$kode'");
$data = $sql->fetch_array();
?>
<div class="mx-auto w-75 justify-content-center">
    <div class="card shadow">
        <h5 class="card-header">Ubah Data Pelanggan</h5>
        <div class="card-body">
            <h5 class="card-title" hidden>Silahkan Ubah Data!</h5>

            <form method="post">
                <div class="form-group">
                    <label for="kode_pelanggan">Kode Pelanggan : </label>
                    <input type="text" class="form-control" value="<?php echo $data['kode_pelanggan']; ?>" name="kode_pelanggan" readonly>
                </div>
                <div class="form-group">
                    <label for="nama">Nama : </label>
                    <input type="text" class="form-control" value="<?php echo $data['nama']; ?>" name="nama">
                </div>
                <div class="form-group">
                    <label for="no_telp">No Telepon : </label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">+62</span>
                        </div>
                        <input type="text" class="form-control" value="<?php echo $data['no_telp']; ?>" name="no_telp">
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat : </label>
                    <textarea name="alamat" rows="3" class="form-control"><?php echo $data['alamat']; ?></textarea>
                </div>
                <div class="mt-5 text-center">
                    <a href="?page=Data Pelanggan" class="btn btn-secondary"><i class="fas fa-fw fa-chevron-left"></i> Back</a>
                    <button type="submit" name="simpan" class="btn btn-primary">Update <i class="fas fa-fw fa-magic"></i></button>
                </div>
            </form>

        </div>
    </div>

</div>

<?php

if (isset($_POST['simpan'])) {

    $nama = $_POST['nama'];
    $notelp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];

    $sql = $konek->query("UPDATE tb_pelanggan SET nama='$nama', no_telp='$notelp', alamat='$alamat' WHERE kode_pelanggan='$kode'");

    if ($sql) {
?>
        <script type="text/javascript">
            window.location.href = "?page=Data Pelanggan&msgu";
        </script>
<?php
    }
}

?>