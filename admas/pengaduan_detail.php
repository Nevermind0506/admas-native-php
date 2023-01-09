<?php
session_start();
if (!empty($_SESSION['nik_login'])) {
    include "header.php";
    include "conn.php";

    $nik_login  = $_SESSION['nik_login'];
    $nama_login = $_SESSION['nama_login'];
    $level      = $_SESSION['level'];

    $id_pengaduan = $_GET['id_pengaduan'];
    $sql_pengaduan = "SELECT * FROM `pengaduan`INNER JOIN masyarakat ON pengaduan.nik = masyarakat.nik WHERE id_pengaduan = '$id_pengaduan'";
    $eksekusi_pengaduan = mysqli_query($conn, $sql_pengaduan);
    $data_pengaduan = mysqli_fetch_array($eksekusi_pengaduan);


    include "navigasi.php";
?>

    <div class="container">

        <!-- CARD -->
        <div class="card mt-3 text-center">
            <!-- CARD HEADER -->
            <div class="card-header">
                Pengaduan dari <b><?php echo $data_pengaduan['nama']; ?></b> pada Tanggal <?php echo $data_pengaduan['tgl_pengaduan']; ?>
            </div>
            <div class="text-center mt-2">
                <!-- IMAGE -->
                <img src="img_pengaduan/<?php echo $data_pengaduan['foto'] ?>" class="img-fluid" width="50%" alt="...">
            </div>
            <div class="card-body">
                <!-- DESC -->
                <p class="card-text lead"><?php echo $data_pengaduan['isi_laporan']; ?></p>

                <!-- NAMA -->
                <footer class="blockquote-footer"><?php echo $data_pengaduan['nama']; ?> - <cite title="Source Title"><?php echo $data_pengaduan['nik']; ?></cite></footer>
                <br>

                <p>Status Pengerjaan</p>

                <?php
                if ($data_pengaduan['status'] == 0) {
                    $warna = "bg-danger";
                    $panjang = 100;
                    $info = "Laporan Masih Dalam Peninjauan";
                } elseif ($data_pengaduan['status'] == "proses") {
                    $warna = "bg-warning";
                    $panjang = 100;
                    $info = "Pengerjaan Sedang Berlangsung";
                } else {
                    $warna = "bg-success";
                    $panjang = 100;
                    $info = "Pengerjaan Telah Selesai";
                }
                ?>
                <!-- PROGRESBAR -->
                <div class="progress">
                    <div class="progress-bar <?php echo $warna; ?>" role="progressbar" style="width: <?php echo $panjang; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $info; ?></div>
                </div>

            </div>
        </div>

        <!-- Button trigger modal -->
        <?php
            if (($level == "petugas") or ($level == "admin")) {
        ?>
                <button type="button" class="btn btn-primary mt-2 ml-2" data-toggle="modal" data-target="#exampleModal">
                    Ubah Status Laporan
                </button>

                <button type="button" class="btn btn-primary mt-2 ml-2" data-toggle="modal" data-target="#modal_tanggapan">
                    Buat Tanggapan
                </button>
        <?php
            }
        ?>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Perubahan Status Laporan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- FORM UBAH STATUS -->
                    <form method="POST" action="ubah_status.php">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Progres Pengerjaan Laporan</label>
                                <select class="form-control" name="status">
                                <?php
                                    if ($data_pengaduan['status'] == 0) {
                                ?>
                                        <option value="0" selected>Laporan Masih Dalam Peninjauan</option>
                                        <option value="proses">Pengerjaan Sedang Berlangsung</option>
                                        <option value="selesai">Pengerjaan Telah Selesai</option>
                                <?php
                                    } elseif ($data_pengaduan['status'] == "proses") {
                                ?>
                                        <option value="0">Laporan Masih Dalam Peninjauan</option>
                                        <option value="proses" selected>Pengerjaan Sedang Berlangsung</option>
                                        <option value="selesai">Pengerjaan Telah Selesai</option>
                                <?php        
                                    } else {
                                ?>    
                                        <option value="0">Laporan Masih Dalam Peninjauan</option>
                                        <option value="proses">Pengerjaan Sedang Berlangsung</option>
                                        <option value="selesai" selected>Pengerjaan Telah Selesai</option>
                                <?php 
                                    }
                                ?>   
                                </select>
                                <input type="hidden" name="id_pengaduan" value="<?php echo $id_pengaduan ;?>">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Lakukan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modal_tanggapan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Tanggapan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- FORM TANGGAPAN -->
                    <form method="POST" action="tambah_tanggapan.php">
                        <div class="modal-body">
                            <di class="form-group">
                                <label>Tanggapan Baru</label>
                                <textarea name="tanggapan" class="form-control"></textarea>
                            </di>
                            <input type="hidden" name="id_pengaduan" value="<?php echo $id_pengaduan ;?>">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Buat Tanggapan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                Tanggapan
            </div>
            <div class="card-body">
                <?php
                $sql_tanggapan = "SELECT * FROM `tanggapan` INNER JOIN petugas ON tanggapan.id_petugas = petugas.id_petugas WHERE id_pengaduan = '$id_pengaduan' ORDER BY id_tanggapan DESC";
                $eksekusi_tanggapan = mysqli_query($conn, $sql_tanggapan);


                while ($data_tanggapan = mysqli_fetch_array($eksekusi_tanggapan)) {
                ?>
                    <div class="alert alert-info" role="alert">
                        <p><?php echo $data_tanggapan['tanggapan']; ?></p>
                        <footer class="blockquote-footer"><?php echo $data_tanggapan['nama_petugas']; ?> <cite title="Source Title"><?php echo $data_tanggapan['tgl_tanggapan']; ?></cite></footer>
                    </div>
                <?php
                }
                ?>
            </div>

        </div>
    </div>

    <!-- FOOTER -->
    <div class="bg-primary">
        <div class="container text-white text-center mt-5 pt-3 pb-3">
            <p>&copy; 2022, David Maulana Ibrahim</p>
        </div>
    </div>

<?php
    include "footer.php";
}
?>