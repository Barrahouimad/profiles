<?php 
try
{
    $bdd3 = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
//echo 'SELECT name FROM institution where name like ' .$_GET['term'] .'%';
$term=$_GET['term'];
$reponse3 = $bdd3->query('SELECT name FROM `institution` WHERE `name` LIKE \'%'.$term.'%\'');//on utilise la valeur approté par le url dans notre requete

$rows=array();
while ($donnees3 = $reponse3->fetch())
{
$rows[]=$donnees3['name'];
}
echo(json_encode($rows, JSON_PRETTY_PRINT));
    
$reponse3->closeCursor(); 



?>