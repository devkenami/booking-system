<?php

include '../../config.php';
session_start();
// admin stuff
if (isset($_POST['add_admin_staff'])) {
  $staff_name = $_POST['staff_name'];
  $staff_contact_no = $_POST['staff_contact_no'];
  $staff_email = $_POST['staff_email'];

  $sql = "INSERT INTO admin_staff_table (staff_name, staff_contact_no, staff_email) VALUES ('$staff_name', '$staff_contact_no', '$staff_email')";
  
    if ($conn->query($sql) === TRUE) {
        header("Location: ../admin_staff.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST['edit_admin_staff'])) {
  $staff_id = $_POST['staff_id'];
  $new_staff_name = $_POST['staff_name'];
  $new_staff_contact_no = $_POST['staff_contact_no'];
  $new_staff_email = $_POST['staff_email'];

  $sql = "UPDATE admin_staff_table SET staff_name='$new_staff_name', staff_contact_no='$new_staff_contact_no',staff_email='$new_staff_email' WHERE id=$staff_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../admin_staff.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST['delete_admin_staff'])) {
  $staff_id = $_POST['staff_id'];

  $sql = "DELETE FROM admin_staff_table WHERE id=$staff_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../admin_staff.php");
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