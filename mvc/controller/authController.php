<?php
require __DIR__."../../../ressources/_isloggedV2.php";
require __DIR__."../../model/userModel.php";

function connexion():void
{
    isLogged(false, "/mvc");
    $email = $pass = $verify = "";
    $error = [];
    $regexPass = "/^(?=.*[!?@#$%^&*+-])(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]).{6,}$/";


    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login']))
    {
        if(empty($_POST["email"])){
            $error["email"] = "Veuillez entrer un email";
        }else{
            $email = cleanData($_POST["email"]);
            $verify = getOneUserByEmail($email);
            var_dump($email == $verify["email"]);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $error["email"] = "Email invalide";
                }
                elseif($email != $verify["email"]
                ){
                    $error["email"] = "Aucun compte liée a cette email";
                }
    
        }
        if(empty($_POST["password"])){
            $error["pass"] = "Veuillez entrer un mot de passe";
        }else{
            $pass = cleanData($_POST["password"]);
            if(!preg_match($regexPass, $pass)){
                $error["pass"] = "mot de passe invalide";
            }
        }
        if(empty($error)){
            if($verify){
                if(password_verify($pass, $verify["password"])){
                    $_SESSION["logged"] = true;
                    $_SESSION["username"] = $verify["username"];
                    $_SESSION["email"] = $verify["email"];
                    $_SESSION["ID"] = $verify["ID"];
                    $_SESSION["expire"] = time()+ (60*60);
                    header("Location: /mvc/apercu");
                    exit;
                }else{
                $error["login"] = "mot de passe incorrecte";

                }
            }else{
                $error["login"] = "Email incorrecte";
            }
        }
    }
    require __DIR__."../../view/user/connexion.php";
}
function deconnexion():void
{
    islogged(true, "/mvc/connexion");
    unset($_SESSION);
    session_destroy();
    setcookie("PHPSESSID", "", time()-3600);
    header("Location: /mvc/connexion");
    exit;
}
?>