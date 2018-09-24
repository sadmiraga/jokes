<?php
session_start();
require_once 'connection.php';



if(isset($_GET['submitDugme'])){
    $CategoryName = $_GET['imeKategorije'];
    
    $query = "INSERT INTO category (categoryName) VALUES (?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$CategoryName]);
    header("Location:categories.php");
    
    
    
    
}