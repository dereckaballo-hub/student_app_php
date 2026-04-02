<?php
    /*
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'school');
    define('USERNAME', 'dereckaballo');
    define('PASSWORD', '52341');*/

    $host = 'localhost';
    $dbname = 'school';
    $username = 'dereckaballo';
    $password = '52341';

    try{
        
        //$pdo = new PDO("mysql:host=". DB_HOST .";dbname=". DB_NAME .";charset=utf8", USERNAME, PASSWORD);

        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }catch(PDOException $e){
        die("Erreur de connexion à la base de données");
    }
?>