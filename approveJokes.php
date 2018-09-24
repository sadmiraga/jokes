<?php
session_start();
require_once 'connection.php';
require_once 'user_template.html';



// SELECT SVE FORE KOJE IMAJU APPROVE NO 

//PROMJENI ORDER BY DEBILU
$query = "SELECT * FROM jokes WHERE approve='no' ORDER BY time DESC ";
foreach($pdo->query($query) as $row ){
    
    // TEXT FORE KOJA NIJE ODOBRENA
    echo $row['jokeText'];
    echo '<br>';
    
    // LINK ZA ODOBRITI FORU
    echo '<a href="approve.php?approveID='.$row['id'].'">';
        echo 'Approve';
    echo '</a>';
    
    
    //razmak
    echo '             ';
    
    // LINK ZA IZBRISAT FORU
    echo '<a href="decline.php?declineID='.$row['id'].'" >';
        echo 'Decline';
    echo '</a>';
    
    echo '<br>';
    echo '<br>';
    
}