<?php 
require '../../function/function.php';

if( isset($_POST["submit"]) ) {
    if( tambah($_POST) > 0) {
        echo "<script>
        alert('data berhasil ditambahkan');
        document.location.href= '../../index.php';
        </script>";
    } else {
        echo "<script>
        alert('data gagal ditambahkan');
        document.location.href= '../../index.php';
        </script>";
    }
}

?>