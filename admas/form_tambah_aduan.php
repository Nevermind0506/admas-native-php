<?php
session_start();
if (!empty($_SESSION['nik_login'])) {

    $nik_login  = $_SESSION['nik_login'];
    $nama_login = $_SESSION['nama_login'];
    $level      = $_SESSION['level'];

    if ($level == "masyarakat") {


        include "header.php";
        include "navigasi.php";
?>

        <div class="container">
            <h3 class="text-center mt-5">FORM PENAMBAHAN ADUAN MASYARAKAT</h3>

            <!-- FORM -->
            <form enctype="multipart/form-data" method="POST" action="upload_aduan_mas.php">
                <div class="form-group">
                    <!-- TEXTAREA -->
                    <label>Apa Keluhan Anda?</label>
                    <textarea name="isi_laporan" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <!-- FOTO -->
                    <label">Unggah Foto Laporan</label>
                        <!-- <input type="file" name="foto" class="form-control-file"> -->
                        <div class="input-group mb-3 mt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="foto" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                </div>
                <button class="btn btn-primary mb-5">Tambahkan Laporan</button>
            </form>
        </div>

        <!-- FOOTER -->
        <div class="bg-primary">
            <div class="container text-white text-center mt-5 pt-4 pb-3">
                <p>&copy; 2022, David Maulana Ibrahim</p>
            </div>
        </div>

<?php
        include "footer.php";
    } else {
        header("location:index.php");
    }
} else {
    header("location:form_login.php");
}
?>