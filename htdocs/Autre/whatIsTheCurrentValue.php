<?php
$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8;', 'root', ''); 


$HU = $bdd->prepare('SELECT doWeNeedToPlay FROM doWeNeedToPlay;');
$HU->execute();
$dez = $HU->fetch();
echo $dez[0];


header("Cache-Control: max-age=1"); // don't cache ourself
?>