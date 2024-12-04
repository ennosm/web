<?php
require '../config/koneksi.php';
require '../config/session.php';
checkSession('admin');


if (isset($_POST['simpan'] )){

    $idberita = uniqid();
    $judulberita = $_POST['judulberita'];
    $coverberita = $_FILES['coverberita'];
    $isiberita = $_POST['isiberita'];
    $penulisberita = $_POST['penulisberita'];
    $tanggalberita = date("Y-m-d");
    $statusberita = $_POST['statusberita'];
    $waktuberita = date("Y-m-d H:i:s");

    $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg' );
    $nama_file = $coverberita['name'];
    $ukuran_file = $coverberita['size'];
    $tmp_file = $coverberita['tmp_name'];
    $ekstensi_file = explode('.', $nama_file);
    $ekstensi_file_baru = strtolower(end($ekstensi_file));
    $lokasi_file = '../cover/'. $nama_file;
    if ($ukuran_file > 1000000){
        echo "<script>alert('Ukuran cover berita terlalu besar');window.location='data-berita.php'</script>";
        exit();
    }
    if (!in_array($ekstensi_file_baru, $ekstensi_diperbolehkan)) {
        echo "<script>alert('Format cover berita yang dibolehk an adalah PNG, JPG, dan JPEG');window.location='data-berita.php'</script>";
        exit(); 
    }
    move_uploaded_file($tmp_file, $lokasi_file);
    $query = "INSERT INTO berita (idberita, judulberita, coverberita, isiberita, penulisberita, tanggalberita, statusberita, waktuberita) VALUES ('$idberita', '$judulberita', '$nama_file','$isiberita', '$penulisberita','$tanggalberita', '$statusberita','$waktuberita')";
    $result = mysqli_query($koneksi, $query);
    
    $idkategori = $_POST['idkategori'];
    if (!empty($idberita) && !empty($idkategori)) {
        foreach ($idkategori as $idkategori) {
            $idkategoriberita = uniqid();
            
            
            $query = "INSERT INTO kategoriberita (idkategoriberita, idberita, idkategori) VALUES ('$idkategoriberita', '$idberita', '$idkategori')";
            $result = mysqli_query($koneksi, $query);
               
        }
    }
    if ($result) {
        echo "<script>alert('Data berita berhasil disimpan');window.location='data-berita.php'</script>";
    }else{
        echo "<script>alert('Data berita gagal disimpan');window.location='data-berita.php'</script>";
    }
}
// akhir tambahan


if (isset($_POST['ubah'])){
    
    $idberita = $_SESSION['idberita'];
    $coverberita = $_FILES['coverberita'];
    $judulberita = $_POST['judulberita'];
    $isiberita = $_POST['isiberita'];
    $penulisberita = $_POST['penulisberita'];
    $tanggalberita = $_POST['tanggalberita'];
    $statusberita = $_POST['statusberita'];
    $waktuberita = date('Y-m-d H:i:s');

    $query = "SELECT coverberita FROM berita WHERE idberita='$idberita' ";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);
    $coverberita_lama = $data['coverberita'];
    
    
    $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg' );
    $nama_file = $coverberita['name'];
    $ukuran_file = $coverberita['size'];
    $tmp_file = $coverberita['tmp_name'];
    $ekstensi_file = explode('.', $nama_file);
    $ekstensi_file_baru = strtolower(end($ekstensi_file));
    $lokasi_file = '../cover/'. $nama_file;
    
    if ($nama_file != "") {
    if ($ukuran_file > 1000000){
        echo "<script>alert('Ukuran cover berita terlalu besar');window.location='data-berita.php'</script>";
        exit();
    }
    if (!in_array($ekstensi_file_baru, $ekstensi_diperbolehkan)) {
        echo "<script>alert('Format cover berita yang dibolehkan adalah PNG, JPG, dan JPEG');window.location='data-berita.php'</script>";
        exit(); 
    }

    if (file_exists('../cover/' . $coverberita_lama)){
        unlink('../cover/' . $coverberita_lama);
    }
    move_uploaded_file($tmp_file, $lokasi_file);

    $query = "UPDATE berita SET coverberita = '$nama_file', judulberita = '$judulberita', isiberita = '$isiberita', penulisberita = '$penulisberita', tanggalberita = '$tanggalberita', statusberita = '$statusberita', waktuberita = '$waktuberita' WHERE idberita = '$idberita'";
    
    } else{
        $query = "UPDATE berita SET judulberita = '$judulberita', isiberitaa = '$isiberita', penulisberita = '$penulisberita', tanggalberita = '$tanggalberita', statusberita = '$statusberita', waktuberita = '$waktuberita' WHERE idberita = '$idberita'";  
    }
    $result = mysqli_query($koneksi, $query);


    // awal hapus tambahan
    $sql = "DELETE FROM kategoriberita WHERE idberita = '$idberita'";
    $result = mysqli_query($koneksi, $sql);

    $idkategori = $_POST['idkategori'];
    if (!empty($idberita) && !empty($idkategori)) {
        foreach ($idkategori as $idkategori) {
            $idkategoriberita = uniqid();
            
            
            $query = "INSERT INTO kategoriberita (idkategoriberita, idberita, idkategori) VALUES ('$idkategoriberita', '$idberita', '$idkategori')";
            $result = mysqli_query($koneksi, $query);
               
        }
    }
if ($result) {
    echo"<script>alert('Data berita berhasil diubah ');window.location='data-berita.php'</script>";
} else {
    echo"<script>alert('Data berita gagal diubah ');window.location='data-berita.php'</script>";
}
}

if(isset($_GET['id'])) {

    $idberita = $_GET['id'];


    // Ambil data cover berita
     $query = "SELECT coverberita FROM berita WHERE idberita='$idberita'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);
    $coverberita = $data['coverberita'];

    // HAPUS FILE COVER
    if (file_exists('../cover/' . $coverberita)) {
        unlink('../cover/' . $coverberita);
    }




    // HAPUS DATA bERITA DARI WEbSITE   
    $query = "DELETE FROM berita WHERE idberita='$idberita'";
    $result = mysqli_query($koneksi, $query);
    if ($result) {
        echo "<script>alert('Data berita berhasil dihapus');window.location='data-berita.php'</script>";
    } else {
        echo "<script>alert('Data berita gagal dihapus');window.location='data-berita.php'</script>";
    }
    // awal hapus tambahan
    $sql = "DELETE FROM kategoriberita WHERE idberita = '$idberita'";
    $result = mysqli_query($koneksi, $sql);
    if (!$result) {
    echo "<script>alert('Error deleting from kategoriberita: " . mysqli_error($koneksi) . "');window.location='data_berita.php'</script>";
    exit;
    }
    // akhir hapus tambahan

    if ($result) {
        echo "<script>alert('Data berhasil disimpan');window.location='data_berita.php'</script>";
    } else {
        echo "<script>alert('Data gagal disimpan: " . mysqli_error($koneksi) . "');window.location='data_berita.php'</script>";
    }
}
?>