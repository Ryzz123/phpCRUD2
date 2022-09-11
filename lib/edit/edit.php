<?php 
require '../../function/function.php';

$id = $_GET["id"];

$data = query("SELECT * FROM  gabut WHERE id = $id")[0];

if( isset($_POST["submit"]) ) {
    if( ubah($_POST) > 0 ) {
        echo "<script>
        alert('data berhasil di ubah!');
        document.location.href = '../../index.php';
        </script>";
    } else {
        echo "<script>
        alert('data gagal di ubah!');
        document.location.href = '../../index.php';
        </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../other/css/bootstrap.css">
    <link rel="stylesheet" href="../../other/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../other/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Tambah Data</title>
</head>
<body>
    
    <!-- area navbar -->
        <nav>
            <div class="navbar-head">
                <div class="navbar-profil">
                    <img src="https://i.scdn.co/image/ab67616d0000b2735d81e8f78a9ff3c6b067a420" alt="ini navbar">
                    <h3 class="navbar-judul-teks">GabuT</h3>
                </div>
                <div class="list-navbar">
                    <ul class="navbar-list">
                        <li class="list-navbar-li"><a class="a" href="../../index.php">Home</a></li>
                        <li class="list-navbar-li">About</li>
                        <li class="list-navbar-li">Content</li>
                        <li class="list-navbar-li">Contact</li>
                        <li class="list-navbar-li login">Login  <i class="fa-sharp fa-solid fa-right-to-bracket"></i></li>
                    </ul>
                </div>
            </div>
        </nav>
    <!-- akhir area navbar -->

    <!-- form tambah -->
        <main class="col-3 main">
            <div class="profil-konten text-center">
                <img class="img-thumbnail" src="../../upload/<?php echo $data["gambar"]; ?>" alt="">
            </div>
            <div class="konten1">
                <ul class="profil2">
                    <form method="post" action="" enctype="multipart/form-data">
                        <ul>                      
                            <li>
                                <input type="hidden" name="id" value="<?php echo $data["id"] ?>">
                                <input type="hidden" name="gambarLama" value="<?php echo $data["gambar"] ?>">
                            </li>

                            <li>
                            <label for="nama">nama</label><br>
                            <input  class="input2" type="text" name="nama" id="nama" value="<?php echo $data["nama"] ?>"><br>
                         </li>

                         <li>
                         <label for="asal">asal</label><br>
                         <input  class="input2" type="text" name="asal" id="asal" value="<?php echo $data["asal"] ?>"><br>
                         </li>

                         <li>
                         <label for="universitas">universitas</label><br>
                         <input  class="input2" type="text" name="universitas" id="universitas" value="<?php echo $data["universitas"] ?>"><br>
                         </li>

                         <li>
                         <label for="jurusan">jurusan</label><br>
                         <input  class="input2" type="text" name="jurusan" id="jurusan" value="<?php echo $data["jurusan"] ?>"><br>
                         </li>

                         <li>
                         <label for="gambar">gambar</label><br>
                         <input  class="input2" type="file" name="gambar" id="gambar"><br>
                         </li>

                         <li>
                         <button type="submit" name="submit" class="konten-li">TAMBAH<i class="fa-solid fa-caret-right"></i></button>
                         </li>
                        </ul>
                    </form>
                </ul>
            </div>
        </main>
    <!-- akhir form tambah -->

    <!-- footer -->
    <footer>
            <div class="footer-bg">
                <p>Copyright <i class="fa-regular fa-copyright"></i> By Ryzz</p>
            </div>
        </footer>
    <!-- akhir dari footer -->

    <!-- script -->
<script src="other/js/bootstrap.bundle.min.js"></script>
<script src="other/js/bootstrap.js"></script>
</body>
</html>