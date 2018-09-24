<?php
session_start();

require_once 'connection.php';


// ID od fore koju user zeli da izbrise
$_SESSION['deleteID'] = $_GET['deleteID'];

$query= "DELETE FROM jokes WHERE id=?";
$stmt = $pdo->prepare($query);
$stmt->execute([$_SESSION['deleteID']]);

header("Location:myProfile.php");

