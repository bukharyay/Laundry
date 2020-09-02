<?php
$laundry = $_GET['id'];
$sql = $konek->query("SELECT * FROM tb_laundry WHERE id_laundry='$laundry'");
$data = $sql->fetch_array();
?>
<script type="text/javascript">
    function sum() {
        var jumlah_kiloan = document.getElementById('jumlah_kiloan').value;
        var nominal = parseInt(jumlah_kiloan) * 7000;

        if (!isNaN(nominal)) {
            document.getElementById('nominal').value =
                nominal;

        }
    }
</script>
<div class="mx-auto w-75 justify-content-center">
    <div class="card shadow">
        <h5 class="card-header">Update Data Transaksi Laundry</h5>
        <div class="card-body">
            <h5 class="card-title" hidden>Silahkan Masukkan Update Data!</h5>
            <form method="POST">
                <div class="form-group">
                    <label for="outlet">Outlet : </label>
                    <select class="form-control" name="outlet" required="">
                        <?php
                        $sqlo = $konek->query("SELECT * FROM tb_outlet");
                        foreach ($sqlo as $option) {
                            if ($data['id_outlet'] == $option['id_outlet']) {
                                echo "<option value='$option[id_outlet]' selected>$option[nama_outlet]</option>";
                            } else {
                                echo "<option value='$option[id_outlet]'>$option[nama_outlet]</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pelanggan">Pelanggan : </label>
                    <select class="form-control" name="pelanggan" required="">
                        <?php
                        $sqlp = $konek->query("SELECT * FROM tb_pelanggan");
                        // while ($row = $sqlp->fetch_array()) {
                        // }
                        foreach ($sqlp as $option) {
                            if ($data['kode_pelanggan'] == $option['kode_pelanggan']) {
                                echo "<option value='$option[kode_pelanggan]' selected>$option[nama]</option>";
                            } else {
                                echo "<option value='$option[kode_pelanggan]'>$option[nama]</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal terima">Tanggal Terima : </label>
                    <input type="date" class="form-control" name="tgl_terima" value="<?php echo $data['tanggal_terima']; ?>">
                </div>
                <div class="form-group">
                    <label for="tanggal selesai">Tanggal Selesai : </label>
                    <input type="date" class="form-control" name="tgl_selesai" value="<?php echo $data['tanggal_selesai']; ?>">
                </div>
                <div class="form-group">
                    <label for="jumlah kiloan">Jumlah Kiloan : </label>
                    <div class="input-group">
                        <input type="text" class="form-control number" name="jml_kiloan" onkeyup="sum();" id="jumlah_kiloan" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required="" value="<?php echo $data['jumlah_kiloan']; ?>">
                        <div class="input-group-append">
                            <span class="input-group-text">KG</span>
                        </div>
                    </div>
                    <small class="form-text text-muted">Input berat yang sesuai</small>

                </div>
                <div class="form-group">
                    <label for="nominal">Nominal : </label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" class="form-control" name="total" id="nominal" readonly="" value="<?php echo $data['nominal']; ?>">
                        <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="status">Status : </label>
                    <select class="form-control" name="status" required="">

                        <option value="Lunas" <?php if ($data['status'] == "Lunas") {
                                                    echo "SELECTED";
                                                } ?>>Lunas</option>
                        <option value="Belum Lunas" <?php if ($data['status'] == "Belum Lunas") {
                                                        echo "SELECTED";
                                                    } ?>>Belum Lunas</option>

                    </select>
                </div>
                <div class="form-group">
                    <label for="catatan">Catatan : </label>
                    <textarea name="catatan" rows="3" class="form-control"><?php echo $data['catatan'] ?></textarea>
                </div>
                <div class="mt-5 text-center">
                    <a href="?page=Transaksi Laundry" class="btn btn-secondary"><i class="fas fa-fw fa-chevron-left"></i> Back</a>
                    <button type="submit" name="simpan" class="btn btn-primary">Update <i class="fas fa-fw fa-magic"></i></button>
                </div>
            </form>

        </div>
    </div>

</div>

<?php

if (isset($_POST['simpan'])) {

    $outlet = $_POST['outlet'];
    $pelanggan = $_POST['pelanggan'];
    $tgl_terima = $_POST['tgl_terima'];
    $tgl_selesai = $_POST['tgl_selesai'];
    $jml_kiloan = $_POST['jml_kiloan'];
    $nominal = $_POST['total'];
    $status = $_POST['status'];
    $catatan = $_POST['catatan'];
    // $id_user = $_POST['id_user'];


    $sql = $konek->query("UPDATE `tb_laundry` SET kode_pelanggan='$pelanggan', id_user='$id_user', id_outlet='$outlet', tanggal_terima='$tgl_terima', tanggal_selesai='$tgl_selesai', jumlah_kiloan='$jml_kiloan', nominal='$nominal', status='$status', catatan='$catatan' WHERE id_laundry='$laundry'");

    if ($sql) {
?>
        <script type="text/javascript">
            // alert("Data berhasil di Tambahkan!");
            window.location.href = "?page=Transaksi Laundry&msgu";
        </script>
<?php
    }
}

?>