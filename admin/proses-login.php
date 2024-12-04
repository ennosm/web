<?php
require 'config/koneksi.php';

if (isset($_POST['masuk'])) {

    $userpengguna = $_POST['userpengguna'];
    $passpengguna = md5($_POST['passpengguna']);
    $query = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE userpengguna = '$userpengguna'
    AND passpengguna = '$passpengguna'");
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
        $_SESSION['idpengguna'] = $data['idpengguna'];
        $_SESSION['userpengguna'] = $data['userpengguna'];
        $_SESSION['levelpengguna'] = $data['levelpengguna'];
        if ($data['levelpengguna'] == 'admin') {
            header('Location: admin/index.php');
            exit();
        }elseif ($data['levelpengguna'] == 'pelanggan') {
            header('Location: pelanggan/index.php');
            exit();
        }

    } else {
        echo "<script>alert('Username atau password salah');window.location='index.php'</script>";
    }

}

?>