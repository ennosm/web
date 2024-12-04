<?php
require '../config/koneksi.php';


if(isset($_POST['simpan'])) {

    $idkategori = uniqid();

    $namakategori = $_POST['namakategori'];

    $query = "INSERT INTO kategori (idkategori, namakategori)
    VALUES ('$idkategori', '$namakategori')";
    $result = mysqli_query($koneksi, $query);
    if ($result) {
        echo "<script>alert('Data kategori berhasil disimpan');window.location='data-kategori.php'</script>'";
    } else {
        echo "<script>alert('Data kategori gagal disimpan');window.location='data-kategori.php'</script>'";
    }

}

if (isset($_POST['ubah'])) {

    $idkategori = $_SESSION['idkategori'];
    $namakategori = $_POST['namakategori'];
    
    $query = "UPDATE kategori SET namakategori='$namakategori' WHERE idkategori='$idkategori'";
    $result = mysqli_query($koneksi, $query);
 if ($result){
    echo "<script>alert('Data kategori berhasil diubah');window.location='data-kategori.php'</script>";
} else {
    echo "<script>alert('Data kategori gagal diubah');window.location='data-kategori.php'</script>";
}
}


if (isset($_GET['id'])) {

    $idkategori = $_GET['id'];

    $query = "DELETE FROM kategori WHERE idkategori='$idkategori'";
    $result = mysqli_query($koneksi, $query);
    if ($result) {
        echo "<script>alert('Data kategori berhasil dihapus');window.location='data-kategori.php'</script>";
    } else {
        echo "<script>alert('Data kategori gagal dihapus');window.location='data-kategori.php'</script>";
    }

}


?>