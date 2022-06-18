<?php
    require_once "../config/config.php";

    $nip = $_GET['id'];

    mysqli_query($koneksi, "DELETE FROM pegawai WHERE nip='$nip'");
    mysqli_query($koneksi, "DELETE FROM presensi WHERE nip='$nip'");
    mysqli_query($koneksi, "DELETE FROM cuti WHERE nip='$nip'");
    mysqli_query($koneksi, "DELETE FROM akun WHERE username='$nip'");

    echo "
        <script>
            alert('Hapus berhasil');
            window.location='".adm_url('pegawai')."';
        </script>            
    ";
?>