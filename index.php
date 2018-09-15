<?php
    session_start();
    $_SESSION['registerError'] ="";
    $_SESSION['username']="";
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once 'template.html';
        require_once 'connection.php';
        echo $_SESSION['username'];
        
        
        ?>
        
    </body>
</html>
