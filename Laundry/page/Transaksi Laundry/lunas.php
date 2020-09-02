<?php
$id = $_GET['id'];

$sql = $konek->query("SELECT * FROM tb_laundry WHERE id_laundry='$id'");

$data = $sql->fetch_array();

$tgl_terima = $data['tanggal_terima'];
$id_outlet = $data['id_outlet'];
$nominal = $data['nominal'];
$catatan = $data['catatan'];

$id_user = $data['id_user'];

$sql2 = $konek->query("INSERT INTO tb_transaksi (`id_transaksi`, `id_user`, `id_outlet`, `tgl_transaksi`, `pemasukan`, `catatan`, `keterangan`) VALUES (NULL, '$id_user', '$id_outlet', '$tgl_terima', '$nominal','$catatan','Pemasukan')");
$sql2 = $konek->query("UPDATE tb_laundry SET `status` = 'Lunas' WHERE id_laundry = '$id'");

if ($sql2) {
?>
    <script type="text/javascript">
        // alert("Data berhasil di Tambahkan!");
        window.location.href = "?page=Transaksi Laundry&msgl";
    </script>
<?php
}
