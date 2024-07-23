<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Resep</title>
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Summernote CSS and JS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
    <style>
        .form-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }
        .form-group label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input[type="text"],
        .form-group textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }
        .form-group .form-image {
            display: flex;
            align-items: center;
        }
        .form-group .form-image img {
            margin-left: 10px;
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #28a745;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form action="<?= site_url('admin/update_resep') ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $recipe->id ?>">
            
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" value="<?= $recipe->nama ?>">
            </div>
            <div class="form-group">
                <label for="bahan">Bahan-bahan:</label>
                <textarea id="bahan" name="bahan"><?= $recipe->bahan ?></textarea>
            </div>
            <div class="form-group">
                <label for="bumbu">Bumbu:</label>
                <textarea id="bumbu" name="bumbu"><?= $recipe->bumbu ?></textarea>
            </div>
            <div class="form-group">
                <label for="kesulitan">Kesulitan:</label>
                <input type="text" id="kesulitan" name="kesulitan" value="<?= $recipe->kesulitan ?>">
            </div>
            <div class="form-group">
                <label for="waktu">Waktu:</label>
                <input type="text" id="waktu" name="waktu" value="<?= $recipe->waktu ?>">
            </div>
            <div class="form-group">
                <label for="kategori">Kategori:</label>
                <input type="text" id="kategori" name="kategori" value="<?= $recipe->kategori ?>">
            </div>
            <div class="form-group">
                <label for="asal">Asal:</label>
                <input type="text" id="asal" name="asal" value="<?= $recipe->asal ?>">
            </div>
            <div class="form-group">
                <label for="cara">Cara Masak:</label>
                <textarea class="summernote" rows="3" id="cara" name="cara"><?= $recipe->masak ?></textarea>
            </div>
            <div class="form-group">
                <label for="foto">Gambar:</label>
                <div class="form-image">
                    <input type="file" id="foto" name="foto">
                    <img src="<?= base_url('assets/gambar/' . $recipe->gambar) ?>" alt="Current Image" width="200">
                </div>
            </div>
            <div class="form-group">
                <button type="submit">Update Resep</button>
            </div>
        </form>
    </div>

    <!-- Inisialisasi Summernote dan Event Listener untuk Textarea -->
    <script>
      $(document).ready(function() {
        // Inisialisasi Summernote
        $('.summernote').summernote({
          height: 300, // Set editor height
          minHeight: null, // Set minimum height of editor
          maxHeight: null, // Set maximum height of editor
          focus: true // Set focus to editable area after initializing summernote
        });

        // Event Listener for Textarea to Handle Enter Key
        $('#bahan').on('keypress', function(e) {
          if (e.which == 13) {  // 13 adalah kode ASCII untuk Enter
            e.preventDefault(); // Mencegah default Enter behavior
            $(this).val($(this).val() + '\n'); // Tambahkan baris baru
          }
        });
      });
    </script>
</body>
</html>
