<?php 
    require_once "../../config/config.php";
    $awal = $_GET["awal"];
    $akhir = $_GET["akhir"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Laporan Data Diri, Jabatan, dan Gaji</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <link href="../assets/styles.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700;800;900&display=swap');

        body {
            font-family: 'Rubik', sans-serif;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <header>
            <h3 class="text-center mt-5">Laporan Data Diri, Jabatan, dan Gaji</h3>
            <h5  class="text-center mb-5">PT. ABC</h5>
        </header>
        <h5 class="mx-5">Periode Laporan: <?= $awal ?> s.d. <?= $akhir ?></h5>
        <div class="table-responsive m-5">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Pegawai</th>
                            <th>Nomor Induk</th>
                            <th>Tempat, Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Jabatan</th>
                            <th>Gaji</th>
                            <th>Periode</th>
                            <th>Status Kepegawaian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $data_p = mysqli_query($koneksi, "SELECT * FROM pegawai INNER JOIN jabatan_gaji WHERE pegawai.id_jabatan_gaji = jabatan_gaji.id_jabatan_gaji GROUP BY nip asc");
                        foreach ($data_p as $p) : ?>
                            <tr>
                                <td>
                                    <?= $no++; ?>
                                </td>
                                <td>
                                    <?= ucwords($p['nama_pegawai']) ?>
                                </td>
                                <td>
                                    <?= $p['nip'] ?>
                                </td>
                                <td>
                                    <?= ucwords($p['tempat_lahir']) . ', ' . date('d-m-Y', strtotime($p['tgl_lahir'])) ?>
                                </td>
                                <td>
                                    <?= $p['alamat'] ?>
                                </td>
                                <td>
                                    <?= $p['nama_jabatan'] ?>
                                </td>
                                <td>
                                    <?= $p['gaji_pokok'] + $p['gaji_lembur'] ?>
                                </td>
                                <td>
                                    <?= date('d-m-Y', strtotime($p['tanggal_mulai'])) ?> s.d. <?= date('d-m-Y', strtotime($p['tanggal_akhir'])) ?>
                                </td>
                                <td>
                                    <?= ucwords($p['status_pegawai']) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
    </div>
</body>
</html>