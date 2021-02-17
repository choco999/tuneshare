<?php

try {
    // try to connect to database
    // data sourse name
    $dsn = 'mysql:host=localhost;
    dbname=comp1006'; 
    $username= 'root';
    $password = '';

    // create instance of PDO
    $db = new PDO($dsn, $username,$password);
    echo 'Connected successfully';
}
catch(PDOException $e){
    // display error message if things go wrong
    $error_message = $e->getMessage();
    echo 'Something went wrong' . $error_message;
}





?>