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
  @foreach ($data as $row)

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        @if($data)
            <img src="{{ asset('style/assets/img/profile-img.jpg') }}" alt="" class="img-fluid rounded-circle">
            <h1 class="text-light"><a href="index.html">{{ $data->firstnm }} {{ $data->lastnm }}</a></h1>
            <div class="social-links mt-3 text-center">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        @else
            <p>No data found for the user.</p>
        @endif
    </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="/" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>About Me</span></a></li>
          <li><a href="#resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Pendidikan</span></a></li>
          <li><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Pekerjaan</span></a></li>
          <li><a href="#services" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Berkas Pendukung</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
      <button>
            <div class="Edit"></div>
            <a href="/editdatapribadi" type="button" class="btn btn-warning">Edit</a>
          </button>
          <button>
            <div class="Delete"></div>
            <a href="/delete" type="button" class="btn btn-danger delete">Delete</a>
          </button>
    </div>
  </header><!-- End Header -->

  <main id="main">

<!-- ======= About Section ======= -->
<section id="about" class="about">
  <div class="container">

    <div class="section-title">
      <h2>About Me</h2>
    </div>

    @if($data)
    <div class="row">
      <div class="col-lg-4" data-aos="fade-right">
        <img src="{{ asset('style/assets/img/profile-img.jpg') }}" class="img-fluid" alt="">
      </div>
      <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
        <h3>{{ $data->firstnm }} {{ $data->lastnm }}</h3>
        <div class="col-lg-6">
          <ul scope="row">
            <li><i class="bi bi-chevron-right"></i> <strong>Tempat Lahir :</strong> <span>{{ $data->tempatlahir }}</span></li>
            <li><i class="bi bi-chevron-right"></i> <strong>Tanggal Lahir :</strong> <span>{{ $data->tgllahir }}</span></li>
            <li><i class="bi bi-chevron-right"></i> <strong>Email :</strong> <span>{{ $data->email }}</span></li>
            <li><i class="bi bi-chevron-right"></i> <strong>No Telepon :</strong> <span>{{ $data->notelpon }}</span></li>
            <li><i class="bi bi-chevron-right"></i> <strong>Alamat :</strong> <span>{{ $data->alamat }}</span></li>
          </ul>
        </div>
      </div>
    </div>
    @else
    <p>No data found for the user.</p>
    @endif

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
        @if($data)
        <div class="resume-item">
          <h4>{{ $data->pendidikanformal }}</h4>
          <h5>{{ $data->gelar }}</h5><br>
          <i class="bi bi-chevron-right"></i> <strong>Institusi Pendidikan :</strong> <span>{{ $data->institusipendidikan }}</span><br>
          <i class="bi bi-chevron-right"></i> <strong>Prestasi Akademik :</strong> <span>{{ $data->prestasiakademik }}</span><br>
          <i class="bi bi-chevron-right"></i> <strong>Keterampilan :</strong> <span>{{ $data->keterampilan }}</span><br>
        </div>
        @else
        <p>No data found for the user.</p>
        @endif
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
        @if($data)
        <div class="resume-item pb-0">
          <h4>{{ $data->pengalaman }}</h4>
          <p><em>{{ $data->deskripsi }}</em></p>
          <ul>
            <li>{{ $data->perusahaan }}</li>
            <li>{{ \Carbon\Carbon::parse($data->tanggal_awal)->format('d M Y') }}</li>
            <li>{{ \Carbon\Carbon::parse($data->tanggal_akhir)->format('d M Y') }}</li>
          </ul>
        </div>
        @else
        <p>No data found for the user.</p>
        @endif
      </div>
    </div>

  </div>
</section><!-- End Services Section -->


<!-- ======= Services Section ======= -->
<section id="services" class="services">
  <div class="container">

    <div class="section-title">
      <h2>Berkas Pendukung</h2>

      @if($data)
        <p><a href="{{ $data->sertifikat }}">Sertifikat</a></p>
        <p><a href="{{ $data->suratrekomendasi }}">Surat Rekomendasi</a></p>
        <p><a href="{{ $data->portofolio }}">Portofolio</a></p>
      @else
        <p>No data found for the user.</p>
      @endif

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
  @endforeach
</body>

</html>