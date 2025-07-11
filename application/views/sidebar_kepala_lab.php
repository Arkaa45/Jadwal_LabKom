<div class="col-md-2 sidebar-container">
    <div class="sidebar-logo">
        <img src="<?= base_url('assets/img/logoPT.png') ?>" alt="Logo">
    </div>
    <div class="sidebar-menu">
        <h4>Menu</h4>
        <ul class="nav nav-pills nav-stacked">
            <li class="<?= (isset($active_menu) && $active_menu == 'jadwal') ? 'active' : '' ?>">
                <a href="<?= base_url('index.php/JadwalPraktikum') ?>">Jadwal Praktikum</a>
            </li>
            <li class="<?= (isset($active_menu) && $active_menu == 'kelas') ? 'active' : '' ?>">
                <a href="<?= base_url('index.php/Kelas') ?>">Kelas Praktikum</a>
            </li>
            <li class="<?= (isset($active_menu) && $active_menu == 'praktikan') ? 'active' : '' ?>">
                <a href="<?= base_url('index.php/Praktikan') ?>">Praktikan</a>
            </li>
            <li class="<?= (isset($active_menu) && $active_menu == 'absensi') ? 'active' : '' ?>">
                <a href="#">Absensi Kehadiran</a>
            </li>
            <li class="<?= (isset($active_menu) && $active_menu == 'matkum') ? 'active' : '' ?>">
                <a href="#">Mata Praktikum</a>
            </li>
            <li class="<?= (isset($active_menu) && $active_menu == 'asisten') ? 'active' : '' ?>">
                <a href="#">Asisten Praktikum</a>
            </li>
            <li class="<?= (isset($active_menu) && $active_menu == 'ruang') ? 'active' : '' ?>">
                <a href="#">Ruang Laboratorium</a>
            </li>
        </ul>
    </div>
</div> 