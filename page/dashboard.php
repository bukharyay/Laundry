<div class="container">
    <h1 style="text-align: center;"><?= $title ?></h1>
    <div class="col d-flex justify-content-center">
        <div class="card shadow mb-3" style="width:400px; border-radius: 40px;">
            <div class="row no-gutters">
                <div class="container mt-3 text-center">
                    <img class="card-img-top img-fluid rounded-circle " style="padding: 10%; height: 20rem; width: 20rem;" src="image/<?php echo $data_user['foto']; ?> " alt="Image Profile">
                </div>
                <div class="container">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?php echo $data_user['nama_user']; ?></h5>
                        <p class="card-text text-muted"><?php echo $data_user['username']; ?></p>
                        <!-- <p class="card-text">Role : <?php echo $data_user['role']; ?></p> -->
                        <p class="card-text"><?php if ($data_user['role'] == "admin") { ?>
                                <span class="btn" style="font-size: 15px; border-radius: 20px;">
                                    <i class="fa fa-fw fa-user-cog" style="font-size: 25px;"></i><br>
                                    Admin
                                </span>
                            <?php } elseif ($data_user['role'] == "karyawan") { ?>
                                <span class="btn" style="font-size: 15px; border-radius: 20px;">
                                    <i class="fa fa-fw fa-user-tie" style="font-size: 25px;"></i><br>
                                    Karyawan
                                </span>
                            <?php } elseif ($data_user['role'] == "owner") { ?>
                                <span class="btn" style="font-size: 15px; border-radius: 20px;">
                                    <i class="fa fa-fw fa-user-astronaut" style="font-size: 25px;"></i><br>
                                    Owner
                                </span>
                            <?php } ?>
                        </p>
                        <?php if ($_SESSION['admin'] || $_SESSION['karyawan']) { ?>
                            <a href="?page=Data Pelanggan&aksi=tambah" class="btn btn-outline-primary mb-4">Input Data Pelanggan</a>
                        <?php } ?>
                        <a href=" ?page=Data Profile&id=<?php echo $data_user['id_user']; ?>" class="btn btn-outline-success  mb-4" title=""><i class="fas fa-fw fa-edit"></i> Ubah Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>