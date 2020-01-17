<?php

if(isset($_POST["submit"])) {
	require "conn.php";

	$email = htmlspecialchars($_POST["email"]);
	$pwd = htmlspecialchars($_POST["pwd"]);

	if (empty($email) || empty($pwd)) {
		header("Location: index.php?msg=emptyFields");
		exit();
	} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: index.php?msg=invalidEmail");
		exit();
	} else {
		$sql = "SELECT u_id FROM users WHERE u_email=?";
		$stmt = mysqli_stmt_init($con);

		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: index.php?msg=sqlError");
			exit();
		} else {
			mysqli_stmt_bind_param($stmt, "s", $email);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$rows = mysqli_stmt_num_rows($stmt);
			if($rows===1) {
				$sql = "SELECT * FROM users WHERE u_email=?";
				$stmt = mysqli_stmt_init($con);

				if (!mysqli_stmt_prepare($stmt, $sql)) {
					header("Location: index.php?msg=sqlError");
					exit();
				} else {
					mysqli_stmt_bind_param($stmt, "s", $email);
					mysqli_stmt_execute($stmt);
					$result = mysqli_stmt_get_result($stmt);
					if ($row = mysqli_fetch_assoc($result)){
						
						$pwdReal = $row['u_password'];
						$pwdCheck = password_verify($pwd,$pwdReal);

						if($pwdCheck === true) {
							session_start();
							session_regenerate_id();

							$_SESSION["fnm"] = $row["u_fname"];
							$_SESSION["lnm"] = $row["u_lname"];
							$_SESSION["email"] = $row["u_email"];
							$_SESSION["uid"] = $row["u_id"];
							session_regenerate_id();

							header("Location: index.php?msg=done");
							exit();
						} else {
							header("Location: index.php?msg=invalidPass");
							exit();
						}
					}
				}

			} else {
				header("Location: index.php?msg=noUserFound");
				exit();
			}
		}

	}
} else {
	header("Location: index.php?msg=notSubmited");
	exit();
}

