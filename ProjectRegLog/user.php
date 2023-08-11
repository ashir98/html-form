<?php
include 'config.php';

if(!isset( $_SESSION['user_name'])){
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   
    <div class="container">

        <div class="content">
            <h3>Hi, <span>user</span></h3>
            <h1>welcome <span><?php echo $_SESSION['user_name']?></span></h1>
            <p>This is an user page</p>
            <a href="login.php" class="btn">Login</a>
            <a href="signup.php" class="btn">Register</a>
            <a href="logout.php" class="btn">Logout</a>

        </div>
    </div>
</body>
</html>