<!-- city fectch from database -->
<?php
sleep(1);
include("db.php");

$cityId = $_POST['cityId'];

$cityQuery = "SELECT * FROM cities WHERE cityState ='$cityId'";
$cityResult = mysqli_query($con,$cityQuery);

while ($cityData = mysqli_fetch_assoc($cityResult)) 
{
	?>
	<option value="<?php echo $cityData['id'] ?>"><?php echo $cityData['cityName'] ?></option>;
	<?php
}

?>