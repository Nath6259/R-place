<link rel="stylesheet" href="../../../Fresque/style/style-ins.css">
<title>Inscription</title>
<form action="" method="POST">
    <h2>Inscription</h2>
    <input type="text" name="name" id="name" placeholder="Nom" required>
    <br>
    <span class="error"><?php echo $error["username"]??"" ?></span>
    <br>
    <input type="email" name="email" id="email" placeholder="Email" required>
    <br>
    <span class="error"><?php echo $error["email"]??"" ?></span>
    <br>
    <input type="password" name="password" id="password" placeholder="Mot de passe" required>
    <br>
    <span class="error"><?php echo $error["password"]??"" ?></span>
    <br>
    <input type="submit" value="Connexion" name="login" id="connexion">
    <br>
    <span class="error"><?php echo $error["login"]??"" ?></span>
</form>
<footer>
    <p>Vous avez déjà un compte ? <a href="/mvc/connexion">Connecté Vous</a></p>
</footer>
</form>
