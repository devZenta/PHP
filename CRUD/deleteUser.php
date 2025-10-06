<?php

    function login($email, $password, $db) {

        try {

            $sql = "SELECT * FROM users WHERE email = :email";
            $stmt = $db->prepare($sql);
            $stmt->execute(['email' =>$email]);

            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                $id = $user['id'];
                return $id;

            }
            
            return false;

        } catch (Exception $e) {

            return false;

        }
    }

    function deleteUser($id, $db) : bool {

        try {

            $sql = "DELETE FROM users WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->execute(['id' => $id]);


            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {

            return false;

        }

    }

    function dbConnection() {

        try {

            $db = new PDO("mysql:host=localhost;dbname=php", "root", "zenta");
            return $db;

        } catch (PDOException $e) {

            return null;

        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $db = dbConnection();
        if ($db == null) {

            die("[ERREUR] lors de la connexion avec la db");

        }

        $user = login($email, $password, $db);
        if ($user === false) {

            die("[ERREUR] lors de la connexion avec votre compte");

        }

        $accountDeletion = deleteUser($user, $db);
        if ($accountDeletion === true) {

            echo "Votre compte a bien été supprimé";

        } else {

            echo "[ERREUR] lors de la suppression de votre compte";

        }

    } elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {

        echo "[ERREUR] Veuillez ne pas utiliser la méthode : 'GET'.";

    } else {

        echo "[ERREUR] Veuillez ne pas utiliser la méthode : '" . $_SERVER['REQUEST_METHOD'] . "'.";

    }

?>