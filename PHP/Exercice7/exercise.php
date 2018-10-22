<?php

function divide(int $num, int $denom) : float {
    if ($denom === 0) {
        throw new RuntimeException('Division by 0 is not allowed');
        
    }
    return $num/$denom;
}


function arrayDivide(array $numArray, int $denom) : array {
    $result = [];
    
    foreach ($numArray as $num){
        try {
            //echo 3;
            $result[] = divide($num, $denom);
            
            //echo 4;
        } catch (RuntimeException $exception) {
            echo $exception->getMessage();
            $result[] = $num;
        }
    }
    return $result;
}