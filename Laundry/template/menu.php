<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="image/clean3.png" alt="Laundry" style="width: 40px; height : 40px">
        </div>
        <div class="sidebar-brand-text mx-3">Laundry <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <!-- <hr class="sidebar-divider my-0"> -->
    <hr class="sidebar-divider">
    <!-- 
    <li class="nav-item">
        <a class="nav-link" href="?page=Dashboard">
            <i class="fas fa-fw fa-tachometer-alt" aria-hidden="true"></i>
            <span>Dashboard</span>
        </a>
    </li> -->


    <?php



    function var_dump_pre($mixed = null)
    {
        echo '<pre>';
        var_dump($mixed);
        echo '</pre>';
        return null;
    }



    if ($_SESSION['admin']) {
        $user = $_SESSION['admin'];
    } else if ($_SESSION['karyawan']) {
        $user = $_SESSION['karyawan'];
    } else if ($_SESSION['owner']) {
        $user = $_SESSION['owner'];
    }

    $sql_user = $konek->query("SELECT * FROM tb_user WHERE id_user='$user'");
    $data_user = $sql_user->fetch_array();
    $role = $data_user['role'];


    ?>
    <?php
    $queryMenu = $konek->query("SELECT user_menu.id,menu FROM user_menu JOIN user_access_menu ON user_menu.id = user_access_menu.menu_id WHERE user_access_menu.role = '$role' ORDER BY user_access_menu.role ASC");
    // LOOPING MENU
    while ($menu = mysqli_fetch_array($queryMenu)) {
    ?>
        <!-- Heading -->
        <div class="sidebar-heading">
            <?php echo $menu['menu'];  ?>
        </div>
        <?php

        $menuId = $menu['id'];
        $querySubMenu = $konek->query("SELECT * FROM user_sub_menu WHERE menu_id = '$menuId' ");
        while ($sub = mysqli_fetch_array($querySubMenu)) {
            if ($title == $sub['title']) : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="<?= $sub['url'] ?>">
                    <i class="<?= $sub['icon']; ?>"></i>
                    <span><?= $sub['title']; ?></span></a>
                </li>
            <?php
        }
        // var_dump_pre($sub);
        // die;
            ?>
            <hr class="sidebar-divider">
        <?php
    }
        ?>



        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-fw fa-sign-out-alt" aria-hidden="true"></i>
                <span>Logout</span></a>
        </li>



        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->