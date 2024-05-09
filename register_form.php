<?php

@include 'config.php';

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];

    $select =  mysqli_query($conn, " SELECT * FROM user_form WHERE `email` = '$email'  limit 0,1");
    $selectadmin =  mysqli_query($conn, " SELECT * FROM admin_form WHERE `email` = '$email'  limit 0,1");

    if(mysqli_num_rows($select) > 0 || mysqli_num_rows($selectadmin) > 0 ){

        $error[] = 'user already exist!';

    }else{
        
        if($pass != $cpass){
        $error[] = 'password not matched!';
    }else{
        if($user_type == "user"){
            mysqli_query($conn, "INSERT INTO user_form(name, email, password, user_type) 
        VALUES ('$name','$email','$pass','$user_type')");
        header('location:login_form.php');
        }else if($user_type == "admin"){
            mysqli_query($conn, "INSERT INTO admin_form(name, email, password, user_type) 
        VALUES ('$name','$email','$pass','$user_type')");
        header('location:login_form.php');
        }else{
            $error[] = "there's an error occured";
        }
        
        }
    }
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register form</title>

    <!--custom css file link -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-container">

    <form action="" method="post">
        <h3>register now</h3>
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            };
        };
        ?>
        <input type="text" name="name" required placeholder="enter your name">
        <input type="email" name="email" required placeholder="enter your email">
        <input type="password" name="password" required placeholder="enter your password">
        <input type="password" name="cpassword" required placeholder="confirm your password">
        <select name="user_type" required>
            <option value="">SELECT USER TYPE</option>
            <option value="user">user</option>
            <option value="admin">admin</option>

        </select>
        <input type="submit" name="submit" value="register now" class="form-btn">
        <p>already have an account? <a href="login_form.php">login now</a></p>
    </form>
</div>
</body>
</html>