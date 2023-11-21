@php
    // Check if the user is authenticated
    $pengguna_id = Auth::check() ? Auth::user()->id : null;
@endphp

<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link {{ Request::is('editdatapribadi/*') ? 'active' : '' }}" href="/editdatapribadi/{{ $pengguna_id }}">Data Pribadi</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('tambahdatapendidikan*') ? 'active' : '' }}" href="/tambahdatapendidikan">Data Pendidikan</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('tambahdatapekerjaan*') ? 'active' : '' }}" href="/tambahdatapekerjaan">Data Pekerjaan</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('tambahdataskill*') ? 'active' : '' }}" href="/tambahdataskill">Data Skill</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('tambahberkaspendukung*') ? 'active' : '' }}" href="tambahberkaspendukung">Upload File</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('lihatcv*') ? 'active' : '' }}" href="lihatcv">Lihat CV</a>
    </li>
</ul>