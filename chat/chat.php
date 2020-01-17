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
    <title>Chat</title>

    <link rel="stylesheet" href="chat.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./../navstyle.css?v=<?php echo time(); ?>">
        <script   src="https://code.jquery.com/jquery-3.4.0.js"   integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo="   crossorigin="anonymous"></script>

   <link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
    <?php
    if (isset($_SESSION["fnm"])) {
        require_once "./../indexNav.php";
    ?>

            <?php
                if (isset($_GET["err"])) {
                    if ($_GET["err"] == "emptMsg") {
                        echo "<div style='color:red; text-align:center; position: relative; top: 150px; font-size: 18px;'>Message is Empty </div>";
                    } 
                } else if (isset($_GET["msg"])) {
                    echo "<div style='text-align:center; position: relative; top: 150px; left:35%; font-size: 18px;color:#fff; background: gray; width: 30%; border-radius: 10px;'>Valid Message is sent</div>";
                }
                ?>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="chat">
                    <div class="chatField">
                        <div class="realChatField">
                            <div class="me" >sdfg</div> 
                            <div class="other ">sdfad fasd  a</div>
                            <div class="me">laksd</div>
                            <div class="other">sdfadfas sad</div>   
                            <div class="me">sdf</div>
                        
                            <div class="other ">sdfad fasd  a</div>
                            <div class="me">asdf</div>
                            <div class="other">sdfadfas sad</div>   
                            <div class="me">laksd</div>
                            <div class="other">las dfgs aksd</div>

                        </div>  
                    </div>
                    <div class="form">
                        <form action="./chat.back.php" method="POST">
                            <input type="text" name="chat" id="chat">
                            <input type="submit" value="Send" name="submit">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>

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