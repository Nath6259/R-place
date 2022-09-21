<?php
/**
 * Gère la page d'inscription
 *
 * @return void
 */
function creatUser() :void{
    require __DIR__."../../services/islogged.php";
    islogged(false, "/mvc");

    $username = $email = $password = "";
    $error = [];
    $regexPass = "/^(?=.[!?@#$%^&+-])(?=.[0-9])(?=.[A-Z])(?=.*[a-z]).{6,}$/";
        if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['inscription']))
            {
                require __DIR__."/../model/userModel.php";
                if(empty($_POST["username"])){
                    $error["username"] = "Veuillez saisir un nom d'utilisateur.";
                }
                else{
                    $username = cleanData($_POST["username"]);
                    if(!preg_match("/^[a-zA-Z' -]{2,25}$/", $username)){
                        $error["username"] = "Votre nom d'utilisateur ne doit contenir que des lettres.";
                    }
                }
                // Traitement email
                if(empty($_POST["email"])){
                    $error["email"] = "veuillez saisir un email";
        
                } else {
                    $email = cleanData($_POST["email"]);
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                        $error["email"] = "Veuillez saisir un email valide.";

                    }
                    $resultat = getOneUserByEmail($email);
                    if($resultat){
                        $error["email"] = "cet email est déja enregisté.";
                    }
                }
                // Traitement password
                if(empty($_POST["password"])){
                    $error["password"] = "Veuillez saisir un mot de passe";
                }else {
                    $password = cleanData($_POST["password"]);
                    if(!preg_match($regexPass, $password)){ 
                        $error["password"] = "Veuillez saisir un mot de passe valide"; 
                    }else{
                        $password = password_hash($password, PASSWORD_DEFAULT);
                    }
                }
                // traitement de la vérification du password
                if(empty($_POST['passwordBis'])){
                    $error['passwordBis'] = "Veuillez saisir à nouveau votre mot de passe"; 
                } else{
                    if($_POST["passwordBis"] != $_POST["passwordBis"]){
                        $error["passwordBis"] = "Veuillez saisir le même mot de passe.";
                    }
                }
                // Envoi des données 
                if(empty($error)){
                    // j'ajoute mon utilisateur en BDD 
                    addUser($username, $email, $password);
                    header("Location: /mvc");
                    exit;
                }
            }
        require __DIR__."/../view/user/inscription.php";
    }
function readUsers() :void{
        session_start();
        // j'inclu mon modele
        require __DIR__. "/../model/userModel.php";
        // je récupère tous mes utilisateus.
        $users = getAllUsers();
        // je gère l'affichage des messages flash
        if(isset($_SESSION["flash"])){
            $flash = $_SESSION["flash"];
            unset($_SESSION["flash"]);
        }
        // j'inclu ma vue 
        require __DIR__. "/../view/user/list.php";
}
/**
 * Gère la page de suppression de l'utilisateur
 *
 * @return void
 */
function deleteUser() :void{
    require __DIR__."/../ressources/service/islogged.php";
    isLogged(true, "/mvc");
    if(empty($_GET["id"])|| $_SESSION["idUser"] != $_GET["id"]){
        header("Location: /mvc");
        exit;
    }
    // on inclu notre modèle
    require __DIR__."/../model/userModel.php";
    // on supprime l'utilisateur
    deleteUserById((int)$_GET["id"]);
    // on le déconnecte
    unset($_SESSION);
    session_destroy();
    setcookie("PHPSESSID", "", time()-3600);
    // on le redirige après affichage de la confirmation
    header('refresh: 5;url= /mvc');
    // on inclu la vue 
    require __DIR__."/../view/user/delete.php";
}
?>