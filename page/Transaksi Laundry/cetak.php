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

<script>
    window.print();
    window.onfocus = function() {
        window.close();
    }
</script>
<?php
include "../../include/koneksi.php";
$id = $_GET['id'];
$sql = $konek->query("SELECT * FROM tb_laundry, tb_pelanggan, tb_user, tb_outlet WHERE id_laundry='$id' AND tb_laundry.kode_pelanggan = tb_pelanggan.kode_pelanggan AND tb_laundry.id_user = tb_user.id_user AND tb_laundry.id_outlet = tb_outlet.id_outlet");
$data = $sql->fetch_assoc();

?>

<body onload="window.print()">
    <div class="container mt-5">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="DataTable" id="myTable" style="white-space:nowrap;" width="100%" cellspacing="0">
                        <div class="mb-5 mt-3" style="text-align: center;">
                            <h4>Data Transaksi Laundry</h4>
                        </div>
                        <tbody>
                            <tr>
                                <td><?= $data['nama_outlet']; ?></td>
                            </tr>
                            <tr>
                                <td><?= $data['alamat']; ?></td>
                            </tr>
                            <tr>
                                <td><?= $data['no_telp_outlet']; ?></td>
                            </tr>

                        </tbody>
                    </table>
                </div>



                <div class="card-body">
                    <div class="table-responsive">
                        <table class="" id="myTable" style="white-space:nowrap;" width="100%" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td>Tanggal Terima</td>
                                    <td>:</td>
                                    <td><?php echo $data['tanggal_terima']; ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Selesai</td>
                                    <td>:</td>
                                    <td><?php echo $data['tanggal_selesai']; ?></td>
                                </tr>
                                <tr>
                                    <td>Kasir</td>
                                    <td>:</td>
                                    <td><?php echo $data['nama_user']; ?></td>
                                </tr>
                                <tr>
                                    <td>Pelanggan</td>
                                    <td>:</td>
                                    <td><?php echo $data['nama']; ?></td>
                                </tr>
                                <tr>
                                    <td>Catatan</td>
                                    <td>:</td>
                                    <td><?php echo $data['catatan']; ?></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Kiloan</td>
                                    <td>:</td>
                                    <td><?php echo $data['jumlah_kiloan'] . "Kg"; ?></td>
                                </tr>
                                <tr>
                                    <td>Total Harga</td>
                                    <td>:</td>
                                    <td><?php echo "Rp "  . number_format($data['nominal'], 2, ',', '.'); ?></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <td>
                                        <?php
                                        if ($data['status'] == "2") {
                                            echo "Belum Lunas";
                                        } else {
                                            echo "Lunas";
                                        }
                                        ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="" id="myTable" style="white-space:nowrap;" width="100%" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td>Note : </td>
                                </tr>
                                <tr>
                                    <td width="600px">Barang lebih 3 bulan tidak diambil bukan tanggung jawab Laundry</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>