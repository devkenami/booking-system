<?php

include '../../config.php';
session_start();

if (isset($_POST['add_admin_staff'])) {
  $staff_name = $_POST['staff_name'];
  $staff_contact_no = $_POST['staff_contact_no'];
  $staff_email = $_POST['staff_email'];

  $sql = "INSERT INTO admin_staff_table (staff_name, staff_contact_no, staff_email) VALUES ('$staff_name', '$staff_contact_no', '$staff_email')";
    // Attempt to execute the prepared statement
    if ($conn->query($sql) === TRUE) {
        // echo "Record inserted successfully.";
        header("Location: ../admin_staff.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}