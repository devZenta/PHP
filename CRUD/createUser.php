<?php

    function checkName(string $key) : array {

        $errors = [];

        if (empty($key) || ctype_digit($key)) {

            array_push($errors, "[ERREUR] : Le name n'est pas valide");

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

    function checkPwd(string $password) : array {

        $errors = [];

        if (strlen($password) < 8) {
            array_push($errors, "[ERREUR] : Le mot de passe doit contenir au moins 8 caractères");
        }

        return $errors;

    }

    function formCheck(string $name, string $email, string $password) : array {

        $allErrors = [];

        $allErrors = array_merge($allErrors, checkName($name));
        $allErrors = array_merge($allErrors, checkEmail($email));
        $allErrors = array_merge($allErrors, checkPwd($password));

        return $allErrors;

    }

    function dbConnection() {

        try {

            $db = new PDO("mysql:host=localhost;dbname=php", "root", "zenta");
            return $db;

        } catch (PDOException $e) {

            return null;

        }
    }

    function createUser(string $name, string $email, string $password, $db) : bool {

        try {

            $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
            $stmt = $db->prepare($sql);
            
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt->execute(['name' => $name, 'email' => $email, 'password' => $hashedPassword]);

            return true;

        } catch (PDOException $e) {

            echo "Erreur lors de la création du compte: " . $e->getMessage();
            return false;

        }

    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $errors = formCheck(
            $name,
            $email,
            $password
        ); 

        if ($errors) {

            foreach($errors as $error) {

                echo "$error <br>";

            }

        } else {

            $db = dbConnection();
            if (dbConnection() == null) {

                echo "[ERREUR] lors de la connexion avec la db";

            }

            $created = createUser($name, $email, $password, $db);

            if ($created === true) {

                echo "Création du compte avec succés";

            } else {

                echo "[ERREUR] lors de la création de votre compte";

            }

        }

    } elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {

        echo "[ERREUR] Veuillez ne pas utiliser la méthode : 'GET'.";

    } else {

        echo "[ERREUR] Veuillez ne pas utiliser la méthode : '" . $_SERVER['REQUEST_METHOD'] . "'.";

    }

?>