<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengingat</title>
    <link rel="icon" href="gambar/logo.jpeg" type="image/png">
    <link rel="stylesheet" href="pengingat.css">
    <link rel="stylesheet" href="navback.css">
    <style>
        .popup {
            display: none;
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            border: 1px solid #ccc;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .popup.active {
            display: block;
        }

        .popup button {
            margin: 5px;
        }

        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background: none;
            border: none;
            font-size: 16px;
            cursor: pointer;
        }

        #save-button,
        #back-button {
            background-color: #87CEFA;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            margin-right: 10px;
        }

        #save-button:hover {
            background-color: #C8E8E3;
        }

        svg {
            width: 48px; /* Increased size */
            height: 48px; /* Increased size */
            fill: #00008B; /* Dark blue color */
            transition: fill 0.3s ease;
        }

        svg:hover {
            fill: #0000CD; /* Medium blue color on hover */
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <a href="#" onclick="history.back()" class="back-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M10 17l5-5-5-5v10z"/></svg></a>
    </nav>
    <header>
        <h1>Pengingat</h1>
        
    </header>

    <main>
        <form method="post" action="/home">
            {{ csrf_field() }}
            <div class="form-container">
                <div class="form-row">
                    <label for="day">Hari</label>
                    <select id="day" name="hari">
                        <option disabled selected>Pilih Hari</option>
                        <option value="0">Minggu</option>
                        <option value="1">Senin</option>
                        <option value="2">Selasa</option>
                        <option value="3">Rabu</option>
                        <option value="4">Kamis</option>
                        <option value="5">Jumat</option>
                        <option value="6">Sabtu</option>
                    </select>
                </div>
                <div class="form-row">
                    <label for="date">Tanggal</label>
                    <input type="date" id="date" name="tanggal">
                </div>
                <div class="form-row">
                    <label for="time">Waktu</label>
                    <input type="time" id="time" name="waktu">
                </div>
                <div class="form-row">
                    <input type="submit" id="save-button"></button>
                </div>
            </div>
        </form>
    </main>

    <footer></footer>

    <script>
        function syncDayWithDate() {
            const dateInput = document.getElementById('date').value;
            if (dateInput) {
                const date = new Date(dateInput);
                const dayOfWeek = date.getUTCDay();
                document.getElementById('day').value = dayOfWeek;
            }
        }

        function syncDateWithDay() {
            const selectedDay = parseInt(document.getElementById('day').value, 10);
            if (!isNaN(selectedDay)) {
                const today = new Date();
                const todayDay = today.getUTCDay();
                const difference = selectedDay - todayDay;
                const nextDate = new Date(today);
                nextDate.setUTCDate(today.getUTCDate() + difference + (difference < 0 ? 7 : 0));
                document.getElementById('date').value = nextDate.toISOString().split('T')[0];
            }
        }

        document.getElementById('date').addEventListener('change', syncDayWithDate);
        document.getElementById('day').addEventListener('change', syncDateWithDay);

        function requestNotificationPermission() {
            if (Notification.permission !== 'granted') {
                Notification.requestPermission().then(permission => {
                    if (permission !== 'granted') {
                        alert('Anda harus mengaktifkan notifikasi untuk menerima pengingat.');
                    }
                });
            }
        }

        function showNotification(title, options) {
            if (Notification.permission === 'granted') {
                new Notification(title, options);
            } else {
                alert('Notifikasi tidak diizinkan.');
            }
        }

        function setReminder(date, time) {
            const now = new Date();
            const reminderDate = new Date(`${date}T${time}:00`);
            const delay = reminderDate.getTime() - now.getTime();

            if (delay > 0) {
                setTimeout(() => {
                    showNotification('Pengingat', {
                        body: `Ingat untuk acara pada ${date} pukul ${time}`,
                        icon: 'gambar/logo.jpeg'
                    });
                }, delay);
            } else {
                alert('Waktu pengingat telah berlalu, silakan pilih waktu yang akan datang.');
            }
        }

        document.getElementById('save-button').addEventListener('click', function (event) {
            const date = document.getElementById('date').value;
            const time = document.getElementById('time').value;

            if (date && time) {
                setReminder(date, time);
                document.getElementById('popup').classList.add('active');
                event.preventDefault(); // Prevent form submission
            } else {
                alert('Silakan pilih tanggal dan waktu yang valid.');
            }
        });

        document.addEventListener('DOMContentLoaded', function () {
            requestNotificationPermission();
        });
    </script>
</body>

</html>
