<?php 
    session_start();
    if (!empty($_SESSION['nik_login'])) {
        include "conn.php";

        $sql_peng_all = "SELECT * FROM pengaduan INNER JOIN masyarakat on masyarakat.nik = pengaduan.nik WHERE status = '0'";
        $eksekusi_peng_all = mysqli_query($conn, $sql_peng_all);
        $jml_peng_all = mysqli_num_rows($eksekusi_peng_all);
        
        // $data = mysqli_fetch_assoc($eksekusi_peng_all);
        // var_dump($data);

        // REPORT EXCEL
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=report_belum_proses.xls");
?>

        <h4>Tabel Seluruh Pengaduan Masyarakat</h4>
        <!-- TABLE -->
        <table border="1">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama Masyarakat</th>
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
                        <th scope="row"><?php echo $no; ?></th>
                        <td>'<?php echo $data['nik'] ;?></td> 
                        <td><?php echo $data['nama'] ;?></td>
                        <td><?php echo $data['tgl_pengaduan']; ?></td>
                        <td><?php  echo $data['isi_laporan']; ?></td>
                        <td>
                            <?php 
                                if ($data['status'] == 0) {
                                    echo "Belum diproses";
                                } else {
                                    echo $data['status'];
                                }
                            ?>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>

        <p>Jumlah Laporan yang Masuk <?php echo $jml_peng_all ;?> Pengaduan</p>
<?php
    }
?>