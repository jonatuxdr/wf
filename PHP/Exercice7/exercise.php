<?php

//input/output type hint 

//Envoie input int -> output de la fct peut être float/int
function divide(int $num, int $denom) : float {
    if ($denom === 0) {
        //envoie l'exception et il faut la catcher avant qu'elle n'arrive au core système de PHP
        throw new RuntimeException('Division by 0 is not allowed');
    }
    return $num/$denom;
}


//Envoie input array/int -> output de la fct doit être array
function arrayDivide(array $numArray, int $denom) : array {
    $result = [];
    
    foreach ($numArray as $num){
        try {
            //Je rappel la fonction divide avec les valeurs individuelles de l'array que je divise
            //echo 3;
            $result[] = divide($num, $denom);
            //echo 4;
            //Si je divise par 0 envoie l'exception pour la catcher 
        } catch (RuntimeException $exception) {
            echo $exception->getMessage();
            $result[] = $num;
            //Store le numérateur (non divisé) divisé par le 0
        }
    }
    return $result;
}