<?php
require_once 'db_connect.php';
$pdo = getPDO();

function readUser($username){
    global $pdo;
    $sql = 'SELECT * FROM users WHERE username = :username';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
function updateUser($username, $password_hash) {
    global $pdo;
    $sql = "UPDATE users SET password_hash = :password_hash WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':password_hash', $password_hash, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->rowCount();
}