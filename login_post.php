<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=don_de_song;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        echo "connection faild"; die('Erreur : '.$e->getMessage());
}

// Insertion du données à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO login(user, pass) VALUES(?, ?)');
$req->execute(array($_POST['user'], $_POST['pass']));

// Redirection du visiteur vers la page du login
header('Location: login.php');
?>
