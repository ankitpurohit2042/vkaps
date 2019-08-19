<!-- delete query -->
<?php 
include('db.php');

$id = $_GET['del'];

$query = "DELETE FROM user WHERE id='$id'";
$result = mysqli_query($con,$query);
if ($result) 
{
	?>
	<!--delete alert  -->
	<script type="text/javascript">
		alert('Deleted successfully.');
		window.location.href="view_all_user.php";
	</script>
	<?php
} 
else 
{
	?>
	<script type="text/javascript">
		alert('Deleted unsuccessfully.');
		window.location.href="view_all_user.php";
	</script>
	<?php
}

?>