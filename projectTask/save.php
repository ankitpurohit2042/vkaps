<!-- insert data in database -->
<?php
echo "<pre>";
include("db.php");
if ($_POST['submit']) 
{
	// image insert 
	$imageName = $_FILES['profilePic']['name'];
	$imageSize = $_FILES['profilePic']['size'];
	$imageTmpName = $_FILES['profilePic']['tmp_name'];

	$arr = explode(".", $imageName);
	$extensoion = end($arr);

	$imageNewName = time().rand(1000,20000).".".$extensoion;

	if ($extensoion == "jpg" || $extensoion == "jpeg" || $extensoion == "gif" || $extensoion == "png") 
	{
		if ($imageSize <= (1024*1024*1)) 
		{
			function imageResize($imageSrc,$imageWidth,$imageHeight) {

					$newImageWidth =100;
					$newImageHeight =100;

					$newImageLayer=imagecreatetruecolor($newImageWidth,$newImageHeight);
					imagecopyresampled($newImageLayer,$imageSrc,0,0,0,0,$newImageWidth,$newImageHeight,$imageWidth,$imageHeight);

					return $newImageLayer;
				}
			if(is_array($_FILES)) {


				$sourceProperties = getimagesize($imageTmpName);
				$folderPath = "profilePicture/";
				$extensoion = pathinfo($_FILES['profilePic']['name'], PATHINFO_EXTENSION);
				$imageType = $sourceProperties[2];
				switch ($imageType) 
				{

					case IMAGETYPE_PNG:
					$imageResourceId = imagecreatefrompng($imageTmpName); 
					$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
					imagepng($targetLayer,$folderPath. $imageNewName. "_thump.". $extensoion);
					break;


					case IMAGETYPE_GIF:
					$imageResourceId = imagecreatefromgif($imageTmpName); 
					$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
					imagegif($targetLayer,$folderPath. $imageNewName. "_thump.". $extensoion);
					break;


					case IMAGETYPE_JPEG:
					$imageResourceId = imagecreatefromjpeg($imageTmpName); 
					$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
					imagejpeg($targetLayer,$folderPath. $imageNewName. "_thump.". $extensoion);
					break;


					default:
					echo "Invalid Image type.";
					exit;
					break;
				}

// userdata insert
				
				$fullName = $_POST['fullName'];
				$user_name = $_POST['userName'];
				$pass = $_POST['pass'];
				$pass = md5($pass);
				$gender = $_POST['gender'];
				$address = $_POST['add'];
				$state = $_POST['state'];
				$city = $_POST['city'];
				$contact = $_POST['contact'];

				$query = "INSERT INTO users(full_name,user_name,password,gender,address,state,city,contact,imageName) VALUES('$fullName','$user_name','$pass','$gender','$address','$state','$city','$contact','$imageNewName')"; 
				move_uploaded_file($imageTmpName, "profilePicture/".$imageNewName);
				mysqli_query($con,$query);
			}
			else
			{
				$_SESSION["msg"] = "Image size is too large !";
				header("location:index.php");
			}
		}
		else
		{
			$_SESSION['msg'] = "File type is not aollowed !";
			header("location:index.php");
		}
	} 
}
header("location:log_in.php");
?>