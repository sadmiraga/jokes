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
        } else 
        {
            echo $_SESSION['username'];
            
            
            // ID OD PRIJAVLJENOG USERA
            $stmt = $pdo->prepare("SELECT id FROM users WHERE username=:username LIMIT 1 ");
            $stmt->execute(['username'=>$_SESSION['username']]);
            $userID  = $stmt->fetchColumn();
            $_SESSION['userID'] = $userID;
            echo '<br>';
            echo $_SESSION['userID'];
            
        }
        
        
        ?>
        
    </body>
</html>
