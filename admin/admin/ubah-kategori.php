<?php
require '../config/koneksi.php';


if (!isset($_GET['id'])) {
    header('Location: data-kategori.php');
    exit();
}

$idpengguna = $_GET['id'];
$_SESSION['idpengguna'] = $idpengguna;

$query = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE idpengguna =
'$idpengguna'");
$data = mysqli_fetch_assoc($query);

if (mysqli_num_rows($query)<1){
    header("Location:data-kategori.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DarkPan - Bootstrap 5 Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../assets/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>



    <div class="container-fluid position-relative d-flex p-0">


        <?php
        include 'menu-kiri.php'; ?>
        


        <!-- Content Start -->
        <div class="content">
            
    <?php include 'menu-atas.php'; ?>

    <div class="card border-0 shadow mb-4">
                <div class="card-body">
                    <a href="data-kategori.php" class="btn btn-warning" title="Kembali"><i 
                    class="bi-arrow-left"></i> Kembali</a>
                    <h3 class="text-center mt-3">From Ubah Data kategori</h3>
                    <form action="proses-kategori.php" method="post" 
                    enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="namakategori">Nama kategori</label>
                            <input type="text" class="form-control bg-white" id="namakategori"
                            name="namakategori" value="<?php echo $data['namakategori']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary" name="ubah"><i
                            class="bi bi-pencil-square"></i> Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
     </div>

     <!-- jQuery JS -->
<script src="../assets/vendor/jQuery/jquery-3.7.1.min.js"></script>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/lib/chart/chart.min.js"></script>
    <script src="../assets/lib/easing/easing.min.js"></script>
    <script src="../assets/lib/waypoints/waypoints.min.js"></script>
    <script src="../assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../assets/lib/tempusdominus/js/moment.min.js"></script>
    <script src="../assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<script>
    new DataTable('#example');
    </script>
</body>

</html>