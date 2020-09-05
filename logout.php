<?php
session_start();
session_destroy();
?>
<!-- header("location:login.php?L"); -->
<script type="text/javascript">
    // alert("Data berhasil di Tambahkan!");
    window.location.href = "login.php?L";
</script><?php