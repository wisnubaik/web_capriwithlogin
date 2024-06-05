<?php
// Fungsi untuk menyimpan catatan
function saveNotes($judul, $isi) {
    // Ambil data catatan yang sudah ada
    $notes = [];
    if (file_exists('notes.json')) {
        $notes = json_decode(file_get_contents('notes.json'), true);
    }

    // Tambahkan catatan baru ke dalam kotak
    $newNote = ["title" => $judul, "content" => $isi];
    $notes[] = $newNote;

    // Simpan kembali kotak ke dalam file JSON
    file_put_contents('notes.json', json_encode($notes));
}

// Cek jika ada pengiriman data catatan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST["judul"];
    $isi = $_POST["isi"];

    if (!empty($judul) && !empty($isi)) {
        // Simpan catatan
        saveNotes($judul, $isi);

        // Beri respon JSON untuk memberitahu JavaScript bahwa catatan telah disimpan
        header('Content-Type: application/json');
        echo json_encode(['success' => true]);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capri - Beranda</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #C4DCFC, #A1C4FD);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
        }

        h1 {
            color: #274777;
            font-size: 80px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .button-container {
            margin-top: 30px;
            display: flex;
            gap: 20px;
        }

        .button-container button {
            background-color: #274777;
            color: white;
            border: none;
            padding: 20px;
            text-align: center;
            text-decoration: none;
            display: inline-flex;
            flex-direction: column;
            align-items: center;
            font-size: 18px;
            margin: 10px;
            cursor: pointer;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, transform 0.3s;
            width: 150px;
            height: 150px;
        }

        .button-container button img {
            width: 50px;
            height: 50px;
            margin-bottom: 10px;
        }

        .button-container button:hover {
            background-color: #276783;
            transform: translateY(-2px);
        }

        .button-container button:active {
            transform: translateY(1px);
        }
    </style>
</head>

<body>
    <h1>Selamat Datang di CAPRI</h1>
    <div class="button-container">
        <button onclick="location.href='/menu'">
            <img src="gambar/lihat_catatan.jpg" alt="Lihat Catatan"> Lihat Catatan Anda
        </button>
        <button onclick="location.href='/halaman_catatan'">
            <img src="gambar/buat_catatan.jpg" alt="Buat Catatan"> Buat Catatan Baru
        </button>
    </div>
</body>

</html>