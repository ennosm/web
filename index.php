<?php
require 'config/koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="utf-8">
        <title>Berita - Free HTML Majalah Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@100;600;800&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar start -->
        <div class="container-fluid sticky-top px-0">
            <div class="container-fluid topbar bg-dark d-none d-lg-block">
                <div class="container px-0">
                    <div class="topbar-top d-flex justify-content-between flex-lg-wrap">
                        <div class="top-info flex-grow-0">
                            <span class="rounded-circle btn-sm-square bg-primary me-2">
                                <i class="fas fa-bolt text-white"></i>
                            </span>
                            <div class="pe-2 me-3 border-end border-white d-flex align-items-center">
                                <p class="mb-0 text-white fs-6 fw-normal">Populer</p>
                            </div>
                            <div class="overflow-hidden" style="width: 735px;">
                                <div id="note" class="ps-2">
                                    <img src="img/features-fashion.jpg" class="img-fluid rounded-circle border border-3 border-primary me-2" style="width: 30px; height: 30px;" alt="">
                                    <a href="#"><p class="text-white mb-0 link-hover">Berita Nusantara dan Mendunia</p></a>
                                </div>
                            </div>
                        </div>
                        <div class="top-link flex-lg-wrap">
                            <!-- <i class="fas fa-calendar-alt text-white border-end border-secondary pe-2 me-2"> <span class="text-body">Tuesday, Sep 12, 2024</span></i> -->
                                <?php
                                // Mendapatkan tanggal saat ini
                                $tanggal_saat_ini = date("d");

                                // Array untuk nama hari dalam bahasa Indonesia
                                $nama_hari = array(
                                    'Sunday' => 'Minggu',
                                    'Monday' => 'Senin',
                                    'Tuesday' => 'Selasa',
                                    'Wednesday' => 'Rabu',
                                    'Thursday' => 'Kamis',
                                    'Friday' => 'Jumat',
                                    'Saturday' => 'Sabtu'
                                );

                                // Array untuk nama bulan dalam bahasa Indonesia
                                $nama_bulan = array(
                                    '01' => 'Januari',
                                    '02' => 'Februari',
                                    '03' => 'Maret',
                                    '04' => 'April',
                                    '05' => 'Mei',
                                    '06' => 'Juni',
                                    '07' => 'Juli',
                                    '08' => 'Agustus',
                                    '09' => 'September',
                                    '10' => 'Oktober',
                                    '11' => 'November',
                                    '12' => 'Desember'
                                );

                                // Mendapatkan nama hari, bulan, dan tahun saat ini
                                $hari = $nama_hari[date("l")];
                                $bulan = $nama_bulan[date("m")];
                                $tahun = date("Y");

                                // Format lengkap: Hari, Tanggal Bulan Tahun
                                $format_tanggal = $hari . ', ' . $tanggal_saat_ini . ' ' . $bulan . ' ' . $tahun;

                                // Menampilkan tanggal dalam bahasa Indonesia
                                echo "" . $format_tanggal;
                                ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid bg-light">
                <div class="container px-0">
                    <nav class="navbar navbar-light navbar-expand-xl">
                        <a href="index.php" class="navbar-brand mt-3">
                            <p class="text-primary display-6 mb-2" style="line-height: 0;">Berita</p>
                            <small class="text-body fw-normal" style="letter-spacing: 12px;">nusantara</small>
                        </a>
                        <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="fa fa-bars text-primary"></span>
                        </button>
                        <div class="collapse navbar-collapse bg-light py-3" id="navbarCollapse">
                            <div class="navbar-nav mx-auto border-top">
                                <a href="index.php" class="nav-item nav-link active">Beranda</a>
                                
                                <div class="nav-item dropdown">
    <?php 
    // Query untuk mengambil semua kategori
    $sql = mysqli_query($koneksi, "SELECT idkategori, namakategori FROM kategori");

    // Periksa jika query berhasil dan ada hasilnya
    if ($sql) {
    ?>
    <a href="#" class="nav-item nav-link">Kategori</a>
    <div class="dropdown-menu m-0 bg-secondary rounded-0">
    <?php 
    // Loop melalui setiap kategori dan tampilkan dalam dropdown
    while ($data = mysqli_fetch_assoc($sql)) {
        $namakategori = htmlspecialchars($data['namakategori']);
        echo '<span class="dropdown-item">' . $namakategori . '</span>';
    }
    ?>
</div>

    <?php } ?>
