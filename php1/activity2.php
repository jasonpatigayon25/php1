<?php
    //JASON PATIGAYON BSIT-4
    //Create a function that will return the square root of the every number from 1-n.
    //Function should return array
    
    function squareRoots($N) {
        $result = array();
        for ($i = 1; $i <= $N; $i++) {
            $result[] = sqrt($i);
        }
        return $result;
    }
    
    $N = 20;
    //squareRoots($N);
    
    echo "Square Roots (N = $N): <br><br>";

    foreach (squareRoots($N) as $squareRoot) {
        echo "<b> $squareRoot </b> ";
        echo "<br>";
    }

?>