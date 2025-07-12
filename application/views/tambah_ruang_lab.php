<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Ruang Laboratorium</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/fontawesome/all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sidebar.css'); ?>">
    <style>
        .form-group label { font-weight: bold; }
        .btn { margin-right: 4px; }
        .btn-green { background-color: #28a745; color: #fff; }
        .btn-green:hover, .btn-green:focus { background-color: #218838; color: #fff; }
    </style>
</head>
<body>
<?php $active_menu = 'ruang'; ?>
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
            <div style="background:#27ae60;color:#fff;padding:10px 20px;margin-bottom:20px;border-radius:4px;font-size:18px;font-weight:bold;">
                <i class="fa fa-plus"></i> Tambah Ruang Laboratorium
            </div>
            <form action="<?php echo base_url('index.php/RuangLab/simpan'); ?>" method="post">
                <div class="form-group">
                    <label for="kode_ruang">Kode Ruang</label>
                    <input type="text" class="form-control" id="kode_ruang" name="kode_ruang" required>
                </div>
                <div class="form-group">
                    <label for="nama_ruang">Nama Ruang</label>
                    <input type="text" class="form-control" id="nama_ruang" name="nama_ruang" required>
                </div>
                <div class="form-group">
                    <label for="lokasi">Lokasi</label>
                    <input type="text" class="form-control" id="lokasi" name="lokasi" required>
                </div>
                <button type="submit" class="btn btn-green">Simpan</button>
                <a href="<?php echo base_url('index.php/RuangLab'); ?>" class="btn btn-danger pull-right">Back</a>
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