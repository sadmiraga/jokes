<?php

session_start();

require_once 'connection.php';

// DA LI JE SUBMITANO SA DUBMETA UOPSTE
if(isset($_GET['registerSubmitButton'])){
    
    
    //informacije sa forma
    $ime = $_GET['firstName'];
    $prezime = $_GET['lastName'];
    $username = $_GET['username'];
    $email = $_GET['email'];
    $password = $_GET['password'];
    
    
    //provjera da li vec postoji korisnik sa istim usernameom
    $stmt = $pdo->prepare("SELECT count(*) FROM users WHERE username=?");
    $stmt->execute([$username]);
    $usernameCount = $stmt->fetchColumn();
    
    
    if($usernameCount == 0){
       
        //HASHING PASSWORD
        $password = md5($password);
        
        //UBACIVANJE PODATAKA U BAZU 
        $query = "INSERT INTO users (username,geslo,email,userType,firstName,lastName) VALUES (:username,:geslo,:email,3,:firstName,:lastName)";
        $stmt = $pdo -> prepare($query);
        $stmt -> execute(['username'=> $username, 'geslo' => $password, 'email'=> $email, 'firstName'=> $ime, 'lastName'=> $prezime]);
        
        $_SESSION['username'] = $username;
        header("Location:index.php");
        
        
        
        
    } else{
        
        // REDIRECT NA REGISTER STRANICU SA PORUKOM ZASTO SE NE MOZE REGISTROVAT
        $_SESSION['registerError'] = "Username already in use";
        header("Location:register.php");
        
    }
    
    
    
    
    
    
    
    
}