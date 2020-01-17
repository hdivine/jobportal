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
    <title>Ideas</title>
    <link rel="stylesheet" href="ideas.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./../navstyle.css?v=<?php echo time(); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
   <link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>


    <?php
 if (isset($_SESSION["fnm"])) {

        require_once "./../indexNav.php";

        include "./../phpBackend/dbh.php";
        include "./../phpBackend/execute.php";
        include "./../phpBackend/data.php";

        $data = new Data();
        $data->requires("select i_id, i_title, i_type, i_date, u_fname,u_lname from minor.Ideas1, minor.users where Ideas1.u_id = users.u_id",[]);
        $reqData = $data->select();

    ?>



        <span class="fa fa-search icon-search" id="search-btn"></span>
        <div class="search-box" id="search-box">
            <form action="ideas.php" method="POST" class="search-form">
                <input type="text" name="srch" id="srch" class="srch" value="">
                <label for="srch" class="srch-lbl" id="srch-lbl"> Enter Title or User Name </label>
                <div class="msg">Search By Type of Jobs</div> <br>
                
                <label for="softwaredeveloper">
                    <input type="checkbox" name="options[]" value="softwaredeveloper" class="opts" id="sd">Software Developer
                </label>
                <label for="hardwaredeveloper">
                    <input type="checkbox" name="options[]" class="opts"  value="hardwaredeveloper" id="sd">Hardware Developer
                </label>
                <label for="uidesigner">
                    <input type="checkbox" name="options[]" class="opts" value="uidesigner"  id="sd">UI Designer
                </label>
                <label for="webdeveloper">
                    <input type="checkbox" name="options[]" class="opts" value="webdeveloper"  id="sd">Web Devloper
                </label>
                <label for="other">
                    <input type="checkbox" name="options[]" class="opts" value="other"  id="sd">Other Worker
                </label> <br>

                <div class="roundOnHover">
                    <input type="submit" value="submit" name="submit" class="subBtn">
                </div>
            </form>
        </div>

    <div class="Ideas1 container">
    
        <div class="row">
        
            <div class="col-md-2" id="awayFrmSearch"></div>
            <div class="col-md-8  idea-box" style="background: #fff">
            <div id="idea">


                <?php 
				$onlyMine=false;
                if(isset($_GET["msg"])) {
                    
                    if($_GET["msg"] === "done") {
                        echo '<div class="done" style="text-align:center; font-size:20px; background: rgb(7,34,138); color:white; border-radius:10px;">Your Idea is added successfully!!!</div> <br><br>' ;
                    } else if($_GET["msg"] === "myideas") {
                        echo  '<button onclick="clearfilter()" style="background:rgb(7,34,138); outline:none; border:none; border-radius:5px; padding: 5px;">Clear Filter</button> <br><br>';
                        $onlyMine = true;
                        $myIdeas1 = new Data();
                        $myIdeas1->requires("select i_id, i_title, i_type,i_date, u_fname, u_lname from minor.Ideas1, minor.users where Ideas1.u_id = users.u_id and users.u_id =?",[$_SESSION["uid"]]);
                        $showMyIdeas1 = $myIdeas1->select();

                        foreach ($showMyIdeas1 as $result) {
                        ?>
                         <div class="idea">
                                    <div class="cp-img inline" style="float:left"><img src="./../Index/hd.jpg" style="height:80px; width:80px; border-radius:10px"  alt=""></div>
                                    <div class="mainIdea" >
                                        <div class="cp-title inline"><b><a href="./idea.php?id=<?= $result["i_id"] ?>"> <?= $result["i_title"]?> </a></b></div> <br> 
                                        <div style="color: black" class="inline">Type - </div> <div class="cp-type text-muted inline"> <?= $result["i_type"] ?></div> <br>
                                        <div style="color: black" class="inline">Name - </div> <div class="cp-name inline" ><i class="text-muted inline"><?= $result["u_fname"] ." ". $result["u_lname"] ?></i></div> <br>
                                        <div style="color: black" class="inline">Date - </div> <div class="cp-date text-muted inline"> <?= $result["i_date"] ?></div>
                                    </div>
                                </div>
                                <br>

                        <?php
                        }

                    }
                }
                if((count($reqData) || isset($_POST['submit'])) && $onlyMine !== true ) {
                    
                    
                    if (isset($_POST["submit"]) && (!empty($_POST["srch"]) || isset($_POST["options"]) )) {
            
            echo  '<button onclick="clearfilter()" style="background:rgb(7,34,138); outline:none; border:none; border-radius:5px; padding: 5px;">Clear Filter</button> <br><br>';

                            $set = [false, false];
                            $valid=[false, false];   

                            $arrtostr=""; 
                    
                            if(!empty($_POST["srch"])) {
                                $set[0] = true;
                                $nmorttl = htmlspecialchars($_POST["srch"]);
                    
                                if(!preg_match("/[a-zA-z0-9]/", $nmorttl)) {
                                    $valid[0] = false;
                                } else {
                                    $valid[0] = true;
                                }
                            }    
                            if(isset($_POST["options"]))  {
                                $set[1] = true;
                                $options = $_POST["options"];
                               
                                $validOpts = array("softwaredeveloper","hardwaredeveloper", "uidesigner", "webdeveloper", "other");
                                
                                foreach($options as $key => $value) {
                    
                                    if (in_array(htmlspecialchars($value), $validOpts, true)) {
                                        $option[$key] = htmlspecialchars($value);
                                        $valid[1] = true;
                                    } else {
                                        $valid[1] = false;
                                        break;
                                    }
                                }
                            
                                
                            }
                            
                            
                    
                            if (($set[0] === true && $valid[0] === true) || ($set[1] === true && $valid[1] === true)) {
                                $nmttl = $type = $Ideas1ByTyp = [];

                                if($set[0] === true) {
                                    $ideabyNmTtl = new Data();
                                    $ideabyNmTtl->requires("select i_id, i_title, i_type,i_date, u_fname, u_lname from minor.Ideas1, minor.users where Ideas1.u_id = users.u_id and (users.u_fname like ? or users.u_lname like ? or Ideas1.i_title like ?)",["%".$nmorttl."%", "%".$nmorttl."%", "%".$nmorttl."%"]);
                                    $nmttl = $ideabyNmTtl->select();
                                } 

                                if($set[1] === true) {
                                    $ideabyTyp = new Data();
                                    foreach($option as $opt) {
                                        $ideabyTyp->requires("select i_id,i_title, i_type, i_date, u_fname, u_lname from minor.Ideas1, minor.users where Ideas1.u_id = users.u_id and (Ideas1.i_type = ?)",[$opt]);
                                        $type = $ideabyTyp->select();

                                    }

                                }

                                $results = array_merge($nmttl, $type);
                                $results = array_unique($results, SORT_REGULAR);
                                foreach($results as $result) {
                                ?>

                                <div class="idea">
                                    <div class="cp-img inline" style="float:left"><img src="./../Index/hd.jpg" style="height:80px; width:80px; border-radius:10px"  alt=""></div>
                                    <div class="mainIdea" >
                                        <div class="cp-title inline"><b><a href="./idea.php?id=<?= $result["i_id"] ?>"> <?= $result["i_title"]?> </a></b></div> <br> 
                                        <div style="color: black" class="inline">Type - </div> <div class="cp-type text-muted inline"> <?= $result["i_type"] ?></div> <br>
                                        <div style="color: black" class="inline">Name - </div> <div class="cp-name inline" ><i class="text-muted inline"><?= $result["u_fname"] ." ". $result["u_lname"] ?></i></div> <br>
                                        <div style="color: black" class="inline">Date - </div> <div class="cp-date text-muted inline"> <?= $result["i_date"] ?></div>
                                    </div>
                                </div>
                                <br>

                                <?php
                                }
                                // print_r($Ideas1ByTyp);
                              
                            } else {
                                echo "<h1 style='color:red'> Invalid </h1>";
                            }
                    
                            
                            
                        }
                   

                        // 

                else if(count($reqData)) {
                        foreach($reqData as $result) {?>
                               <div class="idea">
                                    <div class="cp-img inline" style="float:left"><img src="./../Index/hd.jpg" style="height:80px; width:80px; border-radius:10px"  alt=""></div>
                                    <div class="mainIdea" >
                                        <div class="cp-title inline"><b><a href="./idea.php?id=<?= $result["i_id"] ?>"> <?= $result["i_title"]?> </a></b></div> <br> 
                                        <div style="color: black" class="inline">Type - </div> <div class="cp-type text-muted inline"> <?= $result["i_type"] ?></div> <br>
                                        <div style="color: black" class="inline">Name - </div> <div class="cp-name inline" ><i class="text-muted inline"><?= $result["u_fname"] ." ". $result["u_lname"] ?></i></div> <br>
                                        <div style="color: black" class="inline">Date - </div> <div class="cp-date text-muted inline"> <?= $result["i_date"] ?></div>
                                    </div>
                                </div>
                                <br>
                        <?php }
                }

                     
            }else {

                }
                ?>
            </div>

            </div>

            <div class="col-md-2"></div>
        
        </div>
    
    </div>


                <button class="addIdeaButton" onclick="window.location.href='./addIdea/AddIdea.php?pos=indx'"><div>+</div></button>


    <!-- <script src="https://code.jquery.com/jquery-3.4.0.js"   integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo="   crossorigin="anonymous"></script> -->
    <script src="./events.js?v=<?php echo time(); ?>"></script>


    <?php
         }else {
    ?>

            <h1 style="color:black;position: fixed; top: 45%;left:50%; transform:translate(-50%, -50%)"> You Are Not Logged In </h1>
           <h5 style="color:black;position: fixed; top: 50%;left:50%; transform:translate(-50%, -50%)"> <a href="./../Index/index.php" >Click Here</a> To Go To Home Page </h5>
    <?php 
        }
    ?>

    <script> 

        function clearfilter() {
            window.location.href = "./ideas.php";
        }

    </script>

</body>
</html>

<!-- CREATE TABLE Ideas1(
    i_id INT PRIMARY KEY AUTO_INCREMENT,
    i_tittle VARCHAR(100) NOT NULL,
    i_desc VARCHAR(100) NOT NULL,
    i_type VARCHAR(30) NOT NULL,
    i_date DATE NOT NULL,
    u_id INT,
    FOREIGN KEY(u_id) REFERENCES users(u_id)
)
 --><!-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis nesciunt laborum atque, quis magni soluta officiis ipsum libero a esse adipisci, aliquid optio aperiam. Alias, beatae facere! Accusamus repellendus quisquam nisi officia. Accusantium ea nisi, autem totam possimus expedita minima voluptates rerum aut, quaerat facere a nobis eveniet deleniti perspiciatis. Neque cupiditate fugit incidunt, laboriosam aliquam pariatur amet omnis at inventore odio labore? Illo doloremque nam nemo architecto provident in, et ipsa magnam eligendi unde libero distinctio maiores qui velit ab fugiat, modi minus excepturi pariatur, deserunt sint quibusdam voluptates temporibus similique! Sapiente nam rem tempore fuga natus alias assumenda! -->
