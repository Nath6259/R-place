<?php 
/*
    Ce fichier va contenir toute les informations de connexion à votre BDD.
    Faites bien attention à ce qu'il ne soit pas accessible par vos utilisateurs sinon ils auront accès à votre BDD.
    Pour cela plusieurs possibilité, utiliser un routeur ou bien ranger ce fichier hors de la racine de votre site par exemple.
*/
return [
   
    "host" => "localhost",
    
    "database" => "rplace",
    
    "user"=>"root",
    
    "password"=>"",
    
    "charset"=>"utf8mb4",
   
    "options"=>[
    
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
     
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
       
        PDO::ATTR_EMULATE_PREPARES => false
    ]
];

?>