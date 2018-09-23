<?php

require_once 'connection.php';
session_start();

$link = $_SESSION['link'];
$id =  $_SESSION['userID'];

//UNOS U BAZU
        
        
        $sql  = "UPDATE profilepictures SET profilePictureUrl=? WHERE user_id=? ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$link,$id]);
    
        header("Location:myProfile.php");