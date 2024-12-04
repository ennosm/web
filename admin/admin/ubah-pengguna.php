<?php
require '../config/koneksi.php';


if (!isset($_GET['id'])) {
    header('Location: data-pengguna.php');
    exit();
}

$idpengguna = $_GET['id'];
$_SESSION['idpengguna'] = $idpengguna;

$query = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE idpengguna =
'$idpengguna'");
$data = mysqli_fetch_assoc($query);

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

    <div class="card border-0 shadow mb-4" >
                <div class="card-body" >
                    <a href="data-pengguna.php" class="btn btn-warning" title="Kembali"><i 
                    class="bi-arrow-left"></i> Kembali</a>
                    <h3 class="text-center mt-3">From Ubah Data Pengguna</h3>
                    <form action="proses-pengguna.php" method="post" 
                    enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="userpengguna">User Pengguna</label>
                            <input type="text" class="form-control bg-white" id="userpengguna"
                            name="userpengguna" value="<?php echo $data['userpengguna']; ?>" required>
                        </div>
                    
                        <div class="mb-3">
                            <label>Level Pengguna</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                name="levelpengguna" id="levelpengguna1"
                                value="pelanggan" <?php if($data['levelpengguna'] == 'pelanggan'){echo 'checked';} ?>>
                                <label class="form-check-label" for="levelpengguna1">
                                    Pelanggan
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                name="levelpengguna" id="levelpengguna2" 
                                value="admin" <?php if($data['levelpengguna'] == 'admin'){echo 'checked';} ?>>
                                <label class="form-check-label" for="levelpengguna2">
                                    Admin
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Status Pengguna</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                name="statuspengguna" id="statuspengguna1"
                                value="1" <?php if($data['statuspengguna'] == '1'){echo 'checked';} ?>>
                                <label class="form-check-label" for="statuspengguna1">
                                    Aktif
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                name="statuspengguna" id="statuspengguna2" 
                                value="0" <?php if($data['statuspengguna'] == '0'){echo 'checked';} ?>>
                                <label class="form-check-label" for="statuspengguna2">
                                    Tidak Aktif
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary" name="ubah"><i
                            class="bi bi-pencil-square"></i> Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
     </div>

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                            <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

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

    <!-- Template Javascript -->
    <script src="../assets/js/main.js"></script>

</body>

</html>