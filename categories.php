<?php
session_start();


        // PRIKAZ TEMPLATE STRANICE ZA GUESTA ILI USERA
        if(!isset($_SESSION['username'])){
            require_once 'guest_template.html';
            
        } else 
        {
            require_once 'user_template.html';
        }
    


require_once 'connection.php';
require_once 'categoryTemplate.html';


 