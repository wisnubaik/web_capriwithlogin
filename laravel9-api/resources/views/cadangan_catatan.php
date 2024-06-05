<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catatan</title>
    <link rel="stylesheet" href="catatan.css">
    <link rel="icon" href="gambar/logo.jpeg" type="image/png">
</head>

<body>

    <header>
        <h1>Catatan</h1>
        <div class="header-buttons">
            <a href="menu.php" title="simpan" id="simpanButton">&#128190;</a>
            <a href="javascript:void(0);" title="tambah background" id="tambahBackgroundButton">+</a>
            <a href="javascript:void(0);" title="pengingat_catatan" id="pengingatButton">&#128276;</a>
        </div>
    </header>

    <main>
        <input type="text" name="judul" class="input-judul" placeholder="Tambah Judul" id="judulInput" />
        <textarea name="isi" class="input-isi" placeholder="Tambah Isi" id="isiInput"></textarea>
    </main>

    <!-- Palet warna -->
    <div class="color-palette" id="colorPalette">
        <div class="color-box" style="background-color: #C8E8E3;" onclick="changeBackgroundColor(this, '#C8E8E3')">
            <div class="check-mark"></div>
        </div>
        <!-- Sisipkan kode warna yang lain di sini -->
        <div class="close-button" onclick="closePalette()">X</div>
    </div>

    <input type="color" id="favcolor" name="favcolor" style="display: none;"> <br>

    <script>
        let selectedColorBox = null;

        document.getElementById("simpanButton").addEventListener("click", function () {
            var judul = document.getElementById("judulInput").value;
            var isi = document.getElementById("isiInput").value;
            if (judul.trim() !== "" && isi.trim() !== "") {
                // Simpan judul dan isi catatan ke dalam sebuah kotak
                var catatanBaru = document.createElement("div");
                catatanBaru.classList.add("catatan");
                catatanBaru.innerHTML = "<h2>" + judul + "</h2><p>" + isi + "</p>";
                document.body.appendChild(catatanBaru);

                alert("Catatan Anda Telah Tersimpan ^_^");
            } else {
                alert("Isi Judul dan Isi Catatan terlebih dahulu ^_^");
            }
        });

        document.getElementById("tambahBackgroundButton").addEventListener("click", function () {
            document.querySelector(".color-palette").style.display = "flex";
        });

        document.getElementById("pengingatButton").addEventListener("click", function () {
            var judul = document.getElementById("judulInput").value;
            var isi = document.getElementById("isiInput").value;
            if (judul.trim() !== "" && isi.trim() !== "") {
                window.location.href = "/halaman_pengingat";
            } else {
                alert("Isi Judul dan Isi Catatan terlebih dahulu ^_^");
            }
        });

        function closePalette() {
            document.querySelector(".color-palette").style.display = "none";
        }

        function changeBackgroundColor(box, color) {
            if (selectedColorBox) {
                selectedColorBox.querySelector(".check-mark").style.display = "none";
            }
            box.querySelector(".check-mark").style.display = "block";
            selectedColorBox = box;
            document.body.style.backgroundColor = color;
        }
    </script>

</body>

</html>
