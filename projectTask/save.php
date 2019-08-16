<!-- insert data in database -->
 <?php
 echo "<pre>";
 // print_r($_POST); die;
 include("db.php");

 $fullName = $_POST['fullName'];
 $user_name = $_POST['userName'];
 $pass = $_POST['pass'];
 $pass = md5($pass);
 $gender = $_POST['gender'];
 $address = $_POST['add'];
 $state = $_POST['state'];
 $city = $_POST['city'];
 $contact = $_POST['contact'];

 $query = "INSERT INTO user(full_name,user_name,password,gender,address,state,city,contact) VALUES('$fullName','$user_name','$pass','$gender','$address','$state','$city','$contact')"; 
 mysqli_query($con,$query);
 header("location:log_in.php");
 ?>