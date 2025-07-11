<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Praktikan</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/fontawesome/all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sidebar.css'); ?>">
    <style>
        .form-group label { font-weight: bold; }
        .btn { margin-right: 4px; }
        .table th, .table td { vertical-align: middle; text-align: center; }
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
            <h3>Edit Praktikan</h3>
            <form action="<?php echo base_url('index.php/Praktikan/update_multi'); ?>" method="post">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama Lengkap</th>
                                <th>Alamat</th>
                                <th>Tgl Lahir</th>
                                <th>Prodi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($praktikan)): $no=1; foreach ($praktikan as $row): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><input type="text" name="nim[]" class="form-control" value="<?= htmlspecialchars($row['nim']); ?>" readonly></td>
                                <td><input type="text" name="nama[]" class="form-control" value="<?= htmlspecialchars($row['nama']); ?>" required></td>
                                <td><input type="text" name="alamat[]" class="form-control" value="<?= htmlspecialchars($row['alamat']); ?>" required></td>
                                <td><input type="date" name="tgl_lahir[]" class="form-control" value="<?= htmlspecialchars($row['tgl_lahir']); ?>" required></td>
                                <td><input type="text" name="prodi[]" class="form-control" value="<?= htmlspecialchars($row['prodi']); ?>" required></td>
                            </tr>
                        <?php endforeach; endif; ?>
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?php echo base_url('index.php/Praktikan'); ?>" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/auth-script.js'); ?>"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?php echo base_url('assets/js/sidebar.js'); ?>"></script>
</body>
</html> 