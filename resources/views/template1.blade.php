<!DOCTYPE html>
<html lang="en">

<head>
    <title>Lihat CV</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,400italic,300italic,300,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- FontAwesome JS-->
    <script defer src="{{ asset('output/assets/fontawesome/js/all.min.js') }}"></script>
    <!-- Global CSS -->
    <link rel="stylesheet" href="{{ asset('output/assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <!-- Theme CSS -->
    {{-- <link id="theme-style" rel="stylesheet" href="{{ asset('output/assets/css/orbit-2.css') }}"> --}}
</head>
<style>
    body {
  font-family: "Roboto", sans-serif;
  color: #545E6C;
  background: #f5f5f5;
  font-size: 14px;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

h1, h2, h3, h4, h5, h6 {
  font-weight: 700;
}

a {
  color: #35776d;
  text-decoration: none;
}
a:hover {
  text-decoration: underline;
  color: #1d423c;
  -webkit-transition: all 0.4s ease-in-out;
  -moz-transition: all 0.4s ease-in-out;
  -ms-transition: all 0.4s ease-in-out;
  -o-transition: all 0.4s ease-in-out;
}
a:focus {
  text-decoration: none;
}

p {
  line-height: 1.5;
}

.wrapper {
  background: #4CAC9D;
  max-width: 960px;
  margin: 0 auto;
  position: relative;
  -webkit-box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
  -moz-box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
  box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
}

.sidebar-wrapper {
  background: #4CAC9D;
  position: absolute;
  right: 0;
  width: 300px;
  height: 100%;
  min-height: 00px;
  color: #fff;
}
.sidebar-wrapper a {
  color: #fff;
}
.sidebar-wrapper .profile-container {
  padding: 30px;
  background: rgba(0, 0, 0, 0.2);
  text-align: center;
  color: #fff;
}
.sidebar-wrapper .name {
  font-size: 32px;
  font-weight: 900;
  margin-top: 0;
  margin-bottom: 10px;
}
.sidebar-wrapper .tagline {
  color: rgba(255, 255, 255, 0.6);
  font-size: 16px;
  font-weight: 400;
  margin-top: 0;
  margin-bottom: 0;
}
.sidebar-wrapper .profile {
  margin-bottom: 15px;
}
.sidebar-wrapper .contact-list .svg-inline--fa {
  margin-right: 5px;
  font-size: 18px;
  vertical-align: middle;
}
.sidebar-wrapper .contact-list li {
  margin-bottom: 15px;
}
.sidebar-wrapper .contact-list li:last-child {
  margin-bottom: 0;
}
.sidebar-wrapper .contact-list .email .svg-inline--fa {
  font-size: 14px;
}
.sidebar-wrapper .container-block {
  padding: 30px;
}
.sidebar-wrapper .container-block-title {
  text-transform: uppercase;
  font-size: 16px;
  font-weight: 700;
  margin-top: 0;
  margin-bottom: 15px;
}
.sidebar-wrapper .degree {
  font-size: 14px;
  margin-top: 0;
  margin-bottom: 5px;
}
.sidebar-wrapper .education-container .item {
  margin-bottom: 15px;
}
.sidebar-wrapper .education-container .item:last-child {
  margin-bottom: 0;
}
.sidebar-wrapper .education-container .meta {
  color: rgba(255, 255, 255, 0.6);
  font-weight: 500;
  margin-bottom: 0px;
  margin-top: 0;
  font-size: 14px;
}
.sidebar-wrapper .education-container .time {
  color: rgba(255, 255, 255, 0.6);
  font-weight: 500;
  margin-bottom: 0px;
}
.sidebar-wrapper .languages-container .lang-desc {
  color: rgba(255, 255, 255, 0.6);
}
.sidebar-wrapper .languages-list {
  margin-bottom: 0;
}
.sidebar-wrapper .languages-list li {
  margin-bottom: 10px;
}
.sidebar-wrapper .languages-list li:last-child {
  margin-bottom: 0;
}
.sidebar-wrapper .interests-list {
  margin-bottom: 0;
}
.sidebar-wrapper .interests-list li {
  margin-bottom: 10px;
}
.sidebar-wrapper .interests-list li:last-child {
  margin-bottom: 0;
}

.main-wrapper {
  background: #fff;
  padding: 60px;
  padding-right: 350px;
  min-height: 100vh;
  height: 80%;
}
.main-wrapper .section-title {
  text-transform: uppercase;
  font-size: 20px;
  font-weight: 500;
  color: #35776d;
  position: relative;
  margin-top: 0;
  margin-bottom: 20px;
}
.main-wrapper .section-title .icon-holder {
  width: 30px;
  height: 30px;
  margin-right: 8px;
  display: inline-block;
  color: #fff;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  -ms-border-radius: 50%;
  -o-border-radius: 50%;
  border-radius: 50%;
  -moz-background-clip: padding;
  -webkit-background-clip: padding-box;
  background-clip: padding-box;
  background: #35776d;
  text-align: center;
  font-size: 16px;
  position: relative;
  top: -2px;
  padding-top: 2px;
}
.main-wrapper .section-title .icon-holder .svg-inline--fa {
  font-size: 14px;
  margin-top: 6px;
}
.main-wrapper .section {
  margin-bottom: 60px;
}
.main-wrapper .experiences-section .item {
  margin-bottom: 30px;
}
.main-wrapper .upper-row {
  position: relative;
  overflow: hidden;
  margin-bottom: 2px;
}
.main-wrapper .job-title {
  color: #3F4650;
  font-size: 16px;
  margin-top: 0;
  margin-bottom: 0;
  font-weight: 500;
}
.main-wrapper .time {
  position: absolute;
  right: 0;
  top: 0;
  color: #97AAC3;
}
.main-wrapper .company {
  margin-bottom: 10px;
  color: #97AAC3;
}
.main-wrapper .project-title {
  font-size: 16px;
  font-weight: 400;
  margin-top: 0;
  margin-bottom: 5px;
}
.main-wrapper .projects-section .intro {
  margin-bottom: 30px;
}
.main-wrapper .projects-section .item {
  margin-bottom: 15px;
}

.skillset .item {
  margin-bottom: 15px;
  overflow: hidden;
}
.skillset .level-title {
  font-size: 14px;
  margin-top: 0;
  margin-bottom: 12px;
}
.skillset .level-bar {
  height: 12px;
  background: #f5f5f5;
  -webkit-border-radius: 2px;
  -moz-border-radius: 2px;
  -ms-border-radius: 2px;
  -o-border-radius: 2px;
  border-radius: 2px;
  -moz-background-clip: padding;
  -webkit-background-clip: padding-box;
  background-clip: padding-box;
}
.skillset .theme-progress-bar {
  background: #6dbeb2;
}

.footer {
  padding: 30px;
  padding-top: 60px;
}
.footer .copyright {
  line-height: 1.6;
  color: #545E6C;
  font-size: 13px;
}
.footer .fa-heart {
  color: #fb866a;
}

@media (max-width: 767.98px) {
  .sidebar-wrapper {
    position: static;
    width: inherit;
    height: auto;
  }
  .main-wrapper {
    padding: 30px;
    padding-right: 0;
  }
  .main-wrapper .time {
    position: static;
    display: block;
    margin-top: 5px;
  }
  .main-wrapper .upper-row {
    margin-bottom: 0;
  }
}
@media (min-width: 992px) {
  .skillset .level-title {
    display: inline-block;
    float: left;
    width: 30%;
    margin-bottom: 0;
  }
}

</style>
<body>
    <div class="wrapper mt-lg-5">
        <div class="sidebar-wrapper">
            <div class="profile-container">
                @foreach ($dataPribadi as $personalData)
                @if ($personalData->poto)
                    <?php
                    $photoPathPersonal = asset('berkastambahan/' . $personalData->poto) . '?' . time();
                    ?>
                    <img src="{{ $photoPathPersonal }}" alt="Foto saat ini" class="img-thumbnail" style="width: 150px; height: auto;">
                    <!-- Adjust width and height as needed, maintaining a 3:4 aspect ratio -->
                @else
                    <p>No photo available</p>
                @endif
                    <h1 class="name">{{ $personalData->firstnm }} {{ $personalData->lastnm }}</h1>
                    <h3 class="tagline">
                        {{ $personalData->tempatlahir }}, {{ \Carbon\Carbon::parse($personalData->tgllahir)->format('d M Y') }}
                    </h3>
                    
                @endforeach
            </div><!--//profile-container-->

            <div class="contact-container container-block">
                @foreach ($dataPribadi as $personalData)
                    <ul class="list-unstyled contact-list">
                        <li class="email"><i class="fa-solid fa-envelope"></i><a href="mailto:{{ $personalData->email }}">{{ $personalData->email }}</a></li>
                        <li class="phone"><i class="fa-solid fa-phone"></i><a href="tel:{{ $personalData->notelpon }}">{{ $personalData->notelpon }}</a></li>
                        <li class="home"><i class="fa-solid fa-home"></i><a>{{ $personalData->alamat }}</a></li>
                    </ul>
                @endforeach
            </div><!--//contact-container-->

            <div class="education-container container-block">
                <h2 class="container-block-title">Data Pendidikan</h2>
                @foreach ($dataPendidikan as $pendidikanData)
                    <div class="item">
                        <i class="fas fa-book icon"></i>
                        <span class="degree">{{ $pendidikanData->jenjang }}</span>
                        <span class="degree">{{ $pendidikanData->gelar }}</span>
                        <span class="degree">{{ $pendidikanData->institusipendidikan }}</span>
                        <span class="degree">{{ $pendidikanData->tahunakademik }}</span>
                    </div><!--//item-->
                @endforeach
            </div><!--//education-container-->

        </div><!--//sidebar-wrapper-->

        <div class="main-wrapper">
            <section class="section experiences-section">
                <h2 class="section-title"><span class="icon-holder"><i class="fa-solid fa-briefcase"></i></span>Data Pekerjaan</h2>
                @if (count($dataPekerjaan) > 0)
                    @foreach ($dataPekerjaan as $pekerjaanData)
                        <div class="item">
                            <div class="meta">
                                <div class="upper-row">
                                    <h3 class="job-title">{{ $pekerjaanData->pengalaman }}</h3>
                                    <div class="time">{{ \Carbon\Carbon::parse($pekerjaanData->tanggal_awal)->format('d M Y') }}
                                        - {{ \Carbon\Carbon::parse($pekerjaanData->tanggal_akhir)->format('d M Y') }}</div>
                                </div><!--//upper-row-->
                                <div class="company">{{ $pekerjaanData->perusahaan }}</div>
                            </div><!--//meta-->
                            <div class="details">
                                <p>{{ $pekerjaanData->deskripsi }}</p>
                            </div><!--//details-->
                        </div><!--//item-->
                    @endforeach
                @endif
            </section><!--//section-->

            <section class="skills-section section">
                <h2 class="section-title"><span class="icon-holder"><i class="fa-solid fa-rocket"></i></span>Data Skill</h2>
                @if (count($dataSkill) > 0)
                    <div class="skillset">
                        @foreach ($dataSkill as $skill)
                            <div class="item">
                                <h3 class="level-title">{{ $skill->skill }}</h3>
                                <!-- Add your styling for the progress bar here -->
                                <div class="progress level-bar" style="width: 50%; background-color: #yourcolor;">
                                    <div class="progress-bar theme-progress-bar" role="progressbar"
                                        style="width: {{ ($skill->rating / 5) * 100 }}%;" aria-valuenow="{{ $skill->rating }}"
                                        aria-valuemin="1" aria-valuemax="5"></div>
                                </div>
                            </div><!--//item-->
                        @endforeach
                    </div>
                @endif
            </section>
                      

            <section class="section projects-section">
                <h2 class="section-title"><span class="icon-holder"><i class="fa-solid fa-archive"></i></span>Berkas Pendukung</h2>
                @if (count($upBerkas) > 0)
                    @foreach ($upBerkas as $berkas)
                        <li class="item">
                            <span class="project-title">{{ $berkas->jenisberkas }}</span>
                            <span class="project-title">{{ $berkas->judul }}</span>
                            <a href="{{ asset('berkastambahan/' . $berkas->berkas) }}" target="_blank">Download</a>
                        </li><!--//item-->
                    @endforeach
                @else
                    <p>No files available.</p>
                @endif

            </section><!--//section-->
            

        </div><!--//main-body-->
    </div>

    <footer class="footer">
        <div class="text-center">
            <small class="copyright">Designed with <i class="fa-solid fa-heart"></i> by <a target="_blank">CVYou</a>
                for developers</small>
        </div><!--//container-->
    </footer><!--//footer-->
</body>

</html>

