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
                    Data Laundry <strong>Berhasil!</strong> disimpan.
                </div>
            <?php } ?>
            <?php if (isset($_GET["msgu"])) { ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Data Laundry <strong>Berhasil!</strong> diupdate.
                </div>
            <?php } ?>
            <?php if (isset($_GET["msgh"])) { ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Data Laundry <strong>Berhasil!</strong> dihapus.
                </div>
            <?php } ?>
            <?php if (isset($_GET["msgl"])) { ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Data Laundry <strong>Berhasil!</strong> Lunaskan.
                </div>
            <?php } ?>
            <a href="?page=Transaksi Laundry&aksi=tambah" class="btn btn-info mb-4"><i class="fas fa-fw fa-plus"></i> Tambah</a>
            <div class="table-responsive">
                <table class="table table-bordered DataTable" id="myTable" style="white-space:nowrap;" width="100%" cellspacing="0">

                    <thead align="center">
                        <tr>
                            <th>No</th>
                            <th>Outlet</th>
                            <th>Pelanggan</th>
                            <th>Tanggal Terima</th>
                            <th>Tanggal Selesai</th>
                            <th>Berat</th>
                            <th>Nominal</th>
                            <th>Status</th>
                            <th>Kasir</th>
                            <th>Catatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody align="center">
                        <?php
                        $no = 1;
                        // $data = mysqli_query($konek,"select * from tb_pelanggan");
                        $sql = $konek->query("SELECT * FROM tb_laundry, tb_pelanggan, tb_user, tb_outlet WHERE tb_laundry.kode_pelanggan = tb_pelanggan.kode_pelanggan AND tb_laundry.id_user = tb_user.id_user AND tb_laundry.id_outlet = tb_outlet.id_outlet ORDER BY tanggal_terima ASC");
                        while ($data = $sql->fetch_array()) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['nama_outlet']; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['tanggal_terima']; ?></td>
                                <td><?php echo $data['tanggal_selesai']; ?></td>
                                <td><?php echo $data['jumlah_kiloan'] . "Kg"; ?></td>
                                <td><?php echo "Rp "  . number_format($data['nominal'], 0, '.', '.'); ?></td>
                                <td><?php if ($data['status'] == "Lunas") { ?>
                                        <span class="badge badge-pill badge-success">Lunas</span>
                                    <?php
                                    } elseif ($data['status'] == "Belum Lunas") { ?>
                                        <span class="badge badge-pill badge-warning">Belum Lunas</span>
                                    <?php
                                    } ?></td>
                                <td><?php echo $data['nama_user']; ?></td>
                                <td><?php echo $data['catatan']; ?></td>
                                <td style="text-align: left;">
                                    <a href=" ?page=Transaksi Laundry&aksi=ubah&id=<?php echo $data['id_laundry']; ?>" class="btn btn-warning" title=""><i class="fas fa-fw fa-edit"></i>Ubah</a>
                                    <a onclick="return confirm('Apakah Anda yakin untuk menghapus data ini')" href="?page=Transaksi Laundry&aksi=hapus&id=<?php echo $data['id_laundry']; ?>" class="btn btn-danger" title=""><i class="fas fa-fw fa-trash"></i>Hapus</a>
                                    <?php
                                    if ($data['status'] == "Belum Lunas") {
                                    ?>
                                        <a href=" ?page=Transaksi Laundry&aksi=lunas&id=<?php echo $data['id_laundry']; ?>" class="btn btn-info" title=""><i class="fas fa-fw fa-check-square"></i>Melunaskan</a>
                                    <?php
                                    }
                                    ?>
                                    <a target="blank" href="page/Transaksi Laundry/cetak.php?id=<?php echo $data['id_laundry']; ?>" class="btn btn-secondary" title=""><i class="fas fa-fw fa-print"></i>Cetak</a>

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
    <div class="card">
        <div class="card-body">
            <h4>Keterangan :</h4>
            <hr class="sidebar-divider d-none d-md-block">

            <p>Sudah menyelesaikan Pembayaran = <span class="badge badge-pill badge-success">Lunas</span></p>
            <p>Belum menyelesaikan Pembayaran = <span class="badge badge-pill badge-warning">Belum Lunas</span></p>
            <p>Harga Per Kg = Rp 7000 </p>
        </div>
    </div>