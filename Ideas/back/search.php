<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
</body>
</html>


<?php

if(isset($_POST["submit"])) {
    
    if (!empty($_POST["srch"]) || isset($_POST["options"]) ) {
        $valid=false;   
        $arrtostr=""; 

        if(!empty($_POST["srch"])) {
            $nmorttl = htmlspecialchars($_POST["srch"]);

            if(!preg_match("/[a-zA-z0-9]/", $nmorttl)) {
                header("Location: ./../ideas.php?err=invalidSearch");
                exit();
            } else {
                $valid = true;
            }
        }    
        if(isset($_POST["options"]))  {
            $options = $_POST["options"];

            $validOpts = array("softwaredeveloper","hardwaredeveloper", "uidesigner", "webdeveloper", "other");
            
            foreach($options as $key => $value) {

                if (in_array(htmlspecialchars($value), $validOpts, true)) {
                    $option[$key] = htmlspecialchars($value);
                    $arrtostr .= $option[$key]."-";
                } else {

                    header("Location: ./../ideas.php?err=invalidOption");
                    exit();
                }
            }
        
            
        }

        if ($valid === true) {
            
        } 

        
        
    } else {

        header("Location: ./../search.php?err=emptyField");
        exit();

    }



} else {
    header("Location: ./../search.php");
    exit();
}