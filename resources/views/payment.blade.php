<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayam Geprek Karunia</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cartStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/paymentStyle.css') }}">
</head>
<body>
    @include('components.nav')

    <div class="checkout-container">
        @include('components.cartsteps')

        <div class="payment-wrapper">
            <!-- LEFT -->
            <div class="order-summary">
                <h3>ORDER SUMMARY</h3>

                
                @foreach($orderItems as $item)
                    <div class="order-item">
                        <div>
                            <p><strong>{{ $item->product->title }}</strong> x{{ $item->qty }}</p>
                        </div>
                        <p>Rp {{ number_format($item->price * $item->qty, 0, ',', '.') }}</p>
                    </div>
                @endforeach

                @php
                    $subtotal = $orderItems->sum(fn($i) => $i->price * $i->qty);
                    $delivery = session('orderinfo.delivery_method') === 'GoSend' ? 13500 : 
                                (session('orderinfo.delivery_method') === 'GrabExpress' ? 18198 : 0);
                    $total = $subtotal + $delivery;
                @endphp

                <div class="order-total">
                    <div><span>Subtotal</span><span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span></div>
                    <div><span>Delivery Fee</span><span>Rp {{ number_format($delivery, 0, ',', '.') }}</span></div>
                    <div><strong>Total</strong><strong>Rp {{ number_format($total, 0, ',', '.') }}</strong></div>
                </div>
            </div>
            
            <!-- RIGHT -->
            <div class="delivery-section">
                <h3>DELIVERY</h3>     

                @if(session('orderinfo'))
                    <p><strong>Deliver To</strong><br>{{ session('orderinfo.address') }}</p>
                    <p><strong>Delivery Notes</strong><br>{{ session('orderinfo.note') ?? '-' }}</p>
                    <p><strong>Recipient</strong><br>{{ session('orderinfo.recipient') }}</p>
                    <p><strong>Estimated Arrival</strong><br>
                        @if(session('orderinfo.delivery_method') === 'GoSend')
                            In 90 - 150 minutes
                        @elseif(session('orderinfo.delivery_method') === 'GrabExpress')
                            In 60 minutes
                        @else
                            N/A
                        @endif
                    </p>
                    <p><strong>Courier</strong><br>{{ session('orderinfo.delivery_method') }}</p>
                @else
                    <p>❌ Belum ada data order. Silakan isi Order Info dulu.</p>
                @endif

                <div class="delivery-price">
                    Rp {{ number_format($total ?? 0, 0, ',', '.') }}
                </div>

                <h3>Pay With</h3>
                <div class="payment-options">
                    <div class="payment-option">QRIS</div>
                    <div class="payment-option">VA BCA</div>
                </div>

                <button class="btn">Place My Order</button>
            </div>
        </div>
    </div>
</body>
</html>
