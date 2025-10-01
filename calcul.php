<?php

    $numbers = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
    $randomNumber = rand(1, 100);

    array_push($numbers, $randomNumber);
    echo "Voici le nombre aléatoire : $randomNumber <br>";

    function sum(array $numbers) : int | float | string | Null {

        $sum = Null;
        $length = count($numbers);

        if ($length === 0) {
            return "Votre tableau est vide !";
        }

        foreach($numbers as $number) {
            $sum = $sum + $number;
        }

        return $sum;

    }

    function average(array $numbers) : int | float | string {

        $length = count($numbers);

        if ($length === 0) {
            return "Votre tableau est vide !";
        }

        $sum = array_sum($numbers);
        
        return $sum / $length;

    }

    echo "Voici le résultat de la somme : ";
    echo sum($numbers);

    echo "<br> Voici la moyenne : ";
    echo average($numbers);

?>