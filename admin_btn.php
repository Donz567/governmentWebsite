
<?php 
include ('db_connection.php');

 if(isset($_POST['remove']))
 {
 	$delete_id = $_POST['del'];
 	$status = "inactive";
 	echo $delete_id;


 	$query = mysqli_query($con,"UPDATE newsupdates SET status = '$status' WHERE id = '$delete_id'");
 	if($query){
 		echo '<script>alert("Success!");window.location.href="admin_manage.php";</script>';
 	}else{
 		echo '<script>alert("Error!");window.location.href="admin_manage.php";</script>';
 	}
 }

if(isset($_POST['update']))
{
	$file = $_FILES['file'];

	$fileSize = $file['size'];
	$edititem = $_POST['edititem'];
	if($fileSize !== 0)
	{
		$fileName = $file['name'];
		$filePath = $file['tmp_name'];
		
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

					$query = mysqli_query($con,"UPDATE newsupdates SET img='$fileDestination',title='$title',description='$description',link='$link' WHERE id='$edititem'");

					if($query){
						echo '<script>alert("Success!");window.location.href="admin_manage.php";</script>';
					}else{
						echo '<script>alert("Error!");window.location.href="javascript:history.back()";</script>';
					}


					

				}else{
					echo '<script>alert("Your file is too big!");window.location.href="javascript:history.back()";</script>';
				}

			}else{
				echo '<script>alert("There was an error uploading your file!");window.location.href="admin_manage.php";</script>';
			}
		}else{
			echo '<script>alert("You cannot upload files of this type!");window.location.href="javascript:history.back()";</script>';
		}
	}else
	{
		$title = mysqli_real_escape_string($con, $_POST['title']);
	$link = mysqli_real_escape_string($con, $_POST['link']);
	$description = mysqli_real_escape_string($con, $_POST['desc']);

		
		$query = mysqli_query($con,"UPDATE newsupdates SET title='$title',description='$description',link='$link' WHERE id='$edititem'");

		if($query){
			echo '<script>alert("Success!");window.location.href="admin_manage.php";</script>';
		}else{
			echo '<script>alert("Error!");window.location.href="javascript:history.back()";</script>';
		}

				
	}
	



	

}



 ?>