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
                    Pengeluaran Data Transaksi <strong>Berhasil!</strong> disimpan.
                </div>
            <?php } ?>
            <a href="?page=Data Transaksi&aksi=tambah" class="btn btn-danger mb-4"><i class="fas fa-fw fa-plus"></i> Pengeluaran</a>
            <?php
            if (isset($_POST['outlet'])) {
                $outlet = trim($_POST['outlet']);
                $sqloutlet = $konek->query("SELECT * FROM tb_transaksi WHERE id_outlet = '$outlet' ORDER BY tgl_transaksi ASC");
            } else {
                $sqloutlet = $konek->query("SELECT * FROM tb_transaksi WHERE id_outlet = '0' ORDER BY tgl_transaksi ASC");
            }

            $dataq = $sqloutlet->fetch_array(); {

            ?>
                <a target="blank" href="page/Data Transaksi/cetak.php?id=<?php echo $dataq['id_outlet']; ?>" class="btn btn-secondary mb-4" title=""><i class="fas fa-fw fa-print"></i> Cetak</a>
            <?php
            }
            ?>
            <!-- <a href=" ?page=Data Pengguna&aksi=ubah&id=<?php echo $data['id_user']; ?>" class="btn btn-success" title=""><i class="fas fa-fw fa-edit"></i> Ubah</a> -->

            <form action="" method="POST">
                <!-- <form method="POST"> -->
                <div class="form-group">
                    <label for="sel1">Select Outlet:</label>

                    <select class="form-control" name="outlet">
                        <option value="">-Pilih-</option>

                        <?php
                        //Perintah sql untuk menampilkan semua data pada tabel outlet
                        $sqloutlet = $konek->query("SELECT * FROM tb_outlet");
                        $no = 0;
                        while ($dataoutlet = $sqloutlet->fetch_array()) {
                            $no++;
                            $ket = "";
                            if (isset($_POST['outlet'])) {
                                $outlet = trim($_POST['outlet']);

                                if ($outlet == $dataoutlet['id_outlet']) {
                                    $ket = "selected";
                                }
                            }
                        ?>
                            <option <?= $ket; ?> value="<?= $dataoutlet['id_outlet']; ?>"><?= $dataoutlet['nama_outlet']; ?></option>
                        <?php
                            // var_dump($_SERVER["PHP_SELF"]);
                            // die;
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-warning mb-4"><i class="fas fa-fw fa-sync-alt"></i> Refresh</button>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered DataTable" id="myTable" style="white-space:nowrap;" width="100%" cellspacing="0">

                    <thead align="center">
                        <tr>
                            <th>No</th>
                            <th>Tanggal Transaksi</th>
                            <th>Outlet</th>
                            <th>Kasir</th>
                            <th>Catatan</th>
                            <th>Keterangan</th>
                            <th>Pemasukan</th>
                            <th>Pengeluaran</th>
                        </tr>
                    </thead>
                    <?php
                    if (isset($_POST['outlet'])) {
                        $outlet = trim($_POST['outlet']);
                        $sqltransaksi = $konek->query("SELECT * FROM tb_transaksi JOIN tb_outlet ON tb_transaksi.id_outlet = tb_outlet.id_outlet JOIN tb_user ON tb_transaksi.id_user = tb_user.id_user WHERE tb_transaksi.id_outlet = '$outlet' ORDER BY tgl_transaksi ASC");
                        // $sqltransaksi = $konek->query("SELECT * FROM tb_transaksi WHERE id_outlet = '$outlet' ORDER BY tgl_transaksi ASC");
                    } else {
                        // $sqltransaksi = $konek->query("SELECT * FROM tb_transaksi JOIN tb_outlet ON tb_transaksi.id_outlet = tb_outlet.id_outlet JOIN tb_user ON tb_transaksi.id_user = tb_user.id_user ORDER BY tgl_transaksi ASC");
                        $sqltransaksi = $konek->query("SELECT * FROM tb_transaksi JOIN tb_outlet ON tb_transaksi.id_outlet = tb_outlet.id_outlet JOIN tb_user ON tb_transaksi.id_user = tb_user.id_user WHERE tb_transaksi.id_outlet = '0' ORDER BY tgl_transaksi ASC");
                        // $sqltransaksi = $konek->query("SELECT * FROM tb_transaksi ORDER BY tgl_transaksi ASC");
                    }

                    $no = 0;
                    while ($data = $sqltransaksi->fetch_array()) {
                        $no++;

                    ?>
                        <tbody align="center">
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['tgl_transaksi']; ?></td>
                                <td><?php echo $data['nama_outlet']; ?></td>
                                <td><?php echo $data['nama_user']; ?></td>
                                <td><?php echo $data['catatan']; ?></td>
                                <!-- <td><?php echo $data['keterangan']; ?></td> -->
                                <td><?php if ($data['keterangan'] == "Pemasukan") { ?>
                                        <span class="badge badge-success">Pemasukan</span>
                                    <?php
                                    } elseif ($data['keterangan'] == "Pengeluaran") { ?>
                                        <span class="badge badge-danger">Pengeluaran</span>
                                    <?php
                                    } ?></td>
                                <td><?php echo "Rp " . number_format($data['pemasukan'], 0, '.', '.'); ?></td>
                                <td><?php echo "Rp " . number_format($data['pengeluaran'], 0, '.', '.'); ?></td>
                                </td>
                            </tr>
                        <?php
                        $masuk = $masuk + $data['pemasukan'];
                        $keluar = $keluar + $data['pengeluaran'];
                        $saldo = $masuk - $keluar;
                    }
                        ?>
                        </tbody>
                        <tr align="center">
                            <th colspan="6" style="text-align:right;">
                                Total Pemasukan dan Pengeluaran
                            </th>
                            <td><?php echo "Rp "  . number_format($masuk, 0, '.', '.'); ?></td>
                            <td><?php echo "Rp "  . number_format($keluar, 0, '.', '.'); ?></td>
                        </tr>
                        <tr align="center">
                            <th colspan="6" style="text-align:right;">
                                Total Saldo Akhir
                            </th>
                            <td colspan="2"><?php echo "Rp "  . number_format($saldo, 0, '.', '.'); ?></td>
                        </tr>
                </table>
            </div>
        </div>
    </div>