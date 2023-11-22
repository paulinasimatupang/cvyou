<!DOCTYPE html>
<html lang="en">

<head>
    <title>Lihat CV</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive HTML5 Resume/CV Template for Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
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
    @foreach ($data as $personalData)
    {{-- @if($personalData->dataPribadi == Auth::user()->id) <!-- Pengecekan pengguna_id --> --}}
    <div class="wrapper mt-lg-5">
        <div class="sidebar-wrapper">
            @if ($personalData->dataPekerjaan)
            <div class="profile-container">
                @foreach ($personalData->dataPribadi as $personalData)
                <img class="profile" src="{{ asset('berkastambahan/' . $personalData->poto) }}" alt="" />
                <h1 class="name">{{ $personalData->firstnm }} {{ $personalData->lastnm }}</h1>
                <h3 class="tagline">{{ $personalData->tempatlahir }} {{ $personalData->tgllahir }}</h3>
            </div><!--//profile-container-->

            <div class="contact-container container-block">
                <ul class="list-unstyled contact-list">
                    <li class="email"><i class="fa-solid fa-envelope"></i><a href="mailto:{{ $personalData->email }}">{{ $personalData->email }}</a></li>
                    <li class="phone"><i class="fa-solid fa-phone"></i><a href="tel:{{ $personalData->notelpon }}">{{ $personalData->notelpon }}</a></li>
                    <li class="home"><i class="fa-solid fa-home"></i><a>{{ $personalData->alamat }}</a></li>
                </ul>
            </div><!--//contact-container-->

            @if ($personalData->dataPendidikan && count($personalData->dataPendidikan) > 0)
            <div class="education-container container-block">
                <h2 class="container-block-title">Data Pendidikan</h2>

                @foreach ($personalData->dataPendidikan as $pendidikanData)
                <div class="item">
                    <h4 class="degree">{{ $pendidikanData->pendidikanformal }}</h4>
                    <h5 class="meta">{{ $pendidikanData->gelar }}</h5>
                    <h5 class="meta">{{ $pendidikanData->institusipendidikan }}</h5>
                    <div class="time">{{ $pendidikanData->prestasiakademik }}</div>
                    <div class="time">{{ $pendidikanData->keterampilan }}</div>
                </div><!--//item-->
                @endforeach
            </div><!--//education-container-->
            @endif

        </div><!--//sidebar-wrapper-->

        <div class="main-wrapper">
            <section class="section experiences-section">
                <h2 class="section-title"><span class="icon-holder"><i class="fa-solid fa-briefcase"></i></span>Data Pekerjaan</h2>
                @if (count($personalData->dataPekerjaan) > 0)
                @foreach ($personalData->dataPekerjaan as $pekerjaanData)
                <div class="item">
                    <div class="meta">
                        <div class="upper-row">
                            <h3 class="job-title">{{ $pekerjaanData->pengalaman }}</h3>
                            <div class="time">{{ \Carbon\Carbon::parse($pekerjaanData->tanggal_awal)->format('d M Y') }} - {{ \Carbon\Carbon::parse($pekerjaanData->tanggal_akhir)->format('d M Y') }}</div>
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
                @if(count($personalData->dataSkill) > 0)
                    <div class="skillset">
                        @foreach($personalData->dataSkill as $skill)
                            <div class="item">
                                <h3 class="level-title">{{ $skill->skill }}</h3>
                                <div class="progress level-bar">
                                    <div class="progress-bar theme-progress-bar" role="progressbar" style="width: {{ $skill->level }}%" aria-valuenow="{{ $skill->level }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>                               
                            </div><!--//item--> 
                        @endforeach
                    </div>
                @endif
            </section><!--//skills-section-->

            <section class="section projects-section">
                <h2 class="section-title"><span class="icon-holder"><i class="fa-solid fa-archive"></i></span>Berkas Pendukung</h2>
                <div class="intro">
                    <p>You can list your side projects or open source libraries in this section. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum et ligula in nunc bibendum fringilla a eu lectus.</p>
                </div><!--//intro-->
                @if(count($personalData->upBerkas) > 0)
                    @foreach($personalData->upBerkas as $project)
                        <div class="item">
                            <span class="project-title"><a href="{{ $project->link }}" target="_blank">{{ $project->title }}</a></span> - <span class="project-tagline">{{ $project->description }}</span>
                        </div><!--//item-->
                    @endforeach
                @endif
            </section><!--//section-->
            
        </div><!--//main-body-->
    </div>
    @endif
    @endforeach   
 
    <footer class="footer">
        <div class="text-center">
            <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
            <small class="copyright">Designed with <i class="fa-solid fa-heart"></i> by <a target="_blank">CVYou</a> for developers</small>
        </div><!--//container-->
    </footer><!--//footer--> 
</body>
</html>