<?php
session_start();
include_once('../model/connection.php');
if(isset($_POST['enter'])){
    $user = $_POST['user_name'];
    $pass = $_POST['password'];
}
    $nblignes = nblignes($pass,$user,'comptes');
    if($nblignes){
        $_SESSION['user']=$user;
        $_SESSION['pass']=$pass;
        $_SESSION['id'] = verif($result,$user,$pass);
 header('location:../vue/home.php');
        exit();
    }
    else{
        echo 'user name ou mot de passe eronée';
        echo "<a href=\"../index.php\">Try again</a>";
    }
?>