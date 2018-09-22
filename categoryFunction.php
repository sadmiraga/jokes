<?php
//session_start();




$stmt = $pdo->query('SELECT categoryName FROM category');
foreach ($stmt as $row)
{
    //ispis kategorija u UL I LI 
    echo '<li>';
        echo '<a href="redirectCategoryname.php?imeKategorije='.$row['categoryName'].'">';
            echo $row['categoryName'];
        echo '</a>';
    echo '</li>';   
  
}

