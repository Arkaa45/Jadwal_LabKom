<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Kelas Praktikum</title>
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
<?php $active_menu = 'kelas'; ?>
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
            <h3>Daftar kelas praktikum</h3>
            <div class="mb-3">
                <a href="<?php echo base_url('index.php/Kelas/tambah'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
            </div>
            <div class="row mb-2">
                <div class="col-md-2">
                    <input type="number" class="form-control" id="entries-count" placeholder="10" min="1" style="width:80px;">
                </div>
                <div class="col-md-4 offset-md-6">
                    <input type="text" class="form-control" placeholder="Cari...">
                </div>
            </div>
            <table class="table table-bordered table-striped" id="kelas-table">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Semester</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($kelas)): foreach ($kelas as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['kode_kelas']); ?></td>
                        <td><?= htmlspecialchars($row['nama_kelas']); ?></td>
                        <td><?= htmlspecialchars($row['semester']); ?></td>
                        <td>
                            <a href="#" class="btn btn-brown btn-sm"><img src="<?php echo base_url('assets/img/verification.png'); ?>" alt="Verifikasi" style="width:16px;height:16px;"></a>
                            <a href="<?php echo base_url('index.php/Kelas/edit/' . $row['kode_kelas']); ?>" class="btn btn-warning btn-sm"><img src="<?php echo base_url('assets/img/edit.png'); ?>" alt="Edit" style="width:16px;height:16px;"></a>
                            <a href="<?php echo base_url('index.php/Kelas/hapus/' . $row['kode_kelas']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');"><img src="<?php echo base_url('assets/img/trash.png'); ?>" alt="Hapus" style="width:16px;height:16px;"></a>
                        </td>
                    </tr>
                <?php endforeach; else: ?>
                    <tr><td colspan="4" class="text-center">Data tidak ditemukan</td></tr>
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

        // Entries count filter
        function updateTableEntries() {
            var count = parseInt($('#entries-count').val()) || 10;
            var rows = $('#kelas-table tbody tr');
            rows.hide();
            rows.slice(0, count).show();
        }
        $('#entries-count').on('input', updateTableEntries);
        // Set default value and show initial rows
        $('#entries-count').val(10);
        updateTableEntries();
    });
</script>
</body>
</html> 