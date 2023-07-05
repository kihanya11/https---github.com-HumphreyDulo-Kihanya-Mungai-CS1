<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome to the Dashboard</h1>
    <p>Hello, <?= session()->get('username') ?>!</p>

    <a href = "Logout" class="btn btn-primary">Log out</a>

    <a href = "<?php echo base_url('VendorController'); ?>" class="btn btn-primary">Vendor Application</a>
</body>
</html>