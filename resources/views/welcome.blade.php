<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CVYOU</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" href="{{ asset('img/gokils.png') }}">
  <link rel="gokils" href="{{ asset('img/gokils.png') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" />
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <!-- =======================================================
  * Template Name: Impact
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  

  <header id="header" class="header d-flex align-items-center" style="background-color: #008374;">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <button class="sidebar-toggle" onclick="toggleSidebar()">
            <span class="burger-icon"></span>
        </button>
        <a href="index.html" class="logo d-flex align-items-center" style="margin-left: auto;">
            <h1>CVYou</h1>
            <img src="{{ asset('img/gokils.png') }}" alt="" style="width: 50%; height: 50%;">
        </a>
    </div>
</header>







 
<section id="hero" class="hero content" >
  <div class="sidebar">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Active</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
      </li>
    </ul>
  </div>

      <!-- <img src="{{ asset('/img/bg2.png') }}" style="z-index: -1;"> -->
          <img src="{{ asset('/img/awalan1.png') }}" alt="" data-aos="zoom-out" data-aos-delay="100">
          <div class="my-element" data-aos="fade-up">
          <h2>Welcome to CVYOU !</h2>
          <p>Get your CV for your business !</p>
</div>
        
  </section>

    <section id="about" class="about content" style="background-color: #f7f7f7;">
      <div class="cv1" style="float: left;width: 37%; height: 37%; padding-top: 20%; ">
      <img src="{{ asset('/img/about.png') }}" alt="" data-aos="zoom-out" data-aos-delay="100">
      </div>
      <div class="apakek" style="width: 18rem; float: right; margin-right: 10%; margin-top: 20%; width: 525px; height: 450px;">
        <div class="apakek-body">
            <h5 class="apakek-title" id="apakek-title"></h5>
            <nav aria-label="..." >
                <ul class="pagination pagination-sm" style="justify-content: center;">
                    <li class="page-item active" aria-current="page" >
                        <span class="page-link"  onclick="showPage(1)">1</span>
                    </li>
                    <li class="page-item"><a class="page-link"  onclick="showPage(2)">2</a></li>
                    <li class="page-item"><a class="page-link"  onclick="showPage(3)">3</a></li>
                </ul>
            </nav>
            <div class="my-element" data-aos="fade-up">
              <div id="page-content" style="color: #707070;">
                  <!-- Konten halaman 1 -->
                  <p id="page1-content" ><span style="color: #444; font-size: 34px"><b> Apa Itu CV?</b></span><br><br>CV adalah singkatan dari frasa Latin "curriculum vitae", yang berarti "riwayat hidup". CV yang profesional memberikan ringkasan dan gambaran yang bagus tentang kehidupan seseorang.<br><br> CV Anda menampilkan pendidikan dan kualifikasi, pengalaman kerja, keahlian, dan kualitas penting Anda. Melalui CV, calon pemberi pekerjaan dapat memahami keahlian, pengalaman kerja, dan pengetahuan Anda dengan baik dan cepat, untuk menilai apakah Anda cocok dengan pekerjaan yang dilamar dan apakah Anda akan diwawancara lebih lanjut.</p>
                  <!-- Konten halaman 2 (awalnya disembunyikan) -->
                  <p id="page2-content" style="display: none;"><span style="color: #444; font-size: 34px"><b> Cara membuat CV</b></span><br><br>Anda dapat membuat CV dengan program pengolah kata seperti Microsoft Word, lalu mengubahnya ke format PDF. Carilah contoh CV atau templat CV gratis di internet dan cobalah untuk menirunya. Atau, gunakan pembuat CV kami, di mana Anda cukup memasukkan data, dan CV yang sempurna bisa diunduh hanya dalam 15 menit. Tentunya, Anda juga dapat melakukan hal yang sama untuk membuat surat lamaran!</p>
                  <!-- Konten halaman 3 (awalnya disembunyikan) -->
                  <p id="page3-content" style="display: none;">SKUKNU</p>
            </div>
          </div>
          </div>
        </div>
      </div>
    </section>
    
    <section id="Rules" class="Rules content" style="background-color: #f7f7f7; ">
      <div class="teks" style="margin-top: 0%;margin-bottom: 0%;">
        <div class="card" style="background-color: #008374;">
          <div class="card-body" style="justify-content: center; align-items: center; text-align: center; color: #ffffff; font-size: 32px; ">
            <p>Rules</p>
          </div>
        </div>
      </div>
    </section>

    <section id="template" class="template content" style="background-color: #f7f7f7;">
    <div class="my-element" data-aos="fade-up" data-aos-delay="100">
    <div class="container">
    <div class="row">
        <div class="col-md-3">
        <div class="card" style="background-color:#008374; width: 250px; height: 450px;">
        <div class="card-body d-flex justify-content-center align-items-center" style="height: 100%;">
        <!-- <a href="URL_HALAMAN_TUJUAN"> -->
            <img src="{{ asset('img/cv2.jpg') }}" alt="" style="max-width: 50%; max-height: 50%;max-width: 100%; max-height: 100%; width: auto; height: auto;" >
            </div>
        <!-- </a> -->
        </div>
        </div>
        <div class="col-md-3">
        <div class="card" style="background-color:#008374; width: 250px; height: 450px;">
        <div class="card-body d-flex justify-content-center align-items-center" style="height: 100%;">
            <img src="{{ asset('img/cv1.webp') }}" alt="" style="max-width: 50%; max-height: 50%;max-width: 100%; max-height: 100%; width: auto; height: auto;" >
                </div>
            </div>
        </div>
        <div class="col-md-3">
        <div class="card" style="background-color:#008374; width: 250px; height: 450px;">
        <div class="card-body d-flex justify-content-center align-items-center" style="height: 100%;">
            <img src="{{ asset('img/cv5.png') }}" alt="" style="max-width: 50%; max-height: 50%;max-width: 100%; max-height: 100%; width: auto; height: auto;" >
                </div>
            </div>
        </div>
        <div class="col-md-3">
        <div class="card" style="background-color:#008374; width: 250px; height: 450px;">
        <div class="card-body d-flex justify-content-center align-items-center" style="height: 100%;">
            <img src="{{ asset('img/cv6.webp') }}" alt="" style="max-width: 50%; max-height: 50%;max-width: 100%; max-height: 100%; width: auto; height: auto;" >
                </div>
            </div>
        </div>
    </div>
