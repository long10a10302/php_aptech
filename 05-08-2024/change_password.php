<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>
<body>
<div class="container my-5">
        <h1 class="text-center mb-4">Register</h1>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h2 class="mb-4">Registration Form</h2>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control <?php echo !empty($usernameError) ? 'is-invalid' : ''; ?>" id="username" name="username">
                            <?php if (!empty($usernameError)) : ?>
                                <div class="invalid-feedback"><?php echo $usernameError; ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" class="form-control <?php echo !empty($phoneError) ? 'is-invalid' : ''; ?>" id="phone" name="phone">
                            <?php if (!empty($phoneError)) : ?>
                                <div class="invalid-feedback"><?php echo $phoneError; ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control <?php echo !empty($passwordError) ? 'is-invalid' : ''; ?>" id="password" name="password">
                            <?php if (!empty($passwordError)) : ?>
                                <div class="invalid-feedback"><?php echo $passwordError; ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control <?php echo !empty($confirmPasswordError) ? 'is-invalid' : ''; ?>" id="confirm_password" name="confirm_password">
                            <?php if (!empty($confirmPasswordError)) : ?>
                                <div class="invalid-feedback"><?php echo $confirmPasswordError; ?></div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>