<?php 
include("db.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.0.min.js"></script>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="js/val.js"></script>
	
	<!-- cass for loading between process -->
	<style>
		#divLoading	{
			display : none;
		}
		#divLoading.show{
			display : block;
			position : fixed;
			z-index: 100;
			background-image : url('http://loadinggif.com/images/image-selection/3.gif');
			background-color:#666;
			opacity : 0.4;
			background-repeat : no-repeat;
			background-position : center;
			left : 0;
			bottom : 0;
			right : 0;
			top : 0;
		}
	</style>
</head>
<body>
	<!-- top menu coding -->
	<nav class="navbar navbar-dark bg-dark navbar-expand-md sticky-top">
		<a href="index.php" class="navbar-brand">VKaps</a>
		<button class="navbar-toggler" data-toggle="collapse" data-target="#id">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="id">
			<ul class="navbar-nav">
				<?php
				if (isset($_SESSION['is_user_logged_in'])) 
				{
					?>
					<li class="nav-item">
						<a href="view_all_user.php" class="nav-link">View All User</a>
					</li>
					<?php
				}
				else
				{
					?>
					<li class="nav-item">
						<a href="index.php" class="nav-link">Add Detail</a>
					</li>
					<?php
				}
				?>
			</ul>
		</div>
		<ul class="navbar-nav">
			<?php
			if (isset($_SESSION['is_user_logged_in'])) 
			{
				?>
				<li class="nav-item">
					<a href="log_out.php" class="nav-link">Logout</a>
				</li>
				<?php
			}
			else
			{
				?>
				<li class="nav-item">
					<a href="log_in.php" class="nav-link">Login</a>
				</li>
				<?php
			}
			?>
		</ul>
	</nav>