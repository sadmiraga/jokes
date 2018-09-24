<?php

session_start();
require_once 'connection.php';

$_SESSION['declineID'] = $_GET['declineID'];


$query = "DELETE FROM jokes WHERE id=?";
$stmt = $pdo->prepare($query);
$stmt->execute([$_SESSION['declineID']]);

header("Location:approveJokes.php");
