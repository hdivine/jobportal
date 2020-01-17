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
    <title>Idea</title>

    <link rel="stylesheet" href="./../navstyle.css?v=<?php echo time(); ?>">
   <link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script   src="https://code.jquery.com/jquery-3.4.0.js"   integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo="   crossorigin="anonymous"></script>
    <link rel="stylesheet" href="idea.css?v=<?php echo time(); ?>">


</head>
<body>
    
    <?php
    if(isset($_SESSION["fnm"])) {
        require_once "./../indexNav.php";
        $i_id=htmlspecialchars($_GET["id"]);
        
        include "./../phpBackend/dbh.php";
        include "./../phpBackend/execute.php";
        include "./../phpBackend/data.php";



        $validId = new Data();
        $validId->requires("select i_id from minor.Ideas1 where minor.Ideas1.i_id = ?", [$i_id]);
        $validId = $validId->select();

    

        if ($i_id === $validId[0]["i_id"]) {
            

            $data = new Data();
            $data->requires("select i_title, i_desc, u_fname from minor.Ideas1 natural join minor.users where minor.Ideas1.u_id = minor.users.u_id and minor.Ideas1.i_id=?",[$i_id]);
            $reqData = $data->select();

    ?>

    <a href="./ideas.php">
        <i class="fas fa-chevron-left" id="back-btn"></i>
    </a>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">

            <div class="outer" style="">

                <div class="title"><h3><b> <? echo $reqData[0]["i_title"]; ?> </b></h3></div>
                <div class="img"><img src="./../Index/hd.jpg" class="imgLeft" alt=""></div>

              

                <div class="desc"><?= $reqData[0]["i_desc"] ?></div>

                <div class="signature">
                    <div class="cp-name inline moveleft" ><i class="text-muted inline">- <?= $reqData[0]["u_fname"]; ?></i></div> 

                </div>

            </div>
            
            <br><br><br><br><br><br>

            <div class="recomendation">
                <h4 class="mainHeading">Recomended Skilled Peoples</h4>
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-11">
                        <div class="recomend">
                        <br>
                            
                            <div class="row">

                            <?php ?>
                                    <div class="col-sm-3 centerRecmnd"> 
                                        <div class="cp-name inline">
                                            <b class="para">Vaibhav</b>
                                        </div>
                                        <br>
                                        <button class="hire"> <a href="#">View</a> </button>
                                        <button class="chat"> <a href="./../chat/chat.php">Chat</a> </button>
                                    </div>
                            </div>

                        </div>
                        <br>
                        <br>
                    </div>
                </div>
            </div>


            <hr style="background:#000">

            <!-- Comments -->

            <div class="comments">
                <div class="mainHeading "><h2>Add Your Thougths Here...</h2></div>

                <?php
                if (isset($_GET["err"])) {
                    if ($_GET["err"] == "invalComment") {
                        echo "<div style='color:red; text-align:center'> Use Valid characters</div>";
                    } else if ($_GET["err"] == "emtComment") {
                        echo "<div style='color:red; text-align:center'> Comment Is Empty</div>";
                    } 
                } else if (isset($_GET["msg"])) {
                    echo "<div style='text-align:center'>This is a valid Comment</div>";
                }
                ?>

                <form action="./comment/comment.php" method="POST">
                    <?php
                    if(!isset($_GET["err"])) {
                    echo '<input type="text" name="cmnt" id="cmnt" required>';
                    } else {
                        echo '<input type="text" name="cmnt" style="border-bottom: 1px solid red;" id="cmnt" required>';
                    }
                    
                    ?>
                  
                  
                    <div class="sub-btn" ><input type="submit" value="submit" name="submit"></div>

                </form>
                <br>
                <br>

                    
                    <div class="row">
                        
                        <div class="col-sm-1"></div>

                        
                            <div class="col-sm-11 cntnair">
                                <div class="comment">
                                    <div class="cp-name inline"><b class="para">asdfas</b></div>  
                                    <div class="cp-date text-muted inline ">10-2-19</div> <br>
                                    <div class="cp-title inline" ><i class="text-muted inline para">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque ullam temporibus quae quaerat nemo velit nam, molestias esse alias exercitationem?</i></div> 
                                    <br>
                                </div>
                                <div class="comment">
                                    <div class="cp-name inline"><b class="para">asdfas</b></div>  
                                    <div class="cp-date text-muted inline ">10-2-19</div> <br>
                                    <div class="cp-title inline" ><i class="text-muted inline para">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque ullam temporibus quae quaerat nemo velit nam, molestias esse alias exercitationem?</i></div> 
                                    <br>
                                </div>
                                <div class="comment">
                                    <div class="cp-name inline"><b class="para">asdfas</b></div>  
                                    <div class="cp-date text-muted inline ">10-2-19</div> <br>
                                    <div class="cp-title inline" ><i class="text-muted inline para">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque ullam temporibus quae quaerat nemo velit nam, molestias esse alias exercitationem?</i></div> 
                                    <br>
                                </div>
                                <div class="comment">
                                    <div class="cp-name inline"><b class="para">asdfas</b></div>  
                                    <div class="cp-date text-muted inline ">10-2-19</div> <br>
                                    <div class="cp-title inline" ><i class="text-muted inline para">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque ullam temporibus quae quaerat nemo velit nam, molestias esse alias exercitationem?</i></div> 
                                    <br>
                                </div>
                                <div class="comment">
                                    <div class="cp-name inline"><b class="para">asdfas</b></div>  
                                    <div class="cp-date text-muted inline ">10-2-19</div> <br>
                                    <div class="cp-title inline" ><i class="text-muted inline para">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque ullam temporibus quae quaerat nemo velit nam, molestias esse alias exercitationem?</i></div> 
                                    <br>
                                </div>
                                <div class="comment">
                                    <div class="cp-name inline"><b class="para">asdfas</b></div>  
                                    <div class="cp-date text-muted inline ">10-2-19</div> <br>
                                    <div class="cp-title inline" ><i class="text-muted inline para">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque ullam temporibus quae quaerat nemo velit nam, molestias esse alias exercitationem?</i></div> 
                                    <br>
                                </div>
                                <div class="comment">
                                    <div class="cp-name inline"><b class="para">asdfas</b></div>  
                                    <div class="cp-date text-muted inline ">10-2-19</div> <br>
                                    <div class="cp-title inline" ><i class="text-muted inline para">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque ullam temporibus quae quaerat nemo velit nam, molestias esse alias exercitationem?</i></div> 
                                    <br>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

        <div class="col-md-2"></div>
    </div>

    <footer>
        <div class="text">
            &copy Copyright, Job Infinity
        </div>
    </footer>

    <?php

        }

    } else {
    ?>

            <h1 style="color:black;position: fixed; top: 45%;left:50%; transform:translate(-50%, -50%)"> You Are Not Logged In </h1>
           <h5 style="color:black;position: fixed; top: 50%;left:50%; transform:translate(-50%, -50%)"> <a href="./../Index/index.php" >Click Here</a> To Go To Home Page </h5>

    <?php
    }
    ?>
</body>
</html>
