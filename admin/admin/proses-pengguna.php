<?php
require '../config/koneksi.php';


if(isset($_POST['simpan'])) {

    $idpengguna = uniqid();

    $userpengguna = $_POST['userpengguna'];
    $passpengguna = md5($_POST['passpengguna']);
    $levelpengguna = $_POST['levelpengguna'];
    $statuspengguna = 1;
    $waktupengguna = date('Y-m-d H:i:s');

    $query = "INSERT INTO pengguna (idpengguna, userpengguna, passpengguna, levelpengguna, statuspengguna, waktupengguna)
    VALUES ('$idpengguna', '$userpengguna', '$passpengguna', '$levelpengguna', '$statuspengguna', '$waktupengguna')";
    $result = mysqli_query($koneksi, $query);
    if ($result) {
        echo "<script>alert('Data pengguna berhasil disimpan');window.location='data-pengguna.php'</script>'";
    } else {
        echo "<script>alert('Data pengguna gagal disimpan');window.location='data-pengguna.php'</script>'";
    }

}

if (isset($_POST['ubah'])) {

    $idpengguna = $_SESSION['idpengguna'];
    $userpengguna = $_POST['userpengguna'];
    $levelpengguna = $_POST['levelpengguna'];
    $statuspengguna = $_POST['statuspengguna'];
    
    $query = "UPDATE pengguna SET userpengguna='$userpengguna', levelpengguna='$levelpengguna', statuspengguna='$statuspengguna' WHERE idpengguna='$idpengguna'";
    $result = mysqli_query($koneksi, $query);
 if ($result){
    echo "<script>alert('Data pengguna berhasil diubah');window.location='data-pengguna.php'</script>";
} else {
    echo "<script>alert('Data pengguna gagal diubah');window.location='data-pengguna.php'</script>";
}
}


if (isset($_GET['id'])) {

    $idpengguna = $_GET['id'];

    $query = "DELETE FROM pengguna WHERE idpengguna='$idpengguna'";
    $result = mysqli_query($koneksi, $query);
    if ($result) {
        echo "<script>alert('Data pengguna berhasil dihapus');window.location='data-pengguna.php'</script>";
    } else {
        echo "<script>alert('Data pengguna gagal dihapus');window.location='data-pengguna.php'</script>";
    }

}


?>