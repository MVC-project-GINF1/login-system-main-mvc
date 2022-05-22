<?php
 function getBdd() {
    $bdd = new PDO('mysql:host=localhost;dbname=ensa', 'root',
            '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}
$conn=getBdd();


function insert_eleve($conn,$nom,$prenom,$cne,$adresse,$ville,$email,$photo){
         /*
            $query="INSERT INTO eleves(Nom,Prenom,CNE,Adresse,Ville,email,photo) 
            VALUES ('$nom','$prenom','$cne','$adresse','$ville','$email','$photo');";
            $sql1=mysqli_query($conn,$query)or die("Could Not Perform the Query");
            */
    $query="INSERT INTO eleves(Nom,Prenom,CNE,Adresse,Ville,email,photo) 
    VALUES ('$nom','$prenom','$cne','$adresse','$ville','$email','$photo');";
    $sql1=$conn->query($query) or die("Could Not Perform the Query");
    return $sql1;
}


function num_rows($user_name){
    $conn=getBdd();
    $requete = "SELECT*FROM comptes where user = '".$user_name."' ";
$res = $conn->prepare($requete);
    $res->execute();
  return  $num_rows = $res->fetchColumn();
}
      
function insert_compte( $pass,$user_name,$cne){
    $conn=getbdd();
    $requete = "SELECT ID_eleve FROM eleves where CNE = '".$cne."' ";
    $result = $conn->query($requete);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $id= $row['ID_eleve'];
    $sql = "INSERT INTO comptes(ID,user,passwd) VALUES ('$id','$user_name' ,'$pass' );";
    $result2 = $conn->query ($sql) ;
}
function nblignes($pass,$user,$table){
    $conn=getBdd();
    $requete ="SELECT ID FROM $table where user='".$user."' and passwd='".$pass."'";
    $result = $conn->prepare( $requete  );
    $result->execute();
  return  $num_rows = $result->fetchColumn();    
}

function verif($result,$user,$pass){
    $conn=getBdd();
    $result = $conn->query("SELECT ID FROM comptes where user='".$user."' and passwd='".$pass."'" );
   $row = $result->fetch(PDO::FETCH_ASSOC);
    $res = $conn->query("SELECT * FROM eleves where ID_eleve='".$row['ID']."'");
    $row = $res->fetch(PDO::FETCH_ASSOC);
    echo "Bienvenue ".$row['user'];
    return $row['ID'];
}
 function select_eleve(){
     $conn=getBdd();
    $sql = "SELECT * FROM eleves";
   return $result =$conn->query ($sql) ;
 }




?>


