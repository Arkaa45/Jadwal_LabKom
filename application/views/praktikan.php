<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Praktikan</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/fontawesome/all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sidebar.css'); ?>">
    <style>
        .table th, .table td { vertical-align: middle; }
        .btn { margin-right: 4px; }
        .btn-green { background-color: #28a745; color: #fff; }
        .btn-green:hover, .btn-green:focus { background-color: #218838; color: #fff; }
        .btn-purple { background-color: #a259c4; color: #fff; }
        .btn-purple:hover, .btn-purple:focus { background-color: #7c3fa0; color: #fff; }
    </style>
</head>
<body>
<?php $active_menu = 'praktikan'; ?>
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
                <h3>Daftar Praktikan</h3>
                <div class="d-flex flex-row gap-2">
                    <a href="<?php echo base_url('index.php/Praktikan/tambah'); ?>" class="btn btn-green"><i class="fa fa-plus"></i> Tambah Praktikan</a>
                    <button class="btn btn-purple" type="button"><i class="fa fa-print"></i> Cetak</button>
                    <form method="post" action="<?php echo base_url('index.php/Praktikan/edit_multi'); ?>" id="form-edit-multi" style="display:inline-block; margin:0;">
                        <button type="submit" class="btn btn-warning" id="btn-edit-multi"><i class="fa fa-edit"></i> Edit</button>
                    </form>
                    <form method="post" action="<?php echo base_url('index.php/Praktikan/hapus_multi'); ?>" id="form-delete-multi" style="display:inline-block; margin:0;">
                        <button type="submit" class="btn btn-danger" id="btn-delete-multi" onclick="return confirm('Yakin ingin menghapus data yang dipilih?');"><i class="fa fa-trash"></i> Hapus</button>
                    </form>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-2">
                    <input type="number" class="form-control" id="entries-count" placeholder="10" min="1" style="width:80px;">
                </div>
                <div class="col-md-4 offset-md-6">
                    <input type="text" class="form-control" placeholder="Cari...">
                </div>
            </div>
            <table class="table table-bordered table-striped" id="praktikan-table">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama Lengkap</th>
                        <th>Alamat</th>
                        <th>Tgl Lahir</th>
                        <th>Prodi</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($praktikan)): $no=1; foreach ($praktikan as $row): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($row['nim']); ?></td>
                        <td><?= htmlspecialchars($row['nama']); ?></td>
                        <td><?= htmlspecialchars($row['alamat']); ?></td>
                        <td><?= htmlspecialchars(date('d-m-Y', strtotime($row['tgl_lahir']))); ?></td>
                        <td><?= htmlspecialchars($row['prodi']); ?></td>
                        <td><input type="checkbox" name="selected_nim[]" value="<?= htmlspecialchars($row['nim']); ?>" form="form-edit-multi" form="form-delete-multi"></td>
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
            var rows = $('#praktikan-table tbody tr');
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