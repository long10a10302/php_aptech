<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>

<body>
    <?php
    require_once 'function.php';
    $usernameError = $passwordError = $confirmPasswordError   = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $passwordOld = $_POST['password-old'];
        $password = $_POST['password'];
        $user = readUser($username);
        if (empty($_POST["confirm_password"])) {
            $confirmPasswordError = "Vui lòng xác nhận mật khẩu.";
        } else {
            $confirmPassword = test_input($_POST["confirm_password"]);
            if ($password != $confirmPassword) {
                $confirmPasswordError = "Mật khẩu không khớp.";
            }
        }
        if (empty($_POST["username"])) {
            $usernameError = "Vui lòng nhập tên đăng nhập.";
        }

        if(empty($usernameError) && empty($confirmPasswordError)){
            if($user){
                if(password_verify($passwordOld,$user['password_hash'])){
                    $password_hash = password_hash($password,PASSWORD_DEFAULT);
                    $result = updateUser($username,$password_hash);
                    if($result){
                        echo 'Thay đổi mật khẩu thành công';
                    }else{
                        echo 'Thay đổi thất bại';
                    }
                }else{
                    $passwordError = "Sai mật khẩu vui lòng nhập lại";
                }
            }else{
                $usernameError = "Tên đăng nhập không tồn tại vui lòng nhập lại";
            }
        }else{
            $usernameError = 'Vui long nhap ten dang nhap';
        }
       
    }
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
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
                            <label for="password" class="form-label">Password Old</label>
                            <input type="password" class="form-control <?php echo !empty($passwordError) ? 'is-invalid' : ''; ?>" id="password" name="password-old">
                            <?php if (!empty($passwordError)) : ?>
                                <div class="invalid-feedback"><?php echo $passwordError; ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password New</label>
                            <input type="password" class="form-control <?php echo !empty($passwordError) ? 'is-invalid' : ''; ?>" id="password" name="password">
                            <?php if (!empty($passwordError)) : ?>
                                <div class="invalid-feedback"><?php echo $passwordError; ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm Password New</label>
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