<?php

session_start();

require_once 'connection.php';

if(isset($_GET['registerSubmitButton'])){
    
    
    //informacije sa forma
    $ime = $_GET['firstName'];
    $prezime = $_GET['lastName'];
    $username = $_GET['username'];
    $email = $_GET['email'];
    $password = $_GET['password'];
    
    $stmt = $pdo->prepare("SELECT count(*) FROM users WHERE username=?");
    $stmt->execute([$username]);
    $usernameCount = $stmt->fetchColumn();
    
    //provjera da li vec postoji korisnik sa istim usernameom
    if($usernameCount == 0){
        
        $query = "INSERT INTO users (username,geslo,email,userType,firstName,lastName) VALUES (:username,:geslo,:email,3,:firstName,:lastName)";
        $stmt = $pdo -> prepare($query);
        $stmt -> execute(['username'=> $username, 'geslo' => $password, 'email'=> $email, 'firstName'=> $ime, 'lastName'=> $prezime]);
        
        header("Location:index.php");
        $_SESSION['username'] = $username;
        
        
        
    } else{
        
        // REDIRECT NA REGISTER STRANICU SA PORUKOM ZASTO SE NE MOZE REGISTROVAT
        $_SESSION['registerError'] = "Username already in use";
        header("Location:register.php");
        
    }
    
    
    
    
    
    echo '<br>';
    echo $ime;
    echo '<br>';
    echo $prezime;
    echo '<br>';
    echo $username;
    echo '<br>';
    echo $email;
    echo '<br>';
    echo $password;
    echo '<br>';
    
    
    
    
    
}