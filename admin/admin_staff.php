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

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
         <!-- Navbar -->
         <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link">
                <img src="../img/logo.jpeg" alt="FurEver Fit Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">FurEver Fit</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../img/profile.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Admin</a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item">
                                <a href="admin_page.php" class="nav-link">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="admin_patients.php" class="nav-link">
                                    <i class="nav-icon fas fa-paw"></i>
                                    <p>Patients</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="admin_services.php" class="nav-link">
                                    <i class="nav-icon fas fa-first-aid"></i>
                                    <p>Services</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="admin_products.php" class="nav-link">
                                    <i class="nav-icon fas fa-bone"></i>
                                    <p>Products</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="admin_appointments.php" class="nav-link">
                                    <i class="nav-icon fas fa-calendar-check"></i>
                                    <p>Appointments</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Users
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="admin_user.php" class="nav-link active text-white">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Admin</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#doctors" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Veterinary</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#nurses" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Employee</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#technicians" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Customers</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="../logout.php" class="nav-link">
                                    <i class="nav-icon fa-solid fa-right-from-bracket"></i>
                                    <p>Logout</p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid p-4">
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
                              <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_admin_staff<?php echo $row['id']?>"><i class="fa-solid fa-trash"></i></button>
                            </td>
                          </tr>
                          <!-- staff edit modal -->
                          <div class="modal fade" id="edit_admin_staff<?php echo $row['id']?>" tabindex="-1" aria-labelledby="edit_admin_staff" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Staff</h1>
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
                    <div class="mb-4 mt-2 float-end">
                      <div class="btn btn-pink-color" data-bs-toggle="modal" data-bs-target="#add_admin_staff">
                      <i class="fa-solid fa-plus"></i> <br>
                      </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- add admin_staff modal -->
        <div class="modal fade" id="add_admin_staff" tabindex="-1" aria-labelledby="add_admin_staff" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Staff</h1>
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

        <!-- AdminLTE JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    </div>
</body>
</html>
