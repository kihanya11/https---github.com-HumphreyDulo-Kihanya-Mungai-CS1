
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <h1>Welcome to the Dashboard</h1>
    <p>Notifications:<span class="badge badge-primary"><?php echo $notificationCount; ?></span></p>
    <a href="<?php echo base_url('admin'); ?>" class="btn btn-primary">View Notifications</a>
 
</body>
</html>
