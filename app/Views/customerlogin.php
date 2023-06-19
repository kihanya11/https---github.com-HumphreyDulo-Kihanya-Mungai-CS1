<!DOCTYPE html>
<html>

<head>
    <title>User Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 50px;
        }

        .error {
            color: red;
        }

        div.button {
            margin-top: 20px;

        }

        div.buttons {
            margin-top: 20px;
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Login</h2>

        <form method="post" action="<?php echo base_url('Log'); ?>">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" class="form-control" required />
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" required />
            </div>

            <div class="button">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>

            <div class="buttons">
                <a href="<?php echo base_url(''); ?>" class="btn btn-primary">Forgot Password?</a>
            </div>

            <div class="buttons">
                <a href="" class="btn btn-primary">Login as Advertiser </a>
            </div>
        </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>