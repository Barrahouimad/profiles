<?php
if (isset($_POST['script_submit'])){
$profile_id= $_POST['profile_id'];
$user_id=$_POST['user_id'];
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$headline=$_POST['headline'];
$summary=$_POST['summary'];

$host="localhost";
$dbUsername="root";
$dbPassword="";
$dbname="test";

$conn=new mysqli($host,$dbUsername,$dbPassword,$dbname); //on creer la connection avec le serveur
if(mysqli_connect_error()){
    die('Connect Error(' .mysqli_connect_errno().')'.mysqli_connect_error()); // si il y avais un probleme l afficher
}else{
    
    $insert="UPDATE `profile`SET `profile_id`= '$profile_id' , `user_id`= '$user_id', `first_name`= '$first_name'
    , `last_name`= '$last_name', `email`='$email', `headline`='$headline', `summary`='$summary' where user_id='$user_id';";
    $stmt=$conn->prepare($insert);       //on prepare notre requete pour la connection que nous vennons d oouvrire
    $stmt->execute();                  // on execute la requete

//supprimer les positions
$insert2='DELETE FROM `position` WHERE profile_id= \'' . $_GET['id'] . '\';'; // on definit notre string requete

$stmt2=$conn->prepare($insert2);       //on prepare notre requete pour la connection que nous vennons d oouvrire

$stmt2->execute(); 

//supprimer les ecoles

$insert5='DELETE FROM `education` WHERE profile_id= \'' . $_GET['id'] . '\';'; // on definit notre string requete

$stmt5=$conn->prepare($insert5);       //on prepare notre requete pour la connection que nous vennons d oouvrire

$stmt5->execute(); 
//ajouter les nouveaux positions

$var0=1;
while($_POST['year'.$var0.'']){
    if(!empty($_POST['year'.$var0.''])||!empty($_POST['desc'.$var0.''])){
        $conn4=new mysqli($host,$dbUsername,$dbPassword,$dbname);
        if(mysqli_connect_error()){
            die('Connect Error(' .mysqli_connect_errno().')'.mysqli_connect_error()); // si il y avais un probleme l afficher
        }else{
        
           
            $insert4='INSERT INTO `position`(`position_id`, `profile_id`, `rank`, `year`, `description`) VALUES ('.$var0.',\'' . $_GET['id'] . '\','.$var0.',\'' . $_POST['year'.$var0.''] . '\',\'' . $_POST['desc'.$var0.''] . '\')'; // on definit notre string requete
           
            $stmt4=$conn4->prepare($insert4);       //on prepare notre requete pour la connection que nous vennons d oouvrire
            
            $stmt4->execute();                  // on execute la requete
            

        $var0++;
    }}else{

  echo "<p>All fields are required</p>";
   }

   
}
$stmt4->close();
 $conn4->close();


 $var01=1;
 try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }
    
    $reponse7 = $bdd->query('SELECT * FROM institution WHERE name=\''. $_POST['school'.$var01.''] . '\'');//on utilise la valeur approté par le url dans notre requete
   
    while ($donnees7 = $reponse7->fetch())
    {


while($_POST['year1'.$var01.'']){
    if(!empty($_POST['year1'.$var01.''])||!empty($_POST['school'.$var01.''])){
        $conn4=new mysqli($host,$dbUsername,$dbPassword,$dbname);
        if(mysqli_connect_error()){
            die('Connect Error(' .mysqli_connect_errno().')'.mysqli_connect_error()); // si il y avais un probleme l afficher
        }else{
        
           
            $insert6='INSERT INTO `education`( `profile_id`,`institution_id`, `rank`, `year`) VALUES (\'' . $_GET['id'] . '\',\'' . $donnees7['institution_id'] . '\','.$var01.',\'' . $_POST['year1'.$var01.''] . '\')'; // on definit notre string requete
           $stmt6=$conn4->prepare($insert6);       //on prepare notre requete pour la connection que nous vennons d oouvrire
            
            $stmt6->execute();                  // on execute la requete
            

        $var01++;
    }}else{

  echo "<p>All fields are required</p>";
   }

   
}}
$reponse7->closeCursor();
$stmt4->close();
 $conn4->close();


   echo"your informations have being added successfally";
   $var=$_GET['id'];
   header("location:logindex.html?id=$var&state=0&delete=0&update=0");
   exit();

}}
?>

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
    


    


