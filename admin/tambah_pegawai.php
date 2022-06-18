<?php
require_once "../templates/sidebar.php";
?>

<div class="container-fluid">
    <div class="col-md-9 ms-sm-auto col-lg-10 pt-4 pb-1 px-3 d-flex align-items-center fs-6 bread">
        <nav aria-label="breadcrumb fs-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= adm_url('pegawai') ?>">Data Pegawai</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
            </ol>
        </nav>
    </div>

    <div class="card col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <form method="POST" action="<?= base_url('config/proses_pegawai') ?>?add" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group row mb-2">
                    <label for="nip" class="col-sm-3 col-form-label">Nomor Induk</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" name="nip" id="nip" placeholder="Nomor Induk" required autocomplete="off" autofocus>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="nama_pegawai" class="col-sm-3 col-form-label">Nama Pegawai</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai" placeholder="Nama Pegawai" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="ttl" class="col-sm-3 col-form-label">Tempat/Tanggal Lahir</label>
                    <div class="col">
                        <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" required autocomplete="off">
                    </div>
                    <div class="col">
                        <input type="date" class="form-control" value="<?= date('Y-m-d'); ?>" name="tgl_lahir" placeholder="Tanggal Lahir" required>
                    </div>
                </div>
                <fieldset class="form-group mb-2">
                    <div class="row">
                        <legend class="col-form-label col-sm-3 pt-0">Jenis Kelamin</legend>
                        <div class="col-sm-9">
                            <div class="form-check mr-3">
                                <input class="form-check-input" type="radio" name="jk" id="jk1" value="Laki-laki" checked>
                                <label class="form-check-label" for="jk1">
                                    Laki-laki
                                </label>
                            </div>
                            <div class="form-check mr-3">
                                <input class="form-check-input" type="radio" name="jk" id="jk2" value="Perempuan">
                                <label class="form-check-label" for="jk2">
                                    Perempuan
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="form-group row mb-2">
                    <label for="no_hp" class="col-sm-3 col-form-label">Nomor Handphone</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" name="no_hp" id="no_hp" placeholder="Nomor Handphone" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-9">
                        <textarea name="alamat" class="form-control" id="alamat" cols="10" rows="3" placeholder="Alamat Lengkap" required autocomplete="off"></textarea>
                    </div>
                </div>
                <fieldset class="form-group mb-2">
                    <div class="row">
                        <legend class="col-form-label col-sm-3 pt-0">Status Pegawai</legend>
                        <div class="col-sm-9">
                            <div class="form-check mr-3">
                                <input class="form-check-input" type="radio" name="status_pegawai" id="status1" value="Aktif" checked>
                                <label class="form-check-label" for="status1">
                                    Aktif
                                </label>
                            </div>
                            <div class="form-check mr-3">
                                <input class="form-check-input" type="radio" name="status_pegawai" id="status2" value="Nonaktif">
                                <label class="form-check-label" for="status2">
                                    Nonaktif
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="card-footer" style="background-color: #ffffff;">
                <button type="submit" class="btn btn-success"><i class='bx bx-save'></i> Simpan</button>
                <a href="<?= adm_url('pegawai') ?>" class="btn btn btn-outline-danger"> Batal</a>
            </div>
        </form>
    </div>
</div>