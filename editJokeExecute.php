<?php
require_once 'connection.php';
session_start();


if(isset($_GET['editButton'])){
    $noviTextFore = $_GET['textForeEdit'];
    $novaKategorijaFore = $_GET['novakategorija'];
    
    //SELECT ID OD IZABRANE FORE 
    $stmt = $pdo->prepare("SELECT id FROM category WHERE categoryName=?");
    $stmt->execute([$novaKategorijaFore]);
    $idNoveKategorijeFore = $stmt->fetchColumn();
    
    //UPDATE STAVEK -- PROMJENA STARIH NA NOVO UNESENE VRIJEDNOSTI 
    $query = "UPDATE jokes SET category_id=?, jokeText=? WHERE id=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$idNoveKategorijeFore,$noviTextFore, $_SESSION['editID']]);
    header("Location:myProfile.php");
    
}