<form  action="<?=$_SERVER['PHP_SELF']?>?id=<?php echo   $donnees['user_id'];?>&state=0"  method="POST" >
        <table id="tab">
            <tr> 
                <td> profile id</td>
                <td> <input type ="text" name="profile_id" value="<?php echo   $donnees['profile_id'];?>" required> </td>
            </tr>
            <tr> 
                <td>user id </td>
                <td>  <input type ="text" name="user_id" value="<?php echo   $donnees['user_id'];?>" required></td>
            </tr>
            <tr> 
                <td>first name </td>
                <td>  <input type ="text" name="first_name" value="<?php echo   $donnees['first_name'];?>"  required></td>
            </tr>
            <tr> 
                <td>last name </td>
                <td>  <input type ="text" name="last_name"  value="<?php echo   $donnees['last_name'];?>" required></td>
            </tr>
            <tr> 
                <td>email </td>
                <td>  <input type ="email" name="email"  value="<?php echo   $donnees['email'];?>" required></td>
            </tr>
            <tr> 
                <td>headline </td>
                <td>  <input type ="text" name="headline"  value="<?php echo   $donnees['headline'];?>"   required></td>
            </tr>
            <tr> 
                <td> summary</td>
                <td> <input type ="text" name="summary" value="<?php echo   $donnees['summary'];?>"  required> </td>
            </tr>
            </table>
            <div id="place_education">

             </div>

            <div id="place_position">

             </div>

            
                <input type ="submit" name ="script_submit"    value="Save"> 
           
     </form>
     
 <?php }
    
    $reponse->closeCursor(); // Termine le traitement de la requête
    
    ?>

<script src="//ajax.googleapis.com/ajax/libs/
jquery/1.10.2/jquery.min.js"></script>

<?php

    try
    {
        $bdd3 = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }
   
    $reponse3 = $bdd3->query('SELECT * FROM position WHERE profile_id=\'' . $_GET['id'] . '\'');//on utilise la valeur approté par le url dans notre requete
   
    while ($donnees3 = $reponse3->fetch())
    {?>
<script>window.jQuery || document.write('<script src="link/to/our/jquery-1.10.2.js"><\/script>')</script>

    <script >
     
     $(document).ready(function(){
         window.console && console.log('Document ready called');
         
         max = <?php 
         try
    {
        
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }
    
    $reponse = $bdd->query('SELECT count(year) FROM position ');
    while ($donnees = $reponse->fetch())
    {
      echo $donnees['count(year)'];
     }
    
    $reponse->closeCursor(); 
    
    ?>;
              
         
           for(countPos=1;countPos<=max;countPos++){
             window.console && console.log("Adding position "+countPos);
             $('#place_position').append(
                 '<div id="position'+countPos+'"> \
                 <p>Year: <input type="text" name="year'+countPos+'" value="<?php echo $donnees3['year']; ?>" /> \
                 <input type="button" value="-" \
                     onclick="$(\'#position'+countPos+'\').remove();return false;"></p> \
                 <textarea name="desc'+countPos+'" rows="8" cols="80"   ><?php echo $donnees3['description']; ?></textarea>\
                 </div>');
           }
        
           max2 = <?php 
         try
    {
        
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }
    
    $reponse = $bdd->query('SELECT count(year) FROM education ');
    while ($donnees = $reponse->fetch())
    {
      echo $donnees['count(year)'];
     }
    
    $reponse->closeCursor(); 
    
    ?>;
    //pour afficher lle nom et lannee 

<?php 
         try
    {
        
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }
    
    $reponse = $bdd->query('SELECT * FROM education ,institution WHERE education.institution_id=institution.institution_id and profile_id=\'' . $_GET['id'] . '\'');
    while ($donnees5 = $reponse->fetch())
    {?>
     
     
           for(countPos2=1;countPos2<=max2;countPos2++){
             window.console && console.log("Adding education "+countPos2);
             $('#place_education').append(
                 '<div id="education'+countPos2+'"> \
                 <p>Year: <input type="text" name="year1'+countPos2+'" value="<?php echo $donnees5['year']; ?>" /> \
                 <input type="button" value="-" \
                     onclick="$(\'#education'+countPos2+'\').remove();return false;"></p> \
                     <input type="text" name="school'+countPos2+'" class="nameschool" value="<?php echo $donnees5['name']; ?>" />\
                 </div>');
           }



    <?php 
     }
    
     $reponse->closeCursor(); 
     
     ?>; 


     });
     
          </script>
          <?php }
    
    $reponse3->closeCursor(); // Termine le traitement de la requête
    
    ?>
