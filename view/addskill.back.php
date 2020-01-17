<?php
        session_start();

if (isset($_POST["submit"])) {
    $intro = $_POST["intro"];
    $edu1 = $_POST["cnm1"];
    $edu2 = $_POST["cnm2"];
    $edu3 = $_POST["cnm3"];
    $per1 = $_POST["percent1"];
    $per2 = $_POST["percent2"];
    $per3 = $_POST["percent2"];

    $sumry = htmlspecialchars($_POST["sumry"]);

    $exp = htmlspecialchars($_POST["exp"]);
    $skill1 = htmlspecialchars($_POST["skill1"]);
    $skill2 = htmlspecialchars($_POST["skill2"]);

    if(!empty($intro) && (!empty($edu1) || !empty($edu2) || !empty($edu3)) && (!empty($per1) || !empty($per2) || !empty($per3)) && !empty($sumry) && !empty($exp) && (!empty($skill1) || !empty($skill2)) ) {


        if(strlen($intro) >= 100 && strlen($sumry) >= 100 && strlen($exp) >=100) {

            if( ((!empty($edu1) && preg_match("/[a-zA-Z]/", $edu1) ) ||(!empty($edu2) && preg_match("/[a-zA-Z]/", $edu2) ) ||(!empty($edu3) && preg_match("/[a-zA-Z]/", $edu3) ))  && ((!empty($per1) && preg_match("/[0-9]/", $per1) ) || (!empty($per2) && preg_match("/[0-9]/", $per2)) || (!empty($per3) && preg_match("/[0-9]/", $per3)) ) && (isset($skill1) || isset($skill2)) ) {
                include "./../phpBackend/dbh.php";
                include "./../phpBackend/execute.php";
                include "./../phpBackend/data.php";
                
                // insrt into smry exp

                $insResume = new Data();
                $insResume->requires("insert into minor.usrResume (u_id, ur_info,ur_smry, ur_exp) values(?,?,?,?)",[$_SESSION["uid"],$intro, $sumry, $exp]);
                $insResume->inserOrDel();
                unset($insResume);

                // insrt edu


                    $insEdu = new Data();
                    if(!empty($edu1) && !empty($per1)) {
                        $insEdu->requires("insert into minor.education (u_id, edu_clgnm,marks) values (?, ?, ?)",[$_SESSION["uid"], $edu1, $per1]);
                        $insEdu->inserOrDel();
                    }
                    if(!empty($edu2) && !empty($per2)) {
                        $insEdu->requires("insert into minor.education (u_id, edu_clgnm,marks) values (?, ?, ?)",[$_SESSION["uid"], $edu2, $per2]);
                        $insEdu->inserOrDel();
                    }
                    if(!empty($edu3) && !empty($per3)) {
                        $insEdu->requires("insert into minor.education (u_id, edu_clgnm,marks) values (?, ?, ?)",[$_SESSION["uid"], $edu3, $per3]);
                        $insEdu->inserOrDel();
                    }
                    unset($insSkills);



                // insrt skill
                $insSkills = new Data();
                $validOpts = array("softwaredeveloper","hardwaredeveloper", "uidesigner", "webdeveloper", "other");

                
                if (isset($skill1) && in_array($skill1, $validOpts) && isset($skill2) && in_array($skill2, $validOpts) && $skill1 === $skill2) {
                    $insSkills->requires("insert into minor.skills (u_id, s_type) values (?, ?)",[$_SESSION["uid"], $skill1]);
                    $insSkills->inserOrDel();
                } else {
                    if(isset($skill1) && in_array($skill1, $validOpts)) {
                        $insSkills->requires("insert into minor.skills (u_id, s_type) values (?, ?)",[$_SESSION["uid"], $skill1]);
                        $insSkills->inserOrDel();
                    }
                    if(isset($skill2) && in_array($skill2, $validOpts)) {
                        $insSkills->requires("insert into minor.skills (u_id, s_type) values (?, ?)",[$_SESSION["uid"], $skill2]);
                        $insSkills->inserOrDel();
                    }
                    unset($insSkills);
                    $_SESSION['addedskills'] = true;

                    header("Location: ./../Index/index.php");
                    exit();
                }
            } else {
                header("Location: ./addskill.php?err=inval");
                exit();
                
                }
            
        } else {
            header("Location: ./addskill.php?err=shortans");
            exit();
        }
            
        

    } else {
            
            header("Location: ./addskill.php?err=emtField");
            exit();
    }
} else {
    header("Location: ./addskill.php");
    exit();
}