
<?php
          if(isset($_SESSION['fnm'])) 
            echo '<div class="mainUser" id="mainUser" style="display:none">
            <ul style="padding:0px ;">
              <br><li><a href="http://'. $_SERVER['SERVER_NAME'] .'/jobportal/Ideas/ideas.php">Ideas</a></li><hr style="background:white; width:140%;position:relative; right: 23px;">
              <li><a href="http://'. $_SERVER['SERVER_NAME'] .'/jobportal/view/addskill.php">Add Skills</a></li><hr style="background:white; width:140%;position:relative; right: 23px;">
              <li><a href="http://'. $_SERVER['SERVER_NAME'] .'/jobportal/hire/hire.php">Hire Someone</a></li><hr style="background:white; width:140%;position:relative; right: 23px;">
              <li><a href="http://'. $_SERVER['SERVER_NAME'] .'/jobportal/Index/logout.php">Log Out</a></li>

            </ul>
          </div>';
?>

<div class="menu-bar" style="width:100%">
                <nav class="navbar navbar-expand-lg navbar-light">
                <?php  
                   echo '<a class="navbar-brand text-white" href="http://'. $_SERVER['SERVER_NAME'].'/jobportal/Index/index.php">Job Infinity</a>';
                 ?>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                  
                    <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav ml-auto">

                      <li class="nav-item" id="nav-opt">
                          <a class="nav-link" id="curr" href="#" style="border:1px solid white; border-radius:5px; position:relative; right: 20px; top: 3px; line-height: 20px"> 
                            <?php 
                            $selfFull = $_SERVER["PHP_SELF"];
                            $selfnExt = substr($selfFull, strrpos($selfFull, "/")+1);
                            $cntSlfLtr = strlen($selfnExt) -4;
                            $self = substr($selfnExt, 0, $cntSlfLtr);
                            echo $self;
                             ?>


                             
                          </a>
                        </li>

                        <!-- <li class="nav-item" id="nav-opt">
                          <a class="nav-link" id="job" href="#">Jobs </a>
                        </li>
                        <li class="nav-item" id="nav-opt">
                          <a class="nav-link" id="comp" href="#">Companies</a>
                        </li>
                       
                        <li class="nav-item" id="nav-opt">
                          <a class="nav-link " id="about" href="#">About us</a>
                        </li> -->

                        <?php
                          if(isset($_SESSION['fnm'])){
                        ?>
                            <img src="avtar.png" style="filter:invert(100%); height:50px;width:50px;transform:scale(0.7); border: 2px solid black;  padding: 5px;border-radius: 50%;" id="userSpace">
                            
                            
                            <script>
                            
                            var userSpace = document.getElementById("userSpace");
                            var mainUser = document.getElementById("mainUser");


                            userSpace.addEventListener("click", function () {
                                if(mainUser.style.display == "none")
                                    mainUser.style.display = "block";

                                else 
                                mainUser.style.display = "none";
                            });

                            // mainUser.addEventListener("mouseleave", function() {
                            //   mainUser.style.display = "none";
                            // })
                          
                            </script>
                          <?php
                          } else {
                            echo '<li class="nav-item" id="nav-opt">
                            <a class="nav-link"  href="#" id="signin">Sign in</a>
                        </li>';
                          }
                            ?>
                      </ul>
                      
                    </div>
                  </nav>
                  
             
            </div>