<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Jadwal Laboratorium Komputer</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/auth-style.css') ?>">
    <?php echo render_fontawesome_css(); ?>
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <div style="text-align:center;margin-bottom:10px;">
                    <img src="<?= base_url('assets/img/logoPT.png') ?>" alt="Logo" style="width:64px;height:64px;margin-bottom:10px;">
                </div>
                <h1 style="text-align:center;margin:0;">LabKom FTI</h1>
                <p style="text-align:center;margin-top:5px;">Jadwal LabKom FTI UNIBBA</p>
            </div>
            
            <div class="auth-body">
                <?php if($message): ?>
                    <div class="alert <?= strpos($message, 'error') !== false ? 'alert-danger' : 'alert-info' ?>">
                        <i class="fas fa-info-circle"></i> <?php echo $message; ?>
                    </div>
                <?php endif; ?>

                <?php echo form_open("auth/login", ['class' => 'login-form']); ?>
                    
                    <div class="form-group">
                        <label for="identity">
                            <i class="fas fa-user"></i> <?php echo lang('login_identity_label'); ?>
                        </label>
                        <input type="text" 
                               name="identity" 
                               id="identity" 
                               class="form-control" 
                               value="<?php echo $identity['value']; ?>" 
                               placeholder="Masukkan email atau username"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="password">
                            <?php echo lang('login_password_label'); ?>
                        </label>
                        <input type="password" 
                               name="password" 
                               id="password" 
                               class="form-control" 
                               placeholder="Masukkan password"
                               required>
                    </div>

                    <button type="submit" class="btn-auth">
                        <i class="fas fa-sign-in-alt"></i> <?php echo lang('login_submit_btn'); ?>
                    </button>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>

    <div class="system-info">
        <h3><i class="fas fa-university"></i> Universitas Bale Bandung</h3>
        <p>Sistem Informasi Jadwal Praktikum Laboratorium Komputer</p>
        <p>&copy; <?php echo date('Y'); ?> All rights reserved</p>
    </div>

    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/auth-script.js') ?>"></script>
</body>
</html>