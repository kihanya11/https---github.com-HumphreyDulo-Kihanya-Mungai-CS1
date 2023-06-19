<!DOCTYPE html>
<html>
<head>
    <title>Resend Activation Email - Error</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Resend Activation Email - Error</h1>
    <p>There was an error resending the activation email. Please make sure you have entered the correct email address and try again later.</p>

    <script>
        // Redirect to the register page after 4 seconds
        setTimeout(function() {
            window.location.href = "<?php echo site_url('register'); ?>";
        }, 4000);
    </script>
</body>
</html>
