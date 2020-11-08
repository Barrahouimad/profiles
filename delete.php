<?php

if (isset($_POST['script_submit'])){

$host="localhost";
$dbUsername="root";
$dbPassword="";
$dbname="test";

$conn=new mysqli($host,$dbUsername,$dbPassword,$dbname); //on creer la connection avec le serveur
if(mysqli_connect_error()){
    die('Connect Error(' .mysqli_connect_errno().')'.mysqli_connect_error()); // si il y avais un probleme l afficher
}else{
    $insert='DELETE FROM `profile` WHERE user_id= \'' . $_GET['id'] . '\';'; // on definit notre string requete

    $stmt=$conn->prepare($insert);       //on prepare notre requete pour la connection que nous vennons d oouvrire
    
    $stmt->execute();                  // on execute la requete
    $insert2='DELETE FROM `position` WHERE profile_id= \'' . $_GET['id'] . '\';'; // on definit notre string requete

    $stmt2=$conn->prepare($insert);       //on prepare notre requete pour la connection que nous vennons d oouvrire
    
    $stmt2->execute();                  // on execute la requete

    
   echo"your informations have being added successfally";
   $var=$_GET['id'];
   header("location:logindex.html?id=$var&state=0&delete=1&update=0");
   exit();
   /* 
   //supprimer les positions
    $insert2='DELETE FROM `position` WHERE profile_id= \'' . $_GET['id'] . '\';'; // on definit notre string requete

    $stmt2=$conn->prepare($insert2);       //on prepare notre requete pour la connection que nous vennons d oouvrire
    
    $stmt2->execute();  
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
    $stmt2->close();
     $conn2->close();
   */

}}
?>
<form  action="<?=$_SERVER['PHP_SELF']?>?id=<?php echo   $_GET['id'];?>&state=0"  method="POST" >
<input type ="submit" name ="script_submit"    value="Delete">
</form>
   