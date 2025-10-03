<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (($_POST['name']) == Null) {

            echo "Il manque le nom."; 

        } elseif (($_POST['email']) == Null) {

            echo "Il manque l'email.";

        } else {

            echo "Name : " . $_POST['name'];
            echo "<br>";

            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

                echo "L'adresse e-mail est valide.";
                echo "Email : " .$_POST['email'];

            } else {

                echo "L'adresse e-mail n'est pas valide.";

            }

        }

    } elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {

        echo "Récupération des informations par méthode 'GET' !";
        echo "<br>";
        echo "Hello ";
        echo htmlspecialchars($_GET["name"]);

    } else {

        echo "Autre méthode : " . $_SERVER['REQUEST_METHOD'];

    }

?>