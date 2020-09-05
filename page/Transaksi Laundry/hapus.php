<?php

$id = $_GET['id'];

$sql =  $konek->query("DELETE FROM tb_laundry WHERE id_laundry='$id'");

if ($sql) {
?>
    <script>
        window.location.href = "?page=Transaksi Laundry&msgh";
    </script>
<?php
}
?>