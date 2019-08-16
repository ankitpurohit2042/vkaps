<?php
include("header.php");
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 mx-auto">
			<form action="auth.php" method="post">
				<div class="card">
					<!-- login form -->
					<div class="card-header">
						<h3>Log in</h3>
					</div>
					<div class="card-body">
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="userName" class="form-control" value="<?php if(isset($_COOKIE['username'])) echo $_COOKIE['username'] ?>">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="pass" class="form-control" value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password'] ?>">
						</div>
						<div class="from-group">
							<input type="checkbox" name="check" id="check" value="on">
							<label for="re">Remember me</label>
						</div>
						<p class="text-danger">
							<?php if (isset($_SESSION['msg'])) 
							{
								echo $_SESSION['msg'];
								unset($_SESSION['msg']);
							}?>
						</p>
					</div>
					<div class="card-footer">
						<div class="form-footer">
							<input type="submit" name="submit" class="btn btn-success">
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>