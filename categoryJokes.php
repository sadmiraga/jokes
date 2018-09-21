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


// ID izabrane kategorije viceva
$stmt = $pdo->prepare("SELECT id FROM category WHERE categoryName=:categoryName");
$stmt -> execute(["categoryName"=>$imeKategorije]);
$categoryID = $stmt->fetchColumn();



// SELECT STAVEK ZA FORE
$query = "SELECT jokeText,likes FROM jokes WHERE category_id=:category_id";
$stmt = $pdo->prepare($query);
$stmt->execute(['category_id'=>$categoryID]);

echo '<br>';
while ($row = $stmt->fetch()){
    echo $row['jokeText'];
    echo '<br>';
    echo 'likes: ';
    echo $row['likes'];
    echo '<br>';
}





