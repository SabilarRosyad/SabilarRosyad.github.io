<?php
    include "koneksi.php";

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM user WHERE username = '$username' and password = '$password'";
    $result = mysqli_query($connect, $query);
    $cek = mysqli_num_rows($result);
    
    if($cek > 0){
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['status'] = 'login';
    ?>
        Anda berhasil login, silakan menuju
        <a href="homeSession.php">Halaman home</a>
    <?php
    }else{
        ?>
        Gagal login. silahkan login ulang
        <a href="sessionloginForm.html">Halaman Login</a>
    <?php
        echo mysqli_error($connect);
    }
?>