<?php
    require_once "config/config.php";
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistem Informasi Kepegawaian">
    <meta name="author" content="kayla">

    <title>SIMPEG - Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <link href="../assets/styles.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700;800;900&display=swap');
        body {
            font-family: 'Rubik', sans-serif;
        }
    </style>
</head>

<body>
    <form class="akun" method="POST" action="<?= base_url('config/proses_log') ?>?login">
    <!-- <form class="akun" method="POST" action="<?= base_url('test_proses_log') ?>"> -->
      <div class="mb-3">
        <label for="inputusername" class="form-label">Username</label>
        <input name="username" class="form-control" id="inputusername">
      </div>
      <div class="mb-3">
        <label for="inputpassword" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="inputpassword">
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
</body>
