<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome to the Dashboard</h1>
    <p>Hello, <?= session()->get('username') ?>!</p>

    <a href = "Logout" class="btn btn-primary">Log out</button>
</body>
</html>