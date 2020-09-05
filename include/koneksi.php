<?php
$servername = "localhost";
$database = "db_laundry";
$username = "root";
$password = "";

// untuk tulisan bercetak tebal silakan sesuaikan dengan detail database Anda
// membuat koneksi
$konek = mysqli_connect($servername, $username, $password, $database);
// mengecek koneksi
// if (!$conn) {
// die("Koneksi gagal: " . mysqli_connect_error());
// }
// echo "Koneksi berhasil";
// mysqli_close($conn);
// $konek = mysqli_connect('$servername', ' $username', '$password', '$database');

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
