<?php include("config.php"); ?>

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
      <div class="container mt-5">
        <div class="title">
            <h2><b>Daftar Mahasiswa</b></h2>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Fakultas</th>
                    <th scope="col">Program Studi</th>
                    <th scope="col">Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php
            $sql = "SELECT * FROM mahasiswa_baru";
            $query = mysqli_query($db, $sql);
    
            $index = 1;
            while($mahasiswa = mysqli_fetch_array($query)){
                echo "<tr>";
    
                echo "<th> $index </th>";
                echo "<td>".$mahasiswa['nama']."</td>";
                echo "<td>".$mahasiswa['jenis_kelamin']."</td>";
                echo "<td>".$mahasiswa['alamat']."</td>";
                echo "<td>".$mahasiswa['fakultas']."</td>";
                echo "<td>".$mahasiswa['program_studi']."</td>";
    
                echo "<td>";
                echo "<a href='form-edit.php?id=".$mahasiswa['id']."'>Edit</a> | ";
                echo "<a href='form-hapus.php?id=".$mahasiswa['id']."'>Hapus</a>";
                echo "</td>";
    
                echo "</tr>";
                $index++;
            }
            ?>
            </tbody>
            <a href="form-daftar.php">[+] Tambah Mahasiswa</a>
            <p>Total:
                <?php echo mysqli_num_rows($query) ?> Mahasiswa
            </p>
    
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    </body>
</html>