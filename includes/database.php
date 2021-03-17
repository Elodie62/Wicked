<?php


/*Connexion à la base de données */
    function getPDO() {
    try {
        
            $pdo = new PDO("mysql:dbname=espace_membres;host=127.0.0.1;port=8889", "root", "root");
            $pdo->exec("SET CHARACTER SET utf8");
            return $pdo;

    } catch(PDOException $e) {
        die($e->getMessage());
    }
 }



function countDatabaseValue($connexionBDD, $key, $value) {
    $request= "SELECT * FROM membres WHERE $key= ?";
    $rowCount= $connexionBDD ->prepare ($request);
    $rowCount->execute(array($value));
    return $rowCount -> rowCount();
}



?>