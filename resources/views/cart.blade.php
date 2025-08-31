<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cart Page</title>
  <link rel="stylesheet" href="css/cartStyle.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  @include('components.nav')

  <section class="cart-container">
    <!-- Steps -->
    <div class="steps">
      <div class="step active">1. Cart</div>
      <div class="step">2. Order Info</div>
      <div class="step">3. Payment</div>
    </div>

    <div class="container">
      <!-- Cart Section -->
      <div class="cart">
        <h3>Items</h3>
        <table>
          <thead>
            <tr>
              <th>ITEMS</th>
              <th>QTY</th>
              <th>SUBTOTAL</th>
              <th>ACTION</th>
            </tr>
          </thead>
          <tbody>
              @forelse ($cart as $id => $item)
                  <tr>
                      <td>{{ $item['name'] }}</td>
                      <td>
                        <!-- Form update qty -->
                        <form action="{{ route('cart.update', $id) }}" method="POST" style="display:flex; align-items:center; gap:5px;">
                          @csrf
                          @method('PUT')
                          <input type="number" name="qty" value="{{ $item['qty'] }}" min="1" style="width:60px; text-align:center;">
                          <button type="submit" style="background:#4CAF50; color:white; border:none; padding:5px 10px; border-radius:5px; cursor:pointer;">
                            Update
                          </button>
                        </form>
                      </td>
                      <td>Rp {{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}</td>
                      <td><!-- Tombol hapus item -->
                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" style="background:red; color:white; border:none; padding:5px 10px; border-radius:5px; cursor:pointer;">
                            Hapus
                          </button>
                        </form>
                      </td>
                  </tr>
              @empty
                  <tr>
                      <td class="empty" colspan="4">Your cart is empty</td>
                  </tr>
              @endforelse
          </tbody>
        </table>
        <a href="{{ url('/#menu') }}" class="continue">Continue Shopping ></a>
      </div>

      <!-- Sidebar -->
      <div class="sidebar">
        <h4>Order Subtotal</h4>
        <div class="subtotal">
          Rp {{ number_format(collect($cart)->sum(fn($i) => $i['price'] * $i['qty']), 0, ',', '.') }}
          </div>


        <textarea placeholder="Add Order Note (Optional)"></textarea>

        <div class="options">
          <div class="option">
            <img src="https://cdn-icons-png.flaticon.com/512/679/679720.png" alt="Delivery">
            Delivery
          </div>
          <div class="option active">
            <img src="https://cdn-icons-png.flaticon.com/512/891/891462.png" alt="Pick Up">
            Pick Up
          </div>
        </div>

        <button class="btn">Continue</button>
      </div>
    </div>
  </section>
  
</body>
</html>
