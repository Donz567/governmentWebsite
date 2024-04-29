<?php 
$con = mysqli_connect("localhost","root","","oslobdb");

if($con -> connect_errno >0)
{
	die("Failed to connect to database[".$con -> connect_errno."]");
}


 ?>