<?php

$id = $_GET['id'];

$sql =  $konek->query("DELETE FROM tb_user WHERE id_user='$id'");

if ($sql) {
?>
    <script>
        window.location.href = "?page=Data Pengguna&msgh";
    </script>
<?php
}
?>