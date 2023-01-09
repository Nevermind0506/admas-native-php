<?php
session_start();
include "conn.php";
if (!empty($_SESSION['nik_login'])) {

    include "header.php";

    $nik_login  = $_SESSION['nik_login'];
    $nama_login = $_SESSION['nama_login'];
    $level      = $_SESSION['level'];

    if ($level == "masyarakat") {

        $sql_mas = "SELECT * FROM masyarakat WHERE nik = '$nik_login'";
        $eksekusi_mas = mysqli_query($conn, $sql_mas);
        $data_mas = mysqli_fetch_assoc($eksekusi_mas);

        // PENGADUAN
        $sql_peng_all = "SELECT * FROM pengaduan WHERE nik = '$nik_login' order by id_pengaduan DESC";
        $eksekusi_peng_all = mysqli_query($conn, $sql_peng_all);
        $jml_peng_all = mysqli_num_rows($eksekusi_peng_all);

        $sql_peng_blm = "SELECT * FROM pengaduan WHERE nik = '$nik_login' and status= '0'";
        $eksekusi_peng_blm = mysqli_query($conn, $sql_peng_blm);
        $jml_peng_blm = mysqli_num_rows($eksekusi_peng_blm);

        $sql_peng_pross = "SELECT * FROM pengaduan WHERE nik = '$nik_login' and status= 'proses'";
        $eksekusi_peng_pross = mysqli_query($conn, $sql_peng_pross);
        $jml_peng_pross = mysqli_num_rows($eksekusi_peng_pross);

        $sql_peng_sls = "SELECT * FROM pengaduan WHERE nik = '$nik_login' and status= 'selesai'";
        $eksekusi_peng_sls = mysqli_query($conn, $sql_peng_sls);
        $jml_peng_sls = mysqli_num_rows($eksekusi_peng_sls);
    } else {

         

        $sql_peng_all = "SELECT * FROM pengaduan order by id_pengaduan DESC";
        $eksekusi_peng_all = mysqli_query($conn, $sql_peng_all);
        $jml_peng_all = mysqli_num_rows($eksekusi_peng_all);

        $sql_peng_blm = "SELECT * FROM pengaduan WHERE  status= '0'";
        $eksekusi_peng_blm = mysqli_query($conn, $sql_peng_blm);
        $jml_peng_blm = mysqli_num_rows($eksekusi_peng_blm);

        $sql_peng_pross = "SELECT * FROM pengaduan WHERE status= 'proses'";
        $eksekusi_peng_pross = mysqli_query($conn, $sql_peng_pross);
        $jml_peng_pross = mysqli_num_rows($eksekusi_peng_pross);

        $sql_peng_sls = "SELECT * FROM pengaduan WHERE status ='selesai'";
        $eksekusi_peng_sls = mysqli_query($conn, $sql_peng_sls);
        $jml_peng_sls = mysqli_num_rows($eksekusi_peng_sls);
    }



    include "navigasi.php";
?>

    <div class="container emp-profile mt-3">
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img src="img_pengaduan/profile.jpg" width="300px" class="img-thumbnail">

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                            <?php echo $nama_login; ?>
                        </h5>
                        <h6>
                            (<?php echo $level; ?>)
                        </h6>
                        <p class="proile-rating">Pengaduan Yang di Buat : <span><?php echo $jml_peng_all; ?></span></p>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                            </li>
                            <?php
                                if ($level == "admin") {
                                    # code...
                                }
                            ?>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-4">
                    <!-- KOSONG -->
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nama Pengguna</label>
                                </div>
                                <div class="col-md-6">
                                    <p>: <?php echo $data_mas['nama']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>NIK pengguna</label>
                                </div>
                                <div class="col-md-6">
                                    <p>: <?php echo $data_mas['nik']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>No. Telpon Pengguna</label>
                                </div>
                                <div class="col-md-6">
                                    <p>: <?php echo $data_mas['telp']; ?></p>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Pengaduan Belum di Proses</label>
                                </div>
                                <div class="col-md-6">
                                    <p>: <?php echo $jml_peng_blm; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Pengaduan Sedang di Proses</label>
                                </div>
                                <div class="col-md-6">
                                    <p>: <?php echo $jml_peng_pross; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Pengaduan Selesai di Proses</label>
                                </div>
                                <div class="col-md-6">
                                    <p>: <?php echo $jml_peng_sls; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Username</label>
                                </div>
                                <div class="col-md-6">
                                    <p>: <?php echo $data_mas['username']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Password</label>
                                </div>
                                <div class="col-md-6">
                                    <p>: <?php echo $data_mas['password']; ?></p>
                                    <button type="button" class="btn-sm btn-info" data-toggle="modal" data-target="#ubah_pass">Ubah Password</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <!-- FOOTER  -->
    <div class="bg-primary">
        <div class="container text-white text-center mt-5 pt-4 pb-3">
            <p>&copy; 2022, David Maulana Ibrahim</p>
        </div>
    </div>

<?php
    include "footer.php";
}
?>

<!-- Modal -->
<div class="modal fade" id="ubah_pass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Ubah Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Password Lama</label>
                        <div class="input-group" id="show_hide_password">
                            <input type="password" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                            <div class="input-group-append">
                                <span class="input-group-text"><a href="">&#9889;</a></span>
                            </div>
                        </div>
                        
                    </div>

                    <div class="form-group">
                        <label>Password Baru</label>
                        <div class="input-group" id="show_hide_password">
                            <input type="password" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                            <div class="input-group-append">
                                <span class="input-group-text"><a href="">&#9889;</a></span>
                            </div>
                        </div>
                        
                    </div>

                    <div class="form-group">
                        <label>Konfirmasi Password Baru</label>
                        <div class="input-group" id="show_hide_password">
                            <input type="password" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                            <div class="input-group-append">
                                <span class="input-group-text"><a href="">&#9889;</a></span>
                            </div>
                        </div>
                        
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("fa-eye-slash");
                $('#show_hide_password i').removeClass("fa-eye");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("fa-eye-slash");
                $('#show_hide_password i').addClass("fa-eye");
            }
        });
    });
</script>