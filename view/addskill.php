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
    <title>addf</title>

    <link rel="stylesheet" href="profile.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="addskill.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./../navstyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   crossorigin="anonymous"></script>


</head>
<body>
    
<?php
    if (isset($_SESSION["fnm"])) {
        require_once "./../indexNav.php";
    ?>

<div class="row resume">

<div class="col-sm-2"></div>
<div class="col-sm-8">
    <form action="./addskill.back.php" method="POST">
        <div class="name"><h3><?=$_SESSION["fnm"]?></h3></div>
        <div class="row">

            <div class="col-sm-4">
            <br>
            <br>
            <br>

                <h5 class="main">INTRODUCTION</h5>

            </div>
            <div class="col-sm-8">
                <div class="mainInfo">
                    <textarea name="intro" rows="4" cols="50"  required>
        </textarea>
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
                    <table>
                        <tr>
                            <th>Sr.No</th> <th>Collage Name</th> <th>Marks</th> 
                        </tr>
                        <tr> <td>1.</td> <td> <input type="text" name="cnm1" id="cnm" required> </td> <td><input type="number" name="percent1" id="percent" required></td></tr>
                        <tr>  <td>2.</td> <td><input type="text" name="cnm2" id="cnm"></td> <td><input type="number" name="percent2" id="percent"></td></tr>
                        <tr> <td>3.</td> <td><input type="text" name="cnm3" id="cnm"></td> <td><input type="number" name="percent3" id="percent"></td></tr>

                    </table>
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
                <textarea name="sumry" rows="4" cols="50" required>
        </textarea>
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
                <textarea name="exp" rows="4" cols="50" required>
        </textarea>
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
                    1. <select name="skill1" id="">
                                <option value="softwaredeveloper">Software Developer</option>
                                <option value="hardwaredeveloper">Hardware Developer</option>
                                <option value="uidesigner">UI Designer</option>
                                <option value="webdeveloper">Web Devloper</option>
                                <option value="other">Other Worker</option> 
                    </select>
                    <br>
                    2. <select name="skill2" id="">
                                <option value="softwaredeveloper">Software Developer</option>
                                <option value="hardwaredeveloper">Hardware Developer</option>
                                <option value="uidesigner">UI Designer</option>
                                <option value="webdeveloper">Web Devloper</option>
                                <option value="other">Other Worker</option> 
                    </select>

                </div>
            </div>
        </div>

        <input type="submit" value="submit" name="submit" id="sub" style="position:relative; left: calc(50% - 80px); margin:30px; b" required>

    </form>
</div>
<div class="col-sm-2"></div>

</div>

        <footer>
        <div class="copy">&copy Copyright, Job Infinity</div>

        </footer>



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

