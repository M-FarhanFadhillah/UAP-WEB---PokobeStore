<?php
    require_once "config/config.php";

    $username = '1329010003';
    $pass = '20220525';
    $hash = password_hash($pass, PASSWORD_DEFAULT);

    // create("INSERT INTO akun VALUES ('$username', '$hash', 'pegawai')");
?>