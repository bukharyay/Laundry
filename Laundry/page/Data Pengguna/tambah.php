<div class="mx-auto w-75 justify-content-center">
    <div class="card shadow">
        <h5 class="card-header">Tambah Data Pengguna</h5>
        <div class="card-body">
            <h5 class="card-title" hidden>Silahkan Masukkan Tambah Data!</h5>

            <form method="post" enctype="multipart/form-data">
                <?php if (isset($_GET["msgg"])) { ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        Data Pengguna <strong>Gagal!</strong> disimpan,
                        Email sudah digunakan!
                    </div>
                <?php } ?>
                <div class="form-group">
                    <label for="Email">Email : </label>
                    <input type="email" id="username" class="form-control" name="username" placeholder="example@gmail.com" required>
                </div>
                <div class="form-group">
                    <label for="nama_pengguna">Nama Pengguna : </label>
                    <input type="text" class="form-control" name="nama_user" placeholder="Nama Pengguna..." required>
                </div>
                <div class="form-group">
                    <label for="password">Password : </label>
                    <input type="password" class="form-control" name="password" placeholder="Password..." required>
                </div>
                <div class="form-group">
                    <label for="foto">Foto : </label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="foto" required>
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>

                </div>
                <div class="mt-5 text-center">
                    <a href="?page=Data Pengguna" class="btn btn-secondary"><i class="fas fa-fw fa-chevron-left"></i> Back</a>
                    <button type="submit" name="simpan" class="btn btn-primary">Save <i class="fas fa-fw fa-magic"></i></button>
                </div>
            </form>

        </div>
    </div>

</div>

<?php

if (isset($_POST['simpan'])) {

    $email = $_POST['username'];
    $nama = $_POST['nama_user'];
    $password = $_POST['password'];

    $foto = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    $upload = move_uploaded_file($lokasi, "image/" . $foto);

    $sqlp = $konek->query("SELECT * FROM tb_user WHERE username = '$email'");
    if (mysqli_num_rows($sqlp) > 0) {
?>
        <script type="text/javascript">
            window.location.href = "?page=Data Pengguna&aksi=tambah&msgg";
        </script>
        <?php
    } elseif ($upload) {

        $sql = $konek->query("INSERT INTO tb_user (username, nama_user, password, role, foto)VALUES('$email', '$nama', '$password','karyawan','$foto')");

        // $role = "karyawan";

        // $sql = $konek->query("INSERT INTO tb_user (username, nama_user, password, role)VALUES('$email', '$nama', '$password','$role')");

        if ($sql) {
        ?>
            <script type="text/javascript">
                // alert("Data berhasil di Tambahkan!");
                window.location.href = "?page=Data Pengguna&msg";
            </script>
<?php
        }
    }
}

?>