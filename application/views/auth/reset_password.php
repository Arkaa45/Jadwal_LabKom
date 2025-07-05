<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Sistem Jadwal Laboratorium Komputer</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/auth-style.css') ?>">
    <?php echo render_fontawesome_css(); ?>
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <h1><i class="fas fa-lock"></i> Reset Password</h1>
                <p>Masukkan password baru Anda</p>
            </div>
            
            <div class="auth-body">
                <div class="info-box">
                    <i class="fas fa-info-circle"></i>
                    <strong>Petunjuk:</strong> Masukkan password baru yang kuat dan konfirmasi password.
                </div>

                <?php if($message): ?>
                    <div class="alert <?= strpos($message, 'error') !== false ? 'alert-danger' : 'alert-info' ?>">
                        <i class="fas fa-info-circle"></i> <?php echo $message; ?>
                    </div>
                <?php endif; ?>

                <div class="password-requirements">
                    <h6><i class="fas fa-shield-alt"></i> Persyaratan Password:</h6>
                    <ul>
                        <li>Minimal <?php echo $min_password_length; ?> karakter</li>
                        <li>Kombinasi huruf besar, huruf kecil, dan angka</li>
                        <li>Gunakan karakter khusus untuk keamanan tambahan</li>
                    </ul>
                </div>

                <?php echo form_open('auth/reset_password/' . $code, ['class' => 'reset-form']); ?>
                    
                    <div class="form-group">
                        <label for="new_password">
                            <i class="fas fa-lock"></i> <?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length); ?>
                        </label>
                        <input type="password" 
                               name="new_password" 
                               id="new_password" 
                               class="form-control" 
                               placeholder="Masukkan password baru"
                               required>
                        <i class="fas fa-key input-icon"></i>
                    </div>

                    <div class="form-group">
                        <label for="new_password_confirm">
                            <i class="fas fa-lock"></i> <?php echo lang('reset_password_new_password_confirm_label'); ?>
                        </label>
                        <input type="password" 
                               name="new_password_confirm" 
                               id="new_password_confirm" 
                               class="form-control" 
                               placeholder="Konfirmasi password baru"
                               required>
                        <i class="fas fa-check input-icon"></i>
                    </div>

                    <?php echo form_input($user_id); ?>
                    <?php echo form_hidden($csrf); ?>

                    <button type="submit" class="btn-auth">
                        <i class="fas fa-save"></i> <?php echo lang('reset_password_submit_btn'); ?>
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