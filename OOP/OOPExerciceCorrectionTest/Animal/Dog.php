<?php

namespace Animal;

class Dog extends Animal implements PetInterface
{
    public function purr()
    {
        return 'Attack';
    }

    public function bark()
    {
        return 'Ouaf Ouaf';
    }

    public function sit()
    {
        return '';
    }
    
    public function eat($whet)
    {
        return 'Need to go outside';
    }
}

