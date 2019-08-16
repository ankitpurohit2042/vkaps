<?php 
include("header.php");
$query = "SELECT * FROM user";
// $query = "SELECT full_name,cityName,stateName FROM states INNER JOIN cities INNER JOIN user ON states.id = cities.cityState = user.id";
$result = mysqli_query($con,$query);

// $stateCityQuery = "SELECT * FROM states RIGHT JOIN cities ON states.id = cities.cityState";
// $stateCityResult = mysqli_query($con,$stateCityQuery);
// $stateCityData = mysqli_fetch_assoc($stateCityResult);
?>
<div class="container-fluid mt-3 bg-warning">
	<div class="row">
		<div class="col-md-9 mx-auto bg-secondary">
			<!-- View user data coding -->
			<a href="download.php" class="btn btn-light">Download data</a>
			<table class="table table-bordered table-responsive table-dark table-hover">
				<tr>
					<th>S.No</th>
					<th>Full Name</th>
					<th>Email</th>
					<th>Contact</th>
					<th></th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<?php $i = 1; 
				while ($data = mysqli_fetch_assoc($result)) 
				{ 
					?>
					<tr>
						<td><?php echo $i ?></td>
						<td><?php echo $data['full_name']?></td>
						<td><?php echo $data['user_name']?></td>
						<td><?php echo $data['contact']?></td>
						<td><a href="moreUserInformation.php?moreDetail=<?php echo $data['id']?>" class="btn btn-light btn-sm">More Detail</a></td>
						<td><a href="edit.php?edit=<?php echo $data['id']?>" class="btn btn-light">Edit</a></td>
						<td><a href="delete.php?del=<?php echo $data['id']?>" onclick="return confirm('are you sure delete this account?');" class="btn btn-sm btn-danger">Delete</a></td>
					</tr>
					<?php 
					$i++;
				}
				?>
			</table>
		</div>
	</div>
</div>
<?php
include("footer.php");
?>