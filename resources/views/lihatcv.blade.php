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
    <link id="theme-style" rel="stylesheet" href="{{ asset('output/assets/css/orbit-2.css') }}">
</head>

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
                    <h3 class="tagline">{{ $personalData->tempatlahir }} {{ $personalData->tgllahir }}</h3>
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
                    @foreach ($upBerkas as $key => $berkas)
                        <div class="item">
                            <span class="project-title">{{ $key + 1 }}. {{ $berkas->jenisberkas }}</span>
                            <span class="project-title">{{ $berkas->judul }}</span>
                            <a href="{{ asset('berkastambahan/' . $berkas->berkas) }}" target="_blank">Download</a>
                        </div><!--//item-->
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

