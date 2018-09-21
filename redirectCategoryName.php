<?php
session_start();

// dobijanje vrijednosti sa link na koji je clicked, ta vrijednost ide u Sešn i preusmjerava stranicu na listu fori iz te kategorije
$_SESSION['categoryNameJoke'] = $_GET['imeKategorije'];
echo $_SESSION['categoryNameJoke'];
header("Location:categoryJokes.php");



