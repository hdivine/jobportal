<?php

if (isset($_POST["submit"])) {

    if(!empty($_POST["Title"]) && !empty($_POST["message"]) && !empty($_POST["opt"])) {
        $ttl = $_POST["Title"];
        $dsc = $_POST["message"];
        $opt = $_POST["opt"];
        if(preg_match("/[a-zA-Z0-9]/",$ttl) && preg_match("/[a-zA-Z0-9]/", $dsc)) {

            $validOpts = array("softwaredeveloper","hardwaredeveloper", "uidesigner", "webdeveloper", "other");
                                
            if (in_array($opt, $validOpts, true)) {

                include "./../../phpBackend/dbh.php";
                include "./../../phpBackend/execute.php";
                include "./../../phpBackend/data.php";


                session_start();

                $insrtIdea = new Data();
                $date = date('Y-m-d');
                $insrtIdea->requires("insert into minor.Ideas1 (i_title, i_desc, u_id, i_date, i_type) values (?, ?, ?, ?, ?)",[$ttl, $dsc, $_SESSION["uid"] ,$date, $opt]);
                $insrtIdea->inserOrDel();

                header("Location: ./../ideas.php?msg=done");
                exit();

            } else {
                header("Location: ./../../ideas.php");
                exit();
            }

        }

    } else {
        header("Location: ./../../ideas.php");
        exit();
    }

}