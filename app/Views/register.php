<!DOCTYPE html>
<html>

<head>
  <title>User Registration</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .container {
      margin-top: 50px;
    }

    .error {
      color: red;
    }
  </style>
</head>

<body>
  <div class="container">
    <h2>User Registration</h2>
    <form method="post" action="<?php echo base_url('Auth'); ?>">

      <div class="form-group">
        <label for="firstname">First Name:</label>
        <input type="text" name="firstname" class="form-control" required />
        <?php if (isset($validation)): ?>
          <small class="text-danger">
            <?= $validation->getError('firstname') ?>
          </small>
        <?php endif; ?>
      </div>
      <div class="form-group">
        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname" class="form-control" required />
        <?php if (isset($validation)): ?>
          <small class="text-danger">
            <?= $validation->getError('lastname') ?>
          </small>
        <?php endif; ?>
      </div>
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" name="username" class="form-control" required />
        <?php if (isset($validation)): ?>
          <small class="text-danger">
            <?= $validation->getError('username') ?>
          </small>
        <?php endif; ?>
      </div>
      <div class="form-group">
        <label for="dob">Date of Birth</label>
        <input type="text" name="dob" class="form-control" required />
        <?php if (isset($validation)): ?>
          <small class="text-danger">
            <?= $validation->getError('dob') ?>
          </small>
        <?php endif; ?>
      </div>
      <div class="form-group">
        <label for="number">Phone number</label>
        <input type="text" name="number" class="form-control" required />
        <?php if (isset($validation)): ?>
          <small class="text-danger">
            <?= $validation->getError('number') ?>
          </small>
        <?php endif; ?>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" name="email" class="form-control" required />
        <?php if (isset($validation)): ?>
          <small class="text-danger">
            <?= $validation->getError('email') ?>
          </small>
        <?php endif; ?>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" class="form-control" required />

        <?php if (isset($validation)): ?>
          <small class="text-danger">
            <?= $validation->getError('password') ?>
          </small>
        <?php endif; ?>
        
      </div>
      <div class="form-group">
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" name="confirm_password" class="form-control" required />
        <?php if (isset($validation)): ?>
          <small class="text-danger">
            <?= $validation->getError('confirm_password') ?>
          </small>
        <?php endif; ?>
      </div>
      <button type="submit" class="btn btn-primary">Register</button>
      <p>Already have an account? <a href="<?php echo base_url('/login'); ?>">Login</p>
    </form>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>