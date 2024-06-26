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
                                <a href="admin_appointments.php" class="nav-link active">
                                    <i class="nav-icon fas fa-calendar-check"></i>
                                    <p>Appointments</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="admin_user.php" class="nav-link">
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
                    <h1>Appointments 🗓</h1>
                    <div class="mb-4 mt-4 w-25">
                        <input type="date" class="form-control" id="datePicker">
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Customer Name</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Pet's Name</th>
                                        <th scope="col">Pet Type</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM user_appointment_table";
                                    $result = mysqli_query($conn, $query);
                                    $count = mysqli_num_rows($result);
                                    if ($count > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['user_name'] ?></td>
                                        <td><?php echo $row['user_date_appointment'] ?></td>
                                        <td><?php echo $row['user_time_appointment'] ?></td>
                                        <td><?php echo $row['user_pet_name'] ?></td>
                                        <td><?php echo $row['user_pet_type'] ?></td>
                                        <td>
                                            <?php if ($row['appointment_status'] == "waiting") { ?>
                                            <span class="badge bg-warning text-dark">Waiting to be approved</span>
                                            <?php } elseif ($row['appointment_status'] == "accepted") { ?>
                                            <span class="badge bg-success">Accepted</span>
                                            <?php } else { ?>
                                            <span class="badge bg-danger">Declined</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($row['appointment_status'] != "waiting") { ?>
                                            <span class="badge bg-light text-dark">None</span>
                                            <?php } else { ?>
                                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#accept_appointment<?php echo $row['id'] ?>">Accept</button>
                                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#decline_appointment<?php echo $row['id'] ?>">Decline</button>
                                            <?php } ?>
                                        </td>
                                    </tr>

                                    <!-- accept appointment -->
                                    <div class="modal fade" id="accept_appointment<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="delete_admin_staff" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="./admin_functions/functions.php" method="POST">
                                                    <input type="hidden" name="appointment_id" value="<?php echo $row['id']; ?>">
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to accept this appointment?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" name="accept_appointment" class="btn btn-success">Confirm</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- decline appointment -->
                                    <div class="modal fade" id="decline_appointment<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="delete_admin_staff" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="./admin_functions/functions.php" method="POST">
                                                    <input type="hidden" name="appointment_id" value="<?php echo $row['id']; ?>">
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to decline this appointment?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" name="decline_appointment" class="btn btn-danger">Confirm</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }
                                    } else { ?>
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
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

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
    <!-- AdminLTE App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
    <script>
        document.getElementById('datePicker').valueAsDate = new Date();
    </script>
</body>
</html>