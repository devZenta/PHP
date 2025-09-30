<?php

    $recipes = [

        [
            'title' => 'Cassoulet',
            'recipe' => 'Etape 1 : des flageolets !',
            'author' => 'maxence.vast@gmail.com',
            'isEnabled' => true,
        ],

        [
            'title' => 'Couscous',
            'recipe' => 'Etape 1 : de la semoule',
            'author' => 'laurent.castor@gmail.com',
            'isEnabled' => false,
        ],

        [
            'title' => 'Escalope milanaise',
            'recipe' => 'Etape 1 : prenez une belle escalope',
            'author' => 'tom.julien@gmail.com',
            'isEnabled' => true,
        ],

    ];

    foreach($recipes as $recipe) {
        if (array_key_exists('isEnabled', $recipe)) {
            if ($recipe['isEnabled'] == true) {
                echo 'Titre : ' . $recipe['title'] . '<br>' . 'Recette : ' . $recipe['recipe'] . '<br>' . 'Auteur : ' . $recipe['author'] . '<br><br>';
            } 
        }
    }

?>