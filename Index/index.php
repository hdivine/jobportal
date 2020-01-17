<?php
session_start();
session_regenerate_id();
?>

<html>
    <head>
        <title>FRONT END </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="./../navstyle.css?v=<?php echo time() ?>">
              <script   src="https://code.jquery.com/jquery-3.4.0.js"   integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo="   crossorigin="anonymous"></script>

       <link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
        <script src="../lib/typed.js"></script>

        <style>
        #mainUser {
            padding: 0px 30px 0px 30px;

        }
        </style>
      
      </head>


    <body>
    
          

        <section id="header">

        <?php
              require_once "./../indexNav.php";
        ?>

            <div id="mainform" style="display:none">
                <form class="login-form" action="login.php" method="post">
                    <input type="text" placeholder="Email" name="email" id="mail-in"/> <br>
                    <!-- <label for="email" id="mail-lb">Email</label><br> -->
                    <input type="password" placeholder="Password" name="pwd" id="pwd-in"/> <br>
                    <!-- <label for="pwd" id="pwd-lb">Password</label><br> -->

                    <input type="submit" name ="submit" value="Log In"><br>
                    <p class="Message" style="color:white; margin-top:5px">Not a member? <a href="../signup/signup.php">Register</a></p>
                </form>
            </div>
            
                
           

              <div class="banner text-center" id="banner">
                <h1 id="">
                    NEW STARTUPS AROUND YOU
                </h1> 
                <h5 id="typed"></h5><br>
             </div>

        </section>

        <form class="search-job text-center" action="./../Ideas/ideas.php" method="POST" id="search">
          <input type="text" class="form-control" name="srch" placeholder= "Enter User Or Title">

          <input type="submit" class="btn btn-primary" name="submit" value="Find Job">

        </form>

        <section id="recruiters">
          <div class="container text-center">
            <h3>Innovative Startups</h3>

         
          <div>
            <img src="com.png" >
            <img src="ee.png" >
            <img src="iu-2.png" >
            <img src="ww.jpg">
            <img src="tr.jpg">
            <img src="ae.jpg">
            
           
            
            
           

          </div>
          <div>
            <img src="mo.jpg" >
            <img src="fi.png" >
            <img src="bu.png" >
            <img src="prop.jpg">
            <img src="hd.jpg">

           
        </div>
        </section>


        <section id="jobs">
          <div class="container">
            <h5>Recent Updates</h5>
            <div class="company-details">
              <div class="job-update">
                <h4><b>Marketing Manager</b></h4>
                <p>B.Tech graduate with full First Class and having excellent knowledge of marketing</p>
                <i class="fa fa-briefcase"></i><span>0-1 years</span><br>
                <i class="fa fa-inr"></i><span>5.0-7.0 Lacs p.a.</span><br>
                <i class="fa fa-map-marker" ></i><span>Pune</span><br>
                <p>Skills<i class="fa fa-angle-double-right"></i><small>Market Analysis Knowledge, Good Communication Skills</small></p>
                <p> Description<i class="fa fa-angle-double-right"></i>Candidates with impressive resumes and achievements will be preferred.<a href="#">Read more</a></p>

              </div>
                  <div class="apply-btn">
                    <button type="button" class="btn btn-primary">Apply</button>
                  </div>
                </div>

                <div class="company-details">
                    <div class="job-update">
                      <h4><b>Marketing Manager</b></h4>
                      <p>B.Tech graduate with full First Class and having excellent knowledge of marketing</p>
                      <i class="fa fa-briefcase"></i><span>0-1 years</span><br>
                      <i class="fa fa-inr"></i><span>5.0-7.0 Lacs p.a.</span><br>
                      <i class="fa fa-map-marker" ></i><span>Pune</span><br>
                      <p>Skills<i class="fa fa-angle-double-right"></i><small>Market Analysis Knowledge, Good Communication Skills</small></p>
                      <p> Description<i class="fa fa-angle-double-right"></i>Candidates with impressive resumes and achievements will be preferred.<a href="#">Read more</a></p>
      
                    </div>
                        <div class="apply-btn">
                          <button type="button" class="btn btn-primary">Apply</button>
                        </div>
                      </div>

                      <div class="company-details">
                          <div class="job-update">
                            <h4><b>Marketing Manager</b></h4>
                            <p>B.Tech graduate with full First Class and having excellent knowledge of marketing</p>
                            <i class="fa fa-briefcase"></i><span>0-1 years</span><br>
                            <i class="fa fa-inr"></i><span>5.0-7.0 Lacs p.a.</span><br>
                            <i class="fa fa-map-marker" ></i><span>Pune</span><br>
                            <p>Skills<i class="fa fa-angle-double-right"></i><small>Market Analysis Knowledge, Good Communication Skills</small></p>
                            <p> Description<i class="fa fa-angle-double-right"></i>Candidates with impressive resumes and achievements will be preferred.<a href="#">Read more</a></p>
            
                          </div>
                              <div class="apply-btn">
                                <button type="button" class="btn btn-primary">Apply</button>
                              </div>
                            </div>
              

             
                   

                   

    




              
            </div>

          
        </section>



        <footer>

          <div>
          &copy Copyright, Job Infinity
          </div>  

        </footer>


        <script src="event.js"></script>

        <script>
          $('document').ready(function() {
            var typed = new Typed('#typed',{
              strings:[ "I Need A Job!!!",  "I Need A Skilled Employer!!!", "I Need An Idea To Implement!!!"],
              typeSpeed: 100,
              backSpeed: 40,
              loop: true,
              cursorChar:''
            })
          })
        </script>
        
    </body>
</html>