<?php
require __DIR__. "../../services/_pdo.php";
/**
 * Retourne tous les utilisateurs sous forme de tableau.
 *
 * @return array
 */
function getAllUsers(): array{
    $pdo = connexionPDO();
    $sql = $pdo -> query("SELECT idUser, username FROM user");
    return $sql -> fetchAll();
}
/**
 * Selectionne un utilisateur via son email.
 *
 * @param string $email
 * @return array|boolean
 */
function getOneUserByEmail(string $email): array|bool{
    $pdo = connexionPDO();
    $sql = $pdo -> prepare("SELECT * FROM users WHERE email = :em");
    $sql -> execute(["em" => $email]);
    return $sql -> fetch();
}
/**
 * Selectionne un utilisateur via son ID.
 *
 * @param integer $id
 * @return array|boolean
 */
function getOnUserById(int $id): array|bool{
    $pdo = connexionPDO();
    $sql = $pdo -> prepare("SELECT * FROM users WHERE idUSer = ?");
    $sql -> execute([$id]);
    return $sql -> fetch();
}
/**
 * Ajoute un utilisateur dans la BDD
 *
 * @param string $us
 * @param string $em
 * @param string $pass
 * @return void
 */
function addUser(string $us, string $em, string $pass): void{
    $pdo = connexionPDO();
    $sql = $pdo -> prepare("INSERT INTO users(username, email, password) VALUES(?,?,?)");
    $sql -> execute([$us, $em, $pass]);
}
/**
 * Supprime un utilisateur via son ID. 
 *
 * @param integer $id
 * @return void
 */
function deleteUserById(int $id) : void{
    $pdo = connexionPDO();
    $sql = $pdo -> prepare("DELETE FROM users WHERE idUser = ?");
    $sql -> execute([$id]);
}
/**
 * Met à jour un utilisateur, via son ID.
 *
 * @param string $username
 * @param string $email
 * @param string $password
 * @param integer $id
 * @return void
 */
function updateUserById(string $username, string $email, string $password, int $id): void{
    $pdo = connexionPDO();
    $sql = $pdo -> prepare("UPDATE users SET username=:us, email = :em, password= :mdp WHERE idUser = :id");
    $sql -> execute([
                    "id"=> $id,
                    "em" => $email,
                    "mdp" => $password,
                    "us" => $username
    ]);
}
?>