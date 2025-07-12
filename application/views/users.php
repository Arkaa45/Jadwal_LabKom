<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Laboran</title>
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
<?php $this->load->view('header'); ?>
<?php $active_menu = 'laboran'; ?>
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
            <div style="background:#27ae60;color:#fff;padding:10px 20px;margin-bottom:20px;border-radius:4px;font-size:18px;font-weight:bold;"><i class="fa fa-list"></i> Daftar Laboran</div>
            <a href="<?php echo base_url('index.php/auth/create_user'); ?>" class="btn btn-green mb-2"><i class="fa fa-plus"></i> Tambah Laboran</a>
            <div class="row mb-2">
                <div class="col-md-2">
                    <input type="number" class="form-control" id="entries-count" placeholder="10" min="1" style="width:80px;">
                </div>
                <div class="col-md-4 offset-md-6">
                    <input type="text" class="form-control" id="search-bar" placeholder="Search...">
                </div>
            </div>
            <table class="table table-bordered table-striped" id="users-table">
                <thead class="thead-dark">
                    <tr>
                        <th>ID Laboran</th>
                        <th>Status</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Hp</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($users)): foreach ($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['id']); ?></td>
                        <td><?= htmlspecialchars($user['role']); ?></td>
                        <td><?= htmlspecialchars($user['username']); ?></td>
                        <td><?= htmlspecialchars($user['company'] ?? '-'); ?></td>
                        <td><?= htmlspecialchars($user['phone'] ?? '-'); ?></td>
                        <td>
                            <a href="<?php echo base_url('index.php/auth/edit_user/' . $user['id']); ?>" class="btn btn-warning btn-sm"><img src="<?php echo base_url('assets/img/edit.png'); ?>" alt="Edit" style="width:16px;height:16px;"></a>
                            <a href="#" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');"><img src="<?php echo base_url('assets/img/trash.png'); ?>" alt="Hapus" style="width:16px;height:16px;"></a>
                        </td>
                    </tr>
                <?php endforeach; else: ?>
                    <tr><td colspan="6" class="text-center">Data tidak ditemukan</td></tr>
                <?php endif; ?>
                </tbody>
            </table>
            <div style="margin-top:10px;color:#555;font-size:14px;">
                Menampilkan daftar Laboran, untuk mengedit dan menghapus data klik tombol pada kolom pilihan.
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
        var allRows = $('#users-table tbody tr');
        var visibleRows = allRows;
        
        function updateTableEntries() {
            var count = parseInt($('#entries-count').val()) || 10;
            allRows.hide();
            visibleRows.slice(0, count).show();
        }
        
        $('#entries-count').on('input', function() {
            updateTableEntries();
        });
        
        $('#entries-count').val(10);
        updateTableEntries();
        
        $('#search-bar').on('input', function() {
            var search = $(this).val().toLowerCase();
            visibleRows = allRows.filter(function() {
                var rowText = $(this).text().toLowerCase();
                return rowText.indexOf(search) > -1;
            });
            updateTableEntries();
        });
    });
</script>
</body>
</html> 