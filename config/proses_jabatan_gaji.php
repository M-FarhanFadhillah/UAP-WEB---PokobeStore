<?php
require_once "config.php";

if (isset($_GET['add'])) {
    $nip = strip_tags($_POST['nip']);
    $jabatan = strip_tags($_POST['jabatan']);
    $gaji_pokok = strip_tags($_POST['gajipokok']);
    $gaji_lembur = strip_tags($_POST['gajilembur']);
    $tmt = strip_tags($_POST['tmt']);
    $st = strip_tags($_POST['st']);

    $query = create("INSERT INTO jabatan_gaji VALUES (' ', '$jabatan', '$gaji_pokok', '$gaji_lembur', '$tmt', '$st')");

    $getId = "SELECT id_jabatan_gaji FROM jabatan_gaji ORDER BY id_jabatan_gaji DESC LIMIT 1;";
    $getIdExe = mysqli_query($koneksi, $getId);
    $id = mysqli_fetch_assoc($getIdExe);
    $id = ((int) $id["id_jabatan_gaji"]);

    $set = mysqli_query($koneksi, "UPDATE pegawai SET id_jabatan_gaji = '$id' WHERE nip = '$nip'");
    
    if ($query && $set) {
        echo '<script>
                alert("Data berhasil ditambah!")
                window.location = "' . adm_url('jabatan_gaji') . '";
            </script>';
    } else {
        echo '<script>
                alert("Data gagal ditambah!")
                window.location = "' . adm_url('tambah_jabatan_gaji') . '";
            </script>';
    }
}elseif (isset($_GET['edit'])) {
    $nipAsli = mysqli_real_escape_string($koneksi, $_POST['nip']);
    $jabatan = strip_tags($_POST['jabatan']);
    $gaji_pokok = strip_tags($_POST['gajipokok']);
    $gaji_lembur = strip_tags($_POST['gajilembur']);
    $tmt = strip_tags($_POST['tmt']);
    $st = strip_tags($_POST['st']);

    $query = mysqli_query($koneksi, "UPDATE pegawai INNER JOIN jabatan_gaji SET nama_jabatan='$jabatan', gaji_pokok='$gaji_pokok', gaji_lembur='$gaji_lembur', tanggal_mulai='$tmt', tanggal_akhir='$st' WHERE nip='$nipAsli'");

    if ($query) {
        echo '<script>
            alert("Data berhasil diperbaharui!")
            window.location = "' . adm_url('jabatan_gaji') . '";
            </script>';
    } else {
        echo '<script>
            alert("Data '.$nipAsli.' '.$jabatan.' '.$gaji_lembur.' gagal diperbaharui!")
            window.location = "' . adm_url('edit_jabatan_gaji') . '?id=' . $nipAsli . '";
            </script>';
    }
}
?>