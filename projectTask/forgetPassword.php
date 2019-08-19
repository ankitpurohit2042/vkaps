<?php
include("header.php");
?>
<div class="container">
	<div class="row">
		<div class="col-md-6 mx-auto">
			<form action="authForget.php" method="post">
				<div class="card">
					<div class="card-header">
						<h5>Forget password</h5>
					</div>
					<div class="card-body">
						<div class="form-group">
							<input type="email" name="userName" placeholder="Enter email address" class="form-control"  required="">
						</div>
					</div>
					<div class="card-footer">
						<input type="submit" name="submit" value="Send me password" class="btn btn-success btn-sm">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>