<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Jadwal Praktikum</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/fontawesome/all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sidebar.css'); ?>">
    <style>
        .table th, .table td { vertical-align: middle; }
        .btn { margin-right: 4px; }
        .btn-brown { background-color: #8B4513; color: #fff; }
        .btn-brown:hover, .btn-brown:focus { background-color: #A0522D; color: #fff; }
    </style>
</head>
<body>
<?php $this->load->view('header'); ?>
<?php $active_menu = 'jadwal'; ?>
<div class="container-fluid">
    <div class="row">
        <?php
        if (isset($role) && $role) {
            if ($role == 'admin') {
                $this->load->view('sidebar_admin', compact('active_menu'));
                $content_class = 'col-md-10';
            } elseif ($role == 'kepala_lab') {
                $this->load->view('sidebar_kepala_lab', compact('active_menu'));
                $content_class = 'col-md-10';
            } elseif ($role == 'laboran') {
                $this->load->view('sidebar_laboran', compact('active_menu'));
                $content_class = 'col-md-10';
            } else {
                $content_class = 'col-md-12';
            }
        } else {
            $content_class = 'col-md-12';
        }
        ?>
        <div class="<?php echo $content_class; ?>">
            <div style="background:#27ae60;color:#fff;padding:10px 20px;margin-bottom:20px;border-radius:4px;font-size:18px;font-weight:bold;"><i class="fa fa-list"></i> Daftar Jadwal Praktikum</div>
            <div class="mb-3">
                <a href="<?php echo base_url('index.php/JadwalPraktikum/tambah'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
                <button class="btn btn-secondary"><i class="fa fa-edit"></i> Data ubah jadwal</button>
                <button class="btn btn-info"><i class="fa fa-print"></i> Cetak</button>
            </div>
            <div class="row mb-2">
                <div class="col-md-2">
                    <input type="number" class="form-control" id="entries-count" placeholder="10" min="1" style="width:80px;">
                </div>
                <div class="col-md-4 offset-md-6">
                    <input type="text" class="form-control" id="search-bar" placeholder="Cari...">
                </div>
            </div>
            <table class="table table-bordered table-striped" id="jadwal-table">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Tahun</th>
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
                        <td><?= htmlspecialchars($row['nama_matkum']); ?></td>
                        <td><?= htmlspecialchars($row['nama_dosen']); ?></td>
                        <td><?= htmlspecialchars($row['nama_ruang']); ?></td>
                        <td><?= htmlspecialchars($row['nama_kelas']); ?></td>
                        <td><?= htmlspecialchars(ucfirst($row['hari'])); ?></td>
                        <td><?= htmlspecialchars($row['waktu_mulai']) . ' - ' . htmlspecialchars($row['waktu_selesai']); ?></td>
                        <td>
                            <a href="#" class="btn btn-brown btn-sm"><img src="<?php echo base_url('assets/img/verification.png'); ?>" alt="Verifikasi" style="width:16px;height:16px;"></a>
                            <a href="<?php echo base_url('index.php/JadwalPraktikum/edit/' . $row['id_jadwal_praktikum']); ?>" class="btn btn-warning btn-sm"><img src="<?php echo base_url('assets/img/edit.png'); ?>" alt="Edit" style="width:16px;height:16px;"></a>
                            <a href="<?php echo base_url('index.php/JadwalPraktikum/delete/' . $row['id_jadwal_praktikum']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus jadwal ini?');"><img src="<?php echo base_url('assets/img/trash.png'); ?>" alt="Hapus" style="width:16px;height:16px;"></a>
                        </td>
                    </tr>
                <?php endforeach; else: ?>
                    <tr><td colspan="9" class="text-center">Data tidak ditemukan</td></tr>
                <?php endif; ?>
                </tbody>
            </table>
            <div style="margin-top:10px;color:#555;font-size:14px;">
                Menampilkan daftar Jadwal Praktikum, untuk mengedit dan menghapus data klik tombol pada kolom pilihan.
            </div>
            <a href="<?php
                if ($role == 'admin') echo base_url('index.php/admin/dashboard');
                elseif ($role == 'kepala_lab') echo base_url('index.php/kepala_lab/dashboard');
                elseif ($role == 'laboran') echo base_url('index.php/laboran/dashboard');
                else echo base_url();
            ?>" class="btn btn-danger btn-sm mt-3"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/auth-script.js'); ?>"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?php echo base_url('assets/js/sidebar.js'); ?>"></script>
<script>
    $(document).ready(function() {
        // Back button
        $('#btn-back').on('click', function() {
            var role = <?php echo json_encode(isset($role) ? $role : ''); ?>;
            var url = '';
            if (role === 'admin') {
                url = '<?php echo base_url('admin'); ?>';
            } else if (role === 'kepala_lab') {
                url = '<?php echo base_url('kepalalab'); ?>';
            } else if (role === 'laboran') {
                url = '<?php echo base_url('laboran'); ?>';
            } else {
                url = '<?php echo base_url(); ?>';
            }
            window.location.href = url;
        });
        // Entries count + search filter
        function updateTableEntries() {
            var count = parseInt($('#entries-count').val()) || 10;
            var search = $('#search-bar').val().toLowerCase();
            var rows = $('#jadwal-table tbody tr');
            rows.hide();
            var filtered = rows.filter(function() {
                return $(this).text().toLowerCase().indexOf(search) > -1;
            });
            filtered.slice(0, count).show();
        }
        $('#entries-count').on('input', updateTableEntries);
        $('#search-bar').on('input', updateTableEntries);
        // Set default value and show initial rows
        $('#entries-count').val(10);
        updateTableEntries();
    });
</script>
</body>
</html> 
</html> 