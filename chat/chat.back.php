<?php

if(isset($_POST["submit"])) {
    if (empty($_POST["chat"])) {
        header("Location: ./chat.php?err=emptMsg");
        exit();
    } else {
        header("Location: ./chat.php?msg=done");
        exit();
    }
}

