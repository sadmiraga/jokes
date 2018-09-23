<?php
session_start();
 require_once 'user_template.html';

$_SESSION['idOdUseraSaPosta'] = $_GET['idOdUseraSaPosta'];





// PROVJERA DA LI JE USER KIJI JE PRIJAVLJEN KLIKNUO NA SVOJ LINK PROFILA
if ($_SESSION['idOdUseraSaPosta']==$_SESSION['userID']){
    header('Location:myProfile.php');
} else {
    
    //TUDJI PROFIL
    
    
    require_once 'userProfileTemplate.html';
    
    echo '<br>';
    
    
    echo 'id od usera sa posta: ';
    echo $_SESSION['idOdUseraSaPosta'];

    echo '<br>';

    echo 'id prijavljenog usera: ';
    echo $_SESSION['userID'];
   
    
    
    
    
    
}