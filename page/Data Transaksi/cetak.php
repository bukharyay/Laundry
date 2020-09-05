<?php include "../../include/koneksi.php";
error_reporting(E_ALL * (E_NOTICE | E_WARNING)); ?>
<?php
$id = $_GET['id'];
$sql = $konek->query("SELECT * FROM tb_transaksi JOIN tb_outlet ON tb_transaksi.id_outlet = tb_outlet.id_outlet JOIN tb_user ON tb_transaksi.id_user = tb_user.id_user WHERE tb_transaksi.id_outlet = '$id' ORDER BY tgl_transaksi ASC");
$sql2 = $konek->query("SELECT * FROM tb_transaksi JOIN tb_outlet ON tb_transaksi.id_outlet = tb_outlet.id_outlet JOIN tb_user ON tb_transaksi.id_user = tb_user.id_user WHERE tb_transaksi.id_outlet = '$id' ORDER BY tgl_transaksi ASC");
// $sql = $konek->query("SELECT * FROM tb_transaksi WHERE id_outlet='$id'");

?>
<html>

<head>
    <link rel="icon" type="image/png" href="../../image/clean3.png" />
    <title>Cetak</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap-grid.css">

    <!-- Font CSS -->
    <link rel="stylesheet" href="../../assets/css/font.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="../../assets/DataTables-1.10.21/css/dataTables.bootstrap4.css">
</head>
<style type="text/css">
    @font-face {
        font-family: Poppins-Regular;
        src: url(../../fonts/poppins/Poppins-Regular.ttf)
    }

    @font-face {
        font-family: Poppins-Bold;
        src: url(../../fonts/poppins/Poppins-Bold.ttf)
    }

    @font-face {
        font-family: Poppins-Medium;
        src: url(../../fonts/poppins/Poppins-Medium.ttf)
    }

    @font-face {
        font-family: Montserrat-Bold;
        src: url(../../fonts/montserrat/Montserrat-Bold.ttf)
    }

    * {
        font-family: Poppins-Regular;

    }

    a {
        font-family: Poppins-Regular;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: Poppins-Medium;
    }
</style>

<script src="../../assets/DataTables-1.10.21/js/dataTables.bootstrap4.js"></script>
<script>
    window.print();
    window.onfocus = function() {
        window.close();
    }
</script>

<body onload="windows.print()">
    <div class="container mt-5">
        <div class="card shadow mb-4">
            <!-- <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
            </div> -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered DataTable" id="myTable" style="white-space:nowrap;" width="100%" cellspacing="0">
                        <div class="mb-4" style="text-align: center;">
                            <h4>Laporan Transaksi Pemasukan dan Pengeluaran</h4>
                            <?php
                            $data2 = $sql2->fetch_array();
                            ?>
                            <h5 class="mt-3">Outlet <?= $data2['nama_outlet']; ?></h5>
                            <img src="../../image/<?= $data2['logo_outlet']; ?>" style="width: 100px; " alt="Logo">
                        </div>
                        <thead align="center">
                            <tr>
                                <th>No</th>
                                <th>Tanggal Transaksi</th>
                                <th>Kasir</th>
                                <th>Catatan</th>
                                <th>Keterangan</th>
                                <th>Pemasukan</th>
                                <th>Pengeluaran</th>
                            </tr>
                        </thead>
                        <tbody align="center">

                            <?php

                            $no = 1;
                            // $sql = $konek->query("SELECT * FROM tb_transaksi, tb_user WHERE tb_transaksi.id_user = tb_user.id_user ");
                            while ($data = $sql->fetch_array()) {
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['tgl_transaksi']; ?></td>
                                    <td><?php echo $data['nama_user']; ?></td>
                                    <td><?php echo $data['catatan']; ?></td>
                                    <td><?php echo $data['keterangan']; ?></td>
                                    <td><?php echo "Rp " . number_format($data['pemasukan'], 0, '.', '.'); ?></td>
                                    <td><?php echo "Rp " . number_format($data['pengeluaran'], 0, '.', '.'); ?></td>

                                </tr>
                            <?php
                                $masuk = $masuk + $data['pemasukan'];
                                $keluar = $keluar + $data['pengeluaran'];
                                $saldo = $masuk - $keluar;
                            }
                            ?>

                        </tbody>
                        <tr align="center">
                            <th colspan="5" style="text-align:right;">
                                Total Pemasukan dan Pengeluaran
                            </th>
                            <td><?php echo "Rp "  . number_format($masuk, 0, '.', '.'); ?></td>
                            <td><?php echo "Rp "  . number_format($keluar, 0, '.', '.'); ?></td>

                        </tr>
                        <tr align="center">
                            <th colspan="5" style="text-align:right;">
                                Total Saldo Akhir
                            </th>
                            <td colspan="2"><?php echo "Rp " . number_format($saldo, 0, '.', '.'); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>