


     <?php

$i=1;
$i2=1;
if(isset($_POST['plus'])){
    $i=0;
    echo "hello";
}
if(isset($_POST['plus1'])){
    $i2=0;
}

if (isset($_POST['go'])){
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$headline=$_POST['headline'];
$summary=$_POST['summary'];


$host="localhost";
$dbUsername="root";
$dbPassword="";
$dbname="test";
if(!empty($first_name)||!empty($last_name)||!empty($email)||!empty($headline)||!empty($summary)){
$conn=new mysqli($host,$dbUsername,$dbPassword,$dbname); //on creer la connection avec le serveur
if(mysqli_connect_error()){
    die('Connect Error(' .mysqli_connect_errno().')'.mysqli_connect_error()); // si il y avais un probleme l afficher
}else{

   //on insere un nouveau profile 

    $insert='INSERT INTO `profile`(`profile_id`, `user_id`, `first_name`, `last_name`, `email`, `headline`, `summary`) VALUES (\'' . $_GET['id'] . '\',\'' . $_GET['id'] . '\'  ,?,?,?,?,?)'; // on definit notre string requete

    $stmt=$conn->prepare($insert);       //on prepare notre requete pour la connection que nous vennons d oouvrire
    $stmt->bind_param("sssss",$first_name,$last_name,$email,$headline,$summary); // on remplace les ? par les valeurs utiles
    $stmt->execute();                  // on execute la requete
    $var=$_GET['id'];
    $stmt->close();
    $conn->close();


    $var0=1;
    $var01=1;
    

    
   
    while($_POST['year'.$var0.'']){
        if(!empty($_POST['year'.$var0.''])||!empty($_POST['desc'.$var0.''])){
            $conn2=new mysqli($host,$dbUsername,$dbPassword,$dbname);
            if(mysqli_connect_error()){
                die('Connect Error(' .mysqli_connect_errno().')'.mysqli_connect_error()); // si il y avais un probleme l afficher
            }else{
            
               //on insere une nouvelle position 

                $insert2='INSERT INTO `position`(`position_id`, `profile_id`, `rank`, `year`, `description`) VALUES ('.$var0.',\'' . $_GET['id'] . '\','.$var0.',\'' . $_POST['year'.$var0.''] . '\',\'' . $_POST['desc'.$var0.''] . '\')'; // on definit notre string requete
               
                $stmt2=$conn2->prepare($insert2);       //on prepare notre requete pour la connection que nous vennons d oouvrire
                
                $stmt2->execute();                  // on execute la requete
                

            $var0++;
        }}else{
    
      echo "<p>All fields are required</p>";
       }

       $stmt2->close();
       $conn2->close();  
    }
   




    while($_POST['school'.$var01.'']){
        if(!empty($_POST['school'.$var01.''])||!empty($_POST['year1'.$var01.''])){
            $conn4=new mysqli($host,$dbUsername,$dbPassword,$dbname);
            if(mysqli_connect_error()){
                die('Connect Error(' .mysqli_connect_errno().')'.mysqli_connect_error()); // si il y avais un probleme l afficher
            }else{
                

                   
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
              
                $reponse = $bdd->query('select institution_id from institution where name=\'' . $_POST['school'.$var01.''] . '\'');//on utilise la valeur approté par le url dans notre requete
                
                // On affiche chaque entrée une à une
                while ($donnees3 = $reponse->fetch())
                {
               
                $insert3='INSERT INTO `education`( `profile_id`,`institution_id`, `rank`, `year`) VALUES (\'' . $_GET['id'] . '\',\'' . $donnees3['institution_id'] . '\','.$var01.',\'' . $_POST['year1'.$var01.''] . '\')'; // on definit notre string requete
               
                $stmt3=$conn4->prepare($insert3);       //on prepare notre requete pour la connection que nous vennons d oouvrire
                
                $stmt3->execute();                  // on execute la requete
                $stmt3->close();
                $conn4->close();
           
                }
                

            $var01++;
        }}else{
    
      echo "<p>All fields are required</p>";
       }

       $reponse->closeCursor();
   
   

}
   header("location:logindex.html?id=$var&state=1&delete=0&update=0");
   exit();
   }
}else{
    
    echo "<p>All fields are required</p>";
    }
}  ?>
<script src="//ajax.googleapis.com/ajax/libs/
jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="link/to/our/jquery-1.10.2.js"><\/script>')</script>
 <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>

<h1>barrahou imad </h1>

<form  action="<?=$_SERVER['PHP_SELF']?>?id=<?php echo $_GET['id'];?>"  method="POST">
        <table id="tab">
            
            <tr> 
                <th>first name </th>
                <th>  <input type ="text" name="first_name" ></th>
            </tr>
            <tr> 
                <th>last name </th>
                <th>  <input type ="text" name="last_name" ></th>
            </tr>
            <tr> 
                <th>email </th>
                <th>  <input type ="email" name="email" ></th>
            </tr>
            
            <tr> 
                <th>headline </th>
                <th>  <input type ="text" name="headline" ></th>
            </tr>
            <tr> 
                <th> summary</th>
                <th> <input type ="text" name="summary" > </th>
            </tr>
            </table>

            <p> Education:<input type ="submit" id="education" name="plus1" value="+"> </p>
           
              <div id="school_position" ></div>


               <p> Position:<input type ="submit" id="Position" name="plus" value="+"> </p>
               <div id="place_position" ></div> 
     <table id="tab2">
            <tr> 
               <th> <input type ="submit" name="go" value="Add"> </th>
            </tr>
            </table>
        
     </form>

     <script >
     
countPos = 0;
countPos1 = 0;

// http://stackoverflow.com/questions/17650776/add-remove-html-inside-div-using-javascript
$(document).ready(function(){
    window.console && console.log('Document ready called');
    $('#Position').click(function(event){
        // http://api.jquery.com/event.preventdefault/
        event.preventDefault();
        if ( countPos >= 9 ) {
            alert("Maximum of nine position entries exceeded");
            return;
        }
        countPos++;
        window.console && console.log("Adding position "+countPos);
        $('#place_position').append(
            '<div id="position'+countPos+'"> \
            <p>Year: <input type="text" name="year'+countPos+'" value="" /> \
            <input type="button" value="-" \
                onclick="$(\'#position'+countPos+'\').remove();return false;"></p> \
            <textarea name="desc'+countPos+'" rows="8" cols="80"></textarea>\
            </div>');
    });
    $('#education').click(function(event){
        // http://api.jquery.com/event.preventdefault/
        event.preventDefault();
        if ( countPos1 >= 9 ) {
            alert("Maximum of nine position entries exceeded");
            return;
        }
        countPos1++;
        window.console && console.log("Adding education "+countPos1);
        $('#school_position').append(
            '<div id="education'+countPos1+'"> \
            <p>Year: <input type="text" name="year1'+countPos1+'" value="" /> \
            <input type="button" value="-" \
                onclick="$(\'#education'+countPos1+'\').remove();return false;"></p> \
                <p> School:<input type="text" name="school'+countPos1+'" class="nameschool"  /></p>\
            </div>');
            

            $(".nameschool").autocomplete({
                source: "school.php"
                });
    });
});
    //la methode autocomplete envoie toujours vers le source saisis avec une variable 'terme' qui contient ce qui est saisi dans le champ. on le recupere dans le fichier php par $_GET['terme'] 
    //on utilise la fonction autocomplete pour donner des choix de saire au moment de saisie d'apres une souce
                    // on ajoute cela pour en benificier   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
            
     </script>
    
        
     
     

       