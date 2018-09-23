<?php



   //SELECT STAVEK ZA JOKE
        
        $query = "SELECT * FROM jokes  ORDER BY time DESC";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        
        while($row = $stmt->fetch()){
            
            //SELECT ID OD USERA KOJI JE OBJAVIO FORU
            $stmt2= $pdo->prepare("SELECT profilePictureUrl FROM profilepictures WHERE user_id = ? ");
            $stmt2->execute([$row['user_id']]);
            $linkSlikeUsera = $stmt2->fetchColumn();
            
            echo '<div class="kontenjer">';
            
                //Ispis slike
                echo '<a class="likeHref" href="login.php">';
                    echo '<img class="circle-pic" src="'.$linkSlikeUsera.'">';
                echo '</a>';
            
                // ISPIS VICA
                echo '<div class="fora">';
                    echo $row['jokeText'];
                echo '</div>';
                
                    
            
            
                // LIKE BUTTON
                echo '<a class="likeHref" href="login.php">';
                    echo '<div class="like" >';
                        echo 'Like';
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
        
        
        
        
        