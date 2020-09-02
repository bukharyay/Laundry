<?php
$sql = $konek->query("SELECT kode_pelanggan FROM tb_pelanggan ORDER BY kode_pelanggan DESC");
$data = $sql->fetch_array();

$kode_pelanggan = $data['kode_pelanggan'];
$urut = substr($kode_pelanggan, 4, 4);
$tambah = (int) $urut + 1;

if (strlen($tambah) == 1) {
  $format = "PLG-" . "000" . $tambah;
} elseif (strlen($tambah) == 2) {
  $format = "PLG-" . "00" . $tambah;
} elseif (strlen($tambah) == 3) {
  $format = "PLG-" . "0" . $tambah;
} else {
  $format = "PLG-" . $tambah;
}
?>
<div class="mx-auto w-75 justify-content-center">
  <div class="card shadow">
    <h5 class="card-header">Tambah Data Pelanggan</h5>
    <div class="card-body">
      <h5 class="card-title" hidden>Silahkan Masukkan Tambah Data!</h5>

      <form method="post">
        <div class="form-group">
          <label for="kode_pelanggan">Kode Pelanggan : </label>
          <input type="text" class="form-control" value="<?php echo $format ?>" name="kode_pelanggan" readonly>
        </div>
        <div class="form-group">
          <label for="nama">Nama : </label>
          <input type="text" class="form-control" name="nama" required>
        </div>
        <div class="form-group">

          <label for="no_telp">No Telepon : </label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">+62</span>
            </div>
            <input type="text" class="form-control" name="no_telp" required>
          </div>
        </div>
        <div class="form-group">
          <label for="alamat">Alamat : </label>
          <textarea name="alamat" rows="3" class="form-control" required></textarea>
        </div>
        <div class="mt-5 text-center">
          <a href="?page=Data Pelanggan" class="btn btn-secondary"><i class="fas fa-fw fa-chevron-left"></i> Back</a>
          <button type="submit" name="simpan" class="btn btn-primary">Save <i class="fas fa-fw fa-magic"></i></button>
        </div>
      </form>

    </div>
  </div>

</div>

<?php

if (isset($_POST['simpan'])) {

  $kode_p = $_POST['kode_pelanggan'];
  $nama = $_POST['nama'];
  $notelp = $_POST['no_telp'];
  $alamat = $_POST['alamat'];

  $sql = $konek->query("INSERT INTO tb_pelanggan (kode_pelanggan, nama, alamat, no_telp)VALUES('$kode_p', '$nama', '$alamat', '$notelp')");

  if ($sql) {
?>
    <script type="text/javascript">
      // alert("Data berhasil di Tambahkan!");
      window.location.href = "?page=Data Pelanggan&msg";
    </script>
<?php
  }
}

?>