<?php
if (isset($_POST["submit"])) {
    
    $cmnt = htmlspecialchars($_POST["cmnt"]);

    if (empty($cmnt)){
        header("Location: ./../idea.php?err=emtComment") ;    
        exit();
    } else {
        if(!preg_match("/[a-zA-Z0-9]/", $cmnt)){
            header("Location: ./../idea.php?err=invalComment");     
            exit();
        } else {
            header("Location: ./../idea.php?msg=valid");
            exit();
        }
    }
}