<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php require_once 'db.php';
    $limit = 4;
    $offset = 0;
    $items = getItemLimit($limit, $offset);
    ?>
    <table>
        <thead>
            <td>ID</td>
            <td>Name</td>
        </thead>
        <?php foreach ($items as $key => $row) { ?>
            <tr>
                <td><?= $row['ID'] ?></td>
                <td><?= $row['Name'] ?></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>