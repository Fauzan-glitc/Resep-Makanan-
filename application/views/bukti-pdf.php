<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Resep</title>
    <!-- Tambahkan CSS atau style lainnya di sini jika diperlukan -->
</head>
<body>

<?php if (!empty($resep)): ?>
    <h1><?php echo $resep->nama; ?></h1>
    <img src="<?php echo base_url();?>assets/gambar/<?php echo $resep->gambar;?>" alt="">
    
    <p>Bahan: <?php echo $resep->bahan; ?></p>
    <p>Bumbu: <?php echo $resep->bumbu; ?></p>
    <p>Cara Masak: <?php echo $resep->masak; ?></p>
<?php else: ?>
    <p>Resep tidak ditemukan.</p>
<?php endif; ?>

<!-- Tambahkan tombol atau link kembali ke halaman sebelumnya jika diperlukan -->

</body>
</html>
