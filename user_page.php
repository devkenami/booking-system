<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FurEver Fit</title>

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
                    <a href="user_page.php" class="nav-link active" aria-current="page">
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
            <h1>Welcome to FurEver Fit!</h1>
            <p style="max-width: 600px;">where your pet’s health  and  happiness are our top priorities! We’re thrilled to embark on this wellness journey with you and your furry companions.</p>

            <!-- carousel -->
            <div id="carouselExampleDark" class="mt-4 carousel carousel-dark slide" data-bs-ride="carousel" style="max-width: 800px;">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="10000">
                        <img src="./img/1.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="./img/2.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="./img/3.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>