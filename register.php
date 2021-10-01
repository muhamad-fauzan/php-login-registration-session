<?php

include("config.php");


if(isset($_POST['register'])){

    // ambil data dari formulir
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $hash_password = md5($password);

    // buat query
    $sql = "INSERT INTO login_mahasiswa (username, password, email) VALUE ( '$username', '$hash_password', '$email')";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        $email_title = "Konfirmasi Registrasi User";
        $email_message = "Silahkan melakukan verifikasi email dengan mengakses link di bawah";
        $email_message .= "http://localhost/php-login-registration-session/verifikasi.php?email=$email";

        kirim_email($email, $email_title, $email_message);
        header('Location: login.php');
    } else {
        die("Pendaftaran Gagal");
    }

} 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
function kirim_email($email, $email_title, $email_message){

    $my_email = "email_anda@gmail.com";
    $password_email = "password_anda";
    $sender_name = "UB activation";

    //Load Composer's autoloader
    require getcwd().'/vendor/autoload.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $my_email;                     //SMTP username
        $mail->Password   = $password_email;                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom($my_email, $sender_name);
        $mail->addAddress($email, 'User baru');     //Add a recipient

        //Attachments
        $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $email_title;
        $mail->Body    = $email_message;

        $mail->send();
        return "success";
    } catch (Exception $e) {
        return "failed: {$mail->ErrorInfo}";
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
            <h2 class="sr-only">Register Form</h2>
            <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email">
            </div>
            <div class="form-group"><input class="form-control" type="text" name="username" placeholder="Username">
            </div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit" value="register"
                    name="register">Register</button>
            </div>
            <a href="logout.php" class="forgot">Sudah punya account?</a>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>