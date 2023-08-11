<?php
include "config.php";

    if (isset($_POST["submit"])){


        $email = mysqli_real_escape_string($connect,$_POST['email']); 

        $password = md5($_POST['password']);

        $select = "SELECT * FROM userstable WHERE email = '$email' && password = '$password'";

        $result = mysqli_query($connect, $select);
        
        if(mysqli_num_rows($result) > 0){

            $row = mysqli_fetch_array($result);

            if($row['user_type'] == 'admin'){
                $_SESSION['admin_name'] = $row['name'];
                header('location:admin.php');

            }elseif($row['user_type'] == 'user'){
                $_SESSION['user_name'] = $row['name'];
                header('location:user.php');
            }
        }else{
            $error[] = 'incorrect email or password!';
        }

    };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form-container">
        <form action="" method="POST" >
         <h3>login now</h3> 
         
         <?php
         if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            };
         };
         ?>
        
            <input   type="email" name="email" required placeholder="enter email" >
            
            <input   type="password" name="password" required placeholder="enter password">
        
            <input type="submit" name="submit" value="login now" class="form-btn">
            <p>don't have an account? <a href="signup.php">register now</a></p>
        
    </form>
    </div>
</body>
</html>