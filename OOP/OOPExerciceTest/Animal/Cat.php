<?php 


namespace Animal;

/**
 * Exercice :
 * Update Dog
 * Each setter MUST validate the input
 * The allowed inputs MUST be defined in public constants
 * 
 * @author deriemaeckerjonathan
 *
 */

class Cat {
    //Put constant before the propreties, it's a convention, can be retrieve outside of the class (snake case by convention), array_keys + const = snake case, the rest camel case
    // const to private, public etc... only work in PHP7 !!!!!!
    private const MIN_AGE = 0;
    private const MAX_AGE = 25;
    
    //proprety attached to class directly ()
    // static : will attah the proprety to the class directly and not to the object
    // on devrais être cpable de ne jamais faire de static !!!!!!!!!!!!
    private const ALLOWED_COLOR = ["brown", "grey", "blue", "white", "black"];
    private const ALLOWED_RACE = ["Russe", "Persan", "Siamois", "Ragdoll", "Abyssin"];
    
    //class can have static function
    /*
    public static function setAllowedColor(array $colors) {
        self::ALLOWED_COLOR = $colors;
    }
    public static function setAllowedRace(string $race) {
        self::ALLOWED_RACE = $race;
    }
    */
    
    private $color;
    private $race;
    private $age = Cat::MIN_AGE;
    // Can put Cat::MAX_AGE but also can put self::MAX_AGE (when it's static, 
    // car on a qu'une seul class et PHP sais que self correspond seulement a la classe correspondante !
    //this référence à l'objet et self to the Class
    
    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @return mixed
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color)
    {
        if (!in_array($color, self::ALLOWED_COLOR)) {
            throw new \RuntimeException("You've put the wrong color input !");
        }
        
        $this->color = $color;
    }

    /**
     * @param mixed $race
     */
    public function setRace($race)
    {
        if (!in_array($race, self::ALLOWED_RACE)) {
            throw new \RuntimeException("You've put the wrong race input.");
        }
        $this->race = $race;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        if ($age < Cat::MIN_AGE || $age >= Cat::MAX_AGE) {
            // backslash means the path of the namespace !!!!!!!!!
            // 0 and 25 are some constant, these information have this one time in the code
            throw new \RuntimeException("Here I throw an exception ! Age have to be between 0 and 25.");
        }
        $this->age = $age;
    }

    public function addOneYear(){
        $this->age++;
        if ($this->age >= Cat::MAX_AGE) {
            $this->age = Cat::MAX_AGE - 1;
        }
    }
    
    public function bark() {
        return "Miaow ?";
    }
    
    public function purr() {
        // faut éviter de mettre echo dans la fonction !!!!!!!!!!!!!!
        return str_repeat("R", 10) . "!";
    }
    
    public function sit() {
        return $this->bark();
    }
    
}

$catsy = new Cat();
$catsy->setAge("3");
$catsy->setColor("blue");
$catsy->setRace("Abyssin");

echo $catsy->getColor();
echo "\n";
echo $catsy->getAge();
echo "\n";
echo $catsy->getRace();
echo "\n";
echo $catsy->purr();
echo "\n";
//var_dump($catsy);

$sna = new Cat();

$sna->addOneYear();

//$cat1 = new Cat();
//$cat2 = new Cat();

//$cat1::$allowedColor = ["brown", "grey", "yellow", "white", "black"];

//Not attached to the instantiate objetc of the class, it's attached to the class himself (it's shared between each object = that's what static mean !)
//var_dump($cat2::$allowedColor);
//var_dump(Cat::$allowedColor);

// ????????????????????????????????????????????????????
//it's the faster
//array_push($cat1::$allowedColor, "yellow");
//it's the faster

//here it's an additional value because the brackets are empty
//$cat1::$allowedColor[] = "yellow";
//$cat1::$allowedColor = array_merge($cat1::$allowedColor, ['yellow']);
// ????????????????????????????????????????????????????

//Cat::setAllowedColor($colors);
//$cat1::setAllowedColor($colors);

//for each contant use this double column (= Paamayim Nekudotayi = ça veut dire double column, can also get the error as named !!!!!), on peut utiliser la constante en dehors de la Class
//by default constant is public 
//echo "\n";
//echo Cat::MAX_AGE;