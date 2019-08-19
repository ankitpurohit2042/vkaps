<?php
include("db.php");
if (isset($_POST['submit'])) 
{
	if(isset($_POST["userName"]) && (!empty($_POST["userName"])))
	{
		$userName = $_POST["userName"];
		$userQuery = "SELECT * FROM users WHERE user_name = '$userName'";
		$userResult = mysqli_query($con,$userQuery);
		if (mysqli_num_rows($userResult) == 1) 
		{
			$userData = mysqli_fetch_assoc($userResult);
			$userId = $userData['id'];
			$token = generateRandomString();

			$passwordQuery = "INSERT INTO recoveryKeys (userId, token) VALUES ($userId, '$token')";
			$passwordResult = mysqli_query($con,$passwordQuery);

			if ($passwordResult) 
			{
				$sendMail = send_mail($userName, $token);
				// echo $sendmail; die;
			}

		}
		else
		{
			$msg = "This email doesn't exist in our database.";
			$msgclass = 'bg-danger';
		}

	}
}

function generateRandomString($length = 20) 
{
    // This function has taken from stackoverflow.com

	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

	$charactersLength = strlen($characters);

	$randomString = '';

	for ($i = 0; $i < $length; $i++)
	{
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return md5($randomString);
}

function send_mail($to, $token)

{
	require 'PHPMailer/PHPMailerAutoload.php';
	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'ankit.purohit616';
	$mail->Password = '@nkit11101996';
	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465;
	$mail->From = 'ankit.purohit616@gmail.com';

	$mail->FromName = 'ankiLocalhost';
	$mail->addAddress($to);
	$mail->isHTML(true);
	$mail->Subject = 'Demo: Password Recovery Instruction';

	$link = 'http://demos.eggslab.net/forgot-password-recovery-script/forget.php?email='.$to.'&token='.$token;
	$mail->Body    = "<b>Hello</b><br><br>You have requested for your password recovery. <a href='$link' target='_blank'>Click here</a> to reset your password. If you are unable to click the link then copy the below link and paste in your browser to reset your password.<br><i>". $link."</i>";
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	if(!$mail->send()) 
	{
		return 'fail';
	} 
	else 
	{
		return 'success';
	}
}
?>
<!-- $uemail = $_POST['uemail'];

$uemail = mysqli_real_escape_string($db, $uemai);



if(checkUser($uemail) == "true")

{

$userID = UserID($uemail);

$token = generateRandomString();




if($query)

{

$send_mail = send_mail($uemail, $token);



if($send_mail === 'success')

{

$msg = 'A mail with recovery instruction has sent to your email.';

$msgclass = 'bg-success';

}else{

$msg = 'There is something wrong.';

$msgclass = 'bg-danger';

}

}else

{

$msg = 'There is something wrong.';

$msgclass = 'bg-danger';

}



}else

{



} -->