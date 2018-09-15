<?php

session_start();

require_once 'connection.php';


// IF INFO CAME FROM SUBMIT
if(isset($_GET['loginSubmitButton'])){
    
    // GETTING INFO FROM FORM
    $loginUsername= $_GET['loginUsername'];
    $loginPassword = $_GET['loginPassword'];
    
    
    // DA LI USER POSTOJI U BAZI PODATAKA
    $stmt = $pdo -> prepare("SELECT count(*) FROM users WHERE username = :username ");
    $stmt -> execute(['username'=>$loginUsername]);
    
    $usernameLoginCount = $stmt -> fetchColumn();
    
    if($usernameLoginCount == 0){
        
        //KORISNIK NE POSTOJI
        $_SESSION['loginError'] = "Usename doesn't exist";
        header("Location:login.php");
        
    } else {
       
        // POVLACENJE PASSWORDA IZ BAZE NA OSNOVU USERNAMEA
        $stmt = $pdo -> prepare ("SELECT geslo FROM users WHERE username = :username");
        $stmt ->execute(['username'=>$loginUsername]);
        
        //PASSWORD IZ BAZE OD USERNAMEA
        $checkPassword = $stmt ->fetchColumn();
        
        //DA LI JE PASSWORD ISPRAVAN
        if($checkPassword == md5($loginPassword)){
            
            //DODAVANJE VRIJEDNOSTI SEŠNU xd I REDIRECT NA POCETNU STRANICU
            $_SESSION['username'] = $loginUsername;
            header("Location:index.php");
        } else {
            
            // PORUkA O NETACNOM PASSWORDU I REDIRECT NAZAD NA LOGIN PAGE
            $_SESSION['loginError']="Wrong Password";
            header("Location:login.php");
        }
        
        
        
    }
    
}