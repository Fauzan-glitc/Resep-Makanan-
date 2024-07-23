<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Resep</title>

    <!-- Favicon -->

    <!-- Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/page/style.css">
    
</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-content">
            <h3>Cooking in progress..</h3>
            <div id="cooking">
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div id="area">
                    <div id="sides">
                        <div id="pan"></div>
                        <div id="handle"></div>
                    </div>
                    <div id="pancake">
                        <div id="pastry"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Header Boostrap-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container d-flex justify-content-between">
      
        <a class="navbar-brand" href="#">Selamat Datang di COOKIT</a>
    
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="#aboutus">Tentang Kami</a>

        </div>
    </div>
</nav>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area 
        <div class="top-header-area bg-img bg-overlay" style="background-image: url(<?php echo base_url() ?>assets/page/img/bg-img/header.jpg);">
            <div class="container h-100">
                
            </div>
        </div>-->

        <!-- Logo Area -->
        <style> 
        .logo-area {
            background-color: #E5E1DA;
        }
        .logo-area img { 
            width: 50%;
            height: auto;
        }
        </style>
        <div class="logo-area">
            <a href="#"><img src="<?php echo base_url() ?>assets/page/img/core-img/logo.png" alt=""></a>
        </div>

    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Search Area Start ##### -->
    <!-- Menonaktifkan pilihan kategori-->


    <style>
        .custom-blue-button {
            bottom:10px;
            border: solid transparent 1px;
            border-radius: 100px;
    background-color: #27374D;
    color: white;
         } /* Opsional: Mengubah warna teks menjadi putih */
    /* Tambahan gaya lainnya sesuai kebutuhan */
    .bueno-search-area .bg-img {
            padding-top: 0; /* Adjust this value as needed */
            padding-bottom: 0px; /* Adjust this value as needed */
        }

</style>
<script>
function tampilkanData() {
    var kategori = document.getElementById("kategori").value;
    if (kategori === "") {
        alert("Silakan pilih kategori terlebih dahulu!");
    } else {
        document.getElementById("formKategori").submit();
    }
}
</script>
    
    <div class="bueno-search-area section-padding-100-0 pb-70 bg-img" > <!--style="background-image: url(<?php echo base_url() ?>assets/page/img/core-img/pattern.png);"> -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form id="formKategori" action="<?php echo base_url()?>page/tampilkan" method="post">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-12">
                                <div class="form-group mb-30">
                                    <select class="form-control" id="kategori" name="kategori">
                                    <option value="" selected disabled>-- Pilih Kategori --</option>
                                      <?php
                                        foreach($kat as $x){
                                      ?>
                                      <option value="<?php echo htmlentities($x->nama, ENT_QUOTES, 'UTF-8');?>"><?php echo htmlentities($x->nama, ENT_QUOTES, 'UTF-8');?></option>
                                      <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="form-group mb-30">
                                    <button type="button" class="btn bueno-btn w-100 custom-blue-button " onclick="tampilkanData()">Tampilkan</button>
                                    <!--<button class="btn bueno-btn w-100 custom-blue-button ">Tampilkan</button>-->
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
     
    <!--body-->
    <style>
        .card-img-top {
            width: 100%;
            height: 200px; /* Sesuaikan dengan tinggi yang diinginkan */
            object-fit: cover;
        }
       
    </style>
    <div class="container mt-5">
    <div class="row">
        <?php foreach ($hasil as $resep) { ?>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="blog-thumbnail mb-50">
                            <img src="<?php echo base_url();?>assets/gambar/<?php echo $resep->gambar;?>" alt="" class="card-img-top">
                        </div>
                        <h5 class="card-title"><?php echo $resep->nama; ?></h5>
                        <p class="card-text">Kategori: <?php echo $resep->kategori; ?>
                        <br><a href="<?php echo base_url('page/detail/'.$resep->id) ?>" class="btn btn-primary">Detail</a></p>
                        
                        
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>



    <!-- ##### Post Details Area Start ##### 
    <section class="post-news-area section-padding-100-0 mb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>Nama Masakan</th>
                                <th>Bahan Utama</th>
                                <th>Bumbu</th>
                                <th>Tigkat Kesulitan</th>
                                <th>Waktu</th>
                                <th>Kategori</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                  foreach($hasil as $data){
                                ?>
                            <tr>
                                <td class="pt-4"><img src="<?php echo base_url();?>assets/gambar/<?php echo $data->gambar;?>" alt=""></td>
                                <td class="pt-4"><?php echo htmlentities($data->nama, ENT_QUOTES, 'UTF-8');?></td>
                                <td class="pt-4"><?php echo htmlentities($data->bahan, ENT_QUOTES, 'UTF-8');?></td>
                                <td class="pt-4"><?php echo htmlentities($data->bumbu, ENT_QUOTES, 'UTF-8');?></td>
                                <td class="pt-4"><?php echo htmlentities($data->kesulitan, ENT_QUOTES, 'UTF-8');?></td>
                                <td class="pt-4"><?php echo htmlentities($data->waktu, ENT_QUOTES, 'UTF-8');?></td>
                                <td class="pt-4"><?php echo htmlentities($data->kategori, ENT_QUOTES, 'UTF-8');?></td>
                                
                            </tr>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
                                  -->
    <!-- ##### Post Details Area End ##### -->
    <style>
        .about-card {
            margin-top: 50px; /* Atur margin atas sesuai kebutuhan */
        }
        .about-card .card-img-top {
            height: auto; /* Tinggi gambar disesuaikan dengan konten */
            width: 100%; /* Lebar gambar diatur menjadi 100% */
            object-fit: cover; /* Gambar akan di-stretch agar sesuai dengan ukuran container */
        }
       
    </style>


<section id="aboutus">
<div class="container">
    <div class="row">
        <div class="col-12 mx-auto">
            <div class="card about-card">
                <div class="card-body">
                    <h5 class="card-title">Tentang Kami</h5>
                    <div class="row">
                        <div class="col-md-3">
                            <img src=" <?php echo base_url() ?>assets/page/img/core-img/aboutuss.png">
              
                        </div>
                        <div class="col-md-8">
                            <p class="card-text">Misi kami disini adalah untuk membuat masak sehari-hari makin menyenangkan, karena kami percaya bahwa memasak adalah kunci menuju kehidupan yang lebih bahagia dan lebih sehat bagi manusia, komunitas, dan planet ini. Kami mendukung koki rumahan di seluruh dunia untuk membantu satu sama lain dengan berbagi resep dan tips memasak.

Langganan Premium untuk menikmati fitur & manfaat eksklusif!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

    <!-- ##### Footer Area Start ##### -->
    <style>
        .footer-area {
            background-color: black;
            color: white;
            margin-top: 50px;
        }
    </style>
    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Copywrite Text -->
                    <p class="copywrite-text text-center"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Cookit | 
					
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Popper js -->
    <script src="<?php echo base_url() ?>assets/page/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?php echo base_url() ?>assets/page/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="<?php echo base_url() ?>assets/page/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="<?php echo base_url() ?>assets/page/js/active.js"></script>
</body>

</html>
