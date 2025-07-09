<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Kepala Lab</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
</head>
<body>
<div class="container-fluid">
    <h3 class="text-center">Dashboard Kepala Lab</h3>
    <a href="<?= base_url('auth/logout') ?>" class="btn btn-danger pull-right" onclick="return confirm('Apakah Anda yakin ingin logout?')">Logout</a>
    <div class="row">
        <div class="col-md-2">
            <div style="text-align:center; margin-bottom:20px;">
                <img src="<?= base_url('assets/img/logoPT.png') ?>" alt="Logo" style="max-width:80px; height:auto;">
            </div>
            <h4>Menu</h4>
            <ul class="nav nav-pills nav-stacked">
                <li><a href="<?= base_url('index.php/JadwalPraktikum') ?>">Jadwal Praktikum</a></li>
                <li><a href="#">Kelas Praktikum</a></li>
                <li><a href="#">Praktikan</a></li>
                <li><a href="#">Absensi Kehadiran</a></li>
                <li><a href="#">Mata Praktikum</a></li>
                <li><a href="#">Asisten Praktikum</a></li>
                <li><a href="#">Ruang Laboratorium</a></li>
            </ul>
        </div>
        <div class="col-md-10">
            <h4>Home</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="well">
                        <h5 class="text-center">Data Praktikan</h5>
                        <canvas id="praktikanChart"></canvas>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="well">
                        <h5 class="text-center">Data Kelas</h5>
                        <canvas id="kelasChart"></canvas>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="well">
                        <h5 class="text-center">Data Mata Praktikum</h5>
                        <canvas id="matkumChart"></canvas>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="well">
                        <h5 class="text-center">Data Asisten Praktikum</h5>
                        <canvas id="asistenChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Data Praktikan
    var praktikanLabels = <?= json_encode(array_column($praktikan, 'prodi')) ?>;
    var praktikanData = <?= json_encode(array_column($praktikan, 'total')) ?>;
    // Data Kelas
    var kelasLabels = <?= json_encode(array_column($kelas, 'semester')) ?>;
    var kelasData = <?= json_encode(array_column($kelas, 'total')) ?>;
    // Data Mata Praktikum
    var matkumLabels = <?= json_encode(array_column($mata_praktikum, 'semester')) ?>;
    var matkumData = <?= json_encode(array_column($mata_praktikum, 'total')) ?>;
    // Data Asisten Praktikum
    var asistenLabels = <?= json_encode(array_column($asisten, 'prodi')) ?>;
    var asistenData = <?= json_encode(array_column($asisten, 'total')) ?>;

    // Chart Praktikan
    new Chart(document.getElementById('praktikanChart'), {
        type: 'line',
        data: {
            labels: praktikanLabels,
            datasets: [{
                label: 'Praktikan',
                data: praktikanData,
                borderColor: 'blue',
                backgroundColor: 'rgba(0,123,255,0.2)',
                fill: true
            }]
        }
    });
    // Chart Kelas
    new Chart(document.getElementById('kelasChart'), {
        type: 'bar',
        data: {
            labels: kelasLabels,
            datasets: [{
                label: 'Kelas',
                data: kelasData,
                backgroundColor: 'orange'
            }]
        }
    });
    // Chart Mata Praktikum
    new Chart(document.getElementById('matkumChart'), {
        type: 'pie',
        data: {
            labels: matkumLabels,
            datasets: [{
                label: 'Mata Praktikum',
                data: matkumData,
                backgroundColor: [
                    '#007bff', '#ffc107', '#dc3545', '#28a745', '#6610f2', '#fd7e14', '#6c757d', '#20c997'
                ]
            }]
        }
    });
    // Chart Asisten Praktikum
    new Chart(document.getElementById('asistenChart'), {
        type: 'doughnut',
        data: {
            labels: asistenLabels,
            datasets: [{
                label: 'Asisten Praktikum',
                data: asistenData,
                backgroundColor: [
                    '#dc3545', '#ffc107', '#007bff', '#28a745', '#6610f2', '#fd7e14', '#6c757d', '#20c997'
                ]
            }]
        }
    });
</script>
</body>
</html>
