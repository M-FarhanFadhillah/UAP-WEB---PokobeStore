<?php
require_once "../templates/sidebar.php";

//simpan data id(nip) yang dikirim dari halaman pegawai ke dalam variabel nip
$nip = $_GET['id'];

// lakukan filter data berdasarkan nip yang telah ditangkap divariabel nip dan jalankan function query
// simpan hasil query kedalam variabel data_detail
$data_detail = query("SELECT * FROM pegawai WHERE nip='$nip'");

?>

<div class="container-fluid">
    <div class="bread col-md-9 ms-sm-auto col-lg-10 fs-6 pt-4 pb-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= adm_url('pegawai') ?>">Data Pegawai</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Pegawai</li>
            </ol>
        </nav>
    </div>

    <!-- DataTales Example -->
    <div class="card col-md-9 ms-sm-auto col-lg-10">
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <h2 class="mt-3"><?= ucwords($data_detail[0]['nama_pegawai']) ?></h2>
                                <span class="text-muted"><?= $data_detail[0]['nip'] ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <?php
                            require_once "profil.php";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>