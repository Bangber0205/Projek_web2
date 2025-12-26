<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WarungKita | Kelola Usaha Anda</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css');?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <nav>
      <section class="logo-nav">
        <div class="logo">
          <img src="images/store.png" alt="" />
          <p>Warung<span>Kita</span></p>
        </div>
      </section>
      <section class="navbar">
        <a href="">Home</a>
        <a href="">About</a>
        <a href="">Contact</a>
      </section>
      <section class="button-nav">
        <a href="<?= base_url('login') ?>" class="sign-in">Sign in</a>
        <a href="<?= base_url('register') ?>" class="sign-up">Sign up</a>
      </section>
    </nav>
    <main>
      <section class="hero-container">
        <div class="hero-title">
          <h1 class="h1-1">Satu Sistem,</h1>
          <h1>Ribuan Cabang</h1>
          <h1>Terkendali</h1>
        </div>
        <div class="hero-text">
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex commodi
            doloremque praesentium a, nulla quas sed qui molestiae deserunt sunt
            fugit aspernatur totam dolorem enim laborum quo provident officiis
            assumenda?
          </p>
        </div>
        <div class="hero-button">
          <a href="">Get Started</a>
        </div>
      </section>
      <section class="hero-image">
        <img src="images/2907562.jpg" alt="" />
      </section>
    </main>
    <aside>
      <section class="aside-container">
        <div class="aside-title">
          <h1>Grow Your <span>Business,</span> Easily!</h1>
        </div>
      </section>
      <section class="aside-card-container">
        <div class="card-1">
          <div class="card-img">
            <img src="images/Stock manager making inventory item.png" alt="" />
          </div>
          <div class="card-text">
            <h1>Stok Barang</h1>
            <h1>Tak Pernah Lagi Kacau</h1>
            <p>
              Lupa stok habis? Nggak lagi! Pantau inventaris real-time, dapatkan
              notifikasi otomatis saat stok menipis, dan pastikan rak selalu
              siap jual—tanpa repot hitung manual.
            </p>
          </div>
        </div>
        <div class="card-2">
          <div class="card-img">
            <img src="images/Stock manager making inventory item.png" alt="" />
          </div>
          <div class="card-text">
            <h1>Satu Klik, Semua Cabang</h1>
            <h1>Terkendali</h1>
            <p>
              Punya banyak cabang? Kelola semuanya dari satu tempat: pantau
              penjualan, sinkronkan stok, dan bandingkan performa semudah scroll
              feed media sosial!
            </p>
          </div>
        </div>
        <div class="card-3">
          <div class="card-img">
            <img src="images/Stock manager making inventory item.png" alt="" />
          </div>
          <div class="card-text">
            <h1>Keuangan Jelas,</h1>
            <h1>Bisnis Makin Tenang</h1>
            <p>
              Uang masuk-keluar terlacak otomatis, laporan keuangan instan, dan
              insight keuntungan dalam sekejap. Keuangan sehat = bisnis makin
              melesat!
            </p>
          </div>
        </div>
      </section>
    </aside>
    <section class="ads-container">
      <div class="ads-title">
        <h1>Satisfied User Are Our</h1>
        <h1>Best Ads</h1>
      </div>
      <div class="ads-card-container">
        <div class="ads-card">
          <img src="images/double-quotes.png" alt="" />
          <p>"lorem lorem lorem lorem lorem lorem lorem lorem"</p>
          <div class="ads-card-image">
            <img src="images/user.png" alt="" />
            <div class="ads-card-image-text">
              <h2>User 1</h2>
              <p>Business Owner</p>
              <p>⭐⭐⭐⭐⭐</p>
            </div>
          </div>
        </div>
        <div class="ads-card">
          <img src="images/double-quotes.png" alt="" />
          <p>"lorem lorem lorem lorem lorem lorem lorem lorem"</p>
          <div class="ads-card-image">
            <img src="images/user.png" alt="" />
            <div class="ads-card-image-text">
              <h2>User 1</h2>
              <p>Business Owner</p>
              <p>⭐⭐⭐⭐⭐</p>
            </div>
          </div>
        </div>
        <div class="ads-card">
          <img src="images/double-quotes.png" alt="" />
          <p>"lorem lorem lorem lorem lorem lorem lorem lorem"</p>
          <div class="ads-card-image">
            <img src="images/user.png" alt="" />
            <div class="ads-card-image-text">
              <h2>User 1</h2>
              <p>Business Owner</p>
              <p>⭐⭐⭐⭐⭐</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="contact-container">
      <div class="contact-title">
        <h1><span>Get In Touch </span>with Us</h1>
        <figcaption>Tell us your experience here!</figcaption>
      </div>
      <section class="contact-content-container">
        <div class="contact-content">
          <h2>Send us a message</h2>
          <p>
            Punya pertanyaan atau ingin tahu lebih banyak tentang kami? Hubungi
            kami kapan saja.
          </p>
          <form method="POST" class="content-input" action="<?= base_url('/Feedbacks/save') ?>">
            <?= csrf_field() ?>
            <div class="input-1">
              First Name
              <input type="text" name="first_name" required />
            </div>
            <div class="input-2">
              Last Name
              <input type="text" name="last_name" required />
            </div>
            <div class="input-3">
              Email *
              <input type="email" name="email" required />
            </div>
            <div class="input-4">
              Subject
              <input type="text" name="subject" required />
            </div>
            <div class="input-5">
              Message
              <figcaption>Write your message here!</figcaption>
              <textarea name="message" rows="4" required></textarea>
            </div>
            <button type="submit">Send Message</button>
          </form>
          <div class="feedback-list" style="margin-top: 30px;">
              <h3>Kritik & Saran Terkini:</h3>
              <?php foreach ($feedbacks ?? [] as $fb): ?>
                <div style="border: 1px solid #eee; padding: 12px; margin: 12px 0; border-radius: 6px; background: #fafafa;">
                  <strong><?= esc($fb['first_name'] . ' ' . $fb['last_name']) ?></strong> — <?= esc($fb['subject']) ?><br>
                  <?= esc($fb['message']) ?><br>
                  <small style="color: #666;"><?= esc($fb['email']) ?></small>
                </div>
              <?php endforeach; ?>
          </div>
        </div>
        <div class="contact-aside-container">
          <h2>Contact Information</h2>
          <div class="contact-aside-content">
            <img src="images/telephone.png" alt="" />
            <p>+62 987-6543-2123</p>
          </div>
          <div class="contact-aside-content">
            <img src="images/mail.png" alt="" />
            <p>warung.kita@gmail.com</p>
          </div>
          <div class="contact-aside-content">
            <img src="images/location.png" alt="" />
            <p>
              Jl. Dr. Soetomo, Karangcengis, Sidakaya, Kec. Cilacap Sel.,
              Kabupaten Cilacap, Jawa Tengah
            </p>
          </div>
          <div class="contact-aside-footer">
            <h3>Stay Connected</h3>
            <div class="contact-aside-footer-content">
              <img src="images/facebook.png" alt="" />
              <img src="images/instagram.png" alt="" />
              <img src="images/twitter.png" alt="" />
            </div>
          </div>
        </div>
      </section>
    </section>
    <footer>
      <section class="footer-title">
        <div class="footer-logo">
            <img src="images/store.png" alt="">
            <h2>WarungKita</h2>
        </div>
        <div class="footer-text">
            <p>Warungkita adalah platform berbasis website untuk membantu Anda mengelola cabang usaha, stok barang, dan keuangan secara lebih mudah dan efisien.</p>
        </div>
      </section>
      <section class="footer-content-container">
        <div class="footer-content">
          <h2>Company</h2>
          <a href="">Home</a>
          <a href="">About</a>
          <a href="">Contact</a>
        </div>
        <div class="footer-content">
          <h2>Social Media</h2>
          <a href="">Instagram</a>
          <a href="">Facebook</a>
          <a href="">Twitter</a>
        </div>
        <div class="footer-content">
          <h2>Support</h2>
          <a href="">Help Center</a>
        </div>
      </section>
      <section class="footer-watermark-container">
        <p></p>
      </section>
    </footer>
  </body>
</html>