<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Days of the Week</h1>
    <form action="" method="get">
        <label for="">Please enter a day of the week:</label>
        <input type="text" name="dayOfWeek" id="">
        <input type="submit" value="">
    </form>
    <?php
        function checkString($dayOfWeek,$day){
            if(trim(strtolower($dayOfWeek)),trim(strtolower($dayOfWeek)) === 0){
                
            }
        }
        $dayOfWeek = isset($_GET['dayOfWeek']) ? $_GET['dayOfWeek'] : '';
        if(strcmp(strtoupper($dayOfWeek),strtoupper('monday'))){
            echo '<p>Laugh on Monday, laugh for danger</p>';
        }else if(strcmp(strtoupper($dayOfWeek),strtoupper('tuesday'))){
             echo '<p>Laugh on Tuesday, laugh for danger</p>';
        }else if(strcmp(strtoupper($dayOfWeek),strtoupper('wednesday'))){
            echo '<p>Laugh on Wednesday, laugh for danger</p>';
        }else if(strcmp(strtoupper($dayOfWeek),strtoupper('thursday'))){
            echo '<p>Laugh on Thursday, laugh for danger</p>';
        }else if(strcmp(strtoupper($dayOfWeek),strtoupper('friday'))){
            echo '<p>Laugh on Friday, laugh for danger</p>';
        }else{
            echo 'Nothing';
        }
    ?>
</body>
</html>