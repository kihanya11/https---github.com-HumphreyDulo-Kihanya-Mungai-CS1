<!DOCTYPE html>
<html>
<head>
    <title>Resend Activation Email - Success</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Resend Activation Email - Success</h1>
    <p>An activation email has been successfully sent to your email address. Please check your inbox and follow the instructions to activate your account.</p>

    <script>
        // Redirect to the login page after X seconds
        setTimeout(function() {
            window.location.href = "<?php echo site_url('Log'); ?>";
        }, 2000);
    </script>
</body>
</html>
