<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Laboran</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
</head>
<body>
<div class="container-fluid">
    <h3 class="text-center">Dashboard Laboran</h3>
    <a href="<?= base_url('auth/logout') ?>" class="btn btn-danger pull-right">Logout</a>
    <div class="row">
        <div class="col-md-3">
            <h4>Menu</h4>
            <ul class="nav nav-pills nav-stacked">
                <li><a href="#">Jadwal Praktikum</a></li>
                <li><a href="#">Kelas Praktikum</a></li>
                <li><a href="#">Praktikan</a></li>
                <li><a href="#">Mata Praktikum</a></li>
                <li><a href="#">Asisten Praktikum</a></li>
            </ul>
        </div>
        <div class="col-md-9">
            <h4>Home</h4>
            <div class="row">
                <div class="col-md-6"><div class="well">Data Praktikan</div></div>
                <div class="col-md-6"><div class="well">Data Mata Praktikum</div></div>
                <div class="col-md-6"><div class="well">Data Kelas</div></div>
                <div class="col-md-6"><div class="well">Data Asisten Praktikum</div></div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
</body>
</html>
