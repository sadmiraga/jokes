<?php
require_once 'connection.php';
require_once 'user_template.html';
session_start();

$_SESSION['editID'] = $_GET['editID'];

//SELECT TEXT FORE I KATEOGORIJE FORE 
$query = "SELECT * FROM jokes WHERE id=?";
$stmt = $pdo->prepare($query);
$stmt->execute([$_SESSION['editID']]);

while($row = $stmt -> fetch()){
    $idStareKategorije = $row['category_id'];
    $textStareFore = $row['jokeText'];
}



//SELECT IME STARE KATEGORIJE POMOCU PREDHODNO SELECTOVANOG ID-a

$stmt = $pdo->prepare("SELECT categoryName FROM category WHERE id=?");
$stmt->execute([$idStareKategorije]);
$imeStareKategorije = $stmt->fetchColumn();




echo '<form method="get" action="editJokeExecute.php">';
    
    //stari text od fore koju user zeli da promjeni
    echo '<textarea name="textForeEdit"> '.$textStareFore.' </textarea>';
    echo '<br>';
    
    //izbira nove kategoije
    echo '<select name="novakategorija">';
        // STARA KATEGORIJA
        echo '<option value="'.$imeStareKategorije.'">'.$imeStareKategorije.'</option>';
        // sve kategorije
        require_once 'optionFunction.php';
    echo '</select>';
    
    echo '<br>';
    
    //sumbit button
    echo '<input type="submit" name="editButton" value="change">';
echo '</form>';