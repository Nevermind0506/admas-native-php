<?php

session_start();
if (empty($_SESSION['nik_login'])) {
    include "header.php";

?>
    <link rel="stylesheet" href="css/form_login.css">
    <div class="container">
        <h2 class="text-center glow text-gradient">FORM LOGIN ADMAS</h2>
        <hr>

        <!-- FORM -->
        <form action="cek_login.php" method="POST">

            <!-- USERNAME -->
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Masukan Username Anda">
            </div>

            <!-- PASSWORD -->
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukan Password Anda">
            </div>

            <!-- REGISTRASI -->
            <div>
                <a href="" data-toggle="modal" data-target="#form_masyarakat"><p><small>Daftar Baru</small></p></a>
            </div>

            <!-- BUTTON -->
            <button type="submit" class="btn btn-primary">Masuk</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>


    </div>

<?php
} else {
    header("location:index.php");
}
?>



<!-- Modal -->
<div class="modal fade" id="form_masyarakat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Masyarakat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="masyarakat_tambah.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="number" name="nik" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Nama Pengguna</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>No. Telepon</label>
                        <input type="number" name="telp" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="sumbit" class="btn btn-primary">Tambah Petugas</button>
                </div>
            </form>
        </div>
    </div>
</div>




<!-- PART 5 MENIT 1:59 -->

<?php
    
    include "footer.php";
?>
