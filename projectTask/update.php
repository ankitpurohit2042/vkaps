<!-- update data in database -->
<?php
include('db.php');
print_r($_POST); die;
$id = $_POST['id'];
$pass = $_POST['pass'];
$re_pass = $_POST['re_pass'];
$add = $_POST['add'];
$city = $_POST['city'];
$gender = $_POST['gender'];

$query = "UPDATE user SET password='$pass',re_password='$re_pass',address='$add',city='$city',gender='$gender' WHERE id = '$id'";

$result = mysqli_query($con,$query);
header("location:view_all_user.php");
?>