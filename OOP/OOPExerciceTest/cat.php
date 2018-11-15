<?php
//#############################//
//######## Class Cat #########//
//############################//
class Cat {
    
    private $eat;
    private $walkTime;
    private $gender;
    
    function eat(string $food) {
        return $this->eat = "paté";
    }
    function playTime(int $hour) {
        return $this->walkTime = 1;
    }
    function genderRecognition(string $sex) {
        return $this->gender = "Male";
    }
}

$puppy2 = new Cat();
echo "-------------CAT--------------";
echo "\n";
echo $puppy2->eat("paté");
echo "\n";
echo $puppy2->playTime(1);
echo "\n";
echo $puppy2->genderRecognition("Male");
echo "\n";
echo "---------------------------";
echo "\n";