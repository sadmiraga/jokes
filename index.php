<?php
    session_start();
    
    //PRAZAN ERROR ZA REGISTER,LOGIN,ADD JOKE
    $_SESSION['registerError'] ="";
    $_SESSION['loginError']="";
    $_SESSION['addJokeError']="";
    
  
    
    
        // PRIKAZ TEMPLATE STRANICE ZA GUESTA ILI USERA
        if(!isset($_SESSION['username'])){
            require_once 'guest_template.html';
            
        } else 
        {
            require_once 'user_template.html';
        }
    
    
    
    
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        require_once 'connection.php';
        
        
       
        if(!isset($_SESSION['username'])){
            echo 'NOT LOGGED IN';
            
            require_once 'notLoggedInHomeTemplate.html';
            
        } else 
        {
            echo 'logged as : ';
            echo $_SESSION['username'];
            echo '<br>';
            
            
            // ID OD PRIJAVLJENOG USERA
            $stmt = $pdo->prepare("SELECT id FROM users WHERE username=:username LIMIT 1 ");
            $stmt->execute(['username'=>$_SESSION['username']]);
            $userID  = $stmt->fetchColumn();
            $_SESSION['userID'] = $userID;
            
            
            $stmt = $pdo->prepare("SELECT count(*) FROM follows WHERE following_id=?");
            $stmt->execute([$_SESSION['userID']]);
            $followingCount = $stmt->fetchColumn();
            
            if($followingCount== 0){
                echo 'You are not following anyone.';
                echo 'Find people to follow on <a href="categories.php" >categories</a> ';
                
            } else {
                require_once 'homeTemplate.html';
            }
            
            
            
            
        }
        
        
        
        
        ?>
        
    </body>
</html>
