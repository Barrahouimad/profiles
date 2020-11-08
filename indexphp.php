
<head1>Barrahou imad</head1>

       
           <p id="header">barrahou imad </p> 
         <a href="loginhtml.html" id="Please log in">Please log in</a> 
         
         
   
        
     
           
      
      <section>
        
          <table id ="table" border="10" method = "POST" action="indexphp.php">
              <thead>
                <tr>
                 
                  <th> Name </th>
                  <th> Headline </th>
               
              </tr>
            </thead>
            <tbody>
             
                 
               
                 <?php
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
$reponse = $bdd->query('SELECT * FROM profile;');

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{ ?>
  <tr>
  <th>  <a  href=" viewphp.php?id=<?php echo $donnees['user_id'];?>" > <?php echo $donnees['first_name']; ?> </a> </th> 
  <th> <?php echo   $donnees['headline'];?></th>
  </tr>
   
<?php }

$reponse->closeCursor(); // Termine le traitement de la requête

?>
               
                  
                

              



 
             
           
          </tbody>
          </table>
       
      </section>