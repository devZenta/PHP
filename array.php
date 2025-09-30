<?php

    $users = [
        [
            "fullName" => "Tom Julien",
            "email" => "tom.julien@gmail.com",
            "age" => 19,
            "major" => True
        ],

        [
            "fullName" => "Max",
            "email" => "max@gmail.com",
            "age" => 30,
            "major" => True
        ],

        [
            "fullName" => "Antoine",
            "email" => "antoine.castor@gmail.com",
            "age" => 16,
            "major" => False
        ],

        [
            "fullName" => "Test",
            "email" => "test@gmail.com",
            "age" => 25,
            "major" => True
        ]
    ];

    $simpleUser = 
    [
        "fullName" => "Test",
        "email" => "test@gmail.com",
        "age" => 25,
        "major" => True
    ];

    if (array_key_exists('email', $simpleUser)) {
        echo "La clé 'email' existe";
    }

    //echo $users[1]['fullName'] . ' <br> ' .$users[1]['email'];
    foreach($users as $user) {
        echo $user['fullName'] . ' / ' . $user['email'] . ' / ' . $user["age"] . ' / ' . $user['major'] . '<br>';
    }

    foreach($users as $user) {
        foreach($user as $property => $propertyValue) {
            echo '[' . $property . '] vaut ' . $propertyValue . '<br>';
        }
    }

?>