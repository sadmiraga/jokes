<?php
session_start();
require_once 'connection.php';

if(isset($_GET['addJokeSubmit'])){
    
    //varijable iz forma
    $jokeText = $_GET['jokeText'];
    $category = $_GET['category'];
    
    
    //ID USERA KOJI DODAJE FORU
    $stmt = $pdo->prepare("SELECT id FROM users WHERE username=:username");
    $stmt->execute(['username'=>$_SESSION['username']]);
    $userID  = $stmt->fetchColumn();
    
    //AKO USER NIJE UPISAO TEXT ZA VIC
    if($jokeText == ""){
        $_SESSION['addJokeError']="Please enter text of the joke";
        header("Location:addJoke.php");
    } else if ($category == ""){
        
        //AKO NIJE ODABRAO KATEGORIJU
        
        $_SESSION['addJokeError'] = "Please choose category";
        header("Location:addJoke.php");
    } else {
        
        //ID ZA KATEGORIJU U KOJU IDE FORA
        $stmt = $pdo->prepare("SELECT id FROM category WHERE categoryName=:categoryName");
        $stmt->execute(['categoryName'=>$category]);
        $categoryID = $stmt->fetchColumn();
        
        //UBACIVANJE VICA U BAZU PODATAKA
        $query = "INSERT INTO jokes (category_id,user_id,jokeText,approve,likes) VALUES (:categoryID,:userID,:jokeText,'no',0)";
        $stmt2 = $pdo->prepare($query);
        $stmt2->execute(['categoryID'=>$categoryID,'userID'=>$userID,'jokeText'=>$jokeText]);
        header("Location:index.php");
        
        
    }
    
    
    
    
    
    
    
    
}
