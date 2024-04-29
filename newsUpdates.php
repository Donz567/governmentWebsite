<?php 
include ('db_connection.php');


if(isset($_POST['submit']))
{
	$file = $_FILES['file'];
	
	$fileName = $file['name'];
	$filePath = $file['tmp_name'];
	$fileSize = $file['size'];
	$fileError = $file['error'];
	$fileType = $file['type'];

	$fileExt = explode('.',$fileName);
	$fileActualExt = strtolower(end($fileExt));

	$title = mysqli_real_escape_string($con, $_POST['title']);
	$link = mysqli_real_escape_string($con, $_POST['link']);
	$description = mysqli_real_escape_string($con, $_POST['desc']);

	$allowed = array('jpg','jpeg','png');

	if(in_array($fileActualExt, $allowed))
	{
		if($fileError === 0){
			if($fileSize < 1000000){
				$fileNameNew = uniqid('',true).".".$fileActualExt;

				$fileDestination = 'uploadedfiles/'.$fileNameNew;

				move_uploaded_file($filePath, $fileDestination);

				$query = mysqli_query($con,"INSERT INTO newsupdates(img,title,description,link) VALUES('$fileDestination','$title','$description','$link')");

				if($query){
					echo '<script>alert("Success!");window.location.href="admin_main.php";</script>';
				}else{
					echo '<script>alert("Error!");window.location.href="javascript:history.back()";</script>';
				}


				

			}else{
				echo '<script>alert("Your file is too big!");window.location.href="javascript:history.back()";</script>';
			}

		}else{
			echo '<script>alert("There was an error uploading your file!");window.location.href="admin_main.php";</script>';
		}
	}else{
		echo '<script>alert("You cannot upload files of this type!");window.location.href="javascript:history.back()";</script>';
	}


}

if(isset($_POST['submits']))
{
	$file = $_FILES['file'];
	
	$fileName = $file['name'];
	$filePath = $file['tmp_name'];
	$fileSize = $file['size'];
	$fileError = $file['error'];
	$fileType = $file['type'];

	$fileExt = explode('.',$fileName);
	$fileActualExt = strtolower(end($fileExt));
	
	$title = mysqli_real_escape_string($con, $_POST['title']);
	$link = mysqli_real_escape_string($con, $_POST['link']);
	$description = mysqli_real_escape_string($con, $_POST['jobdesc']);
	$allowed = array('jpg','jpeg','png');
	if(in_array($fileActualExt, $allowed))
	{
		if($fileError === 0){
			if($fileSize < 1000000){
				$fileNameNew = uniqid('',true).".".$fileActualExt;

				$fileDestination = 'uploadedfiles/'.$fileNameNew;

				move_uploaded_file($filePath, $fileDestination);

				$query = mysqli_query($con,"INSERT INTO jobhiring (img,jobtitle,jobdescription,link) VALUES('$fileDestination','$title','$description','$link')");

				if($query){
					echo '<script>alert("Success!");window.location.href="jobhiring.php";</script>';
				}else{
					echo '<script>alert("Error!");window.location.href="javascript:history.back()";</script>';
				}


				

			}else{
				echo '<script>alert("Your file is too big!");window.location.href="javascript:history.back()";</script>';
			}

		}else{
			echo '<script>alert("There was an error uploading your file!");window.location.href="jobhiring.php";</script>';
		}
	}else{
		echo '<script>alert("You cannot upload files of this type!");window.location.href="javascript:history.back()";</script>';
	}
		


	
}

 ?>