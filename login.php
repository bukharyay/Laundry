<?php include "include/koneksi.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Laundry</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ==================================== Icon ==================================== -->
    <link rel="icon" type="image/png" href="image/clean3.png" />

    <!-- ==================================== Font Awesome ==================================== -->
    <link rel="stylesheet" type="text/css" href="assets/vendor/fontawesome-free/css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/fontawesome-free/css/all.min.css">

    <!-- ==================================== CSS ==================================== -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/util.css">
    <link rel="stylesheet" href="assets/css/select2.min.css">
    <link rel="stylesheet" href="assets/css/font.css">

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

    a.sosmed {
        padding: 10px 13px;
        /* min-width: 36px; */
        border-radius: 33px;
        text-align: center;
        font-size: 23px !important;
        transition: all 100ms;
    }

    a.sosmed.github:hover {
        background-color: #6e5494 !important;
        color: white !important;
    }

    a.sosmed.github {
        color: #6e5494 !important;
        background-color: #ffffff !important;
        /* border: solid 1px #6e5494 !important; */
    }

    a.sosmed.youtube:hover {
        background-color: #ff0000 !important;
        color: white !important;
    }

    a.sosmed.youtube {
        color: #ff0000 !important;
        background-color: #ffffff !important;
        /* border: solid 1px #ff0000 !important; */
    }

    a.sosmed.facebook:hover {
        background-color: #3b5998 !important;
        color: white !important;
    }

    a.sosmed.facebook {
        color: #3b5998 !important;
        background-color: #ffffff !important;
        /* border: solid 1px #3b5998 !important; */
    }

    a.sosmed.instagram:hover {
        background-color: #e1306c !important;
        color: white !important;
    }

    a.sosmed.instagram {
        color: #e1306c !important;
        background-color: #ffffff !important;
        /* border: solid 1px #e1306c !important; */
    }

    a.sosmed.whatsapp:hover {
        background-color: #4AC959 !important;
        color: white !important;
    }

    a.sosmed.whatsapp {
        color: #4AC959 !important;
        background-color: #ffffff !important;
        /* border: solid 1px #4AC959 !important; */
    }
</style>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100" style="padding: 5%;">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="image/laundry.jpg" alt="IMG" style="margin: 40% 10%;">
                </div>
                <form class="login100-form validate-form" method="POST">

                    <span class="login100-form-title">
                        <span>
                            <img src="image/clean3.png" width="10%">
                        </span>
                        Laundry Login!
                    </span>
                    <!-- Alert Bootstrap -->
                    <?php if (isset($_GET["F"])) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" id="myAlert" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            Proses Login <strong>Gagal!</strong> Username atau Password Salah.
                        </div>
                    <?php } ?>
                    <?php if (isset($_GET["G"])) { ?>
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            Proses Login <strong>Gagal!</strong> User tidak ditemukan.
                        </div>
                    <?php } ?>

                    <?php if (isset($_GET["L"])) { ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            Proses Logout <strong>Sukses!</strong> User berhasil Logout.
                        </div>

                    <?php } ?>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: example@gmail.com">
                        <input class="input100" type="email" name="username" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="container-login100-form-btn">
                        <button type="submit" name="login" class="login100-form-btn">
                            Login
                        </button>
                    </div>
                    <?php
                    if (isset($_POST['login'])) {
                        $username = $_POST['username'];
                        $password = $_POST['password'];

                        //     $sql = $konek->query("SELECT * FROM tb_user WHERE username='$username' AND password='$password'");
                        $sql = $konek->query("SELECT * FROM tb_user WHERE username='$username'");

                        // $data = $sql->fetch_array();
                        $user = $sql->fetch_array();

                        if ($user >= 1) {
                            // session_start();
                            if ($user['password'] == $password) { //cek Password

                                if ($user['role'] == "admin") {
                                    $_SESSION['admin'] = $user['id_user'];
                                    // header("location:index.php"); 
                    ?>
                                    <script type="text/javascript">
                                        window.location.href = "index.php?page=Dashboard";
                                    </script>
                                <?php
                                } else if ($user['role'] == "karyawan") {
                                    $_SESSION['karyawan'] = $user['id_user'];
                                    // header("location:index.php");
                                ?>
                                    <script type="text/javascript">
                                        window.location.href = "index.php?page=Dashboard";
                                    </script>
                                <?php
                                } else if ($user['role'] == "owner") {
                                    $_SESSION['owner'] = $user['id_user'];
                                    // header("location:index.php");
                                ?>
                                    <script type="text/javascript">
                                        window.location.href = "index.php?page=Dashboard";
                                    </script>
                                <?php
                                }
                            } else { //Jika password salah
                                ?>
                                <!-- header("location:login.php?F"); -->
                                <script type="text/javascript">
                                    // alert("Data berhasil di Tambahkan!");
                                    window.location.href = "login.php?F";
                                </script>
                            <?php
                            }
                        } else { //Jika user belum terdaftar
                            // header("location:login.php?G"); 
                            ?>
                            <script type="text/javascript">
                                // alert("Data berhasil di Tambahkan!");
                                window.location.href = "login.php?G";
                            </script><?php
                                    }
                                }
                                        ?>
                    <!-- <div class="text-center p-t-12">
                    <span class="txt1">Forgot</span>
                    <a class="txt2" href="#">Username / Password?</a>
                    </div> -->
                    <!-- <div class="text-center mt-3 p-t-12">
                        <p class="txt2" href="#">
                            Contact Me :
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </p>
                    </div> -->

                    <div class="text-center p-t-12">
                        <!-- <a class="txt2" href="#">
                            Create your Account
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a> -->
                        <p class="txt2" href="#">
                            Contact Me :
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </p>
                        <a class=" btn sosmed facebook" title="Facebook" style="cursor: pointer;" target="_blank" onclick="href='https://www.facebook.com/bukharyay'">
                            <i class=" fab fa-fw fa-facebook-square " aria-hidden=" true "></i>
                        </a>
                        <a class=" btn sosmed instagram" title="Instagram" style="cursor: pointer;" target="_blank" onclick="href='https://www.instagram.com/azrlgmpl/'">
                            <i class=" fab fa-fw fa-instagram" aria-hidden=" true "></i>
                        </a>
                        <a class="btn sosmed whatsapp" title="Whatsapp" style="cursor: pointer;" target="_blank" onclick="href='https://api.whatsapp.com/send?phone=6287731516456&text=Halo%20Bukhary%20Azriellorezqa%20Yufar'">
                            <i class=" fab fa-fw fa-whatsapp" aria-hidden=" true "></i>
                        </a>
                    </div>
                    <div class="text-center">
                        <p class="txt2" href="#">
                            Tutorial & Source Code
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </p>
                        <a class="btn sosmed youtube" title="Youtube" style="cursor: pointer;" target="_blank" onclick="href='https://www.youtube.com/channel/UCHtVBA5DoCk01hk24x6KUFQ'">
                            <i class=" fab fa-fw fa-youtube " aria-hidden=" true "></i>
                        </a>
                        <a class="btn sosmed github" title="Github" style="cursor: pointer;" target="_blank" onclick="href='https://github.com/bukharyay/Laundry'">
                            <i class=" fab fa-fw fa-github " aria-hidden=" true "></i>
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- ==================================== Javascript ==================================== -->
    <script src="assets/js/Jquery3.5.1.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="2f4c353bf70f86f5f8d644f2-text/javascript"></script>
    <script type="2f4c353bf70f86f5f8d644f2-text/javascript">
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>

    <script src="assets/js/main.js"></script>
    <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="2f4c353bf70f86f5f8d644f2-|49" defer=""></script>
</body>

</html>