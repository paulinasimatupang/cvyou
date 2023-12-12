@php
    // Check if the user is authenticated
    $pengguna_id = Auth::check() ? Auth::user()->id : null;
@endphp

<head>
    <title>Sidebar</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('style/assets/css/sidebar.css') }}" rel="stylesheet">
</head>
<body>

<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
        <div class="custom-menu">
            <button type="button" id="sidebarCollapse" class="btn btn-primary">
                <i class="fa fa-bars"></i>
                <span class="sr-only">Toggle Menu</span>
            </button>
        </div>
        <h1><a href="index.html" class="logo">CVYou</a></h1>
        <ul class="list-unstyled components mb-5">
            <li class="{{ Request::is('tambahdatapribadi/*') ? 'active' : '' }}">
                <a href="/tambahdatapribadi/{{ $pengguna_id }}"><span class="fa fa-user mr-3"></span> Data Pribadi</a>
            </li>
            <li class="{{ Request::is('tambahdatapendidikan*') ? 'active' : '' }}">
                <a href="/tambahdatapendidikan"><span class="fa fa-sticky-note mr-3"></span> Data Pendidikan</a>
            </li>
            <li class="{{ Request::is('tambahdatapekerjaan*') ? 'active' : '' }}">
                <a href="/tambahdatapekerjaan"><span class="fa fa-sticky-note mr-3"></span> Data Pekerjaan</a>
            </li>
            <li class="{{ Request::is('tambahdataskill*') ? 'active' : '' }}">
                <a href="/tambahdataskill"><span class="fa fa-sticky-note mr-3"></span> Data Skill</a>
            </li>
            <li class="{{ Request::is('tambahberkaspendukung*') ? 'active' : '' }}">
                <a href="tambahberkaspendukung"><span class="fa fa-paper-plane mr-3"></span> Upload File</a>
            </li>
            <li class="{{ Request::is('lihatcv1*') ? 'active' : '' }}">
                <a href="#" data-toggle="collapse" data-target="#cvSubMenu" aria-expanded="false">
                    <span class="fa fa-paper-plane mr-3"></span> CV Kreatif
                    <span class="float-right">&#9656;</span>
                </a>
                <ul class="collapse list-unstyled" id="cvSubMenu">
                    <li><a href="{{ url('lihatcv1') }}">Lihat CV</a></li>
                    <li><a href="#">Download CV</a></li>
                </ul>
            </li>
            <li class="{{ Request::is('lihatcv2*') ? 'active' : '' }}">
                <a href="#" data-toggle="collapse" data-target="#cv2SubMenu" aria-expanded="false">
                    <span class="fa fa-paper-plane mr-3"></span> CV ATS Friendly
                    <span class="float-right">&#9656</span>
                </a>
                <ul class="collapse list-unstyled" id="cv2SubMenu">
                    <li><a href="{{ url('lihatcv2') }}">Lihat CV</a></li>
                    <li><a href="#">Download CV</a></li>
                </ul>
            </li>
            <li style="flex-grow: 1;"></li> <!-- This will push the logout button to the right -->
            <li>
                <form action="{{ route('logout') }}" method="POST" class="nav-button">
                    @csrf
                    <div class="center">
                        <button type="submit" class="btn btn-danger">Logout</button>
                      </div>
                </form>
            </li>
        </ul>
    </nav>

<script src="{{ asset('style/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('style/assets/js/popper.js') }}"></script>
<script src="{{ asset('style/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('style/assets/js/main3.js') }}"></script>
</body>
</html>

