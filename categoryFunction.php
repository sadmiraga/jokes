<?php
session_start();


echo '<script type="text/javascript"> function sessionHelp(categoryName){'.$_SESSION['categoryNameJokes'].'=categoryName;} </script>';



$stmt = $pdo->query('SELECT categoryName FROM category');
foreach ($stmt as $row)
{
    //ispis kategorija u UL I LI 
    echo '<li onclick="sessionHelp('.$row['categoryName'].')" >';
        echo '<a href="categoryJokes.php">';
            echo $row['categoryName'];
        echo '</a>';
    echo '</li>';   
  
}