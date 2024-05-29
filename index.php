<?php

@include 'config.php';
session_start();

if(isset($_POST['submit'])){

    // $name = mysqli_real_escape_string($conn, $_POST['name']);-->
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    // $cpass = md5($_POST['cpassword']);
    // $user_type = $_POST['user_type'];

    // $select =  mysqli_query($conn, " SELECT * FROM user_form WHERE `email` = '$email' && `password` = '$pass' limit 0,1");
    // $selectadmin =  mysqli_query($conn, " SELECT * FROM admin_form WHERE `email` = '$email' && `password` = '$pass' limit 0,1");

    $select_user =  mysqli_query($conn, " SELECT * FROM user WHERE `user_username` = '$email' && `user_password` = '$pass' limit 0,1");

    // if(mysqli_num_rows($select) > 0 ){
    //     $row = mysqli_fetch_array($select);
    //     $_SESSION['id'] = $row['id'];
    //     $_SESSION['auth'] = true;
    //     $_SESSION['user_name'] = $row['name'];
    //     $_SESSION['user_type'] = $row['user_type'];
    //     header('location:user_page.php');
    // }else if(mysqli_num_rows($selectadmin) > 0 ){
    //     $row = mysqli_fetch_array($selectadmin);
    //     $_SESSION['id'] = $row['id'];
    //     $_SESSION['user_type'] = $row['user_type'];
    //     header('location:admin/admin_page.php');
    // }else{
    //     $error[] = "invalid email or password";
    // }

    if(mysqli_num_rows($select_user) > 0) {
        $row = mysqli_fetch_array($select_user);
        $user_type_id = $row['user_type_id'];
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_type_id'] = $row['user_type_id'];
        if($user_type_id == "1") {
            // admin
            header('location:admin/admin_page.php');
        } else if ($user_type_id == "4") {
            // customer
            header('location:user_page.php');
        }

    } else {
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>

    <div class="form-container landing_page">
    <div class="row">
        <div class="col left_side">
        <img class="brand-logo" src="./img/logo.jpeg" alt="Logo">
        
        <div class="text-center">
            <h1 class="mt-3">Animal Life Clinic and Supply</h1>
            <img class="mt-5 dog" src="./img/dog.png" alt="dog">
        </div>
        </div>
        <div class="col right_side d-flex justify-content-center align-items-center">
            <center>
                <div class="pink_header">
                    <h3>Sign In</h3>
                </div>
                
                <form action="" method="post">
                    <?php
                        if(isset($error)){
                            foreach($error as $error){
                                echo '<span class="error-msg">'.$error.'</span>';
                            };
                        };
                    ?>
                    <p class="mb-4">Enter your information below</p>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-envelope"></i></span>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="Enter your password" aria-label="password" aria-describedby="basic-addon1" required>
                    </div>
                    <div class="input-group mt-4 mb-3 d-flex justify-content-center">
                        <input type="submit" name="submit" class="btn btn-pink w-50" value="Sign In">
                    </div>
                    <center>
                        <p class="mt-4">don't have an account? <a href="register_form.php" class="text-pink">register now</a></p>
                    </center>
                </form>
            </center>
        </div>
    </div>
    </div>
</body>
</html>