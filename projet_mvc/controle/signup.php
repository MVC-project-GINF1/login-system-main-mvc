<?php
extract($_POST);
include_once("../model/connection.php");
$user_name=$_POST['user'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$cne=$_POST['cne'];
$adresse=$_POST['adresse'];
$ville=$_POST['ville'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$img_name=$_FILES['photo']['name'];
$img_size=$_FILES['photo']['size'];
$tmp_name=$_FILES['photo']['tmp_name'];
$error=$_FILES['photo']['error'];
$photo="../img/".$img_name;
if(num_rows($user_name))
{
    echo "user name Already Exists"; 
    echo "<p><a href=\"../vue/signup.html\">signup</a></p>";
	exit();
}
else{
   
    $sql1=insert_eleve ($conn,$nom,$prenom,$cne,$adresse,$ville,$email,$photo ) ;
}
if($sql1)
{  
        if($error===0){
                move_uploaded_file($tmp_name,$photo);
                insert_compte( $pass,$user_name,$cne);
                echo "<center><h1>enregistrement reussi</h1>
                <p>vous êtes enregistré sous le nom user: 
                <br>
                <span>".$user_name."</span>
                
                </p> 
                <p><a href=\"../index.php\">login</a></p>
                </center>";
            }
        
        else{
            $er='unkown error eccurred';
            header("Location: index.php?error=$er");
        }
}
else{
   header("location: index.php");

}
