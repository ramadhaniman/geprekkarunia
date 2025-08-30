@if(session('success'))
<script>
    alert("{{ session('success') }}");
</script>
@endif

@if(session('error'))
<script>
    alert("{{ session('error') }}");
</script>
@endif

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/loginStyle.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    @include('components.nav')
    <div class="login-container">
        <div class="login-card">
            
            <h2>Selamat datang Karunian!</h2>
            <h3>Silahkan Masuk terlebih dulu</h3>

            <form id="login-form" action="{{ route('login.store') }}" method="POST">
                @csrf              
                <div class="input-group">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" />
                </div>

                <div class="input-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password">
                </div> 

                <button type="submit" class="btn">Masuk</button>
            </form>

            <div class="reg-link">
                <a href="/register">atau Daftar</a>
            </div>
        </div>
    </div>
</body>
</html>