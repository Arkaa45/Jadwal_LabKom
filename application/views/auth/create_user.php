<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Laboran</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/fontawesome/all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sidebar.css'); ?>">
    <style>
        .header-purple {
            background: #a259d9;
            color: #fff;
            padding: 16px 24px;
            border-radius: 6px 6px 0 0;
            margin-bottom: 24px;
            font-size: 20px;
            font-weight: bold;
            display: flex;
            align-items: center;
        }
        .header-purple i {
            margin-right: 10px;
        }
        .btn-purple {
            background: #a259d9;
            color: #fff;
            border: none;
            font-weight: bold;
        }
        .btn-purple:hover {
            background: #7c3bbd;
            color: #fff;
        }
        .form-section {
            background: #fff;
            border-radius: 0 0 8px 8px;
            padding: 32px 32px 24px 32px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            margin-bottom: 32px;
        }
        .form-group label { font-weight: 500; }
        .form-group input[type="radio"] { margin-right: 6px; }
        .form-group textarea { resize: vertical; }
    </style>
</head>
<body>
<?php $this->load->view('header'); ?>
<?php $active_menu = 'laboran'; ?>
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
            <div class="header-purple"><i class="fa fa-plus"></i> Tambah Laboran</div>
            <div class="form-section">
            <div id="infoMessage"><?php echo $message;?></div>
            <?php echo form_open_multipart("auth/create_user");?>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email (sebagai email login)" required value="<?php echo set_value('email'); ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password(sebagai password login)" required>
                </div>
                <div class="form-group">
                    <label for="username">Nama</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Nama" required value="<?php echo set_value('username'); ?>">
                </div>
                <div class="form-group">
                    <label>Gender</label><br>
                    <label><input type="radio" name="jenis_kelamin" value="Laki-laki" <?php echo set_radio('jenis_kelamin', 'Laki-laki', TRUE); ?>> Laki - Laki</label>
                    <label style="margin-left:20px;"><input type="radio" name="jenis_kelamin" value="Perempuan" <?php echo set_radio('jenis_kelamin', 'Perempuan'); ?>> Perempuan</label>
                </div>
                <div class="form-group">
                    <label for="company">Alamat</label>
                    <textarea name="company" id="company" class="form-control" placeholder="Alamat" required rows="3"><?php echo set_value('company'); ?></textarea>
                </div>
                <div class="form-group">
                    <label>Status Laboran</label><br>
                    <?php if(isset($groups) && !empty($groups)): ?>
                        <?php foreach($groups as $group): ?>
                            <label style="margin-right:15px;">
                                <input type="radio" name="role" value="<?php echo $group['id']; ?>" <?php echo set_radio('role', $group['id']); ?>> <?php echo htmlspecialchars($group['name'] == 'admin' ? 'Admin' : ($group['name'] == 'laboran' ? 'Laboran' : ($group['name'] == 'kepala_lab' ? 'Kepala Lab' : $group['name']))); ?>
                            </label>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="phone">No. HP</label>
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="No. HP" required value="<?php echo set_value('phone'); ?>">
                </div>
                <div class="form-group">
                    <label for="profilepict">Foto</label>
                    <input type="file" name="profilepict" id="profilepict" class="form-control-file" accept="image/*">
                </div>
                <div class="form-group" style="margin-top:32px;">
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="submit" class="btn btn-purple">Tambah Laboran</button>
                    <a href="<?php echo base_url('index.php/Users'); ?>" class="btn btn-danger" style="float:right;">Back</a>
                </div>
            <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
