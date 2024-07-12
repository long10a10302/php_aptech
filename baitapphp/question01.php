<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Please input your name </h1>
    <form action="">
        <input type="text" name="name" id="">
        <input type="submit" value="Submit Name">
    </form>
    <?php 
    $name = isset($_GET['name']) ? $_GET['name'] : '';
    ?>
    <h3>Hello <?= $name ?></h3> 
</body>
</html>