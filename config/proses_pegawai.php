<?php
require_once "config.php";

if (isset($_GET['add'])) {
    $nip = mysqli_real_escape_string($koneksi, $_POST['nip']); 
    $nama_pegawai = strip_tags($_POST['nama_pegawai']);
    $tempat_lahir = strip_tags($_POST['tempat_lahir']);
    $tgl_lahir = strip_tags($_POST['tgl_lahir']);
    $jk = strip_tags($_POST['jk']);
    $no_hp = strip_tags($_POST['no_hp']);
    $email = strip_tags($_POST['email']);
    $alamat = strip_tags($_POST['alamat']);
    $status_pegawai = strip_tags($_POST['status_pegawai']);

    $query = create("INSERT INTO `pegawai`(`nip`, `nama_pegawai`, `tempat_lahir`, `tgl_lahir`, `jk`, `no_hp`, `email`, `alamat`, `status_pegawai`, `id_jabatan_gaji`) VALUES ('$nip', '$nama_pegawai', '$tempat_lahir', '$tgl_lahir', '$jk', '$no_hp', '$email', '$alamat', '$status_pegawai', '12')");

    $pass = str_replace("-", "", $tgl_lahir);
    $hash = password_hash($pass, PASSWORD_DEFAULT);

    $akun = create("INSERT INTO akun VALUES ('$nip', '$hash', 'pegawai')");

    if ($query && $akun) {
        echo '<script>
            alert("Data berhasil ditambah!")
            window.location = "' . adm_url('pegawai') . '";
            </script>';
    } else {
        echo '<script>
            alert("Data gagal ditambah!")
            window.location = "' . adm_url('edit_pegawai') . '?id=' . $nipAsli . '";
            </script>';
    }


} elseif (isset($_GET['edit'])) {
    $nipAsli = mysqli_real_escape_string($koneksi, $_POST['nipAsli']);
    $nip = mysqli_real_escape_string($koneksi, $_POST['nip']);
    $nama_pegawai = strip_tags($_POST['nama_pegawai']);
    $tempat_lahir = strip_tags($_POST['tempat_lahir']);
    $tgl_lahir = strip_tags($_POST['tgl_lahir']);
    $jk = strip_tags($_POST['jk']);
    $no_hp = strip_tags($_POST['no_hp']);
    $email = strip_tags($_POST['email']);
    $alamat = strip_tags($_POST['alamat']);
    $status_pegawai = strip_tags($_POST['status_pegawai']);

    $query = mysqli_query($koneksi, "UPDATE pegawai SET nip='$nip',nama_pegawai='$nama_pegawai', tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir', jk='$jk', no_hp='$no_hp', email='$email', alamat='$alamat', status_pegawai='$status_pegawai' WHERE nip='$nipAsli' ");

    if ($query) {
        echo '<script>
            alert("Data berhasil diperbaharui!")
            window.location = "' . adm_url('pegawai') . '";
            </script>';
    } else {
        echo '<script>
            alert("Data gagal diperbaharui!")
            window.location = "' . adm_url('edit_pegawai') . '?id=' . $nipAsli . '";
            </script>';
    }
}
