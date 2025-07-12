<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Mata Praktikum</title>
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
<?php $active_menu = 'matkum'; ?>
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
            <div style="background:#27ae60;color:#fff;padding:10px 20px;margin-bottom:20px;border-radius:4px;font-size:18px;font-weight:bold;"><i class="fa fa-list"></i> Daftar Mata Praktikum</div>
            <a href="<?php echo base_url('index.php/MataPraktikum/tambah'); ?>" class="btn btn-green mb-2"><i class="fa fa-plus"></i> Tambah Mata Praktikum</a>
            <div class="row mb-2">
                <div class="col-md-2">
                    <input type="number" class="form-control" id="entries-count" placeholder="10" min="1" style="width:80px;">
                </div>
                <div class="col-md-4 offset-md-6">
                    <input type="text" class="form-control" id="search-bar" placeholder="Cari...">
                </div>
            </div>
            <table class="table table-bordered table-striped" id="matkum-table">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Kode Matkum</th>
                        <th>Nama Matkum</th>
                        <th>SKS</th>
                        <th>Semester</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($matkum)): $no=1; foreach ($matkum as $row): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($row['kode_matkum']); ?></td>
                        <td><?= htmlspecialchars($row['nama_matkum']); ?></td>
                        <td><?= htmlspecialchars($row['sks']); ?></td>
                        <td><?= htmlspecialchars($row['semester']); ?></td>
                        <td>
                            <a href="<?php echo base_url('index.php/MataPraktikum/edit/' . $row['kode_matkum']); ?>" class="btn btn-warning btn-sm"><img src="<?php echo base_url('assets/img/edit.png'); ?>" alt="Edit" style="width:16px;height:16px;"></a>
                            <a href="<?php echo base_url('index.php/MataPraktikum/hapus/' . $row['kode_matkum']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');"><img src="<?php echo base_url('assets/img/trash.png'); ?>" alt="Hapus" style="width:16px;height:16px;"></a>
                        </td>
                    </tr>
                <?php endforeach; else: ?>
                    <tr><td colspan="6" class="text-center">Data tidak ditemukan</td></tr>
                <?php endif; ?>
                </tbody>
            </table>
            <div style="margin-top:10px;color:#555;font-size:14px;">
                Menampilkan daftar Mata Praktikum, untuk mengedit dan menghapus data klik tombol pada kolom pilihan.
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
        // Entries count + search filter
        function updateTableEntries() {
            var count = parseInt($('#entries-count').val()) || 10;
            var search = $('#search-bar').val().toLowerCase();
            var rows = $('#matkum-table tbody tr');
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
</html> 