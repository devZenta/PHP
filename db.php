<?php

    try {

        $db = new PDO("mysql:host=localhost;dbname=php", "root", "zenta");

        echo "Connexion réussie";

    } catch (PDOException $e) {

        echo "Erreur : " . $e->getMessage();

    }

?>