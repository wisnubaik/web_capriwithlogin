<?php
$notes = [];
if (file_exists('notes.json')) {
    $notes = json_decode(file_get_contents('notes.json'), true);
}

// Tangkap id catatan dari URL
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Cek apakah id catatan valid
if ($id === null || !isset($notes[$id])) {
    // Jika id tidak valid, arahkan pengguna ke halaman menu
    header("Location: /menu");
    exit;
}

// Ambil judul dan isi catatan berdasarkan id
$judul = $notes[$id]['title'];
$isi = $notes[$id]['content'];

// Tangkap data judul dan isi catatan dari URL jika ada
$editedJudul = isset($_GET['judul']) ? $_GET['judul'] : '';
$editedIsi = isset($_GET['isi']) ? $_GET['isi'] : '';

// Jika data judul dan isi catatan yang diedit tersedia, lakukan pembaruan
if (!empty($editedJudul) && !empty($editedIsi)) {
    $notes[$id]['title'] = $editedJudul;
    $notes[$id]['content'] = $editedIsi;
    file_put_contents('notes.json', json_encode($notes));

    // Setelah pembaruan, arahkan pengguna kembali ke halaman menu
    header("Location: /menu");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Catatan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        h1 {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #0a74da;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Catatan</h1>
        <form method="GET">
            <label for="judul">Judul:</label>
            <input type="text" id="judul" name="judul" value="<?php echo htmlspecialchars($judul); ?>">
            <label for="isi">Isi:</label>
            <textarea id="isi" name="isi" rows="5"><?php echo htmlspecialchars($isi); ?></textarea>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" value="Simpan">
        </form>
    </div>
</body>
</html>
