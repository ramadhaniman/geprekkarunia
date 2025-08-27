<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="css/dashboardstyle.css" />
</head>
<body>

    <!-- <section>
        <h1>Selamat Datang di Dashboard Admin!</h1>
        <form action="{{ route('home.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama Menu</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="image">Gambar Menu</label>
                <input type="text" id="image" name="image" required>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <input type="text" id="description" name="description" required>
            </div>
            <div class="form-group">
                <label for="price">Harga</label>
                <input type="text" id="price" name="price" required>
            </div>
            <div>
                <button type="submit" class="">Tambahkan</button>
            </div>
        </form>
    </section> -->

    
    <section>
        <h1>Selamat Datang di Dashboard Admin!</h1>

        {{-- Form tambah produk --}}
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama Menu</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="image">Gambar Menu</label>
                <input type="text" id="image" name="image" required>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <input type="text" id="description" name="description" required>
            </div>
            <div class="form-group">
                <label for="price">Harga</label>
                <input type="text" id="price" name="price" required>
            </div>
            <div>
                <button type="submit">Tambahkan</button>
            </div>
        </form>
    </section>

    <hr>

    {{-- Daftar produk --}}
    <section>
        <h2>Daftar Produk</h2>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Gambar</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->title }}</td>
                    <td><img src="{{ $product->image }}" width="80"></td>
                    <td>{{ $product->description }}</td>
                    <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin hapus produk ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</body>
</html>
