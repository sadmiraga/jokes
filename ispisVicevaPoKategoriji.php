<?php



// ID izabrane kategorije viceva
$stmt = $pdo->prepare("SELECT id FROM category WHERE categoryName=:categoryName");
$stmt -> execute(["categoryName"=>$imeKategorije]);
$categoryID = $stmt->fetchColumn();



// SELECT STAVEK ZA FORE
$query = "SELECT jokeText,likes,user_id FROM jokes WHERE category_id=:category_id";
$stmt = $pdo->prepare($query);
$stmt->execute(['category_id'=>$categoryID]);
echo '<br>';



while($row = $stmt->fetch()){
    
    //LINK PROFILNE OD USERA KOJI JE OBJAVIO SLIKU
    $stmt2=$pdo->prepare("SELECT profilePictureUrl FROM profilepictures WHERE user_id=:juzerID");
    $stmt2->execute(['juzerID'=>$row['user_id']]);
    $linkSlike = $stmt2->fetchColumn();
    
    
    echo '<div class="kontenjer">';
        
        //Ispis Profilne Slike
        echo '<img class="circle-pic" src="'.$linkSlike.'" >';
        
        
        
        // TEXT VICA
        echo '<div class="fora">';
            echo $row['jokeText'];
        echo '</div>';
        
        
        // LIKE BUTTON
        echo '<div class="like" >';
            echo 'Like';
        echo '</div>';
        
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








  