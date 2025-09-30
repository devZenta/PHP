<?php
    $name = "Hugo";
    $age = 19;

    $isMajor = Null;

    if ($age >= 18) {
        $isMajor = True;
    } else {
        $isMajor = False;
    }
    
    echo "Name : $name, Age : $age, Major : " . ($isMajor ? 'Yes' : 'No');
?>