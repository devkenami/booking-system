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
    <!-- Bootstrap 4 -->
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
                                <a href="admin_page.php" class="nav-link active">
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
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid p-4">
                    <?php
                        $query = "SELECT * FROM user_appointment_table";
                        $query1 = "SELECT * FROM user_appointment_table WHERE appointment_status = 'declined'";
                        $query2 = "SELECT * FROM user_appointment_table WHERE appointment_status = 'accepted'";
                        $query3 = "SELECT * FROM user_appointment_table WHERE appointment_status = 'waiting'";
                        $result = mysqli_query($conn, $query);
                        $result1 = mysqli_query($conn, $query1);
                        $result2 = mysqli_query($conn, $query2);
                        $result3 = mysqli_query($conn, $query3);
                        $count = mysqli_num_rows($result);
                        $count1 = mysqli_num_rows($result1);
                        $count2 = mysqli_num_rows($result2);
                        $count3 = mysqli_num_rows($result3);
                    ?>
                    <h1>Welcome Back Admin 👋</h1>
                    <div class="row mt-4">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box"> <span class="info-box-icon text-bg-primary shadow-sm"> <i class="fa-solid fa-calendar"></i> </span>
                                <div class="info-box-content"> <span class="info-box-text">Total Appointments</span> <span class="info-box-number"><?php echo $count ?></span></div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box"> <span class="info-box-icon text-bg-danger shadow-sm"> <i class="fa-solid fa-trash"></i></span>
                                <div class="info-box-content"> <span class="info-box-text">Declined Appointments</span> <span class="info-box-number"><?php echo $count1 ?></span></div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box"> <span class="info-box-icon text-bg-success shadow-sm"> <i class="fa-solid fa-calendar-check"></i></span>
                                <div class="info-box-content"> <span class="info-box-text">Accepted Appointments</span> <span class="info-box-number"><?php echo $count2 ?></span></div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box"> <span class="info-box-icon text-bg-warning shadow-sm"> <i class="fa-solid fa-hourglass-start"></i></span>
                                <div class="info-box-content"> <span class="info-box-text">Waiting Approval Appointments</span> <span class="info-box-number"><?php echo $count3 ?></span></div>
                            </div>
                        </div> 
                    </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2024 <a href="#">FurEver Fit</a>.</strong>
            All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
</body>
</html>