<?php

namespace Animal;

abstract class Animal
{
    private const MIN_AGE = 0;
    
    private const MAX_AGE = 25;
    
    private const ALLOWED_COLOR = ['brown', 'grey', 'white', 'black'];
    
    private const ALLOWED_RACE = ['Bulldog', 'bastard'];
    
    private $color;
    
    private $race;
    
    private $age = self::MIN_AGE;
    
    public function __construct(string $color, string $race, int $age)
    {
        $this->setAge($age)
        ->setColor($color)
        ->setRace($race);
    }
    
    public function getColor()
    {
        return $this->color;
    }
    
    public function getRace()
    {
        return $this->race;
    }
    
    public function getAge()
    {
        return $this->age;
    }
    
    public function setColor($color)
    {
        if (!in_array($color, self::ALLOWED_COLOR)) {
            throw new \RuntimeException('Color not allowed');
        }
        $this->color = $color;
        return $this;
    }
    
    public function setRace($race)
    {
        if (!in_array($race, self::ALLOWED_RACE)) {
            throw new \RuntimeException('Race not allowed');
        }
        $this->race = $race;
        return $this;
    }
    
    public function setAge($age)
    {
        if ($age < self::MIN_AGE || $age >= self::MAX_AGE) {
            throw new \RuntimeException('Age have to be between 0 and 25');
        }
        $this->age = $age;
        return $this;
    }
    
    public abstract function bark();
    
    public abstract function purr();
    
    public abstract function sit();
    
    public function addOneYear()
    {
        $this->age++;
        if ($this->age >= self::MAX_AGE) {
            $this->age = self::MAX_AGE - 1;
        }
    }
}

