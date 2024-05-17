<?php
  include 'config.php';
  session_start();

  $user_id = $_SESSION['id'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FurEver Fit | My pets</title>

    <!--custom css file link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
    <div class="row">
        <div class="col-2">
            <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="height: 100vh; position: fixed;">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                    <img src="./img/logo.jpeg" class="bi pe-none me-2" width="40" height="32" alt="logo">
                <span class="fs-4">FurEver Fit</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="user_page.php" class="nav-link link-dark" aria-current="page">
                    <i class="fa-solid fa-house-chimney bi pe-none me-2"></i> Home
                    </a>
                </li>
                <li>
                    <a href="my_pets.php" class="nav-link link-dark">
                    <i class="fa-solid fa-paw bi pe-none me-2"></i> My Pets
                    </a>
                </li>
                <li>
                    <a href="book_appointments.php" class="nav-link link-dark">
                    <i class="fa-regular fa-calendar-check bi pe-none me-2"></i> Book Appointments
                    </a>
                </li>
                <li>
                    <a href="user_appointments.php" class="nav-link active">
                    <i class="fa-regular fa-calendar-check bi pe-none me-2"></i> My Appointments
                    </a>
                </li>
                </ul>
                <hr>
                <div class="dropdown">
                <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="./img/profile.jpg" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong><?php echo $_SESSION['user_name']; ?></strong>
                </a>
                <ul class="dropdown-menu text-small shadow">
                    <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
                </ul>
                </div>
            </div>
        </div>
        <div class="col-10 p-4">
            <h1>My Appointments</h1>
            <p style="max-width: 600px;">View your appointments here...</p>

            <table class="table table-striped mt-4">
              <thead>
                <tr>
                  <th scope="col">Date</th>
                  <th scope="col">Time</th>
                  <!-- <th scope="col">Service</th> -->
                  <th scope="col">Pet's Name</th>
                  <th scope="col">Pet Type</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $query = "SELECT * FROM user_appointment_table WHERE user_id=$user_id";
                  $result = mysqli_query($conn, $query);
                  $count = mysqli_num_rows($result);
                  if ($count > 0) { 
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                  <tr>
                    <td><?php echo $row['user_date_appointment'] ?></td>
                    <td><?php echo $row['user_time_appointment'] ?></td>
                    <td><?php echo $row['user_pet_name'] ?></td>
                    <td><?php echo $row['user_pet_type'] ?></td>
                    <td>
                      <?php if ($row['appointment_status'] == "waiting") { ?>
                        <span class="badge bg-warning text-dark">Waiting to be approve</span>
                      <?php } else if ($row['appointment_status'] == "accepted") { ?>
                        <span class="badge bg-success">Accepted</span>
                      <?php } else { ?>
                        <span class="badge bg-danger">Declined</span>
                      <?php } ?>
                    </td>
                    <td>
                      <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cancel_appointment<?php echo $row['id']?>">Cancel</button>
                    </td>
                  </tr>
                  
                  <!-- delete appointment -->
                  <div class="modal fade" id="cancel_appointment<?php echo $row['id']?>" tabindex="-1" aria-labelledby="delete_admin_staff" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Cancel Appointment Confirmation</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="user_functions.php" method="POST">
                          <input type="hidden" name="appointment_id" value="<?php echo $row['id']; ?>">
                          <div class="modal-body">
                            <p>Are you sure you want to cancel this appointment?</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" name="cancel_appointment" class="btn btn-pink-color">Confirm</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                <?php }} else { ?>
                  <tr>
                    <td colspan="6" class="text-center">
                      <h5>No data to show</h5>
                    </td>
                  </tr>
                <?php }; ?>
              </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>