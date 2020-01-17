<?php
session_start();
session_regenerate_id();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>

    <link rel="stylesheet" href="profile.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./../navstyle.css">
     <script   src="https://code.jquery.com/jquery-3.4.0.js"   integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo="   crossorigin="anonymous"></script>

   <link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   

</head>
<body>
    
    <?php 
    if (isset($_SESSION["fnm"])) {
        require_once "./../indexNav.php";

        $u_id=htmlspecialchars($_GET["id"]);
        
        include "./../phpBackend/dbh.php";
        include "./../phpBackend/execute.php";
        include "./../phpBackend/data.php";



        $validId = new Data();
        $validId->requires("select u_id from minor.users where minor.users.u_id = ?", [$u_id]);
        $validId = $validId->select();

    

        if ($u_id === $validId[0]["u_id"]) {
            

            $data = new Data();
            $data->requires("select ur_info, ur_smry, ur_exp, u_fname from minor.users, minor.usrResume where users.u_id = usrResume.u_id and users.u_id = ".$u_id,[]);
            $reqData = $data->select();

            $skillData = new Data();
            $skillData->requires("select skills.s_type from minor.skills where minor.skills.u_id=?", [$u_id]);
            $skillDataRow = $skillData->select();

            $eduData = new Data();
            $eduData->requires("select education.edu_clgnm, education.marks from minor.education where minor.education.u_id=?", [$u_id]);
            $eduDataRow = $eduData->select();
     ?>

        <div class="row resume">

            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="name"><h3><?=$reqData[0]["u_fname"]?></h3></div>
                <div class="row">

                    <div class="col-sm-4">
                    <br>
                    <br>
                    <br>

                        <h5 class="main">INTRODUCTION</h5>

                    </div>
                    <div class="col-sm-8">
                        <div class="mainInfo">
                        <?php if (count($reqData)){ echo $reqData[0]["ur_info"]; }else{ echo "<div style='color'> please enter your Introduction</div>"; }?>
                        </div>
                    </div>



                </div>
                <div class="row">

                    <div class="col-sm-4">
                    <br>
                    <br>
                    <br>

                        <h5 class="main">EDUCATION</h5>

                    </div>
                    <div class="col-sm-8">
                        <div class="mainInfo">
                            <?php if(count($eduDataRow)) { ?>
                                <table>
                                    <tr>
                                        <th>Sr.No</th> <th>Collage Name</th> <th>Marks</th> 
                                    </tr>
                                    <?php
                                    for($i = 0; $i<count($eduDataRow); $i++) {
                                        echo "<tr> <td> ".($i+1)."</td> <td> ".$eduDataRow[$i]["edu_clgnm"]." </td> <td> ".$eduDataRow[$i]["marks"] ." </td></tr>";
                                        
                                    }
                                    unset($eduData);
                                    ?>

                                </table>
                            <?php } else {
                                 echo "<div style= 'color:red'>Values are empty</div>";
                            }
                            
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-sm-4">
                        <br>
                        <br>
                        <br>
                        <h5 class="main">SUMMARY OF QUALIFICATIONS
</h5>

                    </div>
                    <div class="col-sm-8">
                        <div class="mainInfo">
                       <?php if (count($reqData)){ echo $reqData[0]["ur_smry"]; }else{ echo "<div style='color'> please enter your qualification</div>"; }?>
                        </div>
                    </div>
                </div>

                 <div class="row">

                    <div class="col-sm-4">
                        <br>
                        <br>
                        <br>
                        <h5 class="main">PROFESSIONAL AND VOLUNTEER EXPERIENCE</h5>

                    </div>
                    <div class="col-sm-8">
                        <div class="mainInfo">
                        <?php if (count($reqData)){ echo $reqData[0]["ur_exp"]; }else{ echo "<div style='color'> please enter your qualification</div>"; }?>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-sm-4">
                        <br>
                        <br>
                        <br>
                        <h5 class="main">SKILLS</h5>

                       

                    </div>

                    <div class="col-sm-8">
                        <div class="mainInfo">
                            <?php
                                if(count($skillDataRow)) { 

                                for($i=0; $i<count($skillDataRow); $i++) {
                                    echo ($i+1)." ".$skillDataRow[$i]["s_type"]."<br>";
                                }
                                unset($skillData);

                                } else {
                                    echo "<div style='color:red'>Values are empty</div>";
                               }
                               

                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2"></div>

        </div>

        <footer>
            <div class="copy">&copy Copyright, Job Infinity</div>
        </footer>



    <?php
    } 
}else {
    ?>
        <h1 style="color:black;position: fixed; top: 45%;left:50%; transform:translate(-50%, -50%)"> You Are Not Logged In </h1>
        <h5 style="color:black;position: fixed; top: 50%;left:50%; transform:translate(-50%, -50%)"> <a href="./../Index/index.php" >Click Here</a> To Go To Home Page </h5>
    <?php 
    }

    ?>
</body>
</html>