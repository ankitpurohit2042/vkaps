<?php
include("header.php");

$stateQuery = "SELECT * FROM states";
$stateResult = mysqli_query($con,$stateQuery);

?>
<!-- loader coding -->
<div id="divLoading" class=""></div>

<!-- start add user code -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 mx-auto">
			<form action="save.php" method="post">
				<div class="card">
					<div class="card-header">
						<h3>Add Imformation</h3>
					</div>
					<div class="card-body">
						<div class="form-group">
							<label>Full name</label>
							<input type="text" name="fullName" id="fullName" class="form-control" placeholder="Enter your full name">
							<p class="text-danger" id="fullName_msg"></p>
						</div>
						<div class="FORM-GROUP">
							<label>Email address</label>
							<input type="text" name="userName" id="user_name" placeholder="Enter your username" class="form-control">
							<p class="text-danger" id="user_name_msg"></p>
						</div>
						<div class="FORM-GROUP">
							<label>Password</label>
							<input type="password" name="pass" id="pass" placeholder="Enter your password" class="form-control">
							<p class="text-danger" id="pass_msg"></p>
						</div>
						<div class="FORM-GROUP">
							<label>Confirm Password</label>
							<input type="password" name="re_pass" id="re_pass" placeholder="Enter your re-enter password" class="form-control">
							<p class="text-danger" id="re_pass_msg"></p>
						</div>
						<div class="FORM-GROUP">
							<label>Gender</label>
							<input type="radio" name="gender" id="male" value="male"> Male
							<input type="radio" name="gender" id="female" value="female"> Female
							<p class="text-danger" id="gender_msg"></p>
						</div>
						<div class="FORM-GROUP">
							<label>Address</label>
							<textarea class="form-control" id="add" placeholder="Enter your address" name="add"></textarea>
							<p class="text-danger" id="add_msg"></p>
						</div>
						<div class="form-group">
							<label>States</label>
							<select class="form-control" name="state" id="state">
								<option>Select State</option>
								<?php
								while ($stateData = mysqli_fetch_assoc($stateResult)) 
								{
									?>
									<option value="<?php echo $stateData['id'] ?>"><?php echo $stateData['stateName'] ?></option>
									<?php
								}
								?>
							</select>
							<p class="text-danger"	id="state_msg"></p>
						</div>
						<div class="FORM-GROUP">
							<label>City</label>
							<select class="form-control" name="city" id="city">
								<option>Select City</option>
							</select>
							<p class="text-danger"	id="city_msg"></p>
						</div>
						<div class="form-group">
							<label>Contact</label>
							<input type="text" name="contact" id="contact" class="form-control" placeholder="Enter your contact">
							<p class="text-danger"	id="contact_msg"></p>
						</div>
					</div>
					<div class="card-footer">
						<input type="submit" name="submit" value="Submit" id="submit" class="btn btn-success">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End add user coding -->
<?php
include("footer.php"); 
?>