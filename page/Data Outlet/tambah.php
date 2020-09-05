<div class="mx-auto w-75 justify-content-center">
    <div class="card shadow">
        <h5 class="card-header">Tambah Data Outlet</h5>
        <div class="card-body">
            <h5 class="card-title" hidden>Silahkan Masukkan Tambah Data!</h5>

            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="Logo Outlet">Logo Outlet : </label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="logo_outlet" required>
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>

                </div>
                <div class="form-group">
                    <label for="Outlet">Nama Outlet : </label>
                    <input type="text" class="form-control" name="nama_outlet" placeholder="Nama Outlet..." required>
                </div>
                <div class="form-group">
                    <label for="Alamat Outlet">Alamat Outlet : </label>
                    <textarea name="alamat_outlet" rows="3" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="No Telpon Outlet">No Telpon Outlet : </label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">+62</span>
                        </div>
                        <input maxlength="15" type="text" class="form-control" name="no_telp_outlet" placeholder="No Telepon Outlet..." required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Owner">Owner : </label>
                    <input type="text" class="form-control" name="owner_outlet" placeholder="Nama Owner..." required>
                </div>

                <div class="mt-5 text-center">
                    <a href="?page=Data Outlet" class="btn btn-secondary"><i class="fas fa-fw fa-chevron-left"></i> Back</a>
                    <button type="submit" name="simpan" class="btn btn-primary">Save <i class="fas fa-fw fa-magic"></i></button>
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
    $upload = move_uploaded_file($lokasi, "image/" . $foto);

    if ($upload) {

        $sql = $konek->query("INSERT INTO tb_outlet (nama_outlet, alamat_outlet, no_telp_outlet, logo_outlet, owner_outlet)VALUES('$nama', '$alamat', '$notelp','$foto','$owner')");



        if ($sql) {
?>
            <script type="text/javascript">
                // alert("Data berhasil di Tambahkan!");
                window.location.href = "?page=Data Outlet&msg";
            </script>
<?php
        }
    }
}

?>