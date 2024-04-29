<?php 
include ('db_connection.php');
session_start();

if(isset($_POST['signup']))
{
	$fname = $_POST['firstn'];
	$lname = $_POST['lastn'];
	$usern = $_POST['usern'];
	$pword = hash('md5',$_POST['passw']);


	$check = mysqli_query($con,"SELECT * FROM adminaccount");
	if(mysqli_num_rows($check) == 0)
	{
		$insert = mysqli_query($con,"INSERT INTO adminaccount(firstname,lastname,username,password) VALUES('$fname','$lname','$usern','$pword')");
		if($insert)
		{
			header("location: admin_login.php?Success=Success");
		}else{
			header("location: admin_signup.php?Error=Error");
		}
	}
	else
	{
		
		header("location: admin_signup.php?Onetime=Onetime");
	}
	
}

if(isset($_POST['login']))
{
	$username = $_POST['username'];
	
	$password2 = $_POST['password'];
	$password = hash('md5',$_POST['password']);


	$query = mysqli_query($con,"SELECT * FROM adminaccount WHERE username = '$username' AND password = '$password' OR password ='$password2'");
	if(mysqli_fetch_assoc($query))
	{
		$_SESSION['User'] = $_POST['username'];
		header("location:admin_main.php");
	}
	else
	{
		header("location:admin_login.php?Invalid=Invalid");
	}
}


if(isset($_POST['edit']))
{

	$firstnames = $_POST['firstn'];
	$lastnames = $_POST['lastn'];
	$usernames = $_POST['usern'];
	
	$querys = mysqli_query($con,"UPDATE adminaccount SET firstname='$firstnames',lastname='$lastnames',username='$usernames'");
	
	if($querys)
	{
		echo '<script>alert("Successfully Updated");window.location.href="admin_main.php";</script>';
	}else{
			echo '<script>alert("Failed to Update");window.location.href="admin_main.php";</script>';
		}


	
	
}

if(isset($_POST['changepass']))
{
	$newpass = hash('md5',$_POST['newpassw']);
	$oldpass = hash('md5',$_POST['oldpassw']);

	$checkoldpass = mysqli_query($con,"SELECT * FROM adminaccount WHERE password = '$oldpass'");
	if(mysqli_num_rows($checkoldpass) > 0 ){
		$query = mysqli_query($con,"UPDATE adminaccount SET Password = '$newpass'");
		if($query)
		{
			echo '<script>alert("Successfully Updated");window.location.href="javascript:history.back()";</script>';
		}
	}
	else
	{
		echo '<script>alert("Incorrect Old Password");window.location.href="javascript:history.back()";</script>';
	}
}

 ?>