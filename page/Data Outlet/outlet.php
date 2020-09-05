    <!-- DataTales Example -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
        </div>
        <div class="card-body">
            <?php if (isset($_GET["msg"])) { ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Data Outlet <strong>Berhasil!</strong> disimpan.
                </div>
            <?php } ?>
            <?php if (isset($_GET["msgu"])) { ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Data Outlet <strong>Berhasil!</strong> diupdate.
                </div>
            <?php } ?>
            <?php if (isset($_GET["msgh"])) { ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Data Outlet <strong>Berhasil!</strong> dihapus.
                </div>
            <?php } ?>
            <a href="?page=Data Outlet&aksi=tambah" class="btn btn-info mb-4"><i class="fas fa-fw fa-plus"></i> Tambah</a>

            <div class="table-responsive">
                <table class="table table-bordered DataTable" id="myTable" style="white-space:nowrap;" width="100%" cellspacing="0">

                    <thead align="center">
                        <tr>
                            <th>No</th>
                            <th>Logo</th>
                            <th>Outlet</th>
                            <th>Alamat</th>
                            <th>No Telpon</th>
                            <th>Owner</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody align="center">
                        <?php
                        $no = 1;
                        // $data = mysqli_query($konek,"select * from tb_pelanggan");
                        $sql = $konek->query("SELECT * FROM tb_outlet ");
                        while ($data = $sql->fetch_array()) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><img src="image/<?php echo $data['logo_outlet']; ?>" style="width: 50px; height: 50px;" alt="Logo"></td>
                                <td><?php echo $data['nama_outlet']; ?></td>
                                <td><?php echo $data['alamat_outlet']; ?></td>
                                <td><?php echo "+62 " . $data['no_telp_outlet']; ?></td>
                                <td><?php echo $data['owner_outlet']; ?></td>
                                <td>
                                    <a href=" ?page=Data Outlet&aksi=ubah&id=<?php echo $data['id_outlet']; ?>" class="btn btn-warning" title=""><i class="fas fa-fw fa-edit"></i> Ubah</a>
                                    <a onclick="return confirm('Apakah Anda yakin untuk menghapus data ini')" href="?page=Data Outlet&aksi=hapus&id=<?php echo $data['id_outlet']; ?>" class="btn btn-danger" title=""><i class="fas fa-fw fa-trash"></i> Hapus</a>

                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>