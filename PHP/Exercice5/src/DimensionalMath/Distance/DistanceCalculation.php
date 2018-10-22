<?php
namespace DimensionalMath\Distance;

function subSquare($x, $y) {
    return pow($x, 2) - (2 * $x * $y) + pow($y, 2);
}

//pow = exposant

function threeDimensionDistance($pointA, $pointB) {
    list($ax, $ay, $az) = $pointA;
    list($bx, $by, $bz) = $pointB;
    return sqrt(subSquare($ax, $bx) + subSquare($ay, $by) + subSquare($az, $bz));
    //$pointA (array contenant 3 valeurs) est assigné aux 3 variable de la liste
}

//sqrt = racine carré
