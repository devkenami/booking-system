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
    <!-- AdminLTE v3 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../styles/style.css">
</head>
<style>
    /* .pagination {
        margin-top: -10px;
        margin-bottom: 10px;
        display: flex;
        justify-content: flex-end;
        margin-right: 25px;
    } */
    .mb-4 {
        position: absolute;
        top: 80px;
        right: 35px;
    }
    .dropdown {
        position: absolute;
        right: 35px;
        margin-right: 20px;
    }
</style>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
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
                        <li class="nav-item">
                            <a href="admin_user.php" class="nav-link active">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Users</p>
                            </a>
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
                    <h1>User List</h1>
                    <div class="mb-4 mt-2 float-end">
                        <div class="dropdown">
                            <a class="btn btn-pink dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                User type
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item btn btn-pink" href="admin_user.php">All</a></li>
                                <li><a class="dropdown-item" href="admin_account.php">Admin</a></li>
                                <li><a class="dropdown-item" href="#">Veterinary</a></li>
                                <li><a class="dropdown-item" href="admin_employee.php">Employee</a></li>
                                <li><a class="dropdown-item" href="admin_customers.php">Customers</a></li>
                            </ul>
                        </div>
                        <button data-bs-toggle="modal" data-bs-target="#add_user" class="btn btn-pink-color">+</button>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table id="userTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">User id</th>
                                        <th scope="col">User Type</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Middle Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Email Address</th>
                                        <th scope="col">Contact No.</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Updated At</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM user_profile";
                                    $result = mysqli_query($conn, $query);
                                    $count = mysqli_num_rows($result);
                                    if ($count > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['user_profile_id'] ?></td>
                                        <td><?php 
                                            switch ($row['user_type_id']) {
                                                case "1":
                                                  echo "Admin";
                                                  break;
                                                case "2":
                                                  echo "Employee";
                                                  break;
                                                case "3":
                                                  echo "Veterinary";
                                                  break;
                                                case "4":
                                                  echo "Customers ";
                                              }
                                        ?></td>
                                        <td><?php echo $row['user_profile_first_name'] ?></td>
                                        <td><?php echo $row['user_profile_middle_name'] ?></td>
                                        <td><?php echo $row['user_profile_last_name'] ?></td>
                                        <td><?php echo $row['user_profile_email_address'] ?></td>
                                        <td><?php echo $row['user_profile_contact_no'] ?></td>
                                        <td><?php echo $row['user_profile_created_at'] ?></td>
                                        <td><?php echo $row['user_profile_updated_at'] ?></td>
                                        <td>
                                            <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#edit_admin_employee<?php echo $row['user_id']?>"><i class="fa-solid fa-pen-to-square"></i></button>
                                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_admin_employee<?php echo $row['user_id']?>"><i class="fa-solid fa-box-archive"></i></button>
                                        </td>
                                    </tr>
                                    <?php }
                                    } else { ?>
                                    <tr>
                                        <td colspan="9" class="text-center">
                                            <h5>No data to show</h5>
                                        </td>
                                    </tr>
                                    <?php }; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- add admin employee modal -->
        <div class="modal fade" id="add_user" tabindex="-1" aria-labelledby="add_user" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="./admin_functions/functions.php" method="POST">
                <div class="modal-body">
                 <div class="mb-3">
                    <label class="form-label">User Type</label>
                    <select class="form-select" name="user_type" >
                        <option selected value="1">Admin</option>
                        <option value="2">Employee</option>
                        <option value="3">Veterinary</option>
                        <option value="4">Customer</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">User Name/Email</label>
                    <input type="email" class="form-control" name="user_username" placeholder="Enter user username..">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="text" class="form-control" name="user_password" placeholder="Enter user password...">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control" name="user_first_name" placeholder="Enter user first name...">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Middle Name</label>
                    <input type="text" class="form-control" name="user_middle_name" placeholder="Enter user middle name...">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="user_last_name" placeholder="Enter user last name...">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Date of Birthday</label>
                    <input type="date" class="form-control" name="user_dob">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control" name="user_email" placeholder="Enter user email...">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Contact No.</label>
                    <input type="text" class="form-control" name="user_contact_no" placeholder="Enter user contact no...">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" name="add_user" class="btn btn-pink-color">Save</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>&copy; 2024 <a href="#">FurEver Fit</a>.</strong>
            All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE v3 App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable();
        });
    </script>
</body>
</html>