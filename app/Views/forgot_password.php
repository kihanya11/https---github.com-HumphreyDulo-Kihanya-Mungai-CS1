<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 50px;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .button {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Forgot Password</h2>

        <?php if (isset($success)) : ?>
            <p class="success"><?= $success ?></p>
        <?php endif; ?>

        <?php if (isset($error)) : ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>

        <form method="post" action="<?= site_url('password/reset') ?>">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="button">
                <button type="submit" class="btn btn-primary">Reset Password</button>
            </div>
        </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
