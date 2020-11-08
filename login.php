<?php

$useremail= $_POST['email'];
$password=$_POST['pass'];

$host="localhost";
$dbUsername="root";
$dbPassword="";
$dbname="test";

try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');    
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table jeux_video
$reponse = $bdd->query('SELECT * FROM users where email=\'' . $useremail . '\' and password=\'' . $password . '\' ;');

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{ 
    if(!$donnees){
        echo"mot de passe ou email sont incorrectes ";
       
        
    }else{
        $var=$donnees['user_id'];
        header("location:logindex.html?id=$var&state=0&delete=0&update=0");
        exit();
        

       $reponse->closeCursor();
    }}








?>