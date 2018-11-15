<?php 

//require_once 'Animal/Dog.php';
//require_once 'Animal/Cat.php';

//autoloading function is that if i remove the require i will say ok you don't have the class so try to use this own !
function autoload($namespace) {
    $path = str_replace("\\", DIRECTORY_SEPARATOR, $namespace);
    $expectedFileName = __DIR__ . DIRECTORY_SEPARATOR . $path . '.php';
    
    if (file_exists($expectedFileName)) {
        require_once $expectedFileName;
    }
}
spl_autoload_register('autoload');

use Animal\Dog;
use Animal\Cat;

$dog = new Dog("brown", "buldog français", "2");
$cat = new Cat();

echo "\n";
echo sprintf(
    'The dog say : %s and the cat say : %s',
    $dog->bark(),
    $cat->purr()
);
echo "\n";