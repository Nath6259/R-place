<?php
/* 
    Cette fois ci, nos routes sont plus complexe.
    Au lieu d'être lié à un fichier, elles sont liées à un
    controller et une fonction.
*/
define("ROUTES", [
    "mvc/inscription"=>[
        "controller"=>"userController.php",
        "fonction"=>"createUser"
    ],
    "mvc/connexion"=>[
        "controller"=>"authController.php",
        "fonction"=>"connexion"
    ],
    "mvc/deconnexion"=>[
        "controller"=>"authController.php",
        "fonction"=>"deconnexion"
    ],
    "mvc/apercu"=>[
        "controller"=>"userController.php",
        "fonction"=>"apercu"
    ],
    "mvc/fresque1"=>[
        "controller"=>"userController.php",
        "fonction"=>"fresque1"
    ],
    "mvc/fresque2"=>[
        "controller"=>"userController.php",
        "fonction"=>"fresque2"
    ],
]);
?>