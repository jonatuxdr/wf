<?php 

class Monkey {
    private $hairColor = "orange";
    private $species;
    private $habitat;
    
    /**
     * @return mixed
     */
    public function getHairColor(string $color)
    {
        $allowedColors = ["orange", "brown", "black", "grey"];
        if (!in_array($color, $allowedColors)) {
            throw new RuntimeException("Color ".$color." not allowed");
        }
        return $this->hairColor = $color;
    }

    /**
     * @return mixed
     */
    public function getSpecies()
    {
        return $this->species;
    }

    /**
     * @return mixed
     */
    public function getHabitat()
    {
        return $this->habitat;
    }

    /**
     * @param mixed $hairColor
     */
    public function setHairColor($hairColor)
    {
        $this->hairColor = $hairColor;
    }

    /**
     * @param mixed $species
     */
    public function setSpecies($species)
    {
        $this->species = $species;
    }

    /**
     * @param mixed $habitat
     */
    public function setHabitat($habitat)
    {
        $this->habitat = $habitat;
    }  
    
}