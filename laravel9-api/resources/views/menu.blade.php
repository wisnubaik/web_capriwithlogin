<?php
// Inisialisasi array catatan
$notes = [];
if (file_exists('notes.json')) {
    $notes = json_decode(file_get_contents('notes.json'), true);
}

function saveNoteToFile($judul, $isi) {
    global $notes;
    $newNote = ["title" => $judul, "content" => $isi];
    $notes[] = $newNote;
    file_put_contents('notes.json', json_encode($notes));
}

// Tangkap data judul dan isi catatan dari URL
$judul = isset($_GET['judul']) ? $_GET['judul'] : '';
$isi = isset($_GET['isi']) ? $_GET['isi'] : '';

// Jika ada judul dan isi, simpan catatan baru
if (!empty($judul) && !empty($isi)) {
    saveNoteToFile($judul, $isi);
    // Redirect untuk mencegah resubmission form
    header("Location: /menu");
    exit;
}

// Load kembali catatan dari file
$notes = json_decode(file_get_contents('notes.json'), true);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .header, .footer {
            background-color: #c4dcfc;
            padding: 20px;
            text-align: center;
            border-radius: 20px;
            margin: 20px;
        }
        .menu {
            font-size: 24px;
            font-weight: bold;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }
        .note {
            border: 1px solid #ddd;
            margin: 10px;
            padding: 20px;
            width: 200px;
            cursor: pointer;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
            display: flex;
            flex-direction: column;
        }
        .note h3 {
            margin-top: 0;
            font-size: 18px;
        }
        .note p {
            margin-bottom: 0;
            flex-grow: 1;
        }
        .edit-button {
            background-color: #0a74da;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            align-self: flex-end;
            margin-top: 5px;
            text-decoration: none;
        }
        .add-button {
            position: fixed;
            right: 50px;
            bottom: 50px;
            background-color: #0a74da;
            color: white;
            border: none;
            border-radius: 50%;
            font-size: 24px;
            width: 50px;
            height: 50px;
            text-align: center;
            cursor: pointer;
        }
        .add-button a {
            color: white;
            text-decoration: none;
            display: block;
            height: 100%;
            line-height: 50px;
        }
        .reminder-button {
            position: fixed;
            right: 50px;
            bottom: 110px; /* Menyesuaikan posisi agar di atas tombol tambah */
            background-color: #0a74da;
            color: white;
            border: none;
            border-radius: 50%;
            font-size: 24px;
            width: 50px;
            height: 50px;
            text-align: center;
            cursor: pointer;
        }
        .reminder-button a {
            color: white;
            text-decoration: none;
            display: block;
            height: 100%;
            line-height: 50px;
        }
    </style>
</head>
<body>

    <div class="header">
        <div class="menu">MENU</div>
    </div>

    <div class="container">
        <?php foreach ($notes as $index => $note): ?>
            <div class="note" onclick="goToEdit(<?php echo $index; ?>)">
                <h3><?php echo htmlspecialchars($note['title']); ?></h3>
                <p><?php echo htmlspecialchars($note['content']); ?></p>
                <button class="edit-button" onclick="editNote(<?php echo $index; ?>)">Edit</button>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="footer"></div>

    <!-- Tombol pengingat -->
    <button class="reminder-button"><a href="/halaman_pengingat">&#128276;</a></button>

    <!-- Tombol tambah catatan -->
    <button class="add-button"><a href="/halaman_catatan">+</a></button>

    <script>
        function goToEdit(id) {
            window.location.href = '/edit_catatan_tersimpan?id=' + id;
        }

        function editNote(id) {
            event.stopPropagation(); // Mencegah event onclick pada note
            goToEdit(id);
        }
    </script>
</body>
</html>
