<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-primary sticky-top">
    <div class="container">
        <a class="navbar-brand text-white" href="index.php">ADMAS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link text-white" href="index.php">Beranda <span class="sr-only">(current)</span></a>
                </li>
                <?php
                if ($level == "masyarakat") {
                ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="form_tambah_aduan.php">Buat Pengaduan Baru</a>
                    </li>
                <?php
                }
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        Pengaduan
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="tampil_halaman_total.php">Total Pengaduan</a>
                        <a class="dropdown-item" href="tampil_halaman_belum.php">Pengaduan Belum Ditangani</a>
                        <a class="dropdown-item" href="tampil_halaman_diproses.php">Pengaduan Dalam Proses</a>
                        <a class="dropdown-item" href="tampil_halaman_selesai.php">Pengaduan Selesai</a>
                    </div>
                </li>

                <?php
                if ($level == "admin") {
                ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="manajemen_anggota.php">Manajemen Anggota</a>
                    </li>
                <?php
                }
                ?>

            </ul>

            <span class="navbar-text text-white">
                (<?php echo $level ?>)
            </span>

            <span class="navbar-text text-white">
                <!-- <?php //echo $nama_login; 
                        ?> (<a href="logout.php" class="text-white">Logout</a>) -->
                <div class="dropdown">
                    <a class="btn btn-primary dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        <?php echo $nama_login; ?>
                    </a>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="logout.php">Logout</a>
                        <?php if ($level == "masyarakat") 
                            {
                        ?>
                                <a class="dropdown-item" href="halaman_profile.php">Profile</a>
                        <?php
                            } 
                        ?>
                        
                    </div>
                </div>
            </span>


        </div>
    </div>
</nav>

