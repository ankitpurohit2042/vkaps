<?php 
// print_r($_GET);
include("header.php");
$id = $_GET['edit'];
// fetch state data
$stateQuery = "SELECT * FROM states";
$stateResult = mysqli_query($con,$stateQuery);

// fetch user data
$userQuery = "SELECT * FROM user Where id = '$id'";
$userResult = mysqli_query($con,$userQuery);
$userData = mysqli_fetch_assoc($userResult);
// print_r($userData); die;
// if ($userData['state']==$stateData["id"]) 
// 	{
// 		echo "selected='selected'"; 
// 	}
// 	die;
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 mx-auto">
			<form action="update.php" method="post">
				<input type="hidden" name="id" value="<?php echo $userData['id'] ?>">
				<!-- edit form -->
				<div class="card">
					<div class="card-header">
						<h3>Edit Imformation</h3>
					</div>
					<div class="card-body">
						<div class="FORM-GROUP">
							<label>Email address</label>
							<input type="text" disabled="disabled" name="user_name" id="user_name" placeholder="Enter your username" class="form-control" value="<?php echo $userData['user_name'] ?>">
							<p class="text-danger" id="user_name_msg"></p>
						</div>
						<div class="FORM-GROUP">
							<label>Password</label>
							<input type="password" name="pass" id="pass" placeholder="Enter your password" class="form-control" value="<?php echo $userData['password'] ?>">
							<p class="text-danger" id="pass_msg"></p>
						</div>
						<div class="FORM-GROUP">
							<label>Confirm Password</label>
							<input type="password" name="re_pass" id="re_pass" placeholder="Enter your re-enter password" class="form-control" value="<?php echo $userData['password'] ?>">
							<p class="text-danger" id="re_pass_msg"></p>
						</div>
						<div class="FORM-GROUP">
							<label>Address</label>
							<textarea class="form-control" id="add" placeholder="Enter your address" name="add"><?php echo $userData['address'] ?></textarea>
							<p class="text-danger" id="add_msg"></p>
						</div>
						<div class="FORM-GROUP">
							<label>Gender</label>
							<input type="radio" name="gender"  id="male"  value="male" <?php if($userData['gender']=='male') echo "checked='checked'" ?>> Male
							<input type="radio" name="gender"  id="female" value="female" <?php if($userData['gender']=='female') echo "checked='checked'" ?>?> Female
							<p class="text-danger" id="gender_msg"></p>
						</div>
						<div class="FORM-GROUP">
							<label>State</label>
							<select class="form-control" name="state" id="state">
								<option>Select State</option>
								<?php
								while ($stateData = mysqli_fetch_assoc($stateResult)) 
								{
									?>
								<option value="<?php echo $stateData['id'] ?>" <?php if ($userData['state']==$stateData["id"]) echo "selected='selected'"; ?>><?php echo $stateData['stateName'] ?></option>

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
								<?php
								while ($cityData = mysqli_fetch_assoc($cityResult)) 
								{
									?>
								<option value="<?php echo $cityData['id'] ?>"> <?php if ($userData['city']==$cityData['id']) echo "selected='selected'"; ?>><?php echo $stateData['cityName'] ?></option>

									<?php
								}
								?>
							</select>
							<p class="text-danger"	id="city_msg"></p>
						</div>
						<div class="form-group">
							<label>Contact</label>
							<input type="text" name="contact" id="contact" class="form-control" value="<?php echo $userData['contact']?>">
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

