<?php
session_start();
require_once 'connection.php';

$help = $_SESSION['idOdUseraSaPosta'];

$_SESSION['userLikeID'] = $_GET['userLikeID'];
echo $_SESSION['likeID'];



//PROVJERA DA LI JE USER VEC LIKEOVAO OVU OBJAVU
$stmt = $pdo->prepare("SELECT count(*) FROM likes WHERE user_id=? AND liked_Joke_Id=? ");
$stmt->execute([$_SESSION['userID'],$_SESSION['userLikeID']]);
$jesilLajko = $stmt->fetchColumn();



if($jesilLajko == 0){
    
    // DODAVANJE LIKEA U ENTITET JOKES lIKE+1
    $query = "UPDATE jokes SET likes=likes+1 WHERE id=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_SESSION['userLikeID']]);
    
    
    //INSERT LIKE U LIKES ENTIET
    $query = "INSERT INTO likes (user_id,liked_Joke_Id) VALUES (?,?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_SESSION['userID'],$_SESSION['userLikeID']]);

    
    header("Location:categories.php");
} else {
    
    //UNLIKE EXECUTE
    
    //SMANJIVANJE LIKETOVA
    $query = "UPDATE jokes SET likes=likes-1 WHERE id=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_SESSION['userLikeID']]);
    
    //DELETE LIKE U LIKES ENITETI
    $query = "DELETE FROM likes WHERE user_id=? AND liked_Joke_Id=?";
    $stmt = $pdo ->prepare($query);
    $stmt->execute([$_SESSION['userID'],$_SESSION['userLikeID']]);
    
    header("Location:categories.php");
    
    
}







