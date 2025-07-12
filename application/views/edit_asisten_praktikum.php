<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Asisten Praktikum</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/fontawesome/all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sidebar.css'); ?>">
    <style>
        .form-group label { font-weight: bold; }
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
            <div style="background:#8e44ad;color:#fff;padding:10px 20px;margin-bottom:20px;border-radius:4px;font-size:18px;font-weight:bold;">
                <i class="fa fa-edit"></i> Edit Asisten Praktikum
            </div>
            <form action="<?php echo base_url('index.php/AsistenPraktikum/update/' . $asisten['nidn']); ?>" method="post">
                <div class="form-group">
                    <label for="nidn">NIDN</label>
                    <input type="text" class="form-control" id="nidn" name="nidn" value="<?php echo htmlspecialchars($asisten['nidn']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="nama_dosen">Nama Asisten Praktikum</label>
                    <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" value="<?php echo htmlspecialchars($asisten['nama_dosen']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo htmlspecialchars($asisten['alamat']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?php echo htmlspecialchars($asisten['tgl_lahir']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="prodi">Nama Prodi</label>
                    <select class="form-control" id="prodi" name="prodi" required>
                        <option value="">- Prodi -</option>
                        <option value="IF" <?php if($asisten['prodi']=='IF') echo 'selected'; ?>>IF</option>
                        <option value="SI" <?php if($asisten['prodi']=='SI') echo 'selected'; ?>>SI</option>
                        <option value="FTI" <?php if($asisten['prodi']=='FTI') echo 'selected'; ?>>FTI</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-green">Simpan</button>
                <a href="<?php echo base_url('index.php/AsistenPraktikum'); ?>" class="btn btn-danger pull-right">Back</a>
            </form>
            <div style="margin-top:20px;color:#555;font-size:14px;">
                Edit Data Asisten Praktikum, ubah data pada form diatas lalu simpan perubahan.
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/auth-script.js'); ?>"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?php echo base_url('assets/js/sidebar.js'); ?>"></script>
</body>
</html> 