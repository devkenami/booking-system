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
                    <a href="#" class="nav-link link-dark">
                    <i class="fa-regular fa-calendar-check bi pe-none me-2"></i> My Appointments
                    </a>
                </li>
                </ul>
                <hr>
                <div class="dropdown">
                <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>mdo</strong>
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
          <div class="modal-body">
            <div class="row mb-3">
              <div class="col">
                <label for="exampleFormControlInput1" class="form-label">Pet Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter your pet name...">
              </div>
              <div class="col">
                <label for="exampleFormControlInput1" class="form-label">Pet Image</label>
                <input type="file" class="form-control" id="exampleFormControlInput1">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col">
                <label for="exampleFormControlInput1" class="form-label">Age</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Enter your pet age...">
              </div>
              <div class="col">
                <label for="exampleFormControlInput1" class="form-label">Weight</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Enter your pet weight in kg...">
              </div>
              <div class="col">
                <label for="exampleFormControlInput1" class="form-label">Height</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Enter your pet height in cm...">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col">
                <label for="inputState" class="form-label">Pet Type</label>
                <select id="inputState" class="form-select">
                  <option selected>Dog</option>
                  <option>Hamster</option>
                  <option>Bird</option>
                  <option>Snake</option>
                </select>
              </div>
              <div class="col">
                <label for="inputState" class="form-label">Gender</label>
                <select id="inputState" class="form-select">
                  <option selected>Male</option>
                  <option>Female</option>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-pink-color">Save</button>
          </div>
        </div>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>