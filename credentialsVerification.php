<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $errors = [];

        if (($_POST['email']) == Null) {

            array_push($errors, "[ERREUR] Veuillez renseigner l'email !");

        } 
        
        if (($_POST['pwd']) == !Null) {

            $pwdLength = strlen($_POST['pwd']);

            if ($pwdLength < 8) {

                array_push($errors, "[ERREUR] Veuillez renseigner un mot de passe de plus de 8 caractères !");

            }
        
        } else {

            array_push($errors, "[ERREUR] Veuillez renseigner le mot de passe !");

        }
        

        if ((!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) && (($_POST['email']) == !Null)) {

            array_push($errors, "[ERREUR] Veuillez renseigner un email valide !");

        }

        if ($errors) {

            foreach($errors as $error) {
                echo $error;
                echo "<br>";
            }            

        } else {

            echo "Email : " . $_POST['email'];

            echo "<br>";

            $hashedPassword = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
            echo "Password : " . $hashedPassword;

        }
        

    } elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {

        echo "[ERREUR] Veuillez ne pas utiliser la méthode : 'GET'.";

    } else {

        echo "[ERREUR] Veuillez ne pas utiliser la méthode : '" . $_SERVER['REQUEST_METHOD'] . "'.";

    }

?>