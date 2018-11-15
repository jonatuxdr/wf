<?php


use Animal\Animal;
use Animal\PetInterface;
use Animal\Dog;

spl_autoload_register(function($namespace) {
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $namespace);
    $expectedFilename = __DIR__ . DIRECTORY_SEPARATOR . $path . '.php';
    
    if (file_exists($expectedFilename)) {
        require_once $expectedFilename;
    }
});

function tryBark(Animal $animal){
    $animal->bark();
}
function tryEat(PetInterface $animal) {
    return $animal->eat('Beef');
}

$doggy = new Dog('brown', 'Bulldog', 4);
echo $doggy->eat('Cereal');












