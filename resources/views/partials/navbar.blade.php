<ul class="nav nav-tabs">
    <li class="nav-item">
    <a class="nav-link <?php echo (strpos($_SERVER['REQUEST_URI'], 'tambahdatapribadi') !== false) ? 'active' : ''; ?>" href="/tambahdatapribadi">Data Pribadi</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo (strpos($_SERVER['REQUEST_URI'], 'tambahdatapendidikan') !== false) ? 'active' : ''; ?>" href="/tambahdatapendidikan">Data Pendidikan</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo (strpos($_SERVER['REQUEST_URI'], 'tambahdatapekerjaan') !== false) ? 'active' : ''; ?>" href="/tambahdatapekerjaan">Data Pekerjaan</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo (strpos($_SERVER['REQUEST_URI'], 'tambahdataskill') !== false) ? 'active' : ''; ?>" href="/tambahdataskill">Data Skill</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo (strpos($_SERVER['REQUEST_URI'], 'tambahberkaspendukung') !== false) ? 'active' : ''; ?>" href="tambahberkaspendukung">Upload File</a>
    </li>
</ul>
