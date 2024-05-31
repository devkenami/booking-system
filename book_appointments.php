<?php
  include 'config.php';
  session_start();

  $user_id = $_SESSION['user_id'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FurEver Fit | Book Appointments</title>

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
                    <a href="book_appointments.php" class="nav-link active">
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
            <h1>Book Appointments</h1>
            <p style="max-width: 600px;">Book appointments and schedule your pet care etc...</p>

            <form action="user_functions.php" method="POST" class="mt-3">
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                <input type="hidden" name="user_name" value="<?php echo $_SESSION['user_name']; ?>">

                <div class="row">
                    <div class="col">
                        <label class="form-label">Select Date of Appointment<span class="required">*</span></label>
                        <input type="date" name="user_date_appointment" class="form-control" id="datePicker" required>
                    </div>
                    <div class="col">
                        <label class="form-label">Select Time of Appointment<span class="required">*</span></label>
                        <input type="time" name="user_time_appointment" class="form-control" required>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col">
                        <label class="form-label">Pet Name<span class="required">*</span></label>
                        <select class="form-select" name="user_pet_name" id="user_pet_dropdown" required onchange="setPetType()">
                            <?php
                                $query = "SELECT * FROM user_pets_table WHERE user_id='$user_id'";
                                $result = mysqli_query($conn, $query);
                                $count = mysqli_num_rows($result);
                                if ($count > 0) { 
                                    while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <option value="<?php echo $row['user_pet_name']; ?>,<?php echo $row['user_pet_type']; ?>"><?php echo $row['user_pet_name']; ?></option>
                            <?php }} ?>
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label">Pet Type<span class="required">*</span></label>
                        <input type="text" name="user_pet_type" class="form-control" disabled id="user_pet_type">
                    </div>
                </div>
                <input type="submit" class="btn btn-pink-color mt-3" name="user_book_appointment" value="Book Appointment">
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('datePicker').valueAsDate = new Date();
        setPetType();

        function setPetType() {
            let val = document.getElementById("user_pet_dropdown").value;
            let splited_val = val.split(",");
            let pet_type = splited_val[1];

            // set the pet type as value of pet type input
            document.getElementById("user_pet_type").value = pet_type;
        }
    </script>
</body>
</html>