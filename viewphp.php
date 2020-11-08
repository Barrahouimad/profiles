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
   
    // On récupère tout le contenu de la table 
    $var=$_GET['id'];
    $reponse = $bdd->query('SELECT * FROM profile WHERE user_id=\'' . $_GET['id'] . '\'');//on utilise la valeur approté par le url dans notre requete
    
    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch())
    {?>
    
     <p> profile id : <?php echo   $donnees['profile_id'];?> <br> le user id : <?php echo   $donnees['user_id'];?><br> le first name :<?php echo   $donnees['first_name'];?><br>
        laste name : <?php echo   $donnees['last_name'];?><br>  email : <?php echo   $donnees['email'];?> <br> headline  :<?php echo   $donnees['headline'];?><br>
        summary  : <?php echo   $donnees['summary'];?>
     </p>
     <?php 
       $reponse2 = $bdd->query('SELECT * FROM position WHERE profile_id=\'' . $_GET['id'] . '\'');//on utilise la valeur approté par le url dans notre requete
    
       // On affiche chaque entrée une à une
       while ($donnees2 = $reponse2->fetch())
       {?>
       
        <p> 
        year position : <?php echo   $donnees2['year'];?> <br> description: <?php echo   $donnees2['description'];?>
        </p>
       
          
       <?php }
       $reponse2->closeCursor();
        ?>


<?php 
       $reponse3 = $bdd->query('SELECT * FROM education ,institution WHERE education.institution_id=institution.institution_id and profile_id=\'' . $_GET['id'] . '\'');//on utilise la valeur approté par le url dans notre requete
    
       // On affiche chaque entrée une à une
       while ($donnees3 = $reponse3->fetch())
       {?>
       
        <p> 
         - <?php echo   $donnees3['year'];?>  : <?php echo   $donnees3['name'];?>
        </p>
       
          
       <?php }
       $reponse3->closeCursor();
        ?>
       
    <?php }
    
    $reponse->closeCursor(); // Termine le traitement de la requête
    
    ?>
    <a href="logindex.html?id=<?php echo $_GET['id']?>&state=0&delete=0&update=0">Done</a>
    
    