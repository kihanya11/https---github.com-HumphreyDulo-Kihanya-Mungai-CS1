<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
</head>
<body>
    <?= $this->extend('admin_layout') ?>
    <?= $this->section('content') ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="container">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Welcome to your dashboard, <?= session()->get('admin_name') ?>!</h1>
                            <p>Notifications: <span class="badge badge-primary"><?= $notificationCount ?></span></p>
                            <a href="<?= base_url('admin') ?>" class="btn btn-primary">View Notifications</a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <?= $this->endSection() ?>

   
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- AdminLTE JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
</body>
</html>
