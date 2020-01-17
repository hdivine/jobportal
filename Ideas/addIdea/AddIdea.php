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
    <title>Add new idea</title>
    <link rel="stylesheet"  href="style.css?v=<?=time();?>">
    <link rel="stylesheet" href="./../../navstyle.css?v=<?= time();?>">
    <link rel="stylesheet"  href="../../bootstrap/css/bootstrap.min.css" >
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script   src="https://code.jquery.com/jquery-3.4.0.js"   integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo="   crossorigin="anonymous"></script>


</head>
<body>
    
    <?php 
    if(isset($_SESSION["fnm"])) {
        require_once "./../../indexNav.php";
     ?>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">

                <div class="head">
                    <br><br><br>
                    <h1>Job Infinity</h1><br>
                    <h2>Got an amazing job oppurtunity / idea?</h2>
                </div>

                <div class="title">
                    <form id="title-form" method="post" action="./addidea.back.php">
                        <input name="Title" type="text" class="title-control" placeholder="Title"  required ><br>    
                        <textarea name="message" class="title-control" placeholder="Description" rows="4" required></textarea><br><br>
                    
                            <p style="text-align:center">  Category</p>
                            <select name="opt" >
                    
                                <option value="softwaredeveloper">Software Developer</option>
                                <option value="hardwaredeveloper">Hardware Developer</option>
                                <option value="uidesigner">UI Designer</option>
                                <option value="webdeveloper">Web Devloper</option>
                                <option value="other">Other Worker</option> 

                            </select><br><br>
                        <input type="submit" class="title-control submit" name="submit" value="Upload">
                    </form>
                </div>
                <div style="color:black"> Click <a href="./../ideas.php?msg=myideas">here</a> to view your Ideas</div>

            </div>

            <div class="col-md-2"></div>

        </div>
        <?php
    }
        ?>
</body>
</html>
