<?php 
    include("connexion.php");
    
    $req=$pdo->prepare("SELECT * FROM images WHERE image_id=? limit 1");
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $req->execute(array($_GET["id"]));
    $tab=$req->fetchAll();
    echo $tab[0]["bin"];
?>