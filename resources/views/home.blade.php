<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ayam Geprek Karunia</title>
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    @include('components.nav')

    <section class="hero" id="home">
      <main class="hero-content">
        <h2>Sensasi Pedas yang Bikin Balik Lagi</h2>
        <p>
          Lagi cari makan enak dan pedas? <br />
          Coba sensasi ayam geprek dengan sambal pilihan, pecel lele hangat,
          tempe goreng, dan es teh manis segar. Semua diolah dari bahan segar
          dan bumbu rumahan. Cocok buat santap siang atau malam bareng teman dan
          keluarga.
        </p>
      </main>
    </section>

    <section class="product" id="menu">
      <h2>Menu</h2>

      <div class="product-list">
        @foreach ($products as $product)
          <div class="product-card">
            <h3>{{$product->title}}</h3>
            <img src="{{$product->image}}" alt="" />
            <p>
              {{$product->description}}
            </p>
            <h3>Harga Rp <span>{{$product->price}}</span></h3>

            <div class="actions">
              @auth
                <!-- Jika sudah login -->
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit">Masukan Keranjang</button>
                </form>
                <form action="{{ route('checkout', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit">Beli</button>
                </form>
              @else
                <!-- Jika belum login -->
                <a href="{{ route('login') }}">
                    <button type="button">Masukan Keranjang</button>
                </a>
                <a href="{{ route('login') }}">
                    <button type="button">Beli</button>
                </a>
              @endauth
            </div>
          </div>
        @endforeach
      </div>
    </section>

    <section class="testimonial" id="testimonial">
      <h2>Kata Mereka</h2>

      <div class="testimonial-list">
        
        @foreach ($testimonies as $testimony)
          <div class="testimonial-card">
              <div class="testimonial-img">
                  <img src="{{ $testimony->image }}" alt="Foto {{ $testimony->name }}" />
              </div>
              <div class="testimonial-content">
                  <p>
                      <span class="quote">❝</span>
                      {{ $testimony->testimony }}
                      <span class="quote">❞</span>
                  </p>
                  <h3>{{ $testimony->name }} <span>{{ $testimony->job }}</span></h3>
              </div>
          </div>
        @endforeach     
        
      </div>
    </section>

    <section class="contact" id="contact">
      <div class="contact-sec">
        <div class="contact-map">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1124.2567856413657!2d106.82718554530943!3d-6.453093779313754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ea0532c93235%3A0x2f7994e42ca991c9!2sJl.%20Raya%20Kp.%20Sawah%20No.9%2C%20Jatimulya%2C%20Kec.%20Cilodong%2C%20Kota%20Depok%2C%20Jawa%20Barat%2016920!5e0!3m2!1sid!2sid!4v1753800517430!5m2!1sid!2sid"
            width="600"
            height="450"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
          ></iframe>
        </div>

        <div class="contact-form">
          <h2>Hubungi Kami</h2>
          <form id="contact-form">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" />

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" />

            <label for="pesan">Pesan:</label>
            <textarea id="pesan" name="pesan"></textarea>

            <p id="error-msg" style="color: red"></p>
            <button type="submit">Kirim</button>
          </form>
        </div>

        <div class="contact-map-mobile">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1124.2567856413657!2d106.82718554530943!3d-6.453093779313754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ea0532c93235%3A0x2f7994e42ca991c9!2sJl.%20Raya%20Kp.%20Sawah%20No.9%2C%20Jatimulya%2C%20Kec.%20Cilodong%2C%20Kota%20Depok%2C%20Jawa%20Barat%2016920!5e0!3m2!1sid!2sid!4v1753800517430!5m2!1sid!2sid"
            width="600"
            height="450"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
          ></iframe>
        </div>
      </div>
    </section>

    <footer>
      <div class="footer-sec">
        <div class="footer-logo">
          <img src="Asset/Logo.png" alt="" />

          <div class="footer-sosmed">
            <a href="https://www.facebook.com/" target="_blank"
              ><img src="Asset/facebookw.png" alt=""
            /></a>
            <a href="https://www.tiktok.com/" target="_blank"
              ><img src="Asset/tiktokw.png" alt=""
            /></a>
            <a href="https://www.instagram.com/" target="_blank"
              ><img src="Asset/instagramw.png" alt=""
            /></a>
          </div>
        </div>

        <div class="footer-contact">
          <h3>CONTACT US</h3>
          <p>ayamgeprek@karunia.com</p>
          <p>Jl. Raya Kp. Sawah No. 9, Cilodong, Depok.</p>
          <p>+62 8211 555 1234</p>
        </div>

        <div class="footer-subs">
          <h3>SUBSCRIBE</h3>
          <p>Enter your email to get notified about our promotion</p>
          <div class="subs-input">
            <input
              type="email"
              id="email-input"
              placeholder="contoh@email.com"
            />
            <a href="#" id="submit-subs"
              ><img src="Asset/email red.png" alt=""
            /></a>
          </div>
          <p class="footer-error-msg" id="email-error"></p>
        </div>
      </div>

      <p>
        &copy; 2025 Ayam Geprek Karunia. Jl. Raya Kp. Sawah No. 9, Cilodong,
        Depok.
      </p>
    </footer>

    <script src="js/main.js"></script>
  </body>
</html>

