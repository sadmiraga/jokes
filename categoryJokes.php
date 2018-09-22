<?php
session_start();
require_once 'connection.php';

        // PRIKAZ TEMPLATE STRANICE ZA GUESTA ILI USERA
        if(!isset($_SESSION['username'])){
            require_once 'guest_template.html';
            $prijavljen = "ne";
            
        } else 
        {
            require_once 'user_template.html';
            $prijavljen="da";
        }



echo $_SESSION['categoryNameJoke'];
$imeKategorije = $_SESSION['categoryNameJoke'];






require_once 'categoryJokesTemplate.html';





