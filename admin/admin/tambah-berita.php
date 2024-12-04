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
    <!-- GDRIVE CSS -->
    <link type="text/css" href="../assets/select2bs5/select2.min.css">
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
                    <a href="data-berita.php" class="btn btn-warning" title="Kembali"><i 
                    class="bi-arrow-left"></i> Kembali</a>
                    <h3 class="text-center mt-3">From Tambah Data Berita</h3>
                    <form action="proses-berita.php" method="post" 
                    enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="coverberita">Cover Berita</label>
                            <input type="file" class="form-control" id="coverberita"
                            name="coverberita" required>
                        </div>
                        <div class="mb-3">
                            <label for="judulberita">Judul Berita</label>
                            <input type="text" class="form-control bg-white" id="judulberita"
                            name="judulberita" required>

                        <div class="mb-3">
                            <label for="isiberita">Isi Berita</label>
                            <textarea class="form-control bg-white" id="isiberita"
                            name="isiberita" required></textarea>
                        </div>
                        </div>
                        <div class="mb-3">
                            <label for="penulisberita">Penulis Berita</label>
                            <input type="text" class="form-control bg-white" id="penulisberita"
                            name="penulisberita" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggalberita">Tanggal Berita</label>
                            <input type="date" class="form-control bg-white" id="tanggalberita"
                            name="tanggalberita" required>
                        </div>
                        <div class="mb-3">
                            <label for="idkategori">Kategori Berita</label>
                            <select class="form-control" id="idkategori" name="idkategori[]" multiple="multiple" required>
                                <?php
                                $query = mysqli_query($koneksi, "SELECT idkategori,namakategori FROM kategori");
                                while($row = mysqli_fetch_assoc($query)) {
                                    ?>
                                    <option value="<?php echo $row['idkategori']; ?>"><?php echo $row['namakategori']; ?></option>
                                <?php } ?>
                                </select>    
                        </div>
                        <div class="mb-3">
                            <label>Status Berita</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                name="statusberita" id="statusberita1"
                                value="1" checked>
                                <label class="form-check-label" for="statusberita1">
                                   Terbit
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                name="statusberita" id="statusberita2" value="0">
                                <label class="form-check-label" for="statusberita2">
                                    Draft
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary" name="simpan"><i
                            class="bi-save"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
     </div>


     <!-- jQuery JS -->
<script src="../assets/jQuery/jquery-3.7.1.min.js"></script>

<!-- JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/lib/chart/chart.min.js"></script>
    <script src="../assets/lib/easing/easing.min.js"></script>
    <script src="../assets/lib/waypoints/waypoints.min.js"></script>
    <script src="../assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../assets/lib/tempusdominus/js/moment.min.js"></script>
    <script src="../assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    
    <!-- GDRIVE JS -->
    <script src="../assets/select2bs5/select2.min.js"></script>

   <script>
    $(document).ready(function() {
    });
   </script>

</body>

</html>