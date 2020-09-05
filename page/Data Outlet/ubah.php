<?php
$outlet = $_GET['id'];
$sql = $konek->query("SELECT * FROM tb_outlet WHERE id_outlet='$outlet'");
$data = $sql->fetch_array();
?>
<div class="mx-auto w-75 justify-content-center">
    <div class="card shadow">
        <h5 class="card-header">Update Data Outlet</h5>
        <div class="card-body">
            <h5 class="card-title" hidden>Silahkan Masukkan Update Data!</h5>

            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="Foto">Logo Outlet : </label><br>
                    <div class="text-center">
                        <img src="image/<?php echo $data['logo_outlet']; ?>" width="250px" height="250px" alt="Pic">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Logo Outlet">Ganti Logo Outlet : </label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="logo_outlet">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <small class="form-text text-muted">Format PNG / JPG</small>

                </div>
                <div class="form-group">
                    <label for="Outlet">Nama Outlet : </label>
                    <input type="text" class="form-control" name="nama_outlet" placeholder="Nama Outlet..." value="<?php echo $data['nama_outlet']; ?>">
                </div>
                <div class="form-group">
                    <label for="Alamat Outlet">Alamat Outlet : </label>
                    <textarea name="alamat_outlet" rows="3" class="form-control"><?php echo $data['alamat_outlet']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="No Telpon Outlet">No Telpon Outlet : </label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">+62</span>
                        </div>
                        <input maxlength="15" type="text" class="form-control" name="no_telp_outlet" placeholder="No Telepon Outlet..." value="<?php echo $data['no_telp_outlet']; ?>">
                    </div>
                </div>
                <div class=" form-group">
                    <label for="Owner">Owner : </label>
                    <input type="text" class="form-control" name="owner_outlet" placeholder="Nama Owner..." value="<?php echo $data['owner_outlet']; ?>">
                </div>
                <div class="mt-5 text-center">
                    <a href=" ?page=Data Outlet" class="btn btn-secondary"><i class="fas fa-fw fa-chevron-left"></i> Back</a>
                    <button type="submit" name="simpan" class="btn btn-primary">Update <i class="fas fa-fw fa-magic"></i></button>
                </div>
            </form>

        </div>
    </div>

</div>

<?php

if (isset($_POST['simpan'])) {

    $nama = $_POST['nama_outlet'];
    $alamat = $_POST['alamat_outlet'];
    $notelp = $_POST['no_telp_outlet'];
    $owner = $_POST['owner_outlet'];

    $foto = $_FILES['logo_outlet']['name'];
    $lokasi = $_FILES['logo_outlet']['tmp_name'];


    if (!empty($lokasi)) {
        move_uploaded_file($lokasi, "image/" . $foto);
        $sql = $konek->query("UPDATE tb_outlet SET nama_outlet='$nama', alamat_outlet='$alamat', no_telp_outlet='$notelp', logo_outlet='$foto', owner_outlet='$owner' WHERE id_outlet='$outlet'");

        if ($sql) {
?>
            <script type="text/javascript">
                window.location.href = "?page=Data Outlet&msgu";
            </script>
        <?php
        }
    } else {
        $sql2 = $konek->query("UPDATE tb_outlet SET nama_outlet='$nama', alamat_outlet='$alamat', no_telp_outlet='$notelp', owner_outlet='$owner' WHERE id_outlet='$outlet'");

        if ($sql2) {
        ?>
            <script type="text/javascript">
                window.location.href = "?page=Data Outlet&msgu";
            </script>
<?php
        }
    }
}

?>