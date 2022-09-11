<?php 
require 'function/function.php';

$data_gabut = query("SELECT * FROM gabut");

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
    $data_gabut = cari( $_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="other/css/bootstrap.css">
    <link rel="stylesheet" href="other/css/bootstrap.min.css">
    <link rel="stylesheet" href="other/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Data Peserta Gabut</title>
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
                        <li class="list-navbar-li">Home</li>
                        <li class="list-navbar-li">About</li>
                        <li class="list-navbar-li">Content</li>
                        <li class="list-navbar-li">Contact</li>
                        <li class="list-navbar-li login">Login  <i class="fa-sharp fa-solid fa-right-to-bracket"></i></li>
                    </ul>
                </div>
            </div>
        </nav>
    <!-- akhir area navbar -->

    <!-- awal konten -->
        <main class="col-3">
            <div class="profil-konten text-center">
                <img class="img-thumbnail" src="https://static.republika.co.id/uploads/images/inpicture_slide/poster-solo-leveling-webcomic-yang-akan-diadaptasi-menjadi_220706173845-217.png" alt="">
            </div>
            <div class="konten">
                <ul class="profil">
                    <button class="konten-li"><a class="a" href="
                    lib/add/add.php">TAMBAH</a> <i class="fa-solid fa-right-to-bracket"></i></button>
                    <form method="post" action="">
                        <input type="text" name="keyword" size="30" placeholder="Masukan Pencarian" autofocus><br>
                        <button name="cari" class="konten-li">CARI <i class="fa-solid fa-caret-right"></i></button>
                    </form>
                    
                </ul>
            </div>
        </main>
    <!-- akhir dari konten -->

    <!-- area table -->
        <div class="data-table col-8">
            <div class="table">
                <table class="data" cellpadding="10" cellspacing="0">
                    <tr>
                        <th class="data-head">No</th>                       
                        <th class="data-head">Aksi</th>
                        <th class="data-head">Nama</th>
                        <th class="data-head">Asal</th>
                        <th class="data-head">Universitas</th>
                        <th class="data-head">Jurusan</th>
                        <th class="data-head">Gambar</th>
                    </tr>

                <?php $i = 1; ?>
                <?php foreach( $data_gabut as $data ) : ?>
                    <tr>
                        <td class="data-list"><?php echo $i; ?></td>
                        <td class="data-list">
                            <a href="lib/edit/edit.php?id=<?php echo $data["id"]; ?>">Ubah</a> 
                            <a href="lib/delete/delete.php?id=<?php echo $data["id"] ?>" onclick="return confirm('yakin?');">Hapus</a>
                    </td>
                        <td class="data-list"><?php echo $data["nama"]; ?></td>
                        <td class="data-list"><?php echo $data["asal"]; ?></td>
                        <td class="data-list"><?php echo $data["universitas"]; ?></td>
                        <td class="data-list"><?php echo $data["jurusan"]; ?></td>
                        <td class="data-list"><img class="rounded-circle" width="50" height="50" src="upload/<?php echo $data["gambar"]; ?>" alt=""></td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </table>                  
            </div>
        </div>
    <!-- akhir area table -->

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