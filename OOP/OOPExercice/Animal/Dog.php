<?php 


namespace Animal;

class Dog {
    
    /**
     * 
     * @var $color;
     * @var $race;
     * @var $age;
     */
    
    private $color;
    private $race;
    private $age;
    
    private const MIN_AGE = 0;
    private const MAX_AGE = 25;
    private const ALLOWED_RACE = ["buldog français", "buldog anglais", "bastards", "Berger Allemand"];
    private const ALLOWED_COLOR = ["white", "black", "grey", "brown"];
    
    // __construct always public !!!!!!
    /**
     * 
     * @param string $color
     * @param string $race
     * @param int $age
     */
        // Jquery : $('.class').parent().parent().prop('class') : principle = fluent interface ???????????????????????????
        // in PHP we use fluent interface for the setters !!!!
    public function __construct(string $color, string $race, int $age) {
        $this->setAge($age)
            ->setColor($color)
            ->setRace($race);
    }
    
    /**
     * Function to get the color of the Dog
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }
    
    /**
     * Get the race of the Dog
     * @return mixed
     */
    public function getRace()
    {
        return $this->race;
    }
    
    /**
     * Get the age of the Dog
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }
    
    /**
     * Set the color of the Dog
     * @param mixed $color
     * @return $this
     */
    public function setColor(string $color)
    {
        if (!in_array($color, Dog::ALLOWED_COLOR)) {
            throw new \RuntimeException("It's not the right color input");
        }
        $this->color = $color;
        return $this;
    }
    
    /**
     * Set the race of the Dog
     * @param mixed $race
     * @return $this
     */
    public function setRace($race)
    {
        if (!in_array($race, Dog::ALLOWED_RACE)) {
            throw new \RuntimeException("You've typed the wrong input for the race");
        }
        $this->race = $race;
        return $this;
    }
    
    /**
     * Set the age of the Dog
     * @param mixed $age
     * @return $this
     */
    public function setAge($age)
    {
        if ($age < Dog::MIN_AGE || $age >= Dog::MAX_AGE) {
            // backslash means the path of the namespace !!!!!!!!!
            // 0 and 25 are some constant, these information have this one time in the code
            throw new \RuntimeException("Here I throw an exception ! Age have to be between 0 and 25.");
        }
        $this->age = $age;
        return $this;
    }
    
    //3 function of other actions
    
    public function bark() {
        return "Wouaffff ?";
    }
    
    public function purr() {
        // faut éviter de mettre echo dans la fonction !!!!!!!!!!!!!!
        return 'Attack';
    }
    
    public function sit() {
        return "";
    }
   
    // usecase : 
    /*public function __destruct() {
        //echo "I'm destructed";
    }*/
}
/*
$bebe = new Dog();

echo $bebe->setColor("white");

echo $bebe->setAge("8");
echo $bebe->setRace("buldog anglais");

echo $bebe->getColor();
echo "\n";
echo $bebe->getAge();
echo "\n";
echo $bebe->getRace();
echo "\n";
*/

// at the instantiation i want to instantiate directly the dog with the set parameters
$bebe = new Dog("brown", "buldog français", 13);
var_dump($bebe);