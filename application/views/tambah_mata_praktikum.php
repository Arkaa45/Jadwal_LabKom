<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mata Praktikum</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/fontawesome/all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sidebar.css'); ?>">
    <style>
        .form-group label { font-weight: bold; }
        .btn { margin-right: 4px; }
    </style>
</head>
<body>
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
            <h3>Tambah Mata Praktikum</h3>
            <form action="<?php echo base_url('index.php/MataPraktikum/simpan'); ?>" method="post">
                <div class="form-group">
                    <label for="kode_matkum">Kode Matkum</label>
                    <input type="text" class="form-control" id="kode_matkum" name="kode_matkum" required>
                </div>
                <div class="form-group">
                    <label for="nama_matkum">Nama Matkum</label>
                    <input type="text" class="form-control" id="nama_matkum" name="nama_matkum" required>
                </div>
                <div class="form-group">
                    <label for="sks">SKS</label>
                    <input type="number" class="form-control" id="sks" name="sks" min="1" required>
                </div>
                <div class="form-group">
                    <label for="semester">Semester</label>
                    <input type="number" class="form-control" id="semester" name="semester" min="1" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?php echo base_url('index.php/MataPraktikum'); ?>" class="btn btn-secondary">Back</a>
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