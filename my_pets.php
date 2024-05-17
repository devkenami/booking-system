<?php
  include 'config.php';
  session_start();
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
                    <a href="my_pets.php" class="nav-link active">
                    <i class="fa-solid fa-paw bi pe-none me-2"></i> My Pets
                    </a>
                </li>
                <li>
                    <a href="book_appointments.php" class="nav-link link-dark">
                    <i class="fa-regular fa-calendar-check bi pe-none me-2"></i> Book Appointments
                    </a>
                </li>
                <li>
                    <a href="user_appointments.php" class="nav-link link-dark">
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
            <h1>My Pets</h1>
            <p style="max-width: 600px;">Add your adorable pets and let us know etc...</p>

            <ul class="mt-4">
              <li>
                <button type="button" class="btn btn-light p-4 text-pink" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <i class="fa-solid fa-plus"></i> <br>
                  Add pets
                </button>
              </li>
            </ul>
            <table class="table table-striped">
              <thead>
                <tr>
                <th scope="col">Image</th>
                  <th scope="col">Pet Name</th>
                  <th scope="col">Age</th>
                  <th scope="col">Weight</th>
                  <th scope="col">Height</th>
                  <th scope="col">Category</th>
                  <th scope="col">Gender</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  $query = "SELECT * FROM user_pets_table";
                  $result = mysqli_query($conn, $query);
                  $count = mysqli_num_rows($result);
                  if ($count > 0) { 
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                  <tr>
                    <td><img width="32" height="32" class="rounded-circle me-2" src="./user_pets_image/<?php echo $row['user_pet_image'] ?>" alt=""></td>
                    <td><?php echo $row['user_pet_name'] ?></td>
                    <td><?php echo $row['user_pet_age'] ?></td>
                    <td><?php echo $row['user_pet_weight'] ?></td>
                    <td><?php echo $row['user_pet_height'] ?></td>
                    <td><?php echo $row['user_pet_type'] ?></td>
                    <td><?php echo $row['user_pet_gender'] ?></td>
                    <td>
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit_user_pet<?php echo $row['id']?>"><i class="fa-solid fa-pen-to-square"></i></button>
                      <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_user_pet<?php echo $row['id']?>"><i class="fa-solid fa-trash"></i></button>
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
                  <!-- staff delete modal -->
                  <div class="modal fade" id="delete_admin_staff<?php echo $row['id']?>" tabindex="-1" aria-labelledby="delete_admin_staff" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Admin Staff Confirmation</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="./admin_functions/functions.php" method="POST">
                          <input type="hidden" name="staff_id" value="<?php echo $row['id']?>">
                          <div class="modal-body">
                            <p>Are you sure you want to remove <b><?php echo $row['staff_name'] ?></b> as Admin Staff?</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" name="delete_admin_staff" class="btn btn-pink-color">Confirm</button>
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
        </div>
    </div>


    <!-- Modals -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add pets form</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="user_functions.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">
            <div class="modal-body">
              <div class="row mb-3">
                <div class="col">
                  <label for="exampleFormControlInput1" class="form-label">Pet Name<span class="required">*</span></label>
                  <input type="text" class="form-control" name="user_pet_name" placeholder="Enter your pet name...">
                </div>
                <div class="col">
                  <label for="exampleFormControlInput1" class="form-label">Pet Image<span class="required">*</span></label>
                  <input type="file" class="form-control" name="user_pet_image">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col">
                  <label for="exampleFormControlInput1" class="form-label">Age<span class="required">*</span></label>
                  <input type="number" class="form-control" name="user_pet_age" placeholder="Enter your pet age...">
                </div>
                <div class="col">
                  <label for="exampleFormControlInput1" class="form-label">Weight</label>
                  <input type="number" class="form-control" name="user_pet_weight" placeholder="Enter your pet weight in kg...">
                </div>
                <div class="col">
                  <label for="exampleFormControlInput1" class="form-label">Height</label>
                  <input type="number" class="form-control" name="user_pet_height" placeholder="Enter your pet height in cm...">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col">
                  <label for="inputState" class="form-label">Pet Type<span class="required">*</span></label>
                  <select id="inputState" class="form-select" name="user_pet_type">
                    <option selected value="Dog">Dog</option>
                    <option value="Hamster">Hamster</option>
                    <option value="Bird">Bird</option>
                    <option value="Snake">Snake</option>
                  </select>
                </div>
                <div class="col">
                  <label for="inputState" class="form-label">Gender<span class="required">*</span></label>
                  <select id="inputState" class="form-select" name="user_pet_gender">
                    <option selected value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-pink-color" name="add_user_pet">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>