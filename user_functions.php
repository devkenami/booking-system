<?php

include 'config.php';
session_start();

if (isset($_POST['add_user_pet'])) {
  $user_id = $_POST['user_id'];
  $user_pet_name = $_POST['user_pet_name'];
  $user_pet_age = $_POST['user_pet_age'];
  $user_pet_weight = $_POST['user_pet_weight'];
  $user_pet_height = $_POST['user_pet_height'];
  $use_pet_type = $_POST['use_pet_type'];
  $user_pet_gender = $_POST['user_pet_gender'];

  $image = $_FILES['user_pet_image']['name'];
  $path = "/user_pets_image";
  $image_ext = pathinfo($image, PATHINFO_EXTENSION);
  $filename = time().'.'.$image_ext;

  $sql = "INSERT INTO user_pets_table (user_id, user_pet_name, user_pet_age, user_pet_weight, user_pet_height, use_pet_type, user_pet_gender, user_pet_image) VALUES ('$user_id','$user_pet_name','$user_pet_age','$user_pet_weight','$user_pet_height','$use_pet_type','$user_pet_gender', '$filename')";
  
    if ($conn->query($sql) === TRUE) {
        move_uploaded_file($_FILES['user_pet_image']['tmp_name'],$path.'/'.$filename);
        header("Location: my_pets.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


if (isset($_POST['user_book_appointment'])) {
  $user_id = $_POST['user_id'];
  $user_date_appointment = $_POST['user_date_appointment'];

  $sql = "INSERT INTO user_appointment_table (user_id, user_date_appointment) VALUES ('$user_id','$user_date_appointment')";

  if ($conn->query($sql) === TRUE) {
        header("Location: book_appointments.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}