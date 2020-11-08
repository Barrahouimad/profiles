<?php if($_GET['state']) {
            echo "added";
        }
        if($_GET['update']) {
            echo "Profile updated";
        }
        if($_GET['delete']) {
            echo "Profile deleted";
        }
        
        ?>
       <table id="up">
        <td>
          <th> <p id="header">barrahou imad </p> </th>
          <th><p id="login">loged</p> </th>
         </td>
         
        </table>

      <section>
          <table id ="table" border="10">
              <tr>
                 
                  <td> Name </td>
                  <td> Headline </td>
                  <td> action </td>
              </tr>

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
                <td>  <a  href=" viewphp.php?id=<?php echo $donnees['user_id']?>" > <?php echo $donnees['first_name']; ?> </a> </th> 
                <td> <?php echo   $donnees['headline'];?></th>
                <td> <a  href="editphp.php?id=<?php echo $donnees['user_id']?>&state=1" >Edit</a>  <a  href="deletephp.php?id=<?php echo $donnees['user_id']?>&state=1" > Delete </a> </th>
                </tr>
                 
              <?php }
              
              $reponse->closeCursor(); // Termine le traitement de la requête
              
              ?>
                
                
            </tr>
          </table>

      </section>
      <div>
          <a href="addphp.php?id=<?php echo $_GET['id'] ; ?>">Add New Entry</a> 
      </div>
      <div id="logout">
        <a href="indexhtml.html">Logout</a>
    </div>