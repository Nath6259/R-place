<?php
require __DIR__."/../model/userModel.php";
require __DIR__."../../../ressources/_isloggedV2.php";
/**
 * Gère la page d'inscription.
 *
 * @return void
 */
function createUser():void
{
    isLogged(false, "/mvc");

    $username = $email = $password = "";
    $error = [];
    $regexPass = "/^(?=.*[!?@#$%^&*+-])(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]).{6,}$/";
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['inscription']))
    {
        // Traitement username
        if(empty($_POST["username"])){
            $error["username"] = "Veuillez saisir un nom d'utilisateur.";
        }
        else{
            $username = cleanData($_POST["username"]);
            if(!preg_match("/^[a-zA-Z' -]{2,25}$/", $username)){
                $error["username"] = "Votre nom s'utilisateur ne doit
                contenir que des lettres.";
            }
        }
        // Traitement email
        if(empty($_POST["email"])){
            $error["email"] = "Veuillez saisir un email";
        }else{
            $email = cleanData($_POST["email"]);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error["email"] = "Veuillez saisir un email valide.";
            }
            // Je verifie si l'email existe déjà en BDD.
            $resultat = getOneUserByEmail($email);
            if($resultat){
                $error["email"] = "Cet email est déjà enregistré.";
            }
        }
        // Traitement password
        if(empty($_POST["password"])){
            $error["password"] = "Veuillez saisir un mot de passe";
        }else{
            $password = cleanData($_POST["password"]);
            if(!preg_match($regexPass, $password)){
                $error["password"] = "Veuillez saisir un mot de passe valide";
            }else{
                $password = password_hash($password, PASSWORD_DEFAULT);
            }
        }
        // Traitement de la verification du password.
        if(empty($_POST["passwordBis"])){
            $error["passwordBis"] = "Veuillez saisir à nouveau votre mot de passe";
        }else{
            if($_POST["password"] != $_POST["passwordBis"]){
                $error["passwordBis"] = "Veuillez saisir le même mot de passe.";
            }
        }
        // envoi des données
        
        if(empty($error)){
            
            // J'ajoute mon utilisateur en BDD
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
    isLogged(true, "/05-mvc");
    if(empty($_GET["id"])|| $_SESSION["idUser"] != $_GET["id"]){
        header("Location: /05-mvc");
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
    header('refresh: 5;url= /05-mvc');
    // on inclu la vue 
    require __DIR__."/../view/user/delete.php";
}
function apercu():void {
    require __DIR__."/../view/user/apercu-fresque.php";
}
function fresque1():void {
    require __DIR__."/../view/user/fresque1.php";
}
function fresque2():void {
    require __DIR__."/../view/user/fresque2.php";
}
?>