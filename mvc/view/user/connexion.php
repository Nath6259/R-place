<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../Fresque/style/style-ins.css">
    <title>Connexion</title>
</head>
<body>
<form action="" method="POST">
    <h2>Connexion</h2>
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
    <!-- <?php var_dump($email) ?> -->
</form>
<footer>
    <p>Vous n'avez pas de compte ? <a href="/mvc/inscription">Inscrivez-vous</a></p>
</footer>
</body>
</html>