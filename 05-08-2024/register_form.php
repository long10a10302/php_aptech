<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <?php
    require_once('db_connect.php');
    $pdo = getPDO();
    if (!$pdo) {
        echo 'Connection failed';
    }

    $sql = 'SELECT * FROM users';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
    $usernameError = $passwordError = $confirmPasswordError = $phoneError = "";
    $username = $password = $confirmPassword = $phone = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        foreach ($result as $row){
            if ($row['username'] == $username) {
                $usernameError = 'Tên đăng nhập đã tồn tại vui lòng nhập lại';
            }
            if($row['phone'] == $phone){
                $phoneError = 'Số điện thoại đã tồn tại vui lòng nhập lại';
            }
        }
        // Validate username
        if (empty($_POST["username"])) {
            $usernameError = "Vui lòng nhập tên đăng nhập.";
        } else {
            $username = test_input($_POST["username"]);
            // Kiểm tra username có hợp lệ không
            if (!preg_match("/^[a-zA-Z-' ]*$/", $username)) {
                $usernameError = "Tên đăng nhập chỉ được chứa chữ cái và khoảng trắng.";
            }
        }

        // Validate password
        if (empty($_POST["password"])) {
            $passwordError = "Vui lòng nhập mật khẩu.";
        } else {
            $password = test_input($_POST["password"]);
            // Kiểm tra mật khẩu có đủ độ dài không
            if (strlen($password) < 8) {
                $passwordError = "Mật khẩu phải có ít nhất 8 ký tự.";
            }
        }

        // Validate confirm password
        if (empty($_POST["confirm_password"])) {
            $confirmPasswordError = "Vui lòng xác nhận mật khẩu.";
        } else {
            $confirmPassword = test_input($_POST["confirm_password"]);
            if ($password != $confirmPassword) {
                $confirmPasswordError = "Mật khẩu không khớp.";
            }
        }

        // Validate phone
        if (empty($_POST["phone"])) {
            $phoneError = "Vui lòng nhập số điện thoại.";
        } else {
            $phone = test_input($_POST["phone"]);
            // Kiểm tra số điện thoại có hợp lệ không
            if (!preg_match("/^[0-9]*$/", $phone)) {
                $phoneError = "Số điện thoại chỉ được chứa chữ số.";
            }
        }

        // Nếu không có lỗi, có thể xử lý dữ liệu
        if (empty($usernameError) && empty($passwordError) && empty($confirmPasswordError) && empty($phoneError)) {
            echo "Đăng ký thành công!";
            // Xử lý dữ liệu ở đây
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username, password_hash, phone) VALUES (:username,:password_hash,:phone)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['username'=>$username,'password_hash'=>$password_hash ,'phone'=>$phone]);
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

    <!-- Hiển thị form như trước -->
    <div class="container my-5">
        <h1 class="text-center mb-4">Register</h1>
        <!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <style>
        .form-control.is-invalid {
            border-color: #dc3545;
            padding-right: calc(1.5em + 0.75rem);
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.1875rem) center;
            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4">Registration Form</h2>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control <?php echo !empty($usernameError) ? 'is-invalid' : ''; ?>" id="username" name="username" >
                        <?php if(!empty($usernameError)): ?>
                        <div class="invalid-feedback"><?php echo $usernameError; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control <?php echo !empty($passwordError) ? 'is-invalid' : ''; ?>" id="password" name="password" >
                        <?php if(!empty($passwordError)): ?>
                        <div class="invalid-feedback"><?php echo $passwordError; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control <?php echo !empty($confirmPasswordError) ? 'is-invalid' : ''; ?>" id="confirm_password" name="confirm_password" >
                        <?php if(!empty($confirmPasswordError)): ?>
                        <div class="invalid-feedback"><?php echo $confirmPasswordError; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="tel" class="form-control <?php echo !empty($phoneError) ? 'is-invalid' : ''; ?>" id="phone" name="phone" >
                        <?php if(!empty($phoneError)): ?>
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>