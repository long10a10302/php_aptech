<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Form</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>


    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2>Input Employee Information</h2>
        Employee No: <input type="text" name="employeeNo" id="employeeNo"><br><br>
        Name: <input type="text" name="name" id="name"><br><br>
        Place Of Work: <input type="text" name="placeOfWork" id="placeOfWork"><br><br>
        Phone No: <input type="text" name="phoneNo" id="phoneNo"><br><br>
        <input type="submit" value="Add New">
    </form>
    <br>
    <a href="list.php">Back To List</a>

    <?php
    $errors = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["employeeNo"])) {
            $errors[] = "You must input employee number";
        }
        if (empty($_POST["name"])) {
            $errors[] = "You must input employee name";
        }
        if (empty($_POST["placeOfWork"])) {
            $errors[] = "You must input place of work";
        }
        if (empty($_POST["phoneNo"])) {
            $errors[] = "You must input phone number";
        }
    }

    if (!empty($errors)) {
        echo '<ul class="error">';
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo '</ul>';
    }
    ?>
</body>

</html>