<?php



// ID izabrane kategorije viceva
$stmt = $pdo->prepare("SELECT id FROM category WHERE categoryName=:categoryName");
$stmt -> execute(["categoryName"=>$imeKategorije]);
$categoryID = $stmt->fetchColumn();



// SELECT STAVEK ZA FORE
$query = "SELECT id,jokeText,likes,user_id FROM jokes WHERE category_id=:category_id";
$stmt = $pdo->prepare($query);
$stmt->execute(['category_id'=>$categoryID]);
echo '<br>';



while($row = $stmt->fetch()){
    
    //LINK PROFILNE OD USERA KOJI JE OBJAVIO SLIKU
    $stmt2=$pdo->prepare("SELECT profilePictureUrl FROM profilepictures WHERE user_id=:juzerID");
    $stmt2->execute(['juzerID'=>$row['user_id']]);
    $linkSlike = $stmt2->fetchColumn();
    
    
    echo '<div class="kontenjer">';
        
        // SLIKA PROFILA
            //href koji salje ID od usera na cij je profil kliknuto 
            echo '<a href="userProfile.php?idOdUseraSaPosta='.$row['user_id'].'">';
                //ispis slike
                echo '<img class="circle-pic" src="'.$linkSlike.'" >';
            echo '</a>';
        
        
        // TEXT VICA
        echo '<div class="fora">';
            echo $row['jokeText'];
        echo '</div>';
        
        
        //PROVJERA DA LI JE USER VEC LIKEDOVO OBJAVU
        $stmt3 = $pdo->prepare("SELECT count(*) FROM likes WHERE user_id=? AND liked_Joke_Id=? ");
        $stmt3->execute([$_SESSION['userID'],$row['id']]);
        $jesilLajko = $stmt3->fetchColumn();
        
        if($jesilLajko == 0){
            $likeOrNoLike = "Like";
        } else {
            $likeOrNoLike = "Unlike";
        }
        
        
        
        
        // LIKE BUTTON
        echo '<a class="likeHref" href="likeExecute.php?likeID='.$row['id'].'">';
            echo '<div class="like" >';
                echo $likeOrNoLike;
            echo '</div>';
        echo '</a>';
        
        
        
        
        // BROJ LAJKOVA
        echo '<div class="numLikes">';
            echo $row['likes'];
        echo '</div>';
        
        //SHARE
        echo '<div class="share" >';
            echo 'Share';
        echo '</div>';
        
        
    
    echo '</div>';
    
}








  