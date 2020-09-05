<?php

$kode = $_GET['id'];

$sql = $konek->query("DELETE FROM tb_pelanggan WHERE kode_pelanggan='$kode'");

if ($sql) {
?>
    <script type="text/javascript">
        // alert("Data berhasil di Hapus!");
        window.location.href = "?page=Data Pelanggan&msgh";
    </script>
<?php
}

?>