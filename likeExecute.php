<?php
session_start();
require_once 'connection.php';


$_SESSION['likeID'] = $_GET['likeID'];
echo $_SESSION['likeID'];



//PROVJERA DA LI JE USER VEC LIKEOVAO OVU OBJAVU
$stmt = $pdo->prepare("SELECT count(*) FROM likes WHERE user_id=? AND liked_Joke_Id=? ");
$stmt->execute([$_SESSION['userID'],$_SESSION['likeID']]);
$jesilLajko = $stmt->fetchColumn();



if($jesilLajko == 0){
    
    // DODAVANJE LIKEA U ENTITET JOKES lIKE+1
    $query = "UPDATE jokes SET likes=likes+1 WHERE id=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_SESSION['likeID']]);
    
    
    //INSERT LIKE U LIKES ENTIET
    $query = "INSERT INTO likes (user_id,liked_Joke_Id) VALUES (?,?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_SESSION['userID'],$_SESSION['likeID']]);

    
    header("Location:categoryJokes.php");
} else {
    
    //UNLIKE EXECUTE
    
    //SMANJIVANJE LIKETOVA
    $query = "UPDATE jokes SET likes=likes-1 WHERE id=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_SESSION['likeID']]);
    
    //DELETE LIKE U LIKES ENITETI
    $query = "DELETE FROM likes WHERE user_id=? AND liked_Joke_Id=?";
    $stmt = $pdo ->prepare($query);
    $stmt->execute([$_SESSION['userID'],$_SESSION['likeID']]);
    
    header("Location:categoryjokes.php");
    
    
}







