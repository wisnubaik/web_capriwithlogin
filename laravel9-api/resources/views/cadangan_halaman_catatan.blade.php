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
            <a href="javascript:void(0);" title="simpan" id="simpanButton">&#128190;</a>
            <a href="javascript:void(0);" title="tambah background" id="tambahBackgroundButton">+</a>
            <a href="javascript:void(0);" title="pengingat_catatan" id="pengingatButton">&#128276;</a>
        </div>
    </header>

    <main>
        <input type="text" class="input-judul" placeholder="Tambah Judul" id="judulInput" />
        <textarea class="input-isi" placeholder="Tambah Isi" id="isiInput"></textarea>
    </main>

    <!-- Palet warna -->
    <div class="color-palette" id="colorPalette">
        <div class="color-box" style="background-color: #C8E8E3;" onclick="changeBackgroundColor(this, '#C8E8E3')">
            <div class="check-mark"></div>
        </div>
        <div class="color-box" style="background-color: #FCC0BF;" onclick="changeBackgroundColor(this, '#FCC0BF')">
            <div class="check-mark"></div>
        </div>
        <div class="color-box" style="background-color: #CDD9CD;" onclick="changeBackgroundColor(this, '#CDD9CD')">
            <div class="check-mark"></div>
        </div>
        <div class="color-box" style="background-color: #D4DFD1;" onclick="changeBackgroundColor(this, '#D4DFD1')">
            <div class="check-mark"></div>
        </div>
        <div class="color-box" style="background-color: #E7E8E2;" onclick="changeBackgroundColor(this, '#E7E8E2')">
            <div class="check-mark"></div>
        </div>
        <div class="color-box" style="background-color: #D9B08F;" onclick="changeBackgroundColor(this, '#D9B08F')">
            <div class="check-mark"></div>
        </div>
        <div class="color-box" style="background-color: #C1DAC7;" onclick="changeBackgroundColor(this, '#C1DAC7')">
            <div class="check-mark"></div>
        </div>
        <div class="color-box" style="background-color: #95C1A3;" onclick="changeBackgroundColor(this, '#95C1A3')">
            <div class="check-mark"></div>
        </div>
        <div class="color-box" style="background-color: #BBDEF4;" onclick="changeBackgroundColor(this, '#BBDEF4')">
            <div class="check-mark"></div>
        </div>
        <div class="color-box" style="background-color: #FDC6CB;" onclick="changeBackgroundColor(this, '#FDC6CB')">
            <div class="check-mark"></div>
        </div>
        <div class="color-box" style="background-color: #F2DDE2" onclick="changeBackgroundColor(this, '#F2DDE2')">
            <div class="check-mark"></div>
        </div>
        <div class="color-box" style="background-color: #F9D7F5;" onclick="changeBackgroundColor(this, '#F9D7F5')">
            <div class="check-mark"></div>
        </div>
        <div class="color-box" style="background-color: #CFFFD0;" onclick="changeBackgroundColor(this, '#CFFFD0')">
            <div class="check-mark"></div>
        </div>
        <div class="color-box" style="background-color: #CFF3F3;" onclick="changeBackgroundColor(this, '#CFF3F3')">
            <div class="check-mark"></div>
        </div>
        <div class="color-box" style="background-color: #CEADFE;" onclick="changeBackgroundColor(this, '#CEADFE')">
            <div class="check-mark"></div>
        </div>
        <div class="color-box" style="background-color: #D1E2FF;" onclick="changeBackgroundColor(this, '#D1E2FF')">
            <div class="check-mark"></div>
        </div>
        <div class="color-box" style="background-color: #D8FDF0;" onclick="changeBackgroundColor(this, '#D8FDF0')">
            <div class="check-mark"></div>
        </div>
        <div class="color-box" style="background-color: #D4B2A7;" onclick="changeBackgroundColor(this, '#D4B2A7')">
            <div class="check-mark"></div>
        </div>
        <div class="color-box" style="background-color: #EDE9E3;" onclick="changeBackgroundColor(this, '#EDE9E3')">
            <div class="check-mark"></div>
        </div>
        <div class="color-box" style="background-color: #FFFFFF;" onclick="changeBackgroundColor(this, '#FFFFFF')">
            <div class="check-mark"></div>
        </div>
        <div class="close-button" onclick="closePalette()">×</div>
    </div>

    <input type="color" id="favcolor" name="favcolor" style="display: none;"> <br>

    <script>
        let selectedColorBox = null;

        document.getElementById("simpanButton").addEventListener("click", function () {
            var judul = document.getElementById("judulInput").value;
            var isi = document.getElementById("isiInput").value;
            if (judul.trim() !== "" && isi.trim() !== "") {
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