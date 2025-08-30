<header>
      <nav class="navbar">
        <a href="{{ url('/#home') }}" class="navbar-logo">
          <img src="asset/Logo.png" alt=""/>
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
            <img src="asset/close.png" alt="" />
          </div>          
        </div>

        <div class="nav-extra">
          <a href="{{ url('/cart') }}" class="nav-cart"><img src="asset/cart.png" alt=""></a>
          <a href="/login" class="nav-profile"><img src="asset/profile.png" alt=""></a>

          <div class="nav-toggle" id="nav-toggle" onclick="toggleClick()">
            <img src="asset/more.png" alt="" />
          </div>
        </div>
        
      </nav>
    </header>