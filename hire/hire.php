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
    <link rel="stylesheet" href="hire.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./../navstyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
   <link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <title>hire</title>
</head>
<body>
    <?php 
    if (isset($_SESSION["fnm"])) {
        require_once "./../indexNav.php";
        include "./../phpBackend/dbh.php";
        include "./../phpBackend/execute.php";
        include "./../phpBackend/data.php";

        $data = new Data();
        $data->requires("select users.u_id, users.u_fname, usrResume.ur_info from minor.users, minor.usrResume where minor.users.u_id = minor.usrResume.u_id", []);
        $reqData = $data->select();
     ?>

        <div class="row">


            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="all-sk">
                    <div class="row">
                    <!--  -->
                    <?php 
                    $count=1;
                    foreach($reqData as $reqRow) { ?>
                        <div class="col-sm-4">
                            <div class="sk-person" style="margin-top:50px">
                                <div class="name"><b><?= $reqRow['u_fname'] ?></b></div>
                                    <div class="intro">
                                        <?= substr($reqRow['ur_info'],0, 90) ?>
                                    </div>
                                    <div class="form">
                                        <form action="" method="POST">
                                            <button class="view"> <a href="./../view/profile.php?id=<?=$reqRow['u_id'] ?>" >View </a> </button>
                                            <button class="chat"> <a href="./../chat/chat.php?id=<?=$reqRow['u_id'] ?>">Chat</a> </button>
                                        </form>
                                    </div>
                            </div>
                        </div>

                        <?php
                        
                        // if($count % 3 == 0){echo '</br></br>';}
                        // $count++;
                        ?>

                    <?php } ?>
                    <!--  -->
                </div>
            </div>

            <div class="col-sm-2"></div>


        </div>


    <?php
    } else {
    ?>
            <h1 style="color:black;position: fixed; top: 45%;left:50%; transform:translate(-50%, -50%)"> You Are Not Logged In </h1>
           <h5 style="color:black;position: fixed; top: 50%;left:50%; transform:translate(-50%, -50%)"> <a href="./../Index/index.php" >Click Here</a> To Go To Home Page </h5>
    <?php 
    }
    ?>
</body>
</html>