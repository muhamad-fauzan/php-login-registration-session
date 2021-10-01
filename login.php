<?php 
session_start();

//connect to database
$host_db    = "localhost";
$user_db    = "root";
$pass_db    = "";
$nama_db    = "daftar_mahasiswa";
$koneksi    = mysqli_connect($host_db,$user_db,$pass_db,$nama_db);

$err        = "";
$username   = "";
$remember_me   = "";

if(isset($_COOKIE['cookie_username'])){
    $cookie_username = $_COOKIE['cookie_username'];
    $cookie_password = $_COOKIE['cookie_password'];

    $sql1 = "select * from login_mahasiswa where username = '$cookie_username'";
    $q1   = mysqli_query($koneksi,$sql1);
    $r1   = mysqli_fetch_array($q1);
    if($r1['password'] == $cookie_password){
        $_SESSION['session_username'] = $cookie_username;
        $_SESSION['session_password'] = $cookie_password;
    }
}

if(isset($_SESSION['session_username'])){
    header("location:index.php");
    exit();
}

if(isset($_POST['login'])){
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    $remember_me   = $_POST['remember_me'];

    if($username == '' or $password == ''){
        $err .= "<li>Silakan masukkan username dan juga password.</li>";
    }else{
        $sql1 = "select * from login_mahasiswa where username = '$username'";
        $q1   = mysqli_query($koneksi,$sql1);
        $r1   = mysqli_fetch_array($q1);

        if($r1['username'] == ''){
            $err .= "<li>Username <b>$username</b> tidak tersedia.</li>";
        }elseif($r1['password'] != md5($password)){
            $err .= "<li>Password yang dimasukkan tidak sesuai.</li>";
        }       
        
        if(empty($err)){
            $_SESSION['session_username'] = $username; //server
            $_SESSION['session_password'] = md5($password);

            if($remember_me == 1){
                $cookie_name = "cookie_username";
                $cookie_value = $username;
                $cookie_time = time() + (60 * 60 * 24 );
                setcookie($cookie_name,$cookie_value,$cookie_time,"/");

                $cookie_name = "cookie_password";
                $cookie_value = md5($password);
                $cookie_time = time() + (60 * 60 * 24 );
                setcookie($cookie_name,$cookie_value,$cookie_time,"/");
            }
            header("location:index.php");
        }
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Untitled</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="login-dark">
        <form action="" method="POST">
            <h2 class="sr-only">Login Form</h2>
            <?php if($err){ ?>
            <div id="login-alert" class="alert alert-danger col-sm-12">
                <ul>
                    <?php echo $err ?>
                </ul>
            </div>
            <?php } ?>
            <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
            <div class="form-group"><input class="form-control" type="text" name="username"
                    value="<?php echo $username ?>" placeholder="Username">
            </div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password">
            </div>
            <div class="input-group">
                <div class="checkbox">
                    <label>
                        <input id="login-remember" type="checkbox" name="remember_me" value="1" <?php
                            if($remember_me=='1' ) echo "checked" ?>> Remember Me
                    </label>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit" value="login" name="login">Login</button>
            </div>
            <a href="register.php" class="forgot">Belum memiliki account?</a>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>