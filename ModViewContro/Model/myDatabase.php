<?php 
    $dsn = "confidential";
    $user = "confidential";
    $password = "confidential";
        
    try {
        $db = new PDO( $dsn, $user, $password );
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch ( PDOException $e ) {                                       //If error were to be caught by PDOException event $e, get it's error message $e->getMessage()
        $error_message = $e->getMessage();                              //and display message stored on $error_message.
        echo $error_message;
    }
?>