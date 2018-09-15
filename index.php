<?php
    session_start();
    
    //PRAZAN ERROR ZA REGISTER I LOGIN
    $_SESSION['registerError'] ="";
    $_SESSION['loginError']="";

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
            echo 'FUCK NOT LOGGED IN';
        } else 
        {
            echo $_SESSION['username'];
        }
        
        
        ?>
        
    </body>
</html>
