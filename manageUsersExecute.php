<?php

session_start();
require_once 'connection.php';

if(isset($_GET['changeUserTypeButton'])){
    $idUsera = $_GET['idUsera'];
    $noviUserType = $_GET['newUserType'];
    
    //UPDATE PROMJENA USER TYPEA
    $query = "UPDATE users SET userType=? WHERE id=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$noviUserType,$idUsera]);
    header("Location:myProfile.php");
    
    
    
}
