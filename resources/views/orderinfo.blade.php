<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayam Geprek Karunia</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cartStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/orderStyle.css') }}">

</head>
<body>
    @include('components.nav')
    
    <section>
        <div class="order-container">

            <!-- Step Header -->
            @include('components.cartsteps')

            <form action="{{ route('payment.checkout') }}" method="GET">
                @csrf
                <div class="order-wrapper">
                    <div class="order-left">
                        <!-- Recipient -->
                        <div class="section">
                            <h3>User Detail</h3>
                            <div class="recipient">
                                <p>👤 : {{ auth()->user()->name }}</p>
                                <p>✉ : {{ Auth::user()->email }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="order-right">
                        <div class="section">
                            <h3>1. Recipient</h3>
                            <input type="text" class="input" placeholder="Nama">
                        </div>

                        <div class="section">
                            <h3>2. Address</h3>
                            <textarea class="input" rows="3"></textarea>
                            
                            <input type="text" class="input" placeholder="Delivery Notes (Optional)">
                        </div>

                        <div class="delivery-method">
                            <h3>3. Choose Delivery Method</h3>
                            
                            <div class="delivery-options">
                                
                                <!-- Option 1 -->
                                <div class="delivery-option">
                                    <input type="radio" id="delivery1" name="delivery" value="gosend" checked>
                                    <label for="delivery1">
                                        <div class="info">
                                            <strong>GoSend</strong>
                                            <small>90 - 150 min</small>
                                        </div>
                                        <div class="price">Rp 13.500</div>
                                    </label>
                                </div>

                                <!-- Option 2 -->
                                <div class="delivery-option">
                                    <input type="radio" id="delivery2" name="delivery" value="grab">
                                    <label for="delivery2">
                                        <div class="info">
                                            <strong>GrabExpress</strong>
                                            <small>60.0 min</small>
                                        </div>
                                        <div class="price">Rp 18.198</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Continue Button -->
                        <form action="">
                            <button type="submit" class="btn-continue">Continue</button>
                        </form>
                    </div>
                </div>
            </form>
            

        </div>
    </section>
</body>
</html>