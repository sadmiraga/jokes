<?php
session_start();
require_once 'connection.php';


echo $_SESSION['idOdUseraSaPosta'];
echo '<br>';

//PROVJERA DA LI USER VEC PRATI USERA
$stmt = $pdo->prepare("SELECT count(*) FROM follows WHERE following_id=? AND followed_id=?");
$stmt->execute([$_SESSION['userID'],$_SESSION['idOdUseraSaPosta']]);
$followingCount = $stmt->fetchColumn();

echo $followingCount;

//EXECUTE ZA FOLLOW ILI UNFOLLOW ZAVISNO OD TOGA DA LI GA PRATI ILI NE
if($followingCount == 0){
$query = "INSERT INTO follows (following_id,followed_id) VALUES (?,?)";
$stmt = $pdo->prepare($query);
$stmt->execute([$_SESSION['userID'],$_SESSION['idOdUseraSaPosta']]); 
header("Location:index.php");

} else {
    
    $query = "DELETE FROM follows WHERE following_id=? AND followed_id=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_SESSION['userID'],$_SESSION['idOdUseraSaPosta']]);
    header("Location:index.php");
    
    
    
    
}






