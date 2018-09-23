<?php

   //SELECT STAVEK ZA JOKE
        
        $query = "SELECT * FROM jokes WHERE user_id IN(SELECT followed_id FROM follows WHERE following_id = ?) ORDER BY time DESC";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$_SESSION['userID']]);
        
        while($row = $stmt->fetch()){
            
            //SELECT ID OD USERA KOJI JE OBJAVIO FORU
            $stmt2= $pdo->prepare("SELECT profilePictureUrl FROM profilepictures WHERE user_id = ? ");
            $stmt2->execute([$row['user_id']]);
            $linkSlikeUsera = $stmt2->fetchColumn();
            
            echo '<div class="kontenjer">';
            
                //Ispis slike
                echo '<a class="likeHref" href="userProfile.php?idOdUseraSaPosta='.$row['user_id'].'">';
                    echo '<img class="circle-pic" src="'.$linkSlikeUsera.'">';
                echo '</a>';
            
                // ISPIS VICA
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
                echo '<a href="userProfile.php?idOdUseraSaPosta='.$row['user_id'].'">';
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
        
        
        
        
        