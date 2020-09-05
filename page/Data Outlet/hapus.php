<?php

$id = $_GET['id'];

$sql =  $konek->query("DELETE FROM tb_outlet WHERE id_outlet='$id'");

if ($sql) {
?>
    <script>
        window.location.href = "?page=Data Outlet&msgh";
    </script>
<?php
}
?>