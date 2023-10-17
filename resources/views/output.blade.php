<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Output CVYou</title>
  <meta name="robots" content="noindex, nofollow">
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('style/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('style/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('style/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('style/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('style/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('style/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('style/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="{{ asset('style/assets/img/profile-img.jpg') }}" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="index.html">Alex Smith</a></h1>
        <div class="social-links mt-3 text-center">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>About Me</span></a></li>
          <li><a href="#resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Pendidikan</span></a></li>
          <li><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Pekerjaan</span></a></li>
          <li><a href="#services" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Berkas Pendukung</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      <h1>Alex Smith</h1>
      <p>I'm <span class="typed" data-typed-items="Designer, Developer, Freelancer, Photographer"></span></p>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>About Me</h2>
        </div>
        {{-- @php
          $no = 1;
        @endphp
        @foreach ($data as $index => $row) --}}
        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <img src="{{ asset('style/assets/img/profile-img.jpg') }}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
            {{-- <h3>{{ $row->firstnm }}{{ $row->lastnm }}</h3> --}}
            <div class="row">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Tempat Lahir :</strong> <span>Bali</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Tanggal Lahir :</strong> <span>17 Agustus 2007</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Email :</strong> <span>@polban.ac.id</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>No Telpon :</strong> <span>08123456789</span></li>
                   <li><i class="bi bi-chevron-right"></i> <strong>Alamat :</strong> <span>New York, USA</span></li>
                </ul>
              </div>
              {{-- <div class="col-lg-6">
                <ul scope="row">
                  <li><i class="bi bi-chevron-right"></i> <strong>Tempat Lahir :</strong> <span>{{ $row->tempatlahir }}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Tanggal Lahir :</strong> <span>{{ $row->tgllahir }}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Email :</strong> <span>{{ $row->email }}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>No Telepon :</strong> <span>{{ $row->notelpon }}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Alamat :</strong> <span>{{ $row->alamat }}</span></li>
                </ul>
              </div> --}}
              
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Resume Section ======= -->
    <section id="resume" class="resume">
      <div class="container">

        <div class="section-title">
          <h2>Pendidikan</h2>
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="fade-up">
            <h3 class="resume-title"></h3>
            <div class="resume-item">
              <h4>Master of Fine Arts &amp; Graphic Design</h4>
              <h5>2015 - 2016</h5>
              <p><em>Rochester Institute of Technology, Rochester, NY</em></p>
              <p>Qui deserunt veniam. Et sed aliquam labore tempore sed quisquam iusto autem sit. Ea vero voluptatum qui ut dignissimos deleniti nerada porti sand markend</p>
            </div>
            <div class="resume-item">
              <h4>Bachelor of Fine Arts &amp; Graphic Design</h4>
              <h5>2010 - 2014</h5>
              <p><em>Rochester Institute of Technology, Rochester, NY</em></p>
              <p>Quia nobis sequi est occaecati aut. Repudiandae et iusto quae reiciendis et quis Eius vel ratione eius unde vitae rerum voluptates asperiores voluptatem Earum molestiae consequatur neque etlon sader mart dila</p>
            </div>
          </div>
          </div>
        </div>

      </div>
    </section><!-- End Resume Section -->

    <!-- ======= Skills Section ======= -->
    <section id="portfolio" class="resume">
      <div class="container">

        <div class="section-title">
          <h2>Pengalaman kerja</h2>
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="fade-up">
            <div class="resume-item pb-0">
              <h4>Staff IT</h4>
              <p><em>Innovative and deadline-driven Graphic Designer with 3+ years of experience designing and developing user-centered digital/print marketing material from initial concept to final, polished deliverable.</em></p>
              <ul>
                <li>PT Gameloft</li>
                <li>10 Oktober 2007</li>
                <li>17 Oktober 2019</li>
              </ul>
            </div>
            <div class="resume-item">
              <h4>Graphic design specialist</h4>
              <h5>2017 - 2018</h5>
              <p><em>Stepping Stone Advertising, New York, NY</em></p>
              <ul>
                <li>Developed numerous marketing programs (logos, brochures,infographics, presentations, and advertisements).</li>
                <li>Managed up to 5 projects or tasks at a given time while under pressure</li>
                <li>Recommended and consulted with clients on the most appropriate graphic design</li>
                <li>Created 4+ design presentations and proposals a month for clients and account managers</li>
              </ul>
            </div><!-- End Skills Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Berkas Pendukung</h2>
          <p><a href="https://bootstrapmade.com/">Sertifikat</a></p>
          <p><a href="https://bootstrapmade.com/">Surat Rekomendasi</a></p>
          <p><a href="https://bootstrapmade.com/">Portofolio</a></p>
        </div>

        

      </div>
    </section><!-- End Services Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>CVYou</span></strong>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/ -->
        Designed by <a href="https://bootstrapmade.com/">D32A</a>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="../../../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="{{ asset('style/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('style/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('style/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('style/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('style/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('style/assets/vendor/typed.js/typed.umd.js') }}"></script>
  <script src="{{ asset('style/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('style/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('style/assets/js/main.js') }}"></script>

  <script async src='https://www.googletagmanager.com/gtag/js?id=G-P7JSYB1CSP'></script><script>if( window.self == window.top ) { window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-P7JSYB1CSP'); } </script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v8b253dfea2ab4077af8c6f58422dfbfd1689876627854" integrity="sha512-bjgnUKX4azu3dLTVtie9u6TKqgx29RBwfj3QXYt5EKfWM/9hPSAI/4qcV5NACjwAo8UtTeWefx6Zq5PHcMm7Tg==" data-cf-beacon='{"rayId":"8163f32b5b435fd9","token":"68c5ca450bae485a842ff76066d69420","version":"2023.8.0","si":100}' crossorigin="anonymous"></script>
</body>

</html>