<?php
    session_start();
    include "conn.php";

    $id_pengaduan = $_POST['id_pengaduan'];
    $tanggal_tanggapan = date('Y-m-d');
    $tanggapan = $_POST['tanggapan'];
    $id_petugas = $_SESSION['nik_login'];
    
    $sql_tanggapan = "INSERT INTO tanggapan (id_tanggapan, id_pengaduan, tgl_tanggapan, tanggapan, id_petugas) VALUES (NULL, '$id_pengaduan', '$tanggal_tanggapan', '$tanggapan', '$id_petugas')";

    $eksekusi_sql_tanggapan = mysqli_query($conn, $sql_tanggapan);

    if ($eksekusi_sql_tanggapan) {
        header("location:pengaduan_detail.php?id_pengaduan=$id_pengaduan");
    } else {
        echo "input Pengaduan gagal";
    }
    

?>