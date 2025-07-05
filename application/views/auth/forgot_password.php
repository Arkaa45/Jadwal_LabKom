<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - Sistem Jadwal Laboratorium Komputer</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/auth-style.css') ?>">
    <?php echo render_fontawesome_css(); ?>
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <h1><i class="fas fa-key"></i> Lupa Password</h1>
                <p>Masukkan email Anda untuk reset password</p>
            </div>
            
            <div class="auth-body">
                <div class="info-box">
                    <i class="fas fa-info-circle"></i>
                    <strong>Petunjuk:</strong> Masukkan email yang terdaftar dalam sistem. Kami akan mengirimkan link reset password ke email Anda.
                </div>

                <?php if($message): ?>
                    <div class="alert <?= strpos($message, 'error') !== false ? 'alert-danger' : 'alert-info' ?>">
                        <i class="fas fa-info-circle"></i> <?php echo $message; ?>
                    </div>
                <?php endif; ?>

                <?php echo form_open("auth/forgot_password", ['class' => 'forgot-form']); ?>
                    
                    <div class="form-group">
                        <label for="identity">
                            <i class="fas fa-envelope"></i> <?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label)); ?>
                        </label>
                        <input type="text" 
                               name="identity" 
                               id="identity" 
                               class="form-control" 
                               value="<?php echo $identity['value']; ?>" 
                               placeholder="Masukkan email Anda"
                               required>
                        <i class="fas fa-envelope input-icon"></i>
                    </div>

                    <button type="submit" class="btn-auth">
                        <i class="fas fa-paper-plane"></i> <?php echo lang('forgot_password_submit_btn'); ?>
                    </button>

                <?php echo form_close(); ?>

                <div class="auth-links">
                    <a href="<?= base_url('auth/login') ?>">
                        <i class="fas fa-arrow-left"></i> Kembali ke Login
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/auth-script.js') ?>"></script>
</body>
</html>
