<header>
  <nav class="navbar">
    <a href="{{ url('/#home') }}" class="navbar-logo">
      <img src="{{asset('asset/Logo.png')}}" alt=""/>
    </a>

    <div class="nav-menu" id="nav-menu">
      <div>
        <ul class="nav-list">
          <li><a href="{{ url('/#home') }}" class="nav-link">Beranda</a></li>
          <li><a href="{{ url('/#menu') }}" class="nav-link">Menu</a></li>
          <li><a href="{{ url('/#testimonial') }}" class="nav-link">Testimoni</a></li>
          <li><a href="{{ url('/#contact') }}" class="nav-link">Kontak</a></li>
        </ul>
      </div>

      <div class="nav-close" id="nav-close" onclick="closeClick()">
        <img src="{{asset('asset/close.png')}}" alt="" />
      </div>          
    </div>

    <div class="nav-extra">
      <a href="{{ url('/cart') }}" class="nav-cart"><img src="{{asset('asset/cart.png')}}" alt="">
        @if(session('cart') && count(session('cart')) > 0)
          <span class="cart-count">
            {{ count(session('cart')) }}
          </span>
        @endif
      </a>

      @guest
          {{-- Kalau belum login --}}
          <a href="{{ route('login') }}" class="nav-profile">
            <img src="{{asset('asset/profile.png')}}" alt="">
          </a>
      @endguest

      @auth
          {{-- Kalau sudah login --}}
          <div class="nav-profile-dropdown">
            <img src="{{asset('asset/profile.png')}}" alt="" class="profile-icon">
            <div class="dropdown-menu">
              <a href="{{ url('/cart') }}">Keranjang</a>
              <form action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button type="submit">Logout</button>
              </form>
            </div>
          </div>
      @endauth

      <div class="nav-toggle" id="nav-toggle" onclick="toggleClick()">
        <img src="{{asset('asset/more.png')}}" alt="" />
      </div>
    </div>
    
  </nav>
</header>