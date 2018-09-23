<?php
session_start();
require_once 'connection.php';

// ID FORE KOJA TREBA DA BUDE LAJKAN
$_SESSION['idFore'] = $_GET['idFore'];
$idFore = $_SESSION['idFore'];
echo 'id fore : ';
echo $idFore;
echo '<br>';
echo 'id usera : '.$_SESSION['userID'];

echo '<br>';


//PROVJERA DA LI JE USER VEC LIKEOVAO OVU OBJAVU
$stmt = $pdo->prepare("SELECT count(*) FROM likes WHERE user_id=? AND liked_Joke_Id=? ");
$stmt->execute([$_SESSION['userID'],$idFore]);
$jesilLajko = $stmt->fetchColumn();


if ( $jesilLajko == 0){
    
    
    //LIKE EXECUTE
    
    // DODAVANJE LIKEA U ENTITET JOKES lIKE+1
    $query = "UPDATE jokes SET likes=likes+1 WHERE id=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$idFore]);
    
    //INSERT LIKE U LIKES ENTIET
    $query = "INSERT INTO likes (user_id,liked_Joke_Id) VALUES (?,?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_SESSION['userID'],$idFore]);
    
    echo 'Fora lajkovana';
    
    header("Location:index.php");

    
} else {
    
    
    //UNLIKE EXECUTE
    
    //SMANJIVANJE LIKETOVA
    $query = "UPDATE jokes SET likes=likes-1 WHERE id=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$idFore]);
    
    //DELETE LIKE U LIKES ENITETI
    $query = "DELETE FROM likes WHERE user_id=? AND liked_Joke_Id=?";
    $stmt = $pdo ->prepare($query);
    $stmt->execute([$_SESSION['userID'],$idFore]);
    
    echo 'fora Unlikeodvana';
    
    header("Location:index.php");
    
    
}