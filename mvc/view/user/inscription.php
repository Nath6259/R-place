<?php
$title = "Inscription";
$headerTitle = "Inscription";
require __DIR__."../../../../ressources/templates/_header.php";
?>
<form action="" method="POST">
    <!-- username -->
    <label for="username">Nom d'utilisateur :</label>
    <input type="text" id="username" name="username" required>
    <span class="error"><?php echo $error["username"] ?? "" ?></span>
    <br>
    <!-- email -->
    <label for="email">Adresse Email :</label>
    <input type="email" id="email" name="email" required>
    <span class="error"><?php echo $error["email"] ?? "" ?></span>
    <br>
    <!-- password -->
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required>
    <span class="error"><?php echo $error["password"] ?? "" ?></span>
    <br>
    <!-- password verify -->
    <label for="password">Confirmer mot de passe :</label>
    <input type="password" id="passwordBis" name="passwordBis" required>
    <span class="error"><?php echo $error["passwordBis"] ?? "" ?></span>
    <br>
    <input type="submit" value="inscription" name="inscription">
</form>
<?php
require __DIR__."../../../../ressources/templates/_footer.php";
