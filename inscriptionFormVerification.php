<?php

    function checkPrimaryInformation(string $key) : array {

        $errors = [];

        if (empty($key) || ctype_digit($key)) {

            array_push($errors, "[ERREUR] : $key n'est pas valide");

        }

        return $errors;

    }

    function checkEmail(string $email) : array {

        $errors = [];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "[ERREUR] : L'email n'est pas valide");
        }

        return $errors;

    }

    function checkPwd(string $password, string $confirmationPassword) : array {

        $errors = [];

        if (strlen($password) < 8) {
            array_push($errors, "[ERREUR] : Le mot de passe doit contenir au moins 8 caractères");
        }

        if ($password !== $confirmationPassword) {
            array_push($errors, "[ERREUR] : Les mots de passe ne sont pas identiques");
        }

        return $errors;

    }

    function formCheck(string $firstname, string $lastname, string $username, string $email, string $password, string $confirmationPassword) : array {

        $allErrors = [];

        $allErrors = array_merge($allErrors, checkPrimaryInformation($firstname));
        $allErrors = array_merge($allErrors, checkPrimaryInformation($lastname));
        $allErrors = array_merge($allErrors, checkPrimaryInformation($username));
        $allErrors = array_merge($allErrors, checkEmail($email));
        $allErrors = array_merge($allErrors, checkPwd($password, $confirmationPassword));

        return $allErrors;

    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $errors = formCheck(
            $_POST['firstname'],
            $_POST['lastname'],
            $_POST['username'],
            $_POST['email'],
            $_POST['password'],
            $_POST['confirmation_password']
        );

        if ($errors) {

            foreach($errors as $error) {

                echo "$error <br>";

            }

        } else {

            echo "Votre formulaire a été enregistré avec succés";

        }


    } elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {

        echo "[ERREUR] Veuillez ne pas utiliser la méthode : 'GET'.";

    } else {

        echo "[ERREUR] Veuillez ne pas utiliser la méthode : '" . $_SERVER['REQUEST_METHOD'] . "'.";

    }

?>