<?php 

    $db = new PDO("mysql:host=localhost;dbname=php", "root", "zenta");
    $sql = "SELECT * FROM user";
    $stmt = $db->query($sql);

    $counter = 1;

    while($row = $stmt->fetch()) {

        echo "User : " . $counter . "<br>" . "ID : " . $row['id'] . "<br>" . "Name : " . $row['name'] . "<br>" . "Mail : " . $row['mail'] . "<br><br>";
        $counter++;

    }

    $sql = "INSERT INTO user (name, mail) VALUES (:name, :mail)";
    $stmt = $db->prepare($sql);
    $stmt->execute(['name' => 'Alice', 'mail' => 'alice@gmail.com']);

?>