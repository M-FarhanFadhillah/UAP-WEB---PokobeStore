<?php
require_once "../templates/sidebar.php";
$data_pegawai = query("SELECT * FROM pegawai WHERE nip='$nip'");
?>

<div class="table-responsive">
    <table class="table table-borderless text-dark mt-3">
        <tr>
            <td class="col-4">NIP</td>
            <td>:</td>
            <td class="col-8"><?= $data_pegawai[0]['nip'] ?></td>
        </tr>
        <tr>
            <td>Nama Lengkap</td>
            <td>:</td>
            <td><?= ucwords($data_pegawai[0]['nama_pegawai']) ?></td>
        </tr>
        <tr>
            <td>Tempat, Tanggal Lahir</td>
            <td>:</td>
            <td><?= ucwords($data_pegawai[0]['tempat_lahir']) . ', ' . date('d-m-Y', strtotime($data_pegawai[0]['tgl_lahir'])) ?> </td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td><?= ucwords($data_pegawai[0]['jk']) ?> </td>
        </tr>
        <tr>
            <td>Status Kepegawaian</td>
            <td>:</td>
            <td><?= strtoupper($data_pegawai[0]['status_pegawai']) ?> </td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><?= ucwords($data_pegawai[0]['alamat']) ?> </td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td><?= $data_pegawai[0]['email'] ?> </td>
        </tr>
        <tr>
            <td>No. HP</td>
            <td>:</td>
            <td><?= $data_pegawai[0]['no_hp'] ?> </td>
        </tr>
    </table>
</div>