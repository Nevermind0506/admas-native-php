<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "admas";

$conn = mysqli_connect($host, $user, $pass, $db);

if ($conn) {
    echo "<script>console.log('Koneksi Ke Database Berhasil')</script>";
} else {
    echo "<script>console.log('Koneksi Ke Database Gagal')</script>";
}
?>