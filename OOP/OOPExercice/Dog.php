<?php 

//#############################//
//######## Class Dog #########//
//############################//

class Dog {
    
    private $eat = "corquette";
    private $walkTime = 1;
    private $gender = "Male";
    
    function eat(string $food) {
        return $this->eat;
    }
    function walkTime(int $hour) {
        return $this->walkTime = 1;
    }
    function genderRecognition(string $sex) {
        return $this->gender = "Male";
    }
}

$puppy1 = new Dog();
echo "------------DOG-------------";
echo "\n";
echo $puppy1->eat("croq");
echo "\n";
echo $puppy1->walkTime(1);
echo "\n";
echo $puppy1->genderRecognition("Male");
echo "\n";