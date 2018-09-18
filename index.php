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
        
      
        
        
       
        if(!isset($_SESSION['username'])){
            echo 'NOT LOGGED IN';
        } else 
        {
            echo $_SESSION['username'];
        }
        
       
        
        
        ?>
        
    </body>
</html>
