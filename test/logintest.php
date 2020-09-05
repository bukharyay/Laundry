<?php include "include/koneksi.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Login Form</title>


<!-- Custom fonts for this template-->
<link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,3<link rel=" stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<!-- Custom styles for this template-->
<link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

<!-- Styles for this template-->
<link rel="stylesheet" href="assets/bootstrap-4.0.0/dist/css/bootstrap.min.css">

</head>

<body class="bg-gradient-primary">

    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-6 mt-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> //Image poto -->
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Please Login!</h1>
                                    </div>

                                    <form class="user" method="post">
                                        <?php if (isset($_GET["F"])) { ?>
                                            <div class="alert alert-danger alert-dismissible fade show" id="myAlert" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <!-- <span aria-hidden="true">&times;</span> -->
                                                </button>
                                                Proses Login <strong>Gagal!</strong> Username atau Password Salah.
                                            </div>
                                        <?php } ?>
                                        <?php if (isset($_GET["G"])) { ?>
                                            <div class="alert alert-warning alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <!-- <span aria-hidden="true">&times;</span> -->
                                                </button>
                                                Proses Login <strong>Gagal!</strong> User tidak ditemukan.
                                            </div>

                                        <?php } ?>
                                        <?php if (isset($_GET["L"])) { ?>
                                            <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <!-- <span aria-hidden="true">&times;</span> -->
                                                </button>
                                                Proses Logout <strong>Sukses!</strong> User berhasil Logout.
                                            </div>

                                        <?php } ?>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="username" placeholder="Enter Email Address...">
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                                        </div>
                                        <button type="submit" name="login" class="btn btn-primary btn-user btn-block">Login</button>
                                        <?php

                                        if (isset($_POST['login'])) {
                                            $username = $_POST['username'];
                                            $password = $_POST['password'];

                                            //     $sql = $konek->query("SELECT * FROM tb_user WHERE username='$username' AND password='$password'");
                                            $sql = $konek->query("SELECT * FROM tb_user WHERE username='$username'");

                                            // $data = $sql->fetch_array();
                                            $user = $sql->fetch_array();

                                            if ($user >= 1) {
                                                session_start();
                                                if ($user['password'] == $password) { //cek Password

                                                    if ($user['role'] == "admin") {
                                                        $_SESSION['admin'] = $user['id_user'];
                                                        header("location:index.php");
                                                    } else if ($user['role'] == "karyawan") {
                                                        $_SESSION['karyawan'] = $user['id_user'];
                                                        header("location:index.php");
                                                    } else if ($user['role'] == "owner") {
                                                        $_SESSION['owner'] = $user['id_user'];
                                                        header("location:index.php");
                                                    }
                                                } else { //Jika password salah
                                                    header("location:login.php?F");
                                                }
                                            } else { //Jika user belum terdaftar
                                                header("location:login.php?G");
                                            }
                                        }

                                        //     $ada = $sql->num_rows;
                                        //     if ($ada) {
                                        //         if ($ada >= 1) {        //jika ada data
                                        //             session_start();
                                        // if ($data['role'] == "1") {
                                        //     $_SESSION['admin'] = $data['id_user'];
                                        //     header("location:index.php");
                                        // } else if ($data['role'] == "2") {
                                        //     $_SESSION['karyawan'] = $data['id_user'];
                                        //     header("location:index.php");
                                        // } else if ($data['role'] == "3") {
                                        //     $_SESSION['owner'] = $data['id_user'];
                                        //     header("location:index.php");
                                        // }
                                        //         } else {
                                        //             header("location:login.php?F");
                                        //         }
                                        //     } else {
                                        //         header("location:login.php?G");
                                        //     }
                                        // }



                                        ?>

                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="assets/js/Jquery3.5.1.js"></script>
    <script src="assets/bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>