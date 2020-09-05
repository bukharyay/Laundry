<?php
$id = $_GET['id'];
$sql = $konek->query("SELECT * FROM tb_user WHERE id_user='$id'");
$data = $sql->fetch_array();
?>
<div class="mx-auto w-75 justify-content-center">
    <div class="card shadow">
        <h5 class="card-header"><?= $title ?></h5>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group" hidden>
                    <label for="kode_pelanggan">ID Pengguna : </label>
                    <input type="text" class="form-control" value="<?php echo $data['id_user']; ?>" name="id_user" readonly>
                </div>
                <div class="form-group">
                    <label for="Email">Email : </label>
                    <input type="text" class="form-control" value="<?php echo $data['username']; ?>" name="username">
                </div>
                <div class="form-group">
                    <label for="nama_pengguna">Nama Pengguna : </label>
                    <input type="text" class="form-control" value="<?php echo $data['nama_user']; ?>" name="nama_user">
                </div>
                <div class="form-group">
                    <label for="password">Password : </label>
                    <input type="text" class="form-control" value="<?php echo $data['password']; ?>" name="password">
                </div>
                <div class="form-group">
                    <label for="Foto">Foto : </label><br>
                    <div class="text-center">
                        <img src="image/<?php echo $data['foto']; ?>" width="250px" height="250px" alt="Pic">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Ganti Foto">Ganti Foto : </label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="foto">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>

                </div>
                <div class="mt-5 text-center">
                    <a href="?page=Dashboard" class="btn btn-secondary"><i class="fas fa-fw fa-chevron-left"></i> Back</a>
                    <button type="submit" name="simpan" class="btn btn-primary">Update <i class="fas fa-fw fa-magic"></i></button>
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
    $role = $_POST['role'];
    $foto = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];




    if (!empty($lokasi)) {
        move_uploaded_file($lokasi, "image/" . $foto);
        $sql = $konek->query("UPDATE tb_user SET username='$email', nama_user='$nama', password='$password', foto='$foto', role='$role' WHERE id_user='$id'");



        if ($sql) {
?>
            <script type="text/javascript">
                window.location.href = "?page=Data Pengguna&msgu";
            </script>
        <?php
        }
    } else {
        $sql = $konek->query("UPDATE tb_user SET username='$email', nama_user='$nama', password='$password', role='$role' WHERE id_user='$id'");



        if ($sql) {
        ?>
            <script type="text/javascript">
                // alert("Data berhasil di Tambahkan!");
                window.location.href = "?page=Data Pengguna&msgu";
            </script>
<?php
        }
    }
}

?>