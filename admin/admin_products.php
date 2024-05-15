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
                  <a href="admin_products.php" class="nav-link active">
                    <i class="fa-solid fa-bone"></i> Products
                  </a>
              </li>
              <li>
                  <a href="admin_appointments.php" class="nav-link link-dark">
                    <i class="fa-solid fa-calendar-check"></i> Appointments
                  </a>
              </li>
              <li>
                  <a href="admin_staff.php" class="nav-link link-dark">
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
            <h1>Products 🎫</h1>
            <div class="mb-4 mt-2 w-25 float-end">
              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Search product...">
            </div>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Product Name</th>
                  <th scope="col">Price</th>
                  <th scope="col">Description</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
            <center><p>No products found.</p></center>
            <div class="mb-4 mt-2 float-end">
              <div class="btn btn-pink-color">Add Product</div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>