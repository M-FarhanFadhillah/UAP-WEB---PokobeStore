<?php

    require_once "config.php";

    if (isset($_GET['login']) ) {
        $username = mysqli_real_escape_string($koneksi, $_POST['username']);
        $password = $_POST['password'];

        // cek username yang diinput oleh user tersedia dan sama dengan yang ada didatabase atua tidak
        $cek_user = mysqli_query($koneksi, "SELECT * FROM akun WHERE username='$username'");

        // cek lagi dengan fungsi mysqli_num_rows untuk melihat ada atau tidaknya data ditemukan, jika ditemukan maka akan menghasilkan nilai 1
        if (mysqli_num_rows($cek_user) > 0) {
            // simpan hasil cek user ke dalam variabel agar bisa digunakan untuk cek password
            $data_user = mysqli_fetch_assoc($cek_user);

            // melakukan verifikasi password yang diinputkan oleh user dan mencocokannya dengan password yang ada didatabase
            if (password_verify($password, $data_user['password'])) {

                //session_start();
                $_SESSION['login'] = 'true';
                $_SESSION['username'] = $data_user['username'];

                $role = $data_user['role'];
    
                if($role == 'pegawai'){
                    header('Location: ../pegawai/pegawai.php');

                    echo "
                        <script>
                            alert('Login berhasil');
                            window.location='".peg_url('pegawai')."';
                        </script>
                    ";
                }else{
                     header('Location: ../admin/pegawai.php');

                     echo "
                     <script>
                         alert('Login berhasil');
                         window.location='".adm_url('pegawai')."';
                     </script>
                 ";
                }
            }else{
                echo "
                    <script>
                        alert('Username atau Password salah');
                        window.location='".base_url('login')."';
                    </script>            
                ";
            }
        }
    }elseif (isset($_GET['logout'])) {
        // hapus seluruh data session yang ada
        session_unset();
        session_destroy();

        // hapus cookie yang tersimpan
        setcookie('id','',0,'/');
        setcookie('value','',0,'/');
        
        echo "
            <script>
                alert('Logout berhasil');
                window.location='".base_url('login')."';
            </script>            
        ";
    }
?>