</div>
  <br>
  <br>
      <div style="display: flex; justify-content: center; align-items: center; margin-bottom: 10%;">
        <button type="button" class="btn btn-primary btn-lg" style="background-color: #008374; color: #ffffff;"       onclick="redirectToOtherPage()">Make Your CV</button>
      </div>
</div>
</section>

 

<footer id="footer" class="footer content">

  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-5 col-md-12 footer-info">
        <a href="index.html" class="logo d-flex align-items-center">
          <span>CVYOU.</span>
        </a>
        <p>------------------------------------</p>
      </div>
    </div>
  </div>
</div>
</footer>

    
    
    

      
   

         

          

           
          
           

  <!-- Vendor JS Files -->
  <link href="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" rel="stylesheet">
  <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">

  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('vendor/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('vendor/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('vendor/php-email-form/validate.jss') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('js/main.js') }}"></script>

  <script>
  function aos_init() {
    AOS.init({
      duration: 1000,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    });
  }
  window.addEventListener('load', () => {
    aos_init();
  });
</script>

<script>
          function showPage(pageNumber) {
              // Sembunyikan semua konten halaman
              document.getElementById('page1-content').style.display = 'none';
              document.getElementById('page2-content').style.display = 'none';
              document.getElementById('page3-content').style.display = 'none';
      
              // Tampilkan konten halaman yang sesuai dengan nomor halaman yang diklik
              document.getElementById('page' + pageNumber + '-content').style.display = 'block';
      
              // Ganti judul kartu jika diperlukan
              var pageTitle = '';
              if (pageNumber === 2) {
                  pageTitle = '';
              } else if (pageNumber === 3) {
                  pageTitle = '';
              }
              document.getElementById('card-title').textContent = pageTitle;
          }
      </script>

<script>
  function toggleSidebar() {
    var sidebar = document.querySelector('.sidebar');
    var content = document.querySelector('.content');
    var sectionRules = document.querySelector('.section-rules'); // Change ".other-section" to ".section-rules"
    sidebar.classList.toggle('active');
    content.classList.toggle('active');
    sectionRules.classList.toggle('active'); // Change ".other-section" to ".section-rules"

    // Adjust the margin of the entire body content
    if (sidebar.classList.contains('active')) {
      document.body.style.marginLeft = '250px'; // Adjust the value as per your requirement
    } else {
      document.body.style.marginLeft = '0';
    }
  }
</script>





</body>
<!--  -->
</html>

