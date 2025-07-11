<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Jadwal Praktikum</title>
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
            <h3>Edit jadwal praktikum</h3>
            <form action="<?php echo base_url('index.php/JadwalPraktikum/update/'.$jadwal['id_jadwal_praktikum']); ?>" method="post">
                <div class="form-group">
                    <label for="tahun_ajaran">Tahun Ajaran</label>
                    <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" value="<?php echo htmlspecialchars($jadwal['tahun_ajaran']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="kode_matkum">Mata Praktikum</label>
                    <select class="form-control" id="kode_matkum" name="kode_matkum" required>
                        <option value="">-- Pilih Mata Praktikum --</option>
                        <?php foreach ($mata_praktikum as $matkum): ?>
                            <option value="<?= htmlspecialchars($matkum['kode_matkum']) ?>" <?= $jadwal['kode_matkum'] == $matkum['kode_matkum'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($matkum['nama_matkum']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nidn">Asisten Praktikum</label>
                    <select class="form-control" id="nidn" name="nidn" required>
                        <option value="">-- Pilih Asisten Praktikum --</option>
                        <?php foreach ($asisten as $as): ?>
                            <option value="<?= htmlspecialchars($as['nidn']) ?>" <?= $jadwal['nidn'] == $as['nidn'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($as['nama_dosen']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kode_ruang">Ruang Lab</label>
                    <select class="form-control" id="kode_ruang" name="kode_ruang" required>
                        <option value="">-- Pilih Ruang Lab --</option>
                        <?php foreach ($ruang_lab as $ruang): ?>
                            <option value="<?= htmlspecialchars($ruang['kode_ruang']) ?>" <?= $jadwal['kode_ruang'] == $ruang['kode_ruang'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($ruang['nama_ruang']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kode_kelas">Kelas</label>
                    <select class="form-control" id="kode_kelas" name="kode_kelas" required>
                        <option value="">-- Pilih Kelas --</option>
                        <?php foreach ($kelas as $kls): ?>
                            <option value="<?= htmlspecialchars($kls['kode_kelas']) ?>" <?= $jadwal['kode_kelas'] == $kls['kode_kelas'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($kls['nama_kelas']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Hari</label><br>
                    <?php $hari_list = ['senin','selasa','rabu','kamis','jumat','sabtu']; foreach($hari_list as $h): ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="hari" id="<?= $h ?>" value="<?= $h ?>" <?= $jadwal['hari'] == $h ? 'checked' : '' ?> required>
                        <label class="form-check-label" for="<?= $h ?>"><?= ucfirst($h) ?></label>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="form-group">
                    <label for="waktu_mulai">Waktu Mulai</label>
                    <input type="time" class="form-control" id="waktu_mulai" name="waktu_mulai" value="<?php echo htmlspecialchars($jadwal['waktu_mulai']); ?>" required style="width: 150px; display: inline-block;">
                    <span> - </span>
                    <label for="waktu_selesai" class="sr-only">Waktu Selesai</label>
                    <input type="time" class="form-control" id="waktu_selesai" name="waktu_selesai" value="<?php echo htmlspecialchars($jadwal['waktu_selesai']); ?>" required style="width: 150px; display: inline-block;">
                </div>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-primary">Update</button>
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