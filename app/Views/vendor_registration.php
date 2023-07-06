<!DOCTYPE html>
<html>

<head>
    <title>Vendor Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Vendor Registration</h2>
        <?php if (isset($validation)): ?>
            <div class="alert alert-danger">
                <?php echo $validation->listErrors(); ?>
            </div>
        <?php endif; ?>
        <form action="<?php echo base_url('VendorController/register'); ?>" method="post">
            <div class="form-group">
                <label for="vendor_id">ID Number</label>
                <input type="text" id="vendor_id" name="vendor_id" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="number">Phone number</label>
                <input type="text" id="number" name="number" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" class="form-control" required>
            </div>
         
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>