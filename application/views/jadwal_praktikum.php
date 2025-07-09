<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Jadwal Praktikum</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/fontawesome/all.min.css'); ?>">
    <style>
        .table th, .table td { vertical-align: middle; }
        .btn { margin-right: 4px; }
    </style>
</head>
<body>
<div class="container mt-4">
    <h3>Daftar jadwal praktikum</h3>
    <div class="mb-3">
        <button class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</button>
        <button class="btn btn-secondary"><i class="fa fa-edit"></i> Data ubah jadwal</button>
        <button class="btn btn-info"><i class="fa fa-print"></i> Cetak</button>
    </div>
    <div class="row mb-2">
        <div class="col-md-2">
            <input type="number" class="form-control" placeholder="10" min="1" style="width:80px;">
        </div>
        <div class="col-md-4 offset-md-6">
            <input type="text" class="form-control" placeholder="Cari...">
        </div>
    </div>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Tahun</th>
                <th>Semester</th>
                <th>Matkum</th>
                <th>Askum</th>
                <th>Ruangan</th>
                <th>Kelas</th>
                <th>Hari</th>
                <th>Waktu</th>
                <th>Pilihan</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($jadwal)): $no=1; foreach ($jadwal as $row): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($row['tahun_ajaran']); ?></td>
                <td><?= htmlspecialchars($row['semester']); ?></td>
                <td><?= htmlspecialchars($row['kode_matkum']); ?></td>
                <td><?= htmlspecialchars($row['nidn']); ?></td>
                <td><?= htmlspecialchars($row['kode_ruang']); ?></td>
                <td><?= htmlspecialchars($row['kode_kelas']); ?></td>
                <td><?= htmlspecialchars($row['hari']); ?></td>
                <td><?= htmlspecialchars(date('H:i', strtotime($row['waktu_mulai'])) . ' - ' . date('H:i', strtotime($row['waktu_selesai']))); ?></td>
                <td>
                    <button class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        <?php endforeach; else: ?>
            <tr><td colspan="10" class="text-center">Data tidak ditemukan</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
    <button class="btn btn-secondary">Back</button>
</div>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/auth-script.js'); ?>"></script>
</body>
</html> 