<?php

include 'config.php';
session_start();

// add pet functions
if (isset($_POST['add_user_pet'])) {
  $user_id = $_POST['user_id'];
  $user_pet_name = $_POST['user_pet_name'];
  $user_pet_age = $_POST['user_pet_age'];
  $user_pet_weight = $_POST['user_pet_weight'];
  $user_pet_height = $_POST['user_pet_height'];
  $user_pet_type = $_POST['user_pet_type'];
  $user_pet_gender = $_POST['user_pet_gender'];

  $image = $_FILES['user_pet_image']['name'];
  $path = "user_pets_image";
  $image_ext = pathinfo($image, PATHINFO_EXTENSION);
  $filename = time().'.'.$image_ext;

  $sql = "INSERT INTO user_pets_table (user_id, user_pet_name, user_pet_age, user_pet_weight, user_pet_height, user_pet_type, user_pet_gender, user_pet_image) VALUES ('$user_id','$user_pet_name','$user_pet_age','$user_pet_weight','$user_pet_height','$user_pet_type','$user_pet_gender', '$filename')";
  
    if ($conn->query($sql) === TRUE) {
        if (move_uploaded_file($_FILES['user_pet_image']['tmp_name'], $path.'/'.$filename)) {
            header("Location: my_pets.php");
        } else {
            echo "Failed to move uploaded file.";
            if (!file_exists($path)) {
                echo "The path does not exist.";
            } elseif (!is_writable($path)) {
                echo "The path is not writable.";
            } else {
                echo "Unknown error.";
            }
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST['delete_user_pet'])) {
    $user_pet_id = $_POST['user_pet_id'];
  
    $sql = "DELETE FROM user_pets_table WHERE id=$user_pet_id";
  
      if ($conn->query($sql) === TRUE) {
          header("Location: my_pets.php");
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
  }


// book appointment function
if (isset($_POST['user_book_appointment'])) {
  $user_id = $_POST['user_id'];
  $user_name = $_POST['user_name'];
  $user_date_appointment = $_POST['user_date_appointment'];
  $user_time_appointment = $_POST['user_time_appointment'];
  $user_pet_name = $_POST['user_pet_name'];

  $pet_attr = explode(',', $user_pet_name);
  $user_pet_name = $pet_attr[0];
  $user_pet_type = $pet_attr[1];

  // set status as waiting by default  
  $appointment_status = "waiting";

  $sql = "INSERT INTO user_appointment_table (user_id, user_name, user_date_appointment, user_time_appointment, user_pet_name, user_pet_type, appointment_status) VALUES ('$user_id','$user_name','$user_date_appointment','$user_time_appointment','$user_pet_name','$user_pet_type','$appointment_status')";

  if ($conn->query($sql) === TRUE) {
        header("Location: book_appointments.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST['cancel_appointment'])) {
    $appointment_id = $_POST['appointment_id'];
  
    $sql = "DELETE FROM user_appointment_table WHERE id=$appointment_id";
  
      if ($conn->query($sql) === TRUE) {
          header("Location: user_appointments.php");
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
  }