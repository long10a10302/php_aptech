<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require_once 'crud_functions.php';
    $id = isset($_GET['id']) ? $_GET['id'] : "";
    // Assuming you have a connection script to your database using PDO


    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = $_GET['id']; // Get the person's ID from the form (hidden input field)
        $name = htmlspecialchars($_GET['name']);
        $gender = htmlspecialchars($_GET['gender']);
        $day = htmlspecialchars($_GET['day']);

        // Call the updatePerson function
        $rowsAffected = updatePersons($id, $name, $gender, $day);

        if ($rowsAffected > 0) {
            echo "Record updated successfully";
        } else {
            echo "No changes made or update failed";
        }
    }
    ?>

    <form action="">
        Name <input type="text" name="name" id=""><br>
        Male <input type="radio" name="gender" id="male" value="Male">
        Female <input type="radio" name="gender" id="female" value="Female"><br>
        DOB: <input type="date" name="day" id=""><br>
        <input type="submit" value="Update">
    </form>
</body>

</html>