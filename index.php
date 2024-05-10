<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

    // $name = mysqli_real_escape_string($conn, $_POST['name']);-->
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    // $cpass = md5($_POST['cpassword']);
    // $user_type = $_POST['user_type'];

    $select =  mysqli_query($conn, " SELECT * FROM user_form WHERE `email` = '$email' && `password` = '$pass' limit 0,1");
    $selectadmin =  mysqli_query($conn, " SELECT * FROM admin_form WHERE `email` = '$email' && `password` = '$pass' limit 0,1");

    if(mysqli_num_rows($select) > 0 ){
        $row = mysqli_fetch_array($select);
        $_SESSION['id'] = $row ['id'];
        $_SESSION['user_type'] = $row ['user_type'];
            header('location:user_page.php');
    }else if(mysqli_num_rows($selectadmin) > 0 ){
        $row = mysqli_fetch_array($selectadmin);
        $_SESSION['id'] = $row ['id'];
        $_SESSION['user_type'] = $row ['user_type'];
            header('location:admin/admin_page.php');
    }else{
        $error[] = "invalid email or password";
    }

    
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>

    <!--custom css file link -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-container">

    <form action="" method="post">
        <h3>login now</h3>
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            };
        };
        ?>
        <input type="email" name="email" required placeholder="enter your email">
        <input type="password" name="password" required placeholder="enter your password">
        <input type="submit" name="submit" value="login now" class="form-btn">
        <p>don't have an account? <a href="register_form.php">register now</a></p>
    </form>
</div>
</body>
</html>