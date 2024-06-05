<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catatan</title>
    <link rel="stylesheet" href="catatan.css">
    <link rel="icon" href="gambar/logo.jpeg" type="image/png">
    <style>
        /* Tambahkan CSS tambahan di sini */
        .color-palette {
            display: none;
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            background-color: white;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .color-box {
            width: 30px;
            height: 30px;
            margin: 5px;
            cursor: pointer;
            border-radius: 5px;
            position: relative;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        .check-mark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 10px;
            height: 10px;
            background-color: transparent;
            border: 2px solid white;
            border-left: none;
            border-bottom: none;
            display: none;
        }

        .color-box.selected .check-mark {
            display: block;
        }

        .close-button {
            position: absolute;
            top: -10px;
            right: -10px;
            width: 20px;
            height: 20px;
            background-color: #FCC0BF;
            border-radius: 50%;
            line-height: 20px;
            text-align: center;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <header>
        <h1>Catatan</h1>
        <div class="header-buttons">
            <a href="javascript:void(0);" title="tambah background" id="tambahBackgroundButton" onclick="openPalette()">+</a>
            <a href="/halaman_pengingat" title="pengingat_catatan" id="pengingatButton">&#128276;</a>
            <a href="javascript:void(0);" title="simpan" id="simpanButton">&#128190;</a>
        </div>
    </header>

    <main>
        <input type="text" name="judul" class="input-judul" placeholder="Tambah Judul" id="judulInput" />
        <textarea name="isi" class="input-isi" placeholder="Tambah Isi" id="isiInput"></textarea>
    </main>

    <!-- Palet warna -->
    <div class="color-palette" id="colorPalette">
        <div class="color-box" style="background-color: white;" onclick="changeBackgroundColor(this, 'white')">
            <div class="check-mark"></div>
        </div>
        <div class="color-box" style="background-color: #C8E8E3;" onclick="changeBackgroundColor(this, '#C8E8E3')">
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
        <!-- Tambahan 10 warna pastel -->
        <div class="color-box" style="background-color: #FFE4E1;" onclick="changeBackgroundColor(this, '#FFE4E1')">
            <div class="check-mark"></div>
        </div>
        <div class="color-box" style="background-color: #FFF0F5;" onclick="changeBackgroundColor(this, '#FFF0F5')">
            <div class="check-mark"></div>
        </div>
        <div class="color-box" style="background-color: #F0FFF0;" onclick="changeBackgroundColor(this, '#F0FFF0')">
            <div class="check-mark"></div>
        </div>
        <div class="color-box" style="background-color: #F0FFFF;" onclick="changeBackgroundColor(this, '#F0FFFF')">
            <div class="check-mark"></div>
        </div>
        <div class="color-box" style="background-color: #F5FFFA;" onclick="changeBackgroundColor(this, '#F5FFFA')">
            <div class="check-mark"></div>
        </div>
        <div class="color-box" style="background-color: #F5F5DC;" onclick="changeBackgroundColor(this, '#F5F5DC')">
            <div class="check-mark"></div>
        </div>
        <div class="color-box" style="background-color: #FFFACD;" onclick="changeBackgroundColor(this, '#FFFACD')">
            <div class="check-mark"></div>
        </div>
        <div class="color-box" style="background-color: #FAFAD2;" onclick="changeBackgroundColor(this, '#FAFAD2')">
            <div class="check-mark"></div>
        </div>
        <div class="color-box" style="background-color: #FFEFD5;" onclick="changeBackgroundColor(this, '#FFEFD5')">
            <div class="check-mark"></div>
        </div>
        <div class="color-box" style="background-color: #FFDAB9;" onclick="changeBackgroundColor(this, '#FFDAB9')">
            <div class="check-mark"></div>
        </div>
        <div class="close-button" onclick="closePalette()">×</div>
    </div>

    <script>
        // Fungsi untuk membuka palet warna
        function openPalette() {
            document.getElementById("colorPalette").style.display = "flex";
        }

        // Fungsi untuk menutup palet warna
        function closePalette() {
            document.getElementById("colorPalette").style.display = "none";
        }

        // Fungsi untuk mengubah warna latar belakang
        function changeBackgroundColor(element, color) {
            document.body.style.backgroundColor = color;

            // Tandai warna yang dipilih
            var colorBoxes = document.getElementsByClassName('color-box');
            for (var i = 0; i < colorBoxes.length; i++) {
                colorBoxes[i].classList.remove('selected');
            }
            element.classList.add('selected');
        }

        // Fungsi untuk menyembunyikan palet warna saat halaman catatan dibuka pertama kali
        window.onload = function() {
            closePalette();
        };

        // Fungsi untuk menyimpan catatan
        document.getElementById("simpanButton").addEventListener("click", function () {
            var judul = document.getElementById("judulInput").value;
            var isi = document.getElementById("isiInput").value;
            if (judul.trim() !== "" && isi.trim() !== "") {
                // Kirim data catatan ke halaman menu
                window.location.href = "/menu?judul=" + encodeURIComponent(judul) + "&isi=" + encodeURIComponent(isi);
            } else {
                alert("Isi Judul dan Isi Catatan terlebih dahulu ^_^");
            }
        });
    </script>

</body>

</html>