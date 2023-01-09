<?php
    include "conn.php";
    
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $telp = $_POST['telp']; 
    

    $sql = "INSERT INTO masyarakat (nik, nama, username, password, telp) VALUES ('$nik', '$nama', '$username', '$password', '$telp')";

    $eksekusi = mysqli_query($conn, $sql);
    if ($eksekusi) {
        header("location:manajemen_anggota.php");
    }

?>