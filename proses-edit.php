<?php

include("config.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jk = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $fakultas = $_POST['fakultas'];
    $prodi = $_POST['program_studi'];

    // buat query update
    $sql = "UPDATE mahasiswa_baru SET nama='$nama',  jenis_kelamin='$jk', alamat='$alamat', fakultas='$fakultas', program_studi='$prodi' WHERE id=$id";
    $query = mysqli_query($db, $sql);

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: list-mahasiswa.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>