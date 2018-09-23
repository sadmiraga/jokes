<?php

require_once 'connection.php';

//ISPIS USERNAMEA   
    echo '<div id="username">';
        echo $_SESSION['username'];
    echo '</div>';
            
            
//URL SLIKE OD USERA       
    $stmt = $pdo->prepare("SELECT profilePictureUrl FROM profilepictures WHERE user_id=?");
    $stmt ->execute([$_SESSION['userID']]);
    $picUrl = $stmt->fetchColumn();

    
//DODAVANJE SLIKE
    echo '<img id="slikaProfila" alt="error" src="';
        echo $picUrl;
    echo '">';
    

//PROMJENI SLIKU PROFILA
    echo '<div id="changePictureHelp">';
        echo '<a id="changePictureLink" href="changeProfilePicture.php">';
            echo '<div id="changePicture">';
                echo 'Change Picture';
            echo '</div>';
        echo '</a>';
    echo '</div>';
    
//ADMIN PANEL
    
    //PROVJERA KOJEG NIVOA JE USER
        $stmt = $pdo->prepare("SELECT userType FROM users WHERE id=?");
        $stmt->execute([$_SESSION['userID']]);
        $userType = $stmt->fetchColumn();
            
       
            
                //ISPIS SADRZAJA U ADMIN PANELU
                    if($userType == 1){
                        
                        //ADMIN PANEL NASLOV
                            echo '<div id="adminPanel">';
                                echo 'ADMIN PANEL';
                            echo '</div>';
                        
                        //ADD CATEGORY
                                
                            //ADD CATEGORY
                            echo '<div id="addCategoryHelp">';
                                echo '<a id="addCategoryLink" href="addCategory.php">';
                                    echo '<div id="addCategory">';
                                        echo 'ADD CATEGORY';
                                    echo '</div>';
                                echo '</a>';
                            echo '</div>';
                                
                            
                        
                        //APPROVE JOKES
                            
                            echo '<div id="approveJokesHelp">';
                                echo '<a id="approveJokesLink" href="approveJokes.php">';
                                    echo '<div id="approveJokes">';
                                        echo 'APPROVE JOKES';
                                    echo '</div>';
                                echo '</a>';
                            echo '</div>';
                        
                        //MANAGE USERS
                            
                            echo '<div id="manageUsersHelp">';
                                echo '<a id="manageUsersLink" href="manageUsers.php">';
                                    echo '<div id="manageUsers">';
                                        echo 'MANAGE USERS';
                                    echo '</div>';
                                echo '</a>';
                            echo '</div>';
                            
       
                    } else if($userType==2){
                        
                        //ADMIN PANEL NASLOV
                        echo '<div id="adminPanel">';
                            echo 'Admin Panel';
                        echo '</div>';
                        
                        //APROVE JOKES
                            echo '<div id="approveJokesHelp">';
                                echo '<a id="approveJokesLink" href="approveJokes.php">';
                                    echo '<div id="approveJokes">';
                                        echo 'APPROVE JOKES';
                                    echo '</div>';
                                echo '</a>';
                            echo '</div>';
                    } 
                    
                    
// MY JOKES

    //JOKES PANEL
            echo '<div id="myJokes">';
                echo 'MY JOKES';
            echo '</div>';
                    
    
        //SVE FORE SA MOG PROFILA 
            $query = "SELECT * FROM jokes WHERE user_id=? ORDER BY time DESC";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$_SESSION['userID']]);
    
            //ISPIS SA WHILE POMOCU SELECT STAVKA
                while($row = $stmt->fetch()){
                    
                    //TEXT VICA
                        echo '<div id="okvirFore">';
                            echo $row['jokeText'];
                        echo '</div>';
                    
                    //EDIT 
                        echo '<div id="editJokeHelp">';
                            echo '<a id="editJokeLink" href="#">';
                                echo '<div id="editJoke">';
                                    echo 'EDIT';
                                echo '</div>';
                            echo '</a>';
                        echo '</div>';
                    
                    //DELETE
                        echo '<div id="deleteJokeHelp">';
                            echo '<a id="deleteJokeLink" href="#">';
                                echo '<div id="deleteJoke">';
                                    echo 'DELETE ';
                                echo '</div>';
                            echo '</a>';
                        echo '</div>';
                    
                    
                    
                    
                    
                }
    