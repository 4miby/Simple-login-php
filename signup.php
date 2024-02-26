<?php
session_start();

  include("connection.php");
  include("functions.php");


  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    //something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    //save to database
    $query = "insert into users (user_name,password) values ('$user_name','$password')";

    mysqli_query($con, $query);

    header("Location: login.php");
    die;
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign up</title>
  <style>
    span {
      padding-right: 10px;
    }
  </style>

  <script>
  function validateForm() {
      var username = document.querySelector('.userInput').value.trim();
      var password = document.querySelector('.passwordInput').value.trim();
      
      var usernamePattern = /^[a-zA-Z0-9_-]+$/; 
      // ^ beginning of string
      // $ end of string
      // [a-zA-Z0-9_-] characters allowed: letters, numbers, "-" and "_"

      if (username === '' || password === '') {
        alert('Username and password cannot be empty!');
        return false;
      }

      if (!usernamePattern.test(username)) {
        alert('Username can only contain letters, numbers, "-" and "_"');
        return false; 
      }
      return true; 
    }
  </script>
</head>

<body>
  <h1>Simple demo form Signup</h1>
  <form method="post" onsubmit="return validateForm()">
    <span>username: </span>
    <input type="text" class="userInput" name="user_name">
    <br>
    <span>password: </span>
    <input type="password" class="passwordInput" name="password">
    <br>
    <button type="submit">Submit</button>
    <a href="login.php">Login</a>
  </form>
</body>
</html>