</div>

                                <a href="contact.php" class="nav-item nav-link">Kontak Kami</a>
                            </div>
                            <div class="d-flex flex-nowrap border-top pt-3 pt-xl-0">
                                <div class="d-flex">
                                    <img src="img/weather-icon.png" class="img-fluid w-100 me-2" alt="">
                                    <div class="d-flex align-items-center">
                                        <strong class="fs-4 text-secondary">31°C</strong>
                                        <div class="d-flex flex-column ms-2" style="width: 150px;">
                                            <span class="text-body">INDONESIA</span>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn-search btn border border-primary btn-md-square rounded-circle bg-white my-auto" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-primary"></i></button>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar End -->


        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->


        <!-- FEATURES START -->
        <div class="container-fluid features mb-5">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-12">
                        <div class="features-content d-flex flex-wrap">
                            <?php
                            // Query untuk mengambil data dari tabel kategori
                            $sql = mysqli_query($koneksi, "SELECT * FROM kategori LIMIT 5");
                            
                            // Mengambil data kategori
                            while ($data = mysqli_fetch_assoc($sql)) {
                                // Menampilkan kategori dalam div terpisah
                                echo '<div class="kategori-item d-flex flex-column mb-4 me-3">';
                                echo '<p class="text-uppercase mb-2">' . $data['namakategori'] . '</p>';
                                echo '<a href="#" class="h6">Dapatkan berita terbaik di kami</a>';
                                echo '</div>';
                            }
                            ?>
                        </div>
                    </div>          
                </div>
            </div>
        </div>
        <!-- FEATURES END -->


        <!-- Main Post Section Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="row g-4">
                    <div class="col-lg-7 col-xl-8 mt-0">
                         <?php 
                                $sql = mysqli_query($koneksi, "SELECT idberita, judulberita, coverberita, isiberita, penulisberita, tanggalberita, statusberita, waktuberita, GROUP_CONCAT(namakategori) AS kategoriberita FROM berita LEFT JOIN kategoriberita USING(idberita) LEFT JOIN kategori USING(idkategori) GROUP BY berita.idberita LIMIT 2");
                                while($data1 = mysqli_fetch_assoc($sql)) {
                                    ?>
                        <div class="position-relative overflow-hidden rounded">
    <img src="admin/cover/<?php echo $data1['coverberita']; ?>" class="img-fluid rounded img-zoomin w-100" alt="">
    <div class="d-flex justify-content-center px-4 position-absolute flex-wrap" style="bottom: 10px; left: 0;">

        <a href="#" class="text-white me-3 link-hover">
            <i class="fa fa-edit"></i> <?php echo $data1['penulisberita']; ?>
        </a>

        <a href="#" class="text-white me-3 link-hover">
            <i class="fa fa-clock"></i>
            <?php
            // Mendapatkan dan memformat tanggalberita
            $tanggal_berita = date("l, d F Y", strtotime($data1['tanggalberita']));

            // Array untuk nama hari dan bulan dalam bahasa Indonesia
            $nama_hari = array(
                'Sunday' => 'Minggu',
                'Monday' => 'Senin',
                'Tuesday' => 'Selasa',
                'Wednesday' => 'Rabu',
                'Thursday' => 'Kamis',
                'Friday' => 'Jumat',
                'Saturday' => 'Sabtu'
            );

            $nama_bulan = array(
                'January' => 'Januari',
                'February' => 'Februari',
                'March' => 'Maret',
                'April' => 'April',
                'May' => 'Mei',
                'June' => 'Juni',
                'July' => 'Juli',
                'August' => 'Agustus',
                'September' => 'September',
                'October' => 'Oktober',
                'November' => 'November',
                'December' => 'Desember'
            );

            // Mengganti nama hari dan bulan bahasa Inggris dengan bahasa Indonesia
            $tanggal_berita = str_replace(array_keys($nama_hari), array_values($nama_hari), $tanggal_berita);
            $tanggal_berita = str_replace(array_keys($nama_bulan), array_values($nama_bulan), $tanggal_berita);

            echo $tanggal_berita;
            ?>
        </a>

    </div>
</div>

                        <div class="border-bottom py-3">
                            <a href="berita.php?id=<?php echo $data1 ['idberita']; ?>" class="display-6 text-dark mb-0 link-hover"><?php echo $data1 ['judulberita']; ?></a>
                        </div>
                        <p class="mt-3 mb-4"><?php echo $data1 ['isiberita']; ?>
                        </p>
                        <?php } ?>
                        <div class="bg-light p-4 rounded">
                            <div class="news-2">
                                <h3 class="mb-4">Top Berita</h3>
                            </div>
                            <div class="row g-4 align-items-center">
                                <?php 
                                $sql = mysqli_query($koneksi, "SELECT idberita, judulberita, coverberita, isiberita, penulisberita, tanggalberita, statusberita, waktuberita, GROUP_CONCAT(namakategori) AS kategoriberita FROM berita LEFT JOIN kategoriberita USING(idberita) LEFT JOIN kategori USING(idkategori) GROUP BY berita.idberita LIMIT 2");
                                while($data2 = mysqli_fetch_assoc($sql)) {
                                    ?>
                                <div class="col-md-6">
                                    <div class="rounded overflow-hidden">
                                        <img src="admin/cover/<?php echo $data2 ['coverberita']; ?>" class="img-fluid rounded img-zoomin w-100" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex flex-column">
                                        <a href="berita.php?id=<?php echo $data2 ['idberita']; ?>" class=" text-dark mb-0 link-hover"><?php echo $data2 ['judulberita']; ?></a>
                                        <p class="mb-0 fs-5"><i class="fa fa-edit"><?php echo $data2 ['penulisberita']; ?></i> </p>
                                        <p class="mb-0 fs-5"><i class="fa fa-clock"><?php echo $data2 ['tanggalberita']; ?></i></p>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-xl-4">
                       <div class="bg-light rounded p-4 pt-0">
                            <div class="row g-4">
                                <?php 
                                $sql = mysqli_query($koneksi, "SELECT idberita, judulberita, coverberita, isiberita, penulisberita, tanggalberita, statusberita, waktuberita, GROUP_CONCAT(namakategori) AS kategoriberita FROM berita LEFT JOIN kategoriberita USING(idberita) LEFT JOIN kategori USING(idkategori) GROUP BY berita.idberita LIMIT 5");
                                while($data3 = mysqli_fetch_assoc($sql)) {
                                    ?>
                                <div class="col-12">
                                    <div class="row g-4 align-items-center">
                                        <div class="col-5">
                                            <div class="overflow-hidden rounded">
                                                <img src="admin/cover/<?php echo $data3 ['coverberita']; ?>" class="img-zoomin img-fluid rounded w-100" alt="">
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="features-content d-flex flex-column">
                                                <a href="berita.php?id=<?php echo $data3['idberita'];?>" class="text-dark mb-0 link-hover"><?php echo $data3 ['judulberita']; ?></a>
                                                <small><i class="fa fa-edit"><?php echo $data3 ['penulisberita']; ?></i> </small>
                                                <small><i class="fa fa-check"><?php echo $data3 ['kategoriberita']; ?></i></small>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Post Section End -->


        <!-- Banner Start -->
        <div class="container-fluid py-5 my-5" style="background: linear-gradient(rgba(202, 203, 185, 1), rgba(202, 203, 185, 1));">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-7">
                        <h1 class="mb-4 text-primary">Berita</h1>
                        <h1 class="mb-4">Dapatkan Pembaruan Setiap Mingguan</h1>
                        <p class="text-dark mb-4 pb-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        </p>
                        <div class="position-relative mx-auto">
                            <input class="form-control w-100 py-3 rounded-pill" type="email" placeholder="Masukkan Email">
                            <button type="submit" class="btn btn-primary py-3 px-5 position-absolute rounded-pill text-white h-100" style="top: 0; right: 0;">Langganan Sekarang</button>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="rounded">
                            <img src="img/banner-img.jpg" class="img-fluid rounded w-100 rounded" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner End -->


        <!-- Latest News Start -->
        <div class="container-fluid latest-news py-5">
            <div class="container py-5">
                <h2 class="mb-4">Berita Terbaru</h2>
                <div class="latest-news-carousel owl-carousel">
                    <?php 
                                $sql = mysqli_query($koneksi, "SELECT idberita, judulberita, coverberita, isiberita, penulisberita, tanggalberita, statusberita, waktuberita, GROUP_CONCAT(namakategori) AS kategoriberita FROM berita LEFT JOIN kategoriberita USING(idberita) LEFT JOIN kategori USING(idkategori) GROUP BY berita.idberita ORDER BY RAND ()LIMIT 10");
                                while($data = mysqli_fetch_assoc($sql)) {
                                    ?>
                    <div class="latest-news-item">
                        <div class="bg-light rounded">
                            <div class="rounded-top overflow-hidden">
                                <img src="admin/cover/<?php echo $data ['coverberita']; ?>" class="img-zoomin img-fluid rounded-top w-100" alt="">
                            </div>
                            <div class="d-flex flex-column p-4">
                                <a href="berita.php?id=<?php echo $data ['idberita']; ?>" class=" text-dark mb-0 link-hover"><?php echo $data ['judulberita']; ?></a>
                                <div class="d-flex justify-content-between">
                                    <a href="#" class="small text-body link-hover"><?php echo $data ['penulisberita']; ?></a>
                                    <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i><?php echo $data ['tanggalberita']; ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                     <?php } ?>
                </div>
            </div>
        </div>
        <!-- Latest News End -->



        <!-- Footer Start -->
        <div class="container-fluid bg-dark footer py-5">
            <div class="container py-5">
                <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(255, 255, 255, 0.08);">
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <a href="#" class="d-flex flex-column flex-wrap">
                                <p class="text-white mb-0 display-6">Berita</p>
                                <small class="text-light" style="letter-spacing: 11px; line-height: 0;">nusantara</small>
                            </a>
                        </div>
                        <div class="col-lg-9">
                            <div class="d-flex position-relative rounded-pill overflow-hidden">
                                <input class="form-control border-0 w-100 py-3 rounded-pill" type="email" placeholder="@gmail.com">
                                <button type="submit" class="btn btn-primary border-0 py-3 px-5 rounded-pill text-white position-absolute" style="top: 0; right: 0;">Langganan Sekarang</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-lg-6 col-xl-3">
                        <div class="footer-item-1">
                            <h4 class="mb-4 text-white">Bersangkutan</h4>
                            <p class="text-secondary line-h">Alamat: <span class="text-white">123 , Indonesia</span></p>
                            <p class="text-secondary line-h">Email: <span class="text-white">@gmail.com</span></p>
                            <p class="text-secondary line-h">No Handphone: <span class="text-white">+6283 4567 8910</span></p>
                            <div class="d-flex line-h">
                                <a class="btn btn-light me-2 btn-md-square rounded-circle" href=""><i class="fab fa-twitter text-dark"></i></a>
                                <a class="btn btn-light me-2 btn-md-square rounded-circle" href=""><i class="fab fa-facebook-f text-dark"></i></a>
                                <a class="btn btn-light me-2 btn-md-square rounded-circle" href=""><i class="fab fa-youtube text-dark"></i></a>
                                <a class="btn btn-light btn-md-square rounded-circle" href=""><i class="fab fa-linkedin-in text-dark"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-3">
                        <div class="footer-item-2">
                            <div class="d-flex flex-column mb-4">
                                <h4 class="mb-4 text-white">Postingan Terbaru</h4>
                            </div>
                            <div class="d-flex flex-column">
                                <a href="#">
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle border border-2 border-primary overflow-hidden">
                                            <img src="img/footer-2.jpg" class="img-zoominimg-fluid rounded-circle w-100" alt="">
                                        </div>
                                        <div class="d-flex flex-column ps-4">
                                            <p class="text-uppercase text-white mb-3">Olahraga</p>
                                            <a href="#" class="h6 text-white">
                                            Dapatkan pasar pembicaraan terbaik, berita.
                                            </a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-3">
                        <div class="d-flex flex-column text-start footer-item-3">
                            <h4 class="mb-4 text-white">Kategori</h4>
                            <a class="btn-link text-white" href=""><i class="fas fa-angle-right text-white me-2"></i> Olahraga</a>
                            <a class="btn-link text-white" href=""><i class="fas fa-angle-right text-white me-2"></i> Ekonomi</a>
                            <a class="btn-link text-white" href=""><i class="fas fa-angle-right text-white me-2"></i> Politik</a>
                            <a class="btn-link text-white" href=""><i class="fas fa-angle-right text-white me-2"></i> Teknologi</a>
                            <a class="btn-link text-white" href=""><i class="fas fa-angle-right text-white me-2"></i> Hiburan</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-3">
                        <div class="footer-item-4">
                            <h4 class="mb-4 text-white">Galeri Kami</h4>
                            <div class="row g-2">
                                <div class="col-4">
                                    <div class="rounded overflow-hidden">
                                        <img src="img/footer-1.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                    </div>
                               </div>
                               <div class="col-4">
                                    <div class="rounded overflow-hidden">
                                        <img src="img/footer-2.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                    </div>
                               </div>
                                <div class="col-4">
                                    <div class="rounded overflow-hidden">
                                        <img src="img/footer-3.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                    </div>
                               </div>
                                <div class="col-4">
                                    <div class="rounded overflow-hidden">
                                        <img src="img/footer-4.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                    </div>
                               </div>
                                <div class="col-4">
                                    <div class="rounded overflow-hidden">
                                        <img src="img/footer-5.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                    </div>
                               </div>
                               <div class="col-4">
                                <div class="rounded overflow-hidden">
                                    <img src="img/footer-6.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                </div>
                           </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Copyright Start -->
        <div class="container-fluid copyright bg-dark py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>enno</a>, All right reserved.</span>
                    </div>
                    <div class="col-md-6 my-auto text-center text-md-end text-white">
                        <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                        <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                        <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-2 border-white rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>

</html>
