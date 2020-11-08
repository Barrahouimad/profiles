<?php
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
   echo"your informations have being added successfally";
   header("location:logindex.html");
   exit();

}
?>