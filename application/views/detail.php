<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Detail | Resep</title>

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

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Top Header Area -->
        <div class="top-header-area bg-img bg-overlay" style="background-image: url(<?php echo base_url() ?>assets/page/img/bg-img/header.jpg);">
            <div class="container h-100">
                
            </div>
        </div>
        <!-- Logo Area -->
        <!-- <div class="logo-area">
            <a href="#"><img src="<?php echo base_url() ?>assets/page/img/core-img/logo.png" alt=""></a>
        </div> -->
    </header>
    <!-- ##### Header Area End ##### -->

    <div class="bueno-search-area section-padding-100-0 pb-1 bg-img" style="background-image: url(<?php echo base_url() ?>assets/page/img/core-img/pattern.png);">
    </div>

    <!-- ##### Post Details Area Start ##### -->
    <section class="post-news-area section-padding-100-0 mb-70">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Back to Dashboard Button -->
                <div class="col-12 mb-4">
                    <button onclick="window.location.href='<?php echo base_url() ?>index.php'" class="btn bueno-btn">Back</button>
                </div>
                <!-- Post Details Content Area -->
                <div class="col-12 col-lg-4 col-xl-8">
                    <div class="post-details-content mb-100">
                        <div class="blog-thumbnail mb-50">
                            <img src="<?php echo base_url();?>assets/gambar/<?php echo $data->gambar;?>" alt="">
                        </div>
                        <div class="blog-content">
                            <a href="#" class="post-tag"><?php echo htmlentities($data->kategori, ENT_QUOTES, 'UTF-8');?></a>
                            <h4 class="post-title"><?php echo htmlentities($data->nama, ENT_QUOTES, 'UTF-8');?></h4>
                            <?php echo $data->masak;?>
                        </div>
                    </div>
                    <div class="comment_area clearfix mb-100">
                        <h4 class="mb-50">Comments</h4>
                        <?php echo $this->session->flashdata('msg') ?>
                         <ol>
                                <?php
                                  foreach($komen as $y){
                                ?>
                            <!-- Single Comment Area -->
                            <li class="single_comment_area">
                                <!-- Comment Content -->
                                <div class="comment-content d-flex">
                                    <!-- Comment Author -->
                                    <div class="comment-author">
                                        <img src="<?php echo base_url() ?>assets/page/img/bg-img/32.jpg" alt="author">    
                                    </div>
                                    <!-- Comment Meta -->
                                    <div class="comment-meta">
                                        <div class="d-flex">
                                            <a href="#" class="post-author"><?php echo htmlentities($y->nama, ENT_QUOTES, 'UTF-8');?></a>
                                            <a href="#" class="reply"><?php echo htmlentities($y->tgl, ENT_QUOTES, 'UTF-8');?></a>
                                        </div>
                                        <p><?php echo htmlentities($y->isi, ENT_QUOTES, 'UTF-8');?></p>
                                    </div>
                                </div>
                                <?php } ?>
                        </ol>
                    </div>
                    <div class="post-a-comment-area mb-30 clearfix">
                        <h4 class="mb-50">Leave a comment</h4>
                        <!-- Reply Form -->
                        <div class="contact-form-area">
    <form action="<?php echo base_url() ?>page/komen" method="post" onsubmit="return validateForm()">
        <input type="hidden" value="<?php echo htmlentities($data->id, ENT_QUOTES, 'UTF-8'); ?>" name="id">
        <div class="row">
            <div class="col-12 col-lg-6 mb-3">
                <input type="text" class="form-control" id="name" name="nama" placeholder="Name" required>
            </div>
            <div class="col-12 col-lg-6 mb-3">
                <input type="number" class="form-control" id="hp" name="hp" placeholder="No. HP" required>
            </div>
            <div class="col-12 mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="col-12 mb-3">
                <textarea name="isi" class="form-control" id="message" cols="30" rows="10" placeholder="Message" required></textarea>
            </div>
            <div class="col-12">
                <button class="btn bueno-btn mt-3" type="submit">Submit Comment</button>
                    </div>
                </div>
            </form>
                </div>
            </div>
                </div>
                <div class="col-12 col-lg-4 col-xl-4">
                    <!-- Info -->
                    <div class="recipe-info">
                        <h5>Info</h5>
                        <ul class="info-data">
                            <li><img src="<?php echo base_url() ?>assets/page/img/core-img/tray.png" alt=""> <span><p>Bahan Utama</p><?php echo htmlentities($data->bahan, ENT_QUOTES, 'UTF-8');?></span></li>
                            <li><img src="<?php echo base_url() ?>assets/page/img/core-img/sandwich.png" alt=""> <span><p>Bumbu</p><?php echo htmlentities($data->bumbu, ENT_QUOTES, 'UTF-8');?></span></li>
                            <li><img src="<?php echo base_url() ?>assets/page/img/core-img/compass.png" alt=""> <span><p>Tingkat Kesulitan</p><?php echo htmlentities($data->kesulitan, ENT_QUOTES, 'UTF-8');?></span></li>
                            <li><img src="<?php echo base_url() ?>assets/page/img/core-img/alarm-clock.png" alt=""> <span><p>Waktu</p><?php echo htmlentities($data->waktu, ENT_QUOTES, 'UTF-8');?></span></li>
                            <li><img src="<?php echo base_url() ?>assets/page/img/core-img/eye.png" alt=""> <span><p>Asal</p><?php echo htmlentities($data->asal, ENT_QUOTES, 'UTF-8');?></span></li>
                        </ul>
                    </div>
                     <button onclick="window.print()" class="btn bueno-btn">Print</button> 
                  
        <!-- Datatables -->
        <script src="asset/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
        <script src="asset/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js"></script>

        <script src="asset/DataTables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
        <script src="asset/DataTables/Buttons-1.5.6/js/buttons.bootstrap4.min.js"></script>
        <script src="asset/DataTables/JSZip-2.5.0/jszip.min.js"></script>
        <script src="asset/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
        <script src="asset/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
        <script src="asset/DataTables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
        <script src="asset/DataTables/Buttons-1.5.6/js/buttons.print.min.js"></script>
        <script src="asset/DataTables/Buttons-1.5.6/js/buttons.colVis.min.js"></script>
        <script>

$(document).ready(function() {
    var table = $('#table').DataTable({
        buttons: ['copy', 'csv', 'print', 'excel', 'pdf', 'colvis'],

        lengthMenu: [
            [5, 10, 25, 50, 100, -1],
            [5, 10, 25, 50, 100, "All"]
        ]
    });

    table.buttons().container()
        .appendTo('#table_wrapper .col-md-5:eq(0)');
});

function confirmAndRedirect(url) {
if (confirm('Apakah ingin dihapus data ini?')) {
    window.location.href = url;
}
}
</script>
</body>

</html>
            </div>
        </div>
    </section>
    <!-- ##### Post Details Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Copywrite Text -->
                    <p class="copywrite-text text-center"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                        All rights reserved | Cookit
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="<?php echo base_url() ?>assets/page/js/jquery/jquery-2.2.4.min.js"></script>
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
