<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Praktikan</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/fontawesome/all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sidebar.css'); ?>">
    <style>
        .form-group label { font-weight: bold; }
        .btn { margin-right: 4px; }
        .table th, .table td { vertical-align: middle; text-align: center; }
        .btn-trash { background: none; border: none; color: #dc3545; }
        .btn-trash img { width: 18px; height: 18px; }
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
            <h3>Tambah Praktikan</h3>
            <form action="<?php echo base_url('index.php/Praktikan/simpan'); ?>" method="post" id="form-praktikan">
                <div class="table-responsive">
                    <table class="table table-bordered" id="praktikan-table">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama Lengkap</th>
                                <th>Alamat</th>
                                <th>Tgl Lahir</th>
                                <th>Prodi</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><input type="text" name="nim[]" class="form-control" required></td>
                                <td><input type="text" name="nama[]" class="form-control" required></td>
                                <td><input type="text" name="alamat[]" class="form-control" required></td>
                                <td><input type="date" name="tgl_lahir[]" class="form-control" required></td>
                                <td><input type="text" name="prodi[]" class="form-control" required></td>
                                <td><button type="button" class="btn-trash" onclick="removeRow(this)"><img src="<?php echo base_url('assets/img/trash.png'); ?>" alt="Hapus"></button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button type="button" class="btn btn-secondary" id="add-row">Baris baru</button>
                <button type="reset" class="btn btn-warning">Reset</button>
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
<script>
    function removeRow(btn) {
        var row = btn.closest('tr');
        var tbody = row.parentNode;
        if (tbody.rows.length > 1) {
            row.remove();
            updateRowNumbers();
        }
    }
    function updateRowNumbers() {
        $('#praktikan-table tbody tr').each(function(i, tr) {
            $(tr).find('td:first').text(i+1);
        });
    }
    $(document).ready(function() {
        $('#add-row').on('click', function() {
            var rowCount = $('#praktikan-table tbody tr').length;
            var newRow = `<tr>
                <td>${rowCount+1}</td>
                <td><input type="text" name="nim[]" class="form-control" required></td>
                <td><input type="text" name="nama[]" class="form-control" required></td>
                <td><input type="text" name="alamat[]" class="form-control" required></td>
                <td><input type="date" name="tgl_lahir[]" class="form-control" required></td>
                <td><input type="text" name="prodi[]" class="form-control" required></td>
                <td><button type="button" class="btn-trash" onclick="removeRow(this)"><img src="<?php echo base_url('assets/img/trash.png'); ?>" alt="Hapus"></button></td>
            </tr>`;
            $('#praktikan-table tbody').append(newRow);
        });
        // Reset: hapus semua baris kecuali satu
        $('#form-praktikan').on('reset', function() {
            setTimeout(function() {
                var tbody = $('#praktikan-table tbody');
                tbody.html('');
                var newRow = `<tr>
                    <td>1</td>
                    <td><input type="text" name="nim[]" class="form-control" required></td>
                    <td><input type="text" name="nama[]" class="form-control" required></td>
                    <td><input type="text" name="alamat[]" class="form-control" required></td>
                    <td><input type="date" name="tgl_lahir[]" class="form-control" required></td>
                    <td><input type="text" name="prodi[]" class="form-control" required></td>
                    <td><button type="button" class="btn-trash" onclick="removeRow(this)"><img src="<?php echo base_url('assets/img/trash.png'); ?>" alt="Hapus"></button></td>
                </tr>`;
                tbody.append(newRow);
            }, 1);
        });
    });
</script>
</body>
</html> 