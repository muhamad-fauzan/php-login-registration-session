<?php

include("config.php");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: list-mahasiswa.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM mahasiswa_baru WHERE id=$id";
$query = mysqli_query($db, $sql);
$mahasiswa = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>

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
    <div class="container w-50 mt-5">
        <div class="title">
            <h2><b>Edit Data Mahasiswa</b></h2>
        </div>
        <form class="row g-3" action="proses-edit.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $mahasiswa['id'] ?>" />
            <div class="col-md-6">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" value="<?php echo $mahasiswa['nama'] ?>">
            </div>
            <div class="col-md-6">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <?php $jk = $mahasiswa['jenis_kelamin']; ?>
                <select name="jenis_kelamin" class="form-select">
                    <option name="jenis_kelamin" value="laki-laki" <?php echo ($jk == 'laki-laki') ? "selected": "" ?>>Laki-laki</option>
                    <option name="jenis_kelamin" value="perempuan" <?php echo ($jk == 'perempuan') ? "selected": "" ?>>Perempuan</option>
                </select>
            </div>
            <div class="col-12">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" value="<?php echo $mahasiswa['alamat'] ?>" placeholder="1234 Main St">
            </div>
            <div class="col-md-6">
                <label for="fakultas" class="form-label">Fakultas</label>
                <?php $fakultas = $mahasiswa['fakultas']; ?>
                <select name="fakultas" class="form-select">
                    <option <?php echo ($fakultas == 'Filkom') ? "selected": "" ?>>Filkom</option>
                    <option <?php echo ($fakultas == 'FK') ? "selected": "" ?>>FK</option>
                    <option <?php echo ($fakultas == 'FEB') ? "selected": "" ?>>FEB</option>
                    <option <?php echo ($fakultas == 'FIB') ? "selected": "" ?>>FIB</option>
                    <option <?php echo ($fakultas == 'FT') ? "selected": "" ?>>FT</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="program_studi" class="form-label">Program Studi</label>
                <input type="text" class="form-control" name="program_studi" value="<?php echo $mahasiswa['program_studi'] ?>">
            </div>
            <div class="d-grid gap-2 col-12 mx-auto">
                <button type="submit" value="Simpan" name="simpan" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>