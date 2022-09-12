<?php 
require '../../../function/function.php';

if( isset($_POST["sign"]) ) {
    if( sign($_POST) > 0 ) {
        echo "<script>
        alert('kamu berhasil registrasi');
        document.location.href = '../login/login.php';
        </script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>