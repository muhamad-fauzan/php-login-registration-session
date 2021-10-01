<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Pendataan Mahasiswa Baru | UB Apps</title>
  </head>
  <body>
    <nav class="navbar navbar-light bg-white">
    <div class="container">
        <a class="navbar-brand">Pendataan Mahasiswa</a>
        <form class="d-flex">
            <a href="./logout.php"><button class="btn btn-warning" type="button">Logout</button></a>
        </form>
    </div>
    </nav>  
    <div class="px-4 py-5 my-5 text-center">
        <h1 class="display-5 fw-bold">Pendataan Mahasiswa Baru</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead ">Laman pendataan mahasiswa baru Universitas Brawijaya 2021.</p>
            <p class="lead mb-4"> Diharap memasukkan data yang valid.</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <a href="form-daftar.php"><button type="button" class="btn btn-primary btn-lg px-4 gap-3">Tambah
                    Mahasiswa</button></a>
                <a href="list-mahasiswa.php"><button type="button" class="btn btn-outline-secondary btn-lg px-4">Daftar
                    Mahasiswa</button></a>
            </div>
        </div>
    </div>

    <?php if(isset($_GET['status'])): ?>
    <p>
        <?php
            if($_GET['status'] == 'sukses'){
                echo "Pendaftaran siswa baru berhasil!";
            } else {
                echo "Pendaftaran gagal!";
            }
        ?>
    </p>
    <?php endif; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>


<?php 
session_start();
if(!isset($_SESSION['session_username'])){
    header("location:login.php");
    exit();
}
// print_r($_SESSION);
// print_r($_COOKIE);