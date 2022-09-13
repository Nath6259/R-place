<?php

function connexionPDO() : PDO{

    $config = require __DIR__ . "/_blogConfig.php"; // il nous faut une BDD

$dsn = 
"mysql:host=".$config["host"]
.";dbname=" .$config["database"]
.";charset=" .$config["charset"]; 
try{
   
    $pdo = new PDO(
        $dsn,
        $config["user"],
        $config["password"],
        $config["options"],
    );

    return $pdo;
}catch(PDOExeption $e){
 
throw new PDOExeption(
            $e->getMessage(),
            (int)$e->getCode()
        );
}
}

function cleanData(string $data): string{
$data=trim($data);
$data=stripslashes($data);
return htmlspecialchars($data);
}
?>