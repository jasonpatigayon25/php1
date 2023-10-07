<?php
    //JASON PATIGAYON BSIT-4
    $bdaymonth = 11;
    $bdayday = 20;
    $bdayyear = 2000;

    //1. Display your birthday(MM/DD/YYYY)
    echo $bdaymonth . "/" . $bdayday . "/" .  $bdayyear;

    //2. Display 'EVEN' if the day(DD) is even then 'ODD' if odd
    echo "<br/>";
    echo "<br/>";
    if($bdayday % 2 == 0){
        echo "EVEN";
    }
    else{
        echo "ODD";
    }   
?>