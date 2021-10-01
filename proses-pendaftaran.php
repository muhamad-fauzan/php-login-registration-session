<?php

include("config.php");

if(isset($_POST['tambah'])){

    // ambil data dari formulir
    $nama = $_POST['nama'];
    $jk = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $fakultas = $_POST['fakultas'];
    $prodi = $_POST['program_studi'];

    // buat query
    $sql = "INSERT INTO mahasiswa_baru (nama, jenis_kelamin, alamat, fakultas, program_studi) VALUE ('$nama', '$jk', '$alamat',  '$fakultas', '$prodi')";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: index.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: index.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}

?>