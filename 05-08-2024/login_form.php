<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php
    require_once 'function.php';
    $usernameError = $passwordError = "";
    $username = $password = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        
        if (empty($username)) {
            $usernameError = "Vui lòng nhập tên đăng nhập.";
        } else {
            $user =readUser($username);
            if ($user) {
                if (password_verify($password, $user['password_hash'])) {
                    header('Location: home.php');
                    session_start();
                    $_SESSION['logined'] = true;
                    exit;
                } else {
                    $passwordError = "Mật khẩu không chính xác. Vui lòng nhập lại.";
                }
            } else {
                $usernameError = "Tên đăng nhập không chính xác. Vui lòng nhập lại.";
            }
        }
    }
    ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control <?php echo !empty($usernameError) ? 'is-invalid' : ''; ?>" id="username" name="username">
                                <?php if (!empty($usernameError)) : ?>
                                    <div class="invalid-feedback"><?php echo $usernameError; ?></div>
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
                                <a href="login_forgot.php" class="float-right">Forgot password?</a>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>