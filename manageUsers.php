<?php

require_once 'connection.php';
require_once 'user_template.html';


//SELECT ZA SVE USERE I ZA NJIHOV TIP 
// MOZDA DA SE DODA DA USER NE MOZE PROMJENIT SVOJ USer TYPE (where not)
$query = "SELECT * FROM users";
foreach ($pdo->query($query) as $row){
    echo $row['username'];
    echo '<br>';
    
    // FORMA ZA BIRANJE NOVOG USER TYPEA
    echo '<form method="get" action="manageUsersExecute.php">';
        echo '<input type="hidden" name="idUsera" value="'.$row['id'].'">';
        echo '<select name="newUserType">';
            echo '<option selected="selected" value="'.$row['userType'].'">'.$row['userType'].'</option>';
            echo '<option value="1">1</option>';
            echo '<option value="2">2</option>';
            echo '<option value="3">3</option>';
        echo '</select>';
        echo '<br>';
        echo '<input value="change" type="submit" name="changeUserTypeButton">';
    echo '</form>';
    
    
    
}