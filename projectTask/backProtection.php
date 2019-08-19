<?php
if (!isset($_SESSION['is_user_logged_in'])) 
{
	header("location:log_in.php");
}
?>