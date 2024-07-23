<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Kategori</title>
    <style>
        .form-container {
            max-width: 500px;
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
        label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
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
        <form action="<?= site_url('admin/update_kategori') ?>" method="post">
            <input type="hidden" name="id" value="<?= $kategori->id ?>">
            <div class="form-group">
                <label for="nama">Nama Kategori:</label>
                <input type="text" id="nama" name="nama" value="<?= htmlentities($kategori->nama, ENT_QUOTES, 'UTF-8') ?>" required>
            </div>
            <button type="submit">Update Kategori</button>
        </form>
    </div>
</body>
</html>
