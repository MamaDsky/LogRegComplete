<?php
session_start();
require 'connect.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="card">
        <img style=" margin-top:10px; height:150px; width:150px; border-radius:50%;" class="profilepict" src="profile/<?= $row['profile']?>" alt="">
        <h1>Selamat Datang  <?= $row["username"]; ?></h1>
        <p style="font-weight:bold;"><a style="text-decoration:none; color:#5b2bdd; font-size:16px;" href="logout.php">Logout</a></p>
    </div>
</body>
</html>