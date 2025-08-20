<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/loginStyle.css">
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <a href="/">
                <img src="asset/Logo.png" alt=""/>
            </a>

            <h2>Selamat datang di Ayam Geprek Karunia!</h2>
            <h3>Silahkan Daftar terlebih dulu</h3>

            <form id="login-form" action="{{ route('register.store') }}" method="POST">
                @csrf
                <div class="input-group">
                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" name="nama" required/>
                </div>
                
                <div class="input-group">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" required/>
                </div>

                <div class="input-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div> 

                <button type="submit" class="btn">Daftar</button>
            </form>

            <div class="reg-link">
                <p>Sudah punya akun? <a href="/login">Masuk</a></p>
            </div>
        </div>
    </div>
</body>
</html>