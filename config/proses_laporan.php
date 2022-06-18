<?php 
if(isset($_GET['administrator'])){
    if ($_POST['laporan'] == 'Laporan Data Diri, Jabatan, dan Gaji'){
        $awal = $_POST['awal'];
        $akhir = $_POST['akhir'];
        header("Location: ../admin/laporan/laporan_data_pegawai.php?awal='$awal'&akhir='$akhir'");
    }
}else if(isset($_GET['pegawai'])){
    if ($_POST['laporan'] == 'Laporan Kinerja'){
        $awal = $_POST['awal'];
        $akhir = $_POST['akhir'];
        header("Location: ../pegawai/laporan/laporan_kinerja.php?awal='$awal'&akhir='$akhir'");
    }
}
?>