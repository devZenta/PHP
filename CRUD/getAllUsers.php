<?php

    function dbConnection() {

        try {

            $db = new PDO("mysql:host=localhost;dbname=php", "root", "zenta");
            return $db;

        } catch (PDOException $e) {

            return null;

        }
    }

    function displayUsers($db) : bool {

        try {
        
            $sql = "SELECT * FROM users";
            $stmt = $db->query($sql);

            $counter = 1;

            while($row = $stmt->fetch()) {

                echo "User : " . $counter . "<br>" . "ID : " . $row['id'] . "<br>" . "Name : " . $row['name'] . "<br>" . "Email : " . $row['email'] . "<br><br>";
                $counter++;

            }

            return true;

        } catch (PDOException $e) {

            echo "Erreur : " . $e->getMessage();
            return false;

        }

    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $db = dbConnection();
        if (dbConnection() == null) {

            echo "[ERREUR] lors de la connexion avec la db";

        }

        displayUsers($db);

    } elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {

        echo "[ERREUR] Veuillez ne pas utiliser la méthode : 'GET'.";

    } else {

        echo "[ERREUR] Veuillez ne pas utiliser la méthode : '" . $_SERVER['REQUEST_METHOD'] . "'.";

    }

?>