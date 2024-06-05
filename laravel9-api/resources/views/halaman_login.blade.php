<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="icon" href="gambar/logo.jpeg" type="image/png">
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="container text-center">
        <div class="row align-items-center">
            <div class="col">
                <img src="gambar/logo.jpeg" alt="logo" class="logo">
            </div>
        </div>
    </div>
    <div class="main-container">
        <div class="left-container text-center-custom">
            <div class="title">CATATAN PRIBADI</div>
        </div>
        <div class="right-container">
            <div class="form-container">
                <h2 class="text-center">Registrasi</h2>
                <div id="errorMessage" class="error text-danger">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
                <form id="registerForm" action="{{ route('register.process') }}" method="post" onsubmit="return validateForm()">
                    @csrf
                    <input type="text" class="form-control" id="inputNama" name="nama" placeholder="Nama" value="{{ old('nama') }}">
                    <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" value="{{ old('email') }}">
                    <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
                    <input type="password" class="form-control" id="inputRetypePassword" name="password_confirmation" placeholder="Ulangi Password">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function validateForm() {
            const name = document.getElementById('inputNama').value;
            const email = document.getElementById('inputEmail').value;
            const password = document.getElementById('inputPassword').value;
            const retypePassword = document.getElementById('inputRetypePassword').value;
            const errorMessage = document.getElementById('errorMessage');

            errorMessage.textContent = '';

            if (!name || !email || !password || !retypePassword) {
                errorMessage.textContent = 'Isi data diri anda terlebih dahulu!';
                return false;
            }

            if (password !== retypePassword) {
                errorMessage.textContent = 'Mohon Input Password yang sama!';
                return false;
            }

            return true;
        }
    </script>
</body>

</html>
