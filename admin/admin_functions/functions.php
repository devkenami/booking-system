<?php

include '../../config.php';
session_start();
// admin staff
if (isset($_POST['add_admin_employee'])) {
  $user_type_id = 2;
  $user_account_status = "active";
  $employee_username = $_POST['employee_username'];
  $employee_password = $_POST['employee_password'];
  $employee_first_name = $_POST['employee_first_name'];
  $employee_middle_name = $_POST['employee_middle_name'];
  $employee_last_name = $_POST['employee_last_name'];
  $employee_dob = $_POST['employee_dob'];
  $employee_email = $_POST['employee_email'];
  $employee_contact_no = $_POST['employee_contact_no'];

  $sql = "INSERT INTO user (user_type_id, user_username, user_password, user_account_status) VALUES ('$user_type_id', '$employee_username', '$employee_password', '$user_account_status')";

  $sql2 = "INSERT INTO user_profile (user_profile_first_name, user_profile_last_name, user_profile_middle_name, user_profile_dob, user_profile_email_address, user_profile_contact_no) VALUES ('$employee_first_name', '$employee_last_name', '$employee_middle_name', '$employee_dob', '$employee_email', '$employee_contact_no')";
  
    if ($conn->query($sql) === TRUE) {
        if ($conn->query($sql2) === TRUE) {
            header("Location: ../admin_employee.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST['edit_admin_employee'])) {
    $employee_id = $_POST['employee_id'];
    $employee_first_name = $_POST['employee_first_name'];
    $employee_middle_name = $_POST['employee_middle_name'];
    $employee_last_name = $_POST['employee_last_name'];
    $employee_email = $_POST['employee_email'];
    $employee_contact_no = $_POST['employee_contact_no'];

    $currentDateTime = date('Y-m-d H:i:s');

    $sql = "UPDATE user_profile SET user_profile_first_name='$employee_first_name', user_profile_last_name='$employee_last_name',user_profile_middle_name='$employee_middle_name',user_profile_email_address='$employee_email',user_profile_contact_no='$employee_contact_no',user_profile_updated_at='$currentDateTime' WHERE user_profile_id=$employee_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../admin_employee.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST['delete_admin_employee'])) {
  $employee_id = $_POST['employee_id'];

  $sql = "UPDATE user SET user_account_status='not active' WHERE user_id=$employee_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../admin_employee.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Appointments
if (isset($_POST['accept_appointment'])) {
    $appointment_id = $_POST['appointment_id'];
    $sql = "UPDATE user_appointment_table SET appointment_status='accepted' WHERE id=$appointment_id";
  
      if ($conn->query($sql) === TRUE) {
          header("Location: ../admin_appointments.php");
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
}

if (isset($_POST['decline_appointment'])) {
    $appointment_id = $_POST['appointment_id'];
    $sql = "UPDATE user_appointment_table SET appointment_status='declined' WHERE id=$appointment_id";
  
      if ($conn->query($sql) === TRUE) {
          header("Location: ../admin_appointments.php");
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
}