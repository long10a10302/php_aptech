<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $weather_type = ['sunny','rainy','cloudy','snowy'];

    foreach ($weather_type as $weather ){
        echo "<li>" . $weather . "</li>";
    }

    $prices = ['Milk' => 1.99, 'Eggs' => 2.50, 'Bread' => 1.50];

    foreach($prices as $item => $price){
        $discounted_price = $price * 0.9;
        echo "The original price of " . $item . " was " . $price . " and the new discounted price is " . $discounted_price ."<br>"; 
    }
    ?>
</body>
</html>