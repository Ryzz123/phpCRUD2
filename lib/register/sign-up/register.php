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
    <title>Halaman Sign-up</title>
</head>
<body>

    <!-- form tambah -->
    <main class="col-3 main">
            <div class="profil-konten text-center">
                <img class="img-thumbnail" src="https://static.republika.co.id/uploads/images/inpicture_slide/poster-solo-leveling-webcomic-yang-akan-diadaptasi-menjadi_220706173845-217.png" alt="">
            </div>
            <div class="konten1">
                <ul class="profil2">
                    <form method="post" action="sign.php">
                        <ul>
                          
                        <li>
                            <label for="username">Username</label><br>
                            <input  class="input2" type="text" name="username" id="username" autocomplete autofocus required=""><br>
                        </li>
                            <label for="password">Password</label><br>
                            <input   class="input2" type="password" name="password" id="password" autocomplete=""><br>
                         <li>
                            <li>
                                <label for="password2">Confirm Password</label>
                                <input   class="input2" type="password" name="password2" id="password2">
                            </li>
                         <button type="submit" name="sign" class="konten-li">SIGN-UP<i class="fa-solid fa-caret-right"></i></button>
                         </li><br><br>
                         <li>
                            <p>Sudah Punya Akun?</p><br>
                            <button class="konten-li"><a style="text-decoration: none; color: white;" href="../login/login.php">Masuk</a></button>
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