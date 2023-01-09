<?php
session_start();
include "conn.php";
if ((!empty($_SESSION['nik_login'])) and $_SESSION['level'] == "admin") {

    include "header.php";

    $nik_login  = $_SESSION['nik_login'];
    $nama_login = $_SESSION['nama_login'];
    $level      = $_SESSION['level'];

    if (!empty($_GET['jenis'])) {
        $jenis      = $_GET['jenis'];
    } else {
        $jenis = "petugas";
    }


    $sql_masyarakat = "SELECT * FROM masyarakat";
    $eksekusi_masyarakat = mysqli_query($conn, $sql_masyarakat);
    $jml_masyarakat = mysqli_num_rows($eksekusi_masyarakat);

    $sql_petugas = "SELECT * FROM petugas WHERE  level= 'petugas'";
    $eksekusi_petugas = mysqli_query($conn, $sql_petugas);
    $jml_petugas = mysqli_num_rows($eksekusi_petugas);

    $sql_admin = "SELECT * FROM petugas WHERE level= 'admin'";
    $eksekusi_admin = mysqli_query($conn, $sql_admin);
    $jml_admin = mysqli_num_rows($eksekusi_admin);

    if ($jenis == "petugas") {
        $eksekusi = $eksekusi_petugas;
    } else {
        $eksekusi = $eksekusi_admin;
    }

    include "navigasi.php";


?>


    <div class="container">

        <!-- JUDUL -->
        <h4 class="text-uppercase font-weight-bold text-secondary mt-2">Rekapitulasi Pengguna</h4>
        <hr>

        <div class="row text-white">

            <!-- CARD -->
            <div class="card bg-primary mr-3" style="width: 23%;">
                <div class="card-body">
                    <h5 class="card-title">MASYARAKAT</h5>
                    <div class="display-4 font-weight-bold"><?php echo $jml_masyarakat; ?></div>
                    <a href="manajemen_anggota.php">
                        <p class="card-text text-white">Selengkapnya</p>
                    </a>
                </div>
            </div>

            <!-- CARD -->
            <div class="card bg-warning mr-3" style="width: 23%;">
                <div class="card-body">
                    <h5 class="card-title">PETUGAS</h5>
                    <div class="display-4 font-weight-bold"><?php echo $jml_petugas; ?></div>
                    <a href="manajemen_petugas.php?jenis=petugas">
                        <p class="card-text text-white">Selengkapnya</p>
                    </a>
                </div>
            </div>

            <!-- CARD -->
            <div class="card bg-info mr-3" style="width: 23%;">
                <div class="card-body">
                    <h5 class="card-title">ADMINISTRATOR</h5>
                    <div class="display-4 font-weight-bold"><?php echo $jml_admin; ?></div>
                    <a href="manajemen_petugas.php?jenis=admin">
                        <p class="card-text text-white">Selengkapnya</p>
                    </a>
                </div>
            </div>
        </div>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#form_petugas">
            Tambah <?php echo $jenis ;?>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="form_petugas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Petugas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="petugas_tambah.php" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama Petugas</label>
                                <input type="text" name="nama_petugas" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Nama Pengguna Login</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Kata Sandi</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>No. Telepon</label>
                                <input type="text" name="telp" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Jenis Petugas</label>
                                <select class="form-control" name="level" required>
                                    <option value="petugas">Petugas</option>
                                    <option value="admin">Admin</option>
                                </select>
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

        <div>
            <h4 class="text-uppercase font-weight-bold text-secondary mt-3">Tabel <?php echo $jenis; ?></h4>
        </div>

        

        <!-- TABLE -->
        <table class="table table-striped data ">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Petugas</th>
                    <th scope="col">Username</th>
                    <th scope="col">Nomor Telepon</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($data = mysqli_fetch_array($eksekusi)) {

                ?>
                    <tr>
                        <th scope="row"><?php echo $no; ?></th>

                        <td><?php echo $data['nama_petugas']; ?></td>
                        <td><?php echo $data['username']; ?></td>
                        <td><?php echo $data['telp']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
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
    header("location:form_login.php");
}

// PART 2 MENIT 1:46:42
?>