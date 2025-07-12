<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Asisten Praktikum</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/fontawesome/all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sidebar.css'); ?>">
    <style>
        .table th, .table td { vertical-align: middle; }
        .btn { margin-right: 4px; }
        .btn-green { background-color: #28a745; color: #fff; }
        .btn-green:hover, .btn-green:focus { background-color: #218838; color: #fff; }
        .btn-warning { color: #fff; }
    </style>
</head>
<body>
<?php $active_menu = 'asisten'; ?>
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
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>Daftar Asisten Praktikum</h3>
                <a href="<?php echo base_url('index.php/AsistenPraktikum/tambah'); ?>" class="btn btn-green"><i class="fa fa-plus"></i> Tambah Asisten Praktikum</a>
            </div>
            <div class="row mb-2">
                <div class="col-md-2">
                    <input type="number" class="form-control" id="entries-count" placeholder="10" min="1" style="width:80px;">
                </div>
                <div class="col-md-4 offset-md-6">
                    <input type="text" class="form-control" placeholder="Cari...">
                </div>
            </div>
            <table class="table table-bordered table-striped" id="asisten-table">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>NIDN</th>
                        <th>Nama Dosen</th>
                        <th>Alamat</th>
                        <th>Tgl Lahir</th>
                        <th>Prodi</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($asisten)): $no=1; foreach ($asisten as $row): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($row['nidn']); ?></td>
                        <td><?= htmlspecialchars($row['nama_dosen']); ?></td>
                        <td><?= htmlspecialchars($row['alamat']); ?></td>
                        <td><?= htmlspecialchars($row['tgl_lahir']); ?></td>
                        <td><?= htmlspecialchars($row['prodi']); ?></td>
                        <td>
                            <a href="<?php echo base_url('index.php/AsistenPraktikum/edit/' . $row['nidn']); ?>" class="btn btn-warning btn-sm"><img src="<?php echo base_url('assets/img/edit.png'); ?>" alt="Edit" style="width:16px;height:16px;"></a>
                            <a href="<?php echo base_url('index.php/AsistenPraktikum/hapus/' . $row['nidn']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');"><img src="<?php echo base_url('assets/img/trash.png'); ?>" alt="Hapus" style="width:16px;height:16px;"></a>
                        </td>
                    </tr>
                <?php endforeach; else: ?>
                    <tr><td colspan="7" class="text-center">Data tidak ditemukan</td></tr>
                <?php endif; ?>
                </tbody>
            </table>
            <button class="btn btn-secondary" id="btn-back">Back</button>
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/auth-script.js'); ?>"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?php echo base_url('assets/js/sidebar.js'); ?>"></script>
<script>
    $(document).ready(function() {
        // Entries count filter
        function updateTableEntries() {
            var count = parseInt($('#entries-count').val()) || 10;
            var rows = $('#asisten-table tbody tr');
            rows.hide();
            rows.slice(0, count).show();
        }
        $('#entries-count').on('input', updateTableEntries);
        // Set default value and show initial rows
        $('#entries-count').val(10);
        updateTableEntries();
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
    });
</script>
</body>
</html> 