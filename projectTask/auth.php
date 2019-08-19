<?php
include("db.php");
// print_r($_POST); die;
if(isset($_POST['submit']))
{
		$userName = $_POST['userName'];
		$pass = $_POST['pass'];
		$password = md5($pass);

		if(empty($userName) OR empty($password))
		{
			$_SESSION['msg'] =  "Fill all fields!";
			header("location:log_in.php");
			exit();
		}
	// check remember is set or not
		if (isset($_POST['check'])) 
		{
			$re = "remember me";
		}
		else
		{
			$re = "";
		}

	// check username and password
		$query = "SELECT * FROM users WHERE user_name = '$userName'";
		$result = mysqli_query($con,$query);

	if (mysqli_num_rows($result) > 0) 
	{ 
		$userData = mysqli_fetch_assoc($result);
		if ($userData['password']==$password) 
		{
		// print_r($userData); die;
			// user loggied in 
			if ($re=='remember me') //remember me check
			{
				setcookie("username",$userName,time()+(86400*10));
				setcookie("password",$pass,time()+(86400*10));

				$_SESSION['id'] = $userData['id'];
				$_SESSION['name'] = $userData['full_name'];
				$_SESSION['is_user_logged_in'] = true;

				header("location:view_all_user.php");

			} 
			else //remember me not check 
			{
				$_SESSION['id'] = $userData['id'];
				$_SESSION['name'] = $userData['full_name'];
				$_SESSION['is_user_logged_in'] = true;

				header("location:view_all_user.php");
			}
		}
		else
		{
			$_SESSION['msg'] = "Invalid password!";
			header("location:log_in.php");
				// exit();
		}
	}
	else
	{
		$_SESSION['msg'] = "Invalid username and password!";
		header("location:log_in.php");
	}						
}

// forget password

// if (isset($_POST['forgetPassword'])) {
// 	# code...
// }

?>