<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="style/signupStyle.css?v=<?php echo time();?>">
	<title>Sign up page</title>
</head>
<body>


	
	<?php
		session_start();
		session_regenerate_id();
		
		if(!isset($_SESSION["fnm"])) {
	?>
		
	<div class="outerSignUp">

		<form action="back/signup.back.php" method="post">

			
		<?php

		$fnmErr = $lnmErr = $emlErr = $fnmErrLbl = $lnmErrLbl = $emlErrLbl= $err= "";

		
		
		if(isset($_GET["msg"])) {

			if($_GET["msg"] == "invalidFnm") {
				$fnmErr = 'style="border-bottom-color:red"';
				$fnmErrLbl = 'style="color:red"';
				$err = "<div style='background:linear-gradient(-140deg,rgb(7,34,138), rgb(0,129,171));position:fixed;top:0;width:100%; line-height: 50px; text-align:center;color:white'>First name is Invalid use alphabets only</div>";
			} else if ($_GET['msg'] == "invalidLnm") {
				$lnmErr = 'style="border-bottom-color:red"';
				$lnmErrLbl = 'style="color:red"';
				$err = "<div style='background:linear-gradient(-140deg,rgb(7,34,138), rgb(0,129,171));position:fixed;top:0;width:100%; line-height: 50px; text-align:center;color:white'>Last name is Invalid use alphabets only</div>";
			} else if($_GET['msg'] == "invalidEmail") {
				$emlErr = 'style="border-bottom-color:red"';
				$emlErrLbl = 'style="color:red"';
				$err = "<div style='background:linear-gradient(-140deg,rgb(7,34,138), rgb(0,129,171));position:fixed;top:0;width:100%; line-height: 50px; text-align:center;color:white'>Format of Email is invalid</div>";
			} else if($_GET['msg'] == "userExist") {
					$err = "<div style='background:linear-gradient(-140deg,rgb(7,34,138), rgb(0,129,171));position:fixed;top:0;width:100%; line-height: 50px; text-align:center;color:white'>The User Already Exists</div>";
			}

			

			echo '<br>
			<input type="text" class="fnm" name="fname"'. $fnmErr .'placeholder="" value="'.$_GET['fnm'].'" required>
			<label for="fname"'.$fnmErrLbl.' id="fnm"> First Name</label>
			<br>
			<input type="text" class="lnm" name="lname" '. $lnmErr .'placeholder="" value="'.$_GET['lnm'].'" required>
			<label for="lname" '.$lnmErrLbl.'  id="lnm">Last Name </label>
			<br>
			<input type="text" class="eml" name="email"'. $emlErr .'  placeholder="" value="'.$_GET['eml'].'" required>
			<label for="email" '.$emlErrLbl.'  id="eml">E-mail</label>                 
			<br>
			<input type="password" class="pwd" name="pwd" placeholder="" required> 
			<label for="pass" id="pwd">Password</label>
			<br>';
		} else {
		?>
			<br>
			<input type="text" class="fnm" name="fname" placeholder=""  required>
			<label for="fname" id="fnm"> First Name</label>
			<br>
			<input type="text" class="lnm" name="lname" placeholder="" required>
			<label for="lname" id="lnm">Last Name </label>
			<br>
			<input type="text" class="eml" name="email" placeholder="" required>
			<label for="email" id="eml">E-mail</label>                 
			<br>
			<input type="password" class="pwd" name="pwd" placeholder="" required> 
			<label for="pass" id="pwd">Password</label>
			<br>
			
		<?php } ?>
		<!-- <span style="color:white ">i am a </span>	
			<select name="" id="">
				<option value="customer">customer</option>
				<option value="emp">emp</option>
			</select>
			<br> -->
			<input type="submit" id="signup" value="SignUp" name="submit">
			<br>
			<br>
			<a href="../Index/">Alredy have an account?</a>
			<br>
			<br>

		</form>
	</div>

	<?php
	echo $err;

		} else {
	?>
	 <style>
		 body {
			 background: #fff;
		 }
		 </style>
	 <h1 style="color:black;position: fixed; top: 45%;left:50%; transform:translate(-50%, -50%)"> You Are Logged In </h1>
           <h5 style="color:black;position: fixed; top: 50%;left:50%; transform:translate(-50%, -50%)"> <a href="./../Index/index.php" >Click Here</a> To Go To Home Page </h5>
<?php
		}
?>

</body>
</html>