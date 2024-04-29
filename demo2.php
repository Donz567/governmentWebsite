<?php 

include "db_connection.php";
$query = mysqli_query($con,"SELECT * FROM activecases");
if(mysqli_num_rows($query) > 0)
  {
    $getValue = mysqli_query($con,"SELECT activeCase FROM activecases");
    $val = mysqli_fetch_assoc($getValue);
   echo $val['activeCase'];
  }
  else
  {
    $getValue = mysqli_query($con,"SELECT activeCase FROM activecases");
   $val = mysqli_fetch_assoc($getValue);
   echo $val['activeCase'];
  }

 ?>