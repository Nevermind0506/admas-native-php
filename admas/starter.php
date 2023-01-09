<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- DATA TABLES -->
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">


    <title>ADMAS</title>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container">
            <a class="navbar-brand text-white" href="#">ADMAS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link text-white" href="#">Beranda <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Buat Pengaduan Baru</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            Pengaduan
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Total Pengaduan</a>
                            <a class="dropdown-item" href="#">Pengaduan Dalam Proses</a>
                            <a class="dropdown-item" href="#">Pengaduan Selesai</a>
                        </div>
                    </li>
                </ul>
                <span class="navbar-text text-white">
                    Admin (<a class="text-white">Logout</a>)
                </span>
            </div>
        </div>
    </nav>

    <!-- KONTEN -->
    <div class="container">
        <!-- JUDUL -->
        <h4 class="text-uppercase font-weight-bold text-secondary mt-2">Daftar Pengaduan Yang Di Buat</h4>
        <hr>

        <div class="row text-white">

            <!-- CARD -->
            <div class="card bg-warning mr-3" style="width: 30%;">
                <div class="card-body">
                    <h5 class="card-title">JUMLAH PENGADUAN</h5>
                    <div class="display-4 font-weight-bold">25</div>
                    <a href="">
                        <p class="card-text text-white">Selengkapnya</p>
                    </a>
                </div>
            </div>

            <!-- CARD -->
            <div class="card bg-info mr-3" style="width: 30%;">
                <div class="card-body">
                    <h5 class="card-title">PENGADUAN DI PROSES</h5>
                    <div class="display-4 font-weight-bold">25</div>
                    <a href="">
                        <p class="card-text text-white">Selengkapnya</p>
                    </a>
                </div>
            </div>

            <!-- CARD -->
            <div class="card bg-success" style="width: 30%;">
                <div class="card-body">
                    <h5 class="card-title">PENGADUAN SELESAI</h5>
                    <div class="display-4 font-weight-bold">20</div>
                    <a href="">
                        <p class="card-text text-white">Selengkapnya</p>
                    </a>
                </div>
            </div>
        </div>
            <!-- UNTUK MENAMBAHKAN DATA BARU -->
            <a href="" class="btn btn-primary mt-5 mb-3">BUAT PENGADUAN BARU</a>
            <!-- TABLE -->
            <table class="table table-striped data ">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Isi Pengaduan</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>2021-02-01</td>
                        <td><a href="" class="text-secondary">Kondisi Jalan si Surya Kencana banyak lubang besar</a></td>
                        <td>Sedang Di Tangani</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>2021-02-01</td>
                        <td><a href="" class="text-secondary">Jalan di depan Setu Pamulang bergelombang, tolong perhatiannya</a></td>
                        <td>Sedang di tangani</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>2021-02-01</td>
                        <td><a href="" class="text-secondary">Pohon besar di dekat Villa Dago tolong dikondisikan, khawatir rubuh</a></td>
                        <td>Selesai</td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>2021-02-01</td>
                        <td><a href="" class="text-secondary">Kondisi Jalan si Surya Kencana banyak lubang besar</a></td>
                        <td>Sedang Di Tangani</td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>2021-02-01</td>
                        <td><a href="" class="text-secondary">Jalan di depan Setu Pamulang bergelombang, tolong perhatiannya</a></td>
                        <td>Sedang di tangani</td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td>2021-02-01</td>
                        <td><a href="" class="text-secondary">Pohon besar di dekat Villa Dago tolong dikondisikan, khawatir rubuh</a></td>
                        <td>Selesai</td>
                    </tr>
                    <tr>
                        <th scope="row">7</th>
                        <td>2021-02-01</td>
                        <td><a href="" class="text-secondary">Kondisi Jalan si Surya Kencana banyak lubang besar</a></td>
                        <td>Sedang Di Tangani</td>
                    </tr>
                    <tr>
                        <th scope="row">8</th>
                        <td>2021-02-01</td>
                        <td><a href="" class="text-secondary">Jalan di depan Setu Pamulang bergelombang, tolong perhatiannya</a></td>
                        <td>Sedang di tangani</td>
                    </tr>
                    <tr>
                        <th scope="row">9</th>
                        <td>2021-02-01</td>
                        <td><a href="" class="text-secondary">Pohon besar di dekat Villa Dago tolong dikondisikan, khawatir rubuh</a></td>
                        <td>Selesai</td>
                    </tr>
                    <tr>
                        <th scope="row">10</th>
                        <td>2021-02-01</td>
                        <td><a href="" class="text-secondary">Kondisi Jalan si Surya Kencana banyak lubang besar</a></td>
                        <td>Sedang Di Tangani</td>
                    </tr>
                    <tr>
                        <th scope="row">11</th>
                        <td>2021-02-01</td>
                        <td><a href="" class="text-secondary">Jalan di depan Setu Pamulang bergelombang, tolong perhatiannya</a></td>
                        <td>Sedang di tangani</td>
                    </tr>
                    <tr>
                        <th scope="row">12</th>
                        <td>2021-02-01</td>
                        <td><a href="" class="text-secondary">Pohon besar di dekat Villa Dago tolong dikondisikan, khawatir rubuh</a></td>
                        <td>Selesai</td>
                    </tr>
                </tbody>
            </table>
    </div>

    <!-- FOOTER -->
    <div class="bg-primary">
        <div class="container text-white text-center mt-5 pt-3 pb-3">
            <p>&copy; David Maulana Ibrahim</p>
        </div>
    </div>




    <!-- BOOTSTRAP JS -->
    <script src="js/jquery.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- DATA TABLES -->
    <script src="js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.data').DataTable();
        });
    </script>
</body>

</html>