<?php 
include("header.php");
$id = $_GET["moreDetail"];
$query = "SELECT * FROM user WHERE id = $id";
// $query = "SELECT full_name,cityName,stateName FROM states INNER JOIN cities INNER JOIN user ON states.id = cities.cityState = user.id";
$result = mysqli_query($con,$query);
$data = mysqli_fetch_assoc($result);
// $stateCityQuery = "SELECT * FROM states RIGHT JOIN cities ON states.id = cities.cityState";
// $stateCityResult = mysqli_query($con,$stateCityQuery);
// $stateCityData = mysqli_fetch_assoc($stateCityResult);
?>
<div class="container-fluid mt-3">
	<div class="row">
		<div class="col-md-6 mx-auto">
			<!-- View user data coding -->
			<div class="card bg-warning">
				<a href="view_all_user.php">Back</a>
				<div class="card-header">
					<h5>More Detail</h5>
				</div>
				<div class="card-body">
					<div class="form-group">
						<input type="text"  readonly="readonly" value="<?php echo $data['full_name']?>" class = "form-control">
					</div>
					<div class="form-group">
						<input type="text"  readonly="readonly" value="<?php echo $data['user_name']?>" class = "form-control">
					</div>
					<div class="form-group">
						<input type="text"  readonly="readonly" value="<?php echo $data['address']?>" class = "form-control">
					</div>
					<div class="form-group">
						<input type="text"  readonly="readonly" value="<?php echo $data['gender']?>" class = "form-control">
					</div>
					<div class="form-group">
						<input type="text"  readonly="readonly" value="<?php echo $data['state']?>" class = "form-control">
					</div>
					<div class="form-group">
						<input type="text"  readonly="readonly" value="<?php echo $data['city']?>" class = "form-control">
					</div>
					<div class="form-group">
						<input type="text"  readonly="readonly" value="<?php echo $data['contact']?>" class = "form-control">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include("footer.php");
?>