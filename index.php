<?php error_reporting(E_ALL * (E_NOTICE | E_WARNING));
include "include/koneksi.php";
session_start();

if ($_SESSION['admin'] || $_SESSION['karyawan'] || $_SESSION['owner']) {


?>


    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <?php
        $title = $_GET['page'];
        // var_dump($title);
        // die;
        ?>
        <title><?= $title ?></title>



        <!-- ==================================== Icon ==================================== -->
        <link rel="icon" type="image/png" href="image/clean3.png" />

        <!-- Custom fonts for this template-->
        <link href="assets/fontawesome-free-5.14.0-web/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="assets/fontawesome-free-5.14.0-web/css/fontawesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-grid.css">

        <!-- Font CSS -->
        <link rel="stylesheet" href="assets/css/font.css">

        <!-- DataTables CSS -->
        <!-- <link rel="stylesheet" type="text/css" href="assets/DataTables-1.10.21/css/jquery.dataTables.css"> -->
        <link rel="stylesheet" type="text/css" href="assets/DataTables-1.10.21/css/dataTables.bootstrap4.css">
        <!-- <link rel="stylesheet" type="text/css" href="assets/DataTables-1.10.21/css/dataTables.bootstrap.css"> -->
    </head>
    <style type="text/css">
        @font-face {
            font-family: Poppins-Regular;
            src: url(fonts/poppins/Poppins-Regular.ttf)
        }

        @font-face {
            font-family: Poppins-Bold;
            src: url(fonts/poppins/Poppins-Bold.ttf)
        }

        @font-face {
            font-family: Poppins-Medium;
            src: url(fonts/poppins/Poppins-Medium.ttf)
        }

        @font-face {
            font-family: Montserrat-Bold;
            src: url(fonts/montserrat/Montserrat-Bold.ttf)
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

        /* .pass {
            -webkit-text-security: disc;
        } */
    </style>

    <body id="page-top">


        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Content Wrapper -->
            <?php include "template/menu.php"; ?>
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <?php
                    if ($_SESSION['admin']) {
                        $user = $_SESSION['admin'];
                    } else if ($_SESSION['karyawan']) {
                        $user = $_SESSION['karyawan'];
                    } else if ($_SESSION['owner']) {
                        $user = $_SESSION['owner'];
                    }

                    $sql_user = $konek->query("SELECT * FROM tb_user WHERE id_user='$user'");
                    $data_user = $sql_user->fetch_array();

                    $nama = $data_user['nama_user'];
                    $id_user = $data_user['id_user'];
                    ?>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $nama; ?></span>
                                <img class="img-profile rounded-circle" src="image/<?php echo $data_user['foto']; ?> ">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="?page=Dashboard">
                                    <i class="fas fa-tachometer-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Dashboard
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Main Content -->
                <div id="content">


                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <!-- <h1 class="h3 mb-4 text-gray-800">Blank Page</h1> -->

                        <section class="content-header">
                            <?php include "include/isi.php"; ?>
                        </section>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->
                <!-- End of Main Content -->
                <!-- Footer -->
                <footer class="sticky-footer bg-white mt-4">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright <b>&copy; CodeLight 2020</b></span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Klik "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="assets/vendor/jquery/jquery.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="assets/js/sb-admin-2.min.js"></script>

        <!-- JQUERY -->
        <!-- <script src="assets/jQuery-3.3.1/jquery-3.3.1.min.js"></script> -->
        <script src="assets/js/Jquery3.5.1.js"></script>

        <!-- Fontawesome -->
        <script src="assets/fontawesome-free-5.14.0-web/js/all.min.js"></script>
        <script src="assets/fontawesome-free-5.14.0-web/js/fontawesome.min.js"></script>

        <!-- DataTables JS -->
        <script src="assets/DataTables-1.10.21/js/jquery.dataTables.js"></script>
        <script src="assets/DataTables-1.10.21/js/dataTables.bootstrap4.js"></script>

        <!-- Money -->
        <!-- <script src="assets/js/jquery.mask.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {

                // Format mata uang.
                $('#nominal').mask('000.000.000.000', {
                    // reverse: true
                });

            })
        </script> -->

        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>
        <script>
            $('#myTable').DataTable({
                responsive: true,
                autoFill: true,
                "autoWidth": true
            });
        </script>

        <script>
            // Add the following code if you want the name of the file appear on select
            $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
        </script>
    </body>

    </html>
<?php

} else {
    header("location:login.php");
}
?>