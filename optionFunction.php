<?php


$stmt = $pdo->query('SELECT categoryName FROM category');
foreach ($stmt as $row)
{
    echo '<option value="'.$row['categoryName'].'" >';
    echo $row['categoryName'];
    echo '</option>';
    echo '<br>';
}