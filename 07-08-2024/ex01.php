<?php
$days_in_week = 7;
echo "There are " . $days_in_week . " days in a week";

function isPrime($num){
    if($num < 1){
        return false;
    }

    for($i = 2; $i <= sqrt($num); $i++){
        if($num % $i == 0){
            return false;
        }
    }
    return true;
}

$num = 29;

if(isPrime($num)){
    echo  "<br>" . "The number " . $num . " is prime";
}else{
    echo  "<br>" . "The number " . $num . " is not prime";
}