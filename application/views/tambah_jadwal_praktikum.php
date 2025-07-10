<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Jadwal Praktikum</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/fontawesome/all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sidebar.css'); ?>">
    <style>
        .form-group label { font-weight: bold; }
        .btn { margin-right: 4px; }
    </style>
</head>
<body>
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
            <h3>Tambah jadwal praktikum</h3>
            <form action="<?php echo base_url('index.php/JadwalPraktikum/simpan'); ?>" method="post">
                <div class="form-group">
                    <label for="tahun_ajaran">Tahun Ajaran</label>
                    <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" required>
                </div>
                <div class="form-group">
                    <label for="kode_matkum">Mata Praktikum</label>
                    <input type="text" class="form-control" id="kode_matkum" name="kode_matkum" required>
                </div>
                <div class="form-group">
                    <label for="nidn">Asisten Praktikum</label>
                    <input type="text" class="form-control" id="nidn" name="nidn" required>
                </div>
                <div class="form-group">
                    <label for="kode_ruang">Ruang Lab</label>
                    <input type="text" class="form-control" id="kode_ruang" name="kode_ruang" required>
                </div>
                <div class="form-group">
                    <label for="kode_kelas">Kelas</label>
                    <input type="text" class="form-control" id="kode_kelas" name="kode_kelas" required>
                </div>
                <div class="form-group">
                    <label>Hari</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="hari" id="senin" value="senin" required>
                        <label class="form-check-label" for="senin">Senin</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="hari" id="selasa" value="selasa">
                        <label class="form-check-label" for="selasa">Selasa</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="hari" id="rabu" value="rabu">
                        <label class="form-check-label" for="rabu">Rabu</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="hari" id="kamis" value="kamis">
                        <label class="form-check-label" for="kamis">Kamis</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="hari" id="jumat" value="jumat">
                        <label class="form-check-label" for="jumat">Jum'at</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="hari" id="sabtu" value="sabtu">
                        <label class="form-check-label" for="sabtu">Sabtu</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="waktu_mulai">Waktu Mulai</label>
                    <input type="time" class="form-control" id="waktu_mulai" name="waktu_mulai" required style="width: 150px; display: inline-block;">
                    <span> - </span>
                    <label for="waktu_selesai" class="sr-only">Waktu Selesai</label>
                    <input type="time" class="form-control" id="waktu_selesai" name="waktu_selesai" required style="width: 150px; display: inline-block;">
                </div>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?php echo base_url('index.php/JadwalPraktikum'); ?>" class="btn btn-secondary">Back</a>
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