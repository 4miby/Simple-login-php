<?php

function check_login($con)
{
  if(($_SESSION['user_id']))
  {
    $id=$_SESSION['user_id'];
    $query = "select * from users where id = $id limit 1";
    $resutl = mysqli_query($con,$query);
    if($resutl && mysqli_num_rows($resutl) > 0)
    {
      $user_data = mysqli_fetch_assoc($resutl);
      return $user_data;
    }
  }

  //redirect to login
  header("Location: login.php");
  die;
}