<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style-ins.css">
    <title>Inscription</title>
</head>
<body>
<form action="" method="post">
    <h2>Inscription</h2>
    <input type="text" name="name" id="name" placeholder="Nom">
    <br>
    <span></span>
    <br>
    <input type="email" name="email" id="email" placeholder="Email">
    <br>
    <span class="error"><?php echo $error["email"]??"" ?></span>
    <br>
    <input type="password" name="password" id="password" placeholder="Mot de passe">
    <br>
    <span class="error"><?php echo $error["pass"]??"" ?></span>
    <br>
    <input type="submit" value="Connexion" name="login" id="connexion">
    <br>
    <span class="error"><?php echo $error["login"]??"" ?></span>
</form>
<footer>
    <p>Vous avez déjà un compte ? <a href="./connexion.php">Connecté Vous</a></p>
</footer>
</body>
</html>