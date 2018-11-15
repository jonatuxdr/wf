<?php

namespace Animal;

class Cat extends Animal
{
    public function bark()
    {
        return 'Miaow ?';
    }
    
    public function purr()
    {
        return str_repeat('R', 10);
    }
    
    public function sit()
    {
        return $this->bark();
    }
}
