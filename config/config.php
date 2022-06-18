<?php

    // atur zona waktu default ke asia/jakarta
    date_default_timezone_set('Asia/Jakarta');

    // aktifkan session
    session_start();

    // definisikan data yang akan digunakan untuk mengakses ke database ke dalam sebuah variabel
    $host = 'localhost';
    $user = 'id19128426_admin';
    $pass = '>kQj8(<GgZeNhJ&J';
    $db = 'id19128426_simpeg';

    // panggil data yang telah didefinisikan dan jalankan perintah connect database mysqli
    $koneksi = mysqli_connect($host, $user, $pass, $db);

    // fungsi yang digunakan untuk memanggil sebuah library
    function asset($url = null)    {
        // set default url library
        $asset_url = "https://pokobestore.000webhostapp.com/";

        // jika url yang dikirimkan meimiliki nilai
        if ($url != null) {
            // sistem akan mengarahkan ke url yang dituju
            return $asset_url.'/'.$url;
        }else{
            return $asset_url;
        }
    }

    // fungsi yang digunakan untuk mengarahkan halaman
    function base_url($url=null){
        // set default url halaman
        $baseurl = "https://pokobestore.000webhostapp.com/";

        // jika url yang dikirimkan meimiliki nilai
        if ($url != null) {
            // sistem akan mengarahkan ke url yang dituju
            return $baseurl.'/'.$url.'.php';
        } else{
            return $baseurl;
        }
    }

    function adm_url($url=null){
        // set default url halaman
        $admurl = "https://pokobestore.000webhostapp.com/admin";

        // jika url yang dikirimkan meimiliki nilai
        if ($url != null) {
            // sistem akan mengarahkan ke url yang dituju
            return $admurl.'/'.$url.'.php';
        } else{
            return $admurl;
        }
    }

    function peg_url($url=null){
        // set default url halaman
        $pegurl = "https://pokobestore.000webhostapp.com/admin/pegawai.php";

        // jika url yang dikirimkan meimiliki nilai
        if ($url != null) {
            // sistem akan mengarahkan ke url yang dituju
            return $pegurl.'/'.$url.'.php';
        } else{
            return $pegurl;
        }
    }

    // yang membedakan asset dan base_url adalah di ekstension file yang ada di base_url
    
    // fungsi yang digunakan untuk mengeksekusi data yang ingin ditampilkan
    function query($query){
        global $koneksi;//mendeklarasikan variabel koneksi mengikuti variabel yang ada diatas
        // menjalankan query sql berdasarkan parameter yang diterima dan disimpan ke dalam variabel result
        $result = mysqli_query($koneksi, $query);

        // buat variabel untuk menampung array
        $rows = [];

        // lakukan perulangan hasil data yang ada di variabel result
        while ($row = mysqli_fetch_assoc($result)) {
            // simpan semua data yang berulang kedalam array rows
            $rows[]=$row;
        }
        // kembalikan hasil data yang ada divariabel rows
        return $rows;
    }

    // fungsi yang digunakan untuk membuat data yang diinputkan user tersimpan kedalam database
    function create($query){
        global $koneksi;//mendeklarasikan variabel koneksi mengikuti variabel yang ada diatas
        $result = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
        return $result;
    }

    function update($query){
        global $koneksi;//mendeklarasikan variabel koneksi mengikuti variabel yang ada diatas
        $result = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
        return $result;
    }
