<?php
require '../config/koneksi.php';


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
        include 'menu-kiri.php';
        ?>


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <div class="card border-0 shadow mb-4">
                <div class="card-body">
                    <a href="tambah-kategori.php" class="btn btn-primary" title="Tambah Pengguna"><i 
                    class="bi-plus"></i> Tambah Kategori</a>
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap mb-0 rounded" id="example">
                            <thead class="thead-light">
                                <tr>
                                    <th class="border-0 rounded-start">No</th>
                                    <th class="border-0">id</th>
                                    <th class="border-0">Nama</th>
                                    <th class="border-0">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                $sql = mysqli_query($koneksi, "SELECT * FROM kategori");
                                while($data = mysqli_fetch_assoc($sql)) {
                                    // if ($data['statuspengguna'] == 1){
                                    //     $status = "<span class='badge bg-success'>Aktif</span>";
                                    // } else {
                                    //     $status = "<span class='badge bg-danger'>Tidak Aktif</span>";
                                    // }
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data['idkategori']; ?></td>        
                                        <td><?php echo $data['namakategori']; ?></td>      
                                         <td>
                                            <a href="ubah-kategori.php?id=<?php echo $data['idkategori'];?>" class="btn btn-sm btn-primary"><i
                                                class="bi bi-pencil-square"></i></a>
                                                <a href="proses-kategori.php?id=<?php echo $data['idkategori'];?>" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i></a>
                                        </td>       
                                </tr>
                                <?php $no++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
            <!-- Navbar End -->


            <div class="card border-0 shadow mb-4">
                <div class="card-body">
                    <a href="tambah-pengguna.php" class="btn btn-primary" title="Tambah Pengguna"><i 
                    class="bi-plus"></i> Tambah Pengguna</a>
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap mb-0 rounded" id="example">
                            <thead class="thead-light">
                                <tr>
                                    <th class="border-0 rounded-start">No</th>
                                    <th class="border-0">Nama User</th>
                                    <th class="border-0">Level</th>
                                    <th class="border-0">Status</th>
                                    <th class="border-0">Waktu</th>
                                    <th class="border-0">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                $sql = mysqli_query($koneksi, "SELECT * FROM pengguna");
                                while($data = mysqli_fetch_assoc($sql)) {
                                    if ($data['statuspengguna'] == 1){
                                        $status = "<span class='badge bg-success'>Aktif</span>";
                                    } else {
                                        $status = "<span class='badge bg-danger'>Tidak Aktif</span>";
                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data['userpengguna']; ?></td>        
                                        <td><?php echo $data['levelpengguna']; ?></td>        
                                        <td><?php echo $status ; ?></td>        
                                        <td><?php echo $data['waktupengguna']; ?></td>        
                                        <td>
                                            <a href="ubah-pengguna.php?id=<?php echo $data['idpengguna'];?>" class="btn btn-sm btn-primary"><i
                                                class="bi bi-pencil-square"></i></a>
                                                <a href="proses-pengguna.php?id=<?php echo $data['idpengguna'];?>" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i></a>
                                        </td>        
                                </tr>
                                <?php $no++; } ?>
                            </tbody>
                        </table>
                    </div>
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

    <!-- jQuery JS -->
<script src="../assets/jQuery/jquery-3.7.1.min.js"></script>

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

    <!-- Datatable JS -->
<script src="../assets/datatable/dataTables.js"></script>
<script src="../assets/datatable/dataTables.bootstrap5.js"></script>

<script>
    new DataTable('#example');
    </script>
</body>

</html>