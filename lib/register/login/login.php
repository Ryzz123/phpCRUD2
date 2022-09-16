<?php 
session_start();
require '../../../function/function.php';

// cek cookie dan username
if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id nya
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // ceek cookie dan username
    if( $key === hash('sha256', $row['username']) ) {
        $_SESSION['login'] = true;
    }
}

if( isset($_SESSION['login']) ) {
    header('Location: ../../../index.php');
    exit;
}

if( isset($_POST["login"]) ) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // Cek usernamenya
    if( mysqli_num_rows($result) === 1 ) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if( password_verify($password, $row["password"]) ) {
            // Set Session
            $_SESSION["login"] = true;

            // cek remember me
            if( isset($_POST["remember"]) ) {

                // buat cookie
                setcookie('id', $row['id'], time() + 60);
                setcookie('key', hash('sha256', $row["username"]), time() + 60);
            }
            
            header("Location: ../../../index.php");
            exit;
        }
    }

    $error = true;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../other/css/bootstrap.css">
    <link rel="stylesheet" href="../../../other/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../other/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Halaman Login</title>
</head>
<body>

    <!-- form tambah -->
    <main class="col-3 main">
            <div class="profil-konten text-center">
                <img class="img-thumbnail" src="https://static.republika.co.id/uploads/images/inpicture_slide/poster-solo-leveling-webcomic-yang-akan-diadaptasi-menjadi_220706173845-217.png" alt="">
            </div>
            <div class="konten1">
                <ul class="profil2">
                    <form method="post" action="">
                        <ul>
                          
                        <li>
                            <label for="username">Username</label><br>
                            <input  class="input2" type="text" name="username" id="username"><br>
                        </li>
                            <label for="password">Password</label><br>
                            <input class="input2" type="password" name="password" id="password"><br>
                         <li>
                        <li>
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember">ingat saya</label>
                        </li>
                         <button type="submit" name="login" class="konten-li">LOGIN<i class="fa-solid fa-caret-right"></i></button>
                         </li><br>
                         <li>
                            <p>Belum Punya Akun?</p><br>
                            <button class="konten-li"><a style="text-decoration: none; color: white;" href="../sign-up/register.php">Daftar</a></button>
                         </li>
                        </ul>
                    </form>
                </ul>
            </div>
        </main>
    <!-- akhir form tambah -->

    <!-- script -->
<script src="../../../other/js/bootstrap.bundle.min.js"></script>
<script src="../../../other/js/bootstrap.js"></script>
</body>
</html>
</body>
</html>