<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>
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
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>