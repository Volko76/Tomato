<?php

header("Content-Type: application/json");

if (!isset($_GET['email']) || !isset($_GET['password'])){
    echo "false";
    exit();
}

$email = $_GET['email'];
$password = $_GET['password'];

include("connexion.php");

$query = $pdo->prepare("SELECT COUNT(store_id) FROM stores WHERE email = ? AND password = ?");
$query->bindValue(1,$email,PDO::PARAM_STR);
$query->bindValue(2,$password,PDO::PARAM_STR);
$query->execute();

if (($query->fetch())[0]==0){
    echo "false";
}
else{
    session_start();
    $_SESSION["email"] = $email;
    $query = $pdo->prepare("SELECT store_id FROM stores WHERE email = ? AND password = ?");
    $query->bindValue(1,$email,PDO::PARAM_STR);
    $query->bindValue(2,$password,PDO::PARAM_STR);
    $query->execute();
    $_SESSION["id"] = ($query->fetch())[0];
    echo "true";
}


?>