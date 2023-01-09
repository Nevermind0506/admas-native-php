<?php
    session_start();
    include "conn.php";

    $id_pengaduan = $_POST['id_pengaduan'];
    $status = $_POST['status'];
    $tanggal_tanggapan = date('Y-m-d');
    $id_petugas = $_SESSION['nik_login'];

    if ($status == 0) {
        $narasi = "Status pengerjaan diubah ke Peninjauan";
    } elseif ($status == "proses") {
        $narasi = "Status pengerjaan diubah ke Proses";
    } else {
        $narasi = "Status pengerjaan saat ini sudah Selesai";
    }

    $sql_update_status = "UPDATE `pengaduan` SET `status` = '$status' WHERE `id_pengaduan` = '$id_pengaduan'";
    $eksekusi = mysqli_query($conn, $sql_update_status);
    if ($eksekusi) {
        $sql_tanggapan = "INSERT INTO tanggapan (id_tanggapan, id_pengaduan, tgl_tanggapan, tanggapan, id_petugas) VALUES (NULL, '$id_pengaduan', '$tanggal_tanggapan', '$narasi', '$id_petugas')";

        $eksekusi_sql_tanggapan = mysqli_query($conn, $sql_tanggapan);
        if ($eksekusi_sql_tanggapan) {
            header("location:pengaduan_detail.php?id_pengaduan=$id_pengaduan");
        }
        
    } else {
        echo "Update Gagal";
    }
?>