<?php 
$title = " MVC - update";
$headerTitle = "Mise à jour";
require __DIR__. "../../../../ressources/templates/_header.php";
if($users):
?>
<form action="" method="POST">
    <!-- username -->
    <label for="username">Nom d'utilisateur :</label>
    <input type="text" id="username" name="username" value="<?php echo $user["username"] ?>" >
    <span class="error"><?php echo $error["username"] ?? "" ?></span>
    <br>
    <!-- email -->
    <label for="email">Adresse Email :</label>
    <input type="email" id="email" name="email" value="<?php echo $user["email"] ?>">
    <span class="error"><?php echo $error["email"] ?? "" ?></span>
    <br>
    <!-- password -->
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" >
    <span class="error"><?php echo $error["password"] ?? "" ?></span>
    <br>
    <!-- password verify -->
    <label for="password">Confirmer mot de passe :</label>
    <input type="password" id="passwordBis" name="passwordBis" >
    <span class="error"><?php echo $error["passwordBis"] ?? "" ?></span>
    <br>
    <input type="submit" value="inscription" name="inscription">
</form>
<?php else: ?>
    <p>Aucun utilisateur selectionné</p>
<?php
endif;
require __DIR__."../../../../ressources/templates/_footer.php";
?>