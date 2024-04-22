<?php
require_once "connection.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $phoneNum = $_POST['phoneNum'];

    if (isset($_FILES['image'])) {
        $image_name = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_temp = $_FILES['image']['tmp_name'];
        $error = $_FILES['image']['error'];

        if ($error === 0) {
            if ($image_size > 0) { // Change to '>' to check if image size is greater than 0
                $image_ex = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
                $allowed_ex = array("png", "jpg", "jpeg");

                if (in_array($image_ex, $allowed_ex)) {
                    $new_image_name = uniqid("IMG-", true) . '.' . $image_ex;
                    move_uploaded_file($image_temp, 'assets/product/' . $new_image_name);
                    $sql = "INSERT INTO account (userName, image, password, address, phoneNum) VALUES (?, ?, ?, ?, ?)";
                    $stmt = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($stmt, 'sssss', $userName, $new_image_name, $password, $address, $phoneNum);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_close($stmt);

                    // Redirect to prevent form resubmission
                    header("Location: {$_SERVER['REQUEST_URI']}");
                    header("location: login.php");
                    exit();
                } else {
                    echo "<script>alert('Cannot accept file type')</script>";
                }
            } else {
                echo "<script>alert('File size too big')</script>";
            }
        } else {
            echo "Error occurred";
        }
    } else {
        echo "No image uploaded";
    }
}
?>



 
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Snackrush</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


    <link href="assets/css/main.css" rel="stylesheet">
  </head>
  <body style="background-image: url('https://png.pngtree.com/thumb_back/fh260/back_our/20190620/ourmid/pngtree-simple-food-delivery-meal-fashion-poster-background-yellow-back-image_158378.jpg'); background-size:contain">
    <section class="vh-100" style="background-color: rgba(0, 0, 0, 0.6);">
        <div class="container-fluid h-custom">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
              <img src="https://www.netsolutions.com/insights/wp-content/uploads/2021/11/essential-feature-of-building-an-on-demand-food-ordering-app.jpg"
                class="img-fluid" style="opacity: 0.7;" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
              <form method="post" enctype="multipart/form-data" action="#" style="color: antiquewhite;">
                <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                  <p class="lead fw-normal mb-0 me-3">Sign in with</p>
                  <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-floating mx-1">
                    <i class="bi bi-facebook"></i>
                  </button>
      
                  <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-floating mx-1">
                    <i class="bi bi-twitter"></i>
                  </button>
      
                  <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-floating mx-1">
                    <i class="bi bi-linkedin"></i>
                  </button>
                </div>
      
                <div class="divider d-flex align-items-center my-4">
                  <p class="text-center fw-bold mx-3 mb-0">Or</p>
                </div>
                <div class="col-12">
                  <label for="Image">Upload Image</label>
                  <input type="file" id="Image" name="image" accept="image/*">
                </div>
                <div class="col-md-6">
                  <label for="inputEmail4" class="form-label">Username</label>
                  <input type="text" class="form-control" id="Username" name="userName">
                </div>
                <div class="col-md-6">
                  <label for="inputPassword4" class="form-label">Password</label>
                  <input type="password" class="form-control" id="Password" name="password">
                </div>
                <div class="col-12">
                  <label for="inputAddress" class="form-label">Address</label>
                  <input type="text" class="form-control" id="Address" placeholder="1234 Main St" name="address">
                </div>
                <div class="col-12">
                  <label for="Phone">Phone Number</label>
                  <input type="text" id="Phone" name="phoneNum" placeholder="Phone Number" maxlength="11">
                </div>
                <div class="col-12">
                  <button type="submit" href="login.php" class="btn btn-primary">Sign Up</button>
                </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <footer id="footer" class="footer">

          <div class="container">
            <div class="row gy-3">
              <div class="col-lg-3 col-md-6 d-flex">
                <i class="bi bi-geo-alt icon"></i>
                <div>
                  <h4>Address</h4>
                  <p>
                    A108 Cornelia Street <br>
                    New York, NY 535022 - US<br>
                  </p>
                </div>
      
              </div>
      
              <div class="col-lg-3 col-md-6 footer-links d-flex">
                <i class="bi bi-telephone icon"></i>
                <div>
                  <h4>Reservations</h4>
                  <p>
                    <strong>Phone:</strong> +1 5589 55488 55<br>
                    <strong>Email:</strong> info@example.com<br>
                  </p>
                </div>
              </div>
      
              <div class="col-lg-3 col-md-6 footer-links d-flex">
                <i class="bi bi-clock icon"></i>
                <div>
                  <h4>Opening Hours</h4>
                  <p>
                    <strong>Mon-Sat: 11AM</strong> - 23PM<br>
                    Sunday: Closed
                  </p>
                </div>
              </div>
      
              <div class="col-lg-3 col-md-6 footer-links">
                <h4>Follow Us</h4>
                <div class="social-links d-flex">
                  <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                  <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                  <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                  <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
      
            </div>
          </div>
      
          <div class="container">
            <div class="copyright">
              &copy; Copyright <strong><span></span></strong>. All Rights Reserved
            </div>
            <div class="credits">
              <a>To God Be All Glory.</a>
            </div>
          </div>
      
        </footer>
      </section>
  </body>
</html>