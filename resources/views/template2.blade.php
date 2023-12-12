<!DOCTYPE html>
<html lang="en">

<head>
    <title>Lihat CV</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('output/assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link id="theme-style" rel="stylesheet" href="{{ asset('output/assets/css/orbit-2.css') }}">
    <style>
        body, html {
            margin: 0;
            padding: 0;
        }

        /* Tambahkan gaya CSS berikut untuk memberikan garis bawah pada judul section */
        .section-title {
            border-bottom: 2px solid #000; /* Ganti warna sesuai kebutuhan */
            width: 100%; /* Menetapkan lebar garis bawah agar mencapai ujung halaman */
            padding-bottom: 10px; /* Sesuaikan sesuai kebutuhan */
            margin-bottom: 20px; /* Sesuaikan sesuai kebutuhan */
        }
        .main-wrapper {
            background: #fff;
            padding: 80px;
            padding-right: 90px;
            /* min-height: 100vh; */
        }
        .wrapper {
            max-width: 700px;
            margin: 0 auto;
            position: relative;
            -webkit-box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            -moz-box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        }
        .image-right {
            display: flex;
            justify-content: flex-end;
        }
        .image-right img {
            width: 150px;
            height: auto;
        }
    </style>
</head>

<body>

    <div class="wrapper mt-lg-5">
        <div class="main-wrapper">
            <section class="section">
                @foreach ($dataPribadi as $personalData)
                <div class="row">
                    <div class="col-md-6">
                        <h1>{{ $personalData->firstnm }} {{ $personalData->lastnm }}</h1>
                        <p>{{ $personalData->tempatlahir }}, {{ \Carbon\Carbon::parse($personalData->tgllahir)->format('d M Y') }}</p>
                        <p>{{ $personalData->email }}</p>
                        <p>{{ $personalData->notelpon }}</p>
                        <p>{{ $personalData->alamat }}</p>
                    </div>
                    <div class="col-6 image-right">
                        @if ($personalData->poto)
                        <?php
                        $photoPathPersonal = asset('berkastambahan/' . $personalData->poto) . '?' . time();
                        ?>
                        <img src="{{ $photoPathPersonal }}" alt="Foto saat ini" class="img-thumbnail" style="width: 150px; height: auto;">
                        <!-- Sesuaikan lebar dan tinggi sesuai kebutuhan, mempertahankan rasio aspek 3:4 -->
                        @else
                        <p>No photo available</p>
                        @endif
                    </div>
                </div>
                @endforeach
            </section>

            <section class="section">
                <h2 class="section-title">Data Pendidikan</h2>
                <ul>
                @foreach ($dataPendidikan as $pendidikanData)
                    <li class="item">
                        <strong>{{ $pendidikanData->jenjang }}:</strong>
                        <span>{{ $pendidikanData->gelar }}, {{ $pendidikanData->institusipendidikan }}, {{ $pendidikanData->tahunakademik }}</span>
                    </li>
                @endforeach
                </ul>
            </section>

            <section class="section">
                <h2 class="section-title">Data Pekerjaan</h2>
                @if (count($dataPekerjaan) > 0)
                <ul>
                    @foreach ($dataPekerjaan as $pekerjaanData)
                        <li class="item">
                            <strong>{{ $pekerjaanData->pengalaman }}:</strong>
                            <span>{{ $pekerjaanData->perusahaan }}, {{ \Carbon\Carbon::parse($pekerjaanData->tanggal_awal)->format('d M Y') }} - {{ \Carbon\Carbon::parse($pekerjaanData->tanggal_akhir)->format('d M Y') }}</span>
                            <p>{{ $pekerjaanData->deskripsi }}</p>
                        </li>
                    @endforeach
                </ul>
                @endif
            </section>

            <section class="section">
                <h2 class="section-title">Data Skill</h2>
                @if (count($dataSkill) > 0)
                    <ul>
                        @foreach ($dataSkill as $skill)
                            <li>{{ $skill->skill }} ({{ $skill->rating }}/5)</li>
                        @endforeach
                    </ul>
                @endif
            </section>

            <section class="section">
                <h2 class="section-title">Berkas Pendukung</h2>
                @if (count($upBerkas) > 0)
                    <ul>
                        @foreach ($upBerkas as $berkas)
                            <li>{{ $berkas->jenisberkas }} - {{ $berkas->judul }} (<a href="{{ asset('berkastambahan/' . $berkas->berkas) }}" target="_blank">Download</a>)</li>
                        @endforeach
                    </ul>
                @else
                    <p>No files available.</p>
                @endif
            </section>
        </div>
    </div>

    <footer class="footer">
        <div class="text-center">
            <small class="copyright">Designed with <i class="fa-solid fa-heart"></i> by <a target="_blank">CVYou</a> for developers</small>
        </div>
    </footer>

</body>

</html>
