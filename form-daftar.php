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
            <h2><b>Formulir Pendaftaran Mahasiswa Baru</b></h2>
        </div>
        <form class="row g-3" action="proses-pendaftaran.php" method="POST">
            <div class="col-md-6">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="col-md-6">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-select">
                    <option name="jenis_kelamin" value="laki-laki" selected>Laki-laki</option>
                    <option name="jenis_kelamin" value="perempuan">Perempuan</option>
                </select>
            </div>
            <div class="col-12">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" placeholder="1234 Main St">
            </div>
            <div class="col-md-6">
                <label for="fakultas" class="form-label">Fakultas</label>
                <select name="fakultas" class="form-select">
                    <option selected>Filkom</option>
                    <option>FK</option>
                    <option>FEB</option>
                    <option>FIB</option>
                    <option>FT</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="program_studi" class="form-label">Program Studi</label>
                <input type="text" class="form-control" name="program_studi">
            </div>
            <div class="d-grid gap-2 col-12 mx-auto">
                <button type="submit" value="Tambah" name="tambah" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  </body>
</html>