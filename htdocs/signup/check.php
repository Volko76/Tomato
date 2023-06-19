<?php

/* Pour l'instant, ne crée pas le compte ; s'en occuper */

header("Content-Type: application/json");

if (!isset($_GET['email']) || !isset($_GET['password']) || !isset($_GET['name'])){
    echo "false";
    exit();
}

$name = $_GET['name'];
$email = $_GET['email'];
$password = $_GET['password'];

include("connexion.php");

$query = $pdo->prepare("SELECT COUNT(id) FROM stores WHERE email = ?");
$query->bindValue(1,$email,PDO::PARAM_STR);
$query->bindValue(2,$password,PDO::PARAM_STR);
$query->execute();

if (($query->fetch())[0]==0){
    echo "false";
}
else{
    /*session_start();
    $_SESSION["email"] = $email;*/
    echo "true";
}


?>