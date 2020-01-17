<?php

if (isset($_POST["submit"])) {

	

	$fnm = htmlspecialchars($_POST["fname"]);
	$lnm = htmlspecialchars($_POST["lname"]);
	$email = htmlspecialchars($_POST["email"]);
	$pwd = htmlspecialchars($_POST["pwd"]);

		// echo "$fnm $lnm $email $pwd";
	if (empty($fnm) || empty($lnm) || empty($email) || empty($pwd)) {
		header("Location: ../signup.php?msg=emptyVal");
		exit();
	} else if (!preg_match("/^[a-zA-Z]*$/", $fnm)) {
		$fnm="";
		header("Location: ../signup.php?msg=invalidFnm&fnm=$fnm&lnm=$lnm&eml=$email");
		exit();
	} else if (!preg_match("/^[a-zA-Z]*$/", $lnm)) {
		$lnm="";
		header("Location: ../signup.php?msg=invalidLnm&fnm=$fnm&lnm=$lnm&eml=$email");
		exit();
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		
		header("Location: ../signup.php?msg=invalidEmail&fnm=$fnm&lnm=$lnm&eml=$email");
		exit();
	} else {

		// Everything is good
		require "conn.php";

		$sql = "SELECT users.u_id FROM users WHERE users.u_email=?";
		$stmt = mysqli_stmt_init($con);

		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../signup.php?msg=sqlError1&fnm=$fnm&lnm=$lnm&eml=$email");
			exit();
		} else {
			mysqli_stmt_bind_param($stmt, "s", $email);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$row_count = mysqli_stmt_num_rows($stmt);

			if ($row_count == 0) {
				// No user found
				$sql = "INSERT INTO users (u_fname, u_lname, u_email, u_password) VALUES (?, ?, ?, ?)";
				$stmt = mysqli_stmt_init($con);

				if (!mysqli_stmt_prepare($stmt, $sql)) {
					header("Location: ../signup.php?msg=sqlError&fnm=$fnm&lnm=$lnm&eml=$email");
					exit();
				} else {
					$hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);
					mysqli_stmt_bind_param($stmt, "ssss", $fnm, $lnm, $email, $hashed_pwd);
					mysqli_stmt_execute($stmt);
					session_start();
					session_regenerate_id();

					$_SESSION["fnm"] = $fnm;
					$_SESSION["lnm"] = $lnm;
					$_SESSION["email"] = $email;

					include "./../../phpBackend/dbh.php";
					include "./../../phpBackend/execute.php";
					include "./../../phpBackend/data.php";

					$forUid = new Data();
					$forUid->requires("select u_id from minor.users where u_email = ?",[$email]);
					$uid = $forUid->select();


					$_SESSION["uid"] = $uid[0]["u_id"];
					session_regenerate_id();

					header("Location: ../../Index/index.php");
					exit();

				}

			} else {
				header("Location: ../signup.php?msg=userExist&fnm=$fnm&lnm=$lnm&eml=$email");
				exit();
			}
		}

	}

} else {
	header("Location: ../signup.php?msg=pressSubmit");
	exit();
}