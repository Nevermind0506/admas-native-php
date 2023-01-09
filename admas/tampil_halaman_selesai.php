<?php
session_start();
include "conn.php";
if (!empty($_SESSION['nik_login'])) {
    # code...

    include "header.php";

    $nik_login  = $_SESSION['nik_login'];
    $nama_login = $_SESSION['nama_login'];
    $level      = $_SESSION['level'];

    if ($level == "masyarakat") {
        $sql_peng_sls = "SELECT * FROM pengaduan WHERE nik = '$nik_login' and status = 'selesai'";
    } else {
        $sql_peng_sls = "SELECT * FROM pengaduan WHERE status = 'selesai'";
    }
    
    $eksekusi_peng_sls = mysqli_query($conn, $sql_peng_sls);
    $jml_peng_sls = mysqli_num_rows($eksekusi_peng_sls);

    include "navigasi.php";


?>

    <div class="container">

        <!-- JUDUL -->
        <h4 class="text-uppercase font-weight-bold text-secondary mt-2">Daftar Pengaduan Selesai</h4>
        <hr>

        <!-- TABLE -->
        <table class="table table-striped data ">
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
                    while ($data = mysqli_fetch_array($eksekusi_peng_sls)) {
                       
                ?>
                    <tr>    
                        <th scope="row"><?php echo $no; ?></th>
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

    <div class="bg-primary">
        <div class="container text-white text-center mt-5 pt-4 pb-3">
            <p>&copy; 2022, David Maulana Ibrahim</p>
        </div>
    </div>

<?php
    include "footer.php";
} else {
    header("location:form_login.php");
}

// PART 2 MENIT 1:29:36
?>