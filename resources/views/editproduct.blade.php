<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
    <link rel="stylesheet" href="{{ asset('css/dashboardstyle.css') }}" />
</head>
<body>
    <section>
        <h1>Edit Produk</h1>

        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Nama Menu</label>
                <input type="text" id="title" name="title" value="{{ $product->title }}" required>
            </div>

            <div class="form-group">
                <label for="image">Gambar Menu</label>
                <input type="text" id="image" name="image" value="{{ $product->image }}" required>
            </div>

            <div class="form-group">
                <label for="description">Deskripsi</label>
                <input type="text" id="description" name="description" value="{{ $product->description }}" required>
            </div>

            <div class="form-group">
                <label for="price">Harga</label>
                <input type="text" id="price" name="price" value="{{ $product->price }}" required>
            </div>

            <div>
                <button type="submit">Update Produk</button>
                <a href="{{ route('dashboard') }}">Kembali</a>
            </div>
        </form>
    </section>
</body>
</html>
