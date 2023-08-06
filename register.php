<?php
require 'connect.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $username = $_POST["username"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["cpassword"];
  $direktori = "profile/";
  $file_name=$_FILES['profilepict']['name'];
  move_uploaded_file($_FILES['profilepict']['tmp_name'],$direktori.$file_name);
  $duplicate = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username Has Already Taken'); </script>";
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO users (id, username, password, profile) VALUES('','$username','$password','$file_name')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Congratulations, Registration Successfull'); </script>";
    }
    else{
      echo
      "<script> alert('Sorry, Password Does Not Match'); </script>";
    }
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
        <h1>Register Page</h1><br>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="form-element">
                <input type="text" name="username" id="">
                <label for="username">Username</label>
            </div>
            <div class="form-element">
                <input type="password" name="password" id="">
                <label for="password">Password</label>
            </div>
            <div class="form-element">
                <input type="password" name="cpassword" id="">
                <label for="password">Confirm Pass</label>
            </div>
            <input type="file" name="profilepict" id="">
            <br>
            <button name="submit" type="submit">Submit</button><br>
            <p><a href="index.php">Login to your account</a></p>
        </form>
    </div>
</body>
</html>