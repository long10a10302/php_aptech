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
    $persons = readPersons(0, 5);
    ?>
    <table>
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>DOB</th>
            <th></th>
        </thead>
        <?php foreach ($persons as $person) { ?>
            <tr>
                <td><?= $person['id'] ?></td>
                <td><?= $person['Name'] ?></td>
                <td>
                    <?php
                    $gender = $person['Gender'] == 0 ? 'Female' : 'Male';
                    echo $gender;
                    ?>
                </td>
                <td><?= $person['DateOfBirth'] ?></td>
                <td>
                    <a href="update_person.php?id=<?= $person['id'] ?>">Update</a>
                    <a href="delete_person.php?id=<?= $person['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <a href="create_person.php">Create</a>
</body>

</html>