<?php

session_start();
require_once 'connection.php';


$_SESSION['approveID'] = $_GET['approveID'];

$query = "UPDATE jokes SET approve='yes' WHERE id=?";
$stmt = $pdo->prepare($query);
$stmt->execute([$_SESSION['approveID']]);
header("Location:approveJokes.php");