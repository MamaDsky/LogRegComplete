<?php
session_start();
require 'connect.php';
if(!empty($_SESSION["id"])){
  header("Location: welcome.php");
}
if(isset($_POST["submit"])){
  $username = $_POST["username"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: welcome.php");
    }
    else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Register + Upload Image</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="card">
        <h1>Login Page</h1><br>
        <form method="post" action="">
            <div class="form-element">
                <input type="text" name="username" id="">
                <label for="username">Username</label>
            </div>
            <div class="form-element">
                <input type="password" name="password" id="">
                <label for="password">Password</label>
            </div><br>
            <button name="submit" type="submit">Submit</button><br>
            <p><a href="register.php">Create your account</a></p>
        </form>
    </div>
</body>
</html>