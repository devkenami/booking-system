<?php
  include '../config.php';
  session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FurEver Fit</title>

    <!--custom css file link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <div class="row">
        <div class="col-2">
            <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="height: 100vh; position: fixed;">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                    <img src="../img/logo.jpeg" class="bi pe-none me-2" width="40" height="32" alt="logo">
                <span class="fs-4">FurEver Fit</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                  <li class="nav-item">
                      <a href="admin_page.php" class="nav-link link-dark" aria-current="page">
                        <i class="fa-solid fa-house-chimney bi pe-none me-2"></i> Home
                      </a>
                  </li>
                  <li>
                      <a href="admin_patients.php" class="nav-link link-dark">
                        <i class="fa-solid fa-paw"></i> Patients
                      </a>
                  </li>
                  <li>
                      <a href="admin_services.php" class="nav-link link-dark">
                        <i class="fa-solid fa-kit-medical"></i> Services
                      </a>
                  </li>
                  <li>
                      <a href="admin_products.php" class="nav-link link-dark">
                        <i class="fa-solid fa-bone"></i> Products
                      </a>
                  </li>
                  <li>
                      <a href="admin_appointments.php" class="nav-link link-dark">
                        <i class="fa-solid fa-calendar-check"></i> Appointments
                      </a>
                  </li>
                  <li>
                      <a href="admin_staff.php" class="nav-link active">
                        <i class="fa-solid fa-users"></i> Staff Members
                      </a>
                  </li>
                </ul>
                <hr>
                <div class="dropdown">
                <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../img/profile.jpg" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>Admin</strong>
                </a>
                <ul class="dropdown-menu text-small shadow">
                    <li><a class="dropdown-item" href="../logout.php">Sign out</a></li>
                </ul>
                </div>
            </div>
        </div>
        <div class="col-10 p-4">
            <h1>Admin Staff 🙎🏼‍♂️</h1>
            <div class="mb-4 mt-2 w-25 float-end">
              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Search staff...">
            </div>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Staff Name</th>
                  <th scope="col">Contact No.</th>
                  <th scope="col">Email</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  $query = "SELECT * FROM admin_staff_table";
                  $result = mysqli_query($conn, $query);
                  $count = mysqli_num_rows($result);
                  if ($count > 0) { 
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                  <tr>
                    <td><?php echo $row['staff_name'] ?></td>
                    <td><?php echo $row['staff_contact_no'] ?></td>
                    <td><?php echo $row['staff_email'] ?></td>
                    <td>
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit_admin_staff<?php echo $row['id']?>"><i class="fa-solid fa-pen-to-square"></i></button>
                      <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                    </td>
                  </tr>
                  <!-- staff edit modal -->
                  <div class="modal fade" id="edit_admin_staff<?php echo $row['id']?>" tabindex="-1" aria-labelledby="edit_admin_staff" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Admin Staff Form</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="./admin_functions/functions.php" method="POST">
                          <input type="hidden" name="staff_id" value="<?php echo $row['id']?>">
                          <div class="modal-body">
                            <div class="mb-3">
                              <label for="exampleFormControlInput1" class="form-label">Staff Name</label>
                              <input type="text" class="form-control" name="staff_name" placeholder="Enter staff name.." value="<?php echo $row['staff_name'] ?>">
                            </div>
                            <div class="mb-3">
                              <label for="exampleFormControlInput1" class="form-label">Contact No.</label>
                              <input type="text" class="form-control" name="staff_contact_no" placeholder="Enter staff contact no..." value="<?php echo $row['staff_contact_no'] ?>">
                            </div>
                            <div class="mb-3">
                              <label for="exampleFormControlInput1" class="form-label">Email address</label>
                              <input type="email" class="form-control" name="staff_email" placeholder="Enter staff email..." value="<?php echo $row['staff_email'] ?>">
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="edit_admin_staff" class="btn btn-pink-color">Save</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                <?php }} else { ?>
                  <tr>
                    <td colspan="4" class="text-center">
                      <h5>No data to show</h5>
                    </td>
                  </tr>
                <?php }; ?>
              </tbody>
            </table>
            <div class="mb-4 mt-2 float-end">
              <div class="btn btn-pink-color" data-bs-toggle="modal" data-bs-target="#add_admin_staff">Add Staff</div>
            </div>
        </div>
    </div>

    <!-- add admin_staff modal -->
    <div class="modal fade" id="add_admin_staff" tabindex="-1" aria-labelledby="add_admin_staff" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Admin Staff Form</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="./admin_functions/functions.php" method="POST">
            <div class="modal-body">
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Staff Name</label>
                <input type="text" class="form-control" name="staff_name" placeholder="Enter staff name..">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Contact No.</label>
                <input type="text" class="form-control" name="staff_contact_no" placeholder="Enter staff contact no...">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="staff_email" placeholder="Enter staff email...">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="add_admin_staff" class="btn btn-pink-color">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>