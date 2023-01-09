<?php
session_start();
include "conn.php";
if (!empty($_SESSION['nik_login'])) {

    include "header.php";

    $nik_login  = $_SESSION['nik_login'];
    $nama_login = $_SESSION['nama_login'];
    $level      = $_SESSION['level'];

    if ($level == "masyarakat") {
        
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

    <div class="container">

        <!-- JUDUL -->
        <h4 class="text-uppercase font-weight-bold text-secondary mt-2">Daftar Pengaduan Yang Di Buat</h4>
        <hr>

        <div class="row text-white mb-3">

            <!-- CARD -->
            <div class="card bg-primary mr-3" style="width: 23%;">
                <div class="card-body">
                    <h5 class="card-title">JUMLAH PENGADUAN</h5>
                    <div class="display-4 font-weight-bold"><?php  echo $jml_peng_all; ?></div>
                    <a href="tampil_halaman_total.php">
                        <p class="card-text text-white">Selengkapnya</p>
                    </a>
                </div>
            </div>

            <!-- CARD -->
            <div class="card bg-warning mr-3" style="width: 23%;">
                <div class="card-body">
                    <h5 class="card-title">JUMLAH BELUM DIPROSES</h5>
                    <div class="display-4 font-weight-bold"><?php  echo $jml_peng_blm; ?></div>
                    <a href="tampil_halaman_belum.php">
                        <p class="card-text text-white">Selengkapnya</p>
                    </a>
                </div>
            </div>

            <!-- CARD -->
            <div class="card bg-info mr-3" style="width: 23%;">
                <div class="card-body">
                    <h5 class="card-title">PENGADUAN DI PROSES</h5>
                    <div class="display-4 font-weight-bold"><?php  echo $jml_peng_pross; ?></div>
                    <a href="tampil_halaman_diproses.php">
                        <p class="card-text text-white">Selengkapnya</p>
                    </a>
                </div>
            </div>

            <!-- CARD -->
            <div class="card bg-success" style="width: 23%;">
                <div class="card-body">
                    <h5 class="card-title">PENGADUAN SELESAI</h5>
                    <div class="display-4 font-weight-bold"><?php  echo $jml_peng_sls; ?></div>
                    <a href="tampil_halaman_selesai.php">
                        <p class="card-text text-white">Selengkapnya</p>
                    </a>
                </div>
            </div>
        </div>
        <?php 
            if ($level == "masyarakat") {
        ?>
            <!-- UNTUK MENAMBAHKAN DATA BARU -->
            <a href="form_tambah_aduan.php" class="btn btn-primary mt-5 mb-3">BUAT PENGADUAN BARU</a>
        <?php
            }
        ?>
        <!-- TABLE -->
        <table class="table table-striped table-hover data">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <?php if ($level != "masyarakat") 
                        { 
                    ?>
                        <th scope="col">NIK Masyarakat</th>
                    <?php 
                        } 
                    ?>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Isi Pengaduan</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    while ($data = mysqli_fetch_array($eksekusi_peng_all)) {
                       
                ?>
                    <tr>    
                        <th scope="row"><?php echo $no++; ?></th>
                        <?php if ($level != "masyarakat") 
                            { 
                        ?>
                                <td><?php echo $data['nik']; ?></td>
                        <?php 
                            } 
                        ?>
                        <td><?php echo $data['tgl_pengaduan']; ?></td>
                        <td><a href="pengaduan_detail.php?id_pengaduan=<?php echo $data['id_pengaduan']; ?>" class="text-secondary"><?php  echo $data['isi_laporan']; ?></a></td>
                        <td><?php echo $data['status']; ?></td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
    
    <!-- FOOTER -->
    <div class="bg-primary ">
        <div class="container text-white text-center mt-5 pt-4 pb-3">
            <p>&copy; 2022, David Maulana Ibrahim</p>
        </div>
    </div>

<?php
    include "footer.php";
} else {
    header("location:form_login.php");
}

// Target
// Halaman Profile
// Fitur Ubah Password
?>