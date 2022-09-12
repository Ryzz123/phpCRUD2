<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "web-php");

function query($query) {
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// function tambah
function tambah($data) {
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $asal = htmlspecialchars($data["asal"]);
    $universitas = htmlspecialchars($data["universitas"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    $gambar = upload();
    if( !$gambar ) {
        return  false;
    }

    $query = "INSERT INTO gabut VALUES
    ('', '$nama', '$asal', '$universitas','$jurusan','$gambar')";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

// upload gambar 
function upload() {
    $namaFile = $_FILES["gambar"]["name"];
    $ukuranFile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    // jika gambar tidak ada yang di upload
    if( $error === 4 ) {
        echo "<script>
            alert('Pilih Gambar Terlebih Dahulu')
        </script>";
        return false;
    }

    // cek jika yang di upload adalah gambar
    $ekstensiGambarValid = ["jpg","jpeg", "png"];
    $ekstensiGambar = explode('.',$namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if( !in_array($ekstensiGambar,$ekstensiGambarValid) ) {
        echo  "<script>
        alert('Yang anda masukan bukan gambar')
        </script>";
        return false;
    }

    // jika ukuran gambar terlalu besar
    if( $ukuranFile > 2000000 ) {
        echo "<scrpt>
        alert('Ukuran Gambar Terlalu Besar')
        </scrpt>";
        return false;
    }

    // lulus pngecekan 
    // generate nama random
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName,'../../upload/'. $namaFileBaru);

    return $namaFileBaru;

}

// hapus data di database
function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM gabut WHERE id = $id");

    return mysqli_affected_rows($conn);
}

// ubah data
function ubah($data) {
    global $conn;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $asal = htmlspecialchars($data["asal"]);
    $universitas = htmlspecialchars($data["universitas"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambarLama = $data["gambarLama"];

    // user pilih gambar baru atau tidak
    if( $_FILES["gambar"]["error"] === 4 ) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    // query insert data
    $query = "UPDATE gabut SET 
    nama = '$nama',
    asal = '$asal',
    universitas = '$universitas',
    jurusan = '$jurusan',
    gambar = '$gambar'
    WHERE id = $id
    ";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

// search data di database
function cari($keyword) {
    $query = "SELECT * FROM gabut 
    WHERE 
    nama LIKE '%$keyword%' OR
    asal LIKE '%$keyword%' OR
    jurusan LIKE '%$keyword%' OR
    universitas LIKE '%$keyword%' ";

    return query($query);
}

// function registrasi
function sign($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if( mysqli_fetch_assoc($result) ) {
        echo "<script>
        alert('Username sudah terdaftar');
        document.location.href = 'register.php';
        </script>";

        return  false;
    }

    // Cek konfirmasi password
    if( $password !== $password2 ) {
        echo "<script>
        alert('Password Tidak Sesuai Konfirmasi');
        document.location.href = 'register.php';
        </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}

?>