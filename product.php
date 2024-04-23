<?php
require_once "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id=$_POST["id"];
    $quantity=$_POST['quantity'];
    $sql="SELECT * FROM product WHERE id = $id";
    $result= mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
      $image= $row['image'];
      $name= $row['name'];
      $price= $row['price'];
      $totalprice=$quantity*$price;
      
      $sqlinsert="INSERT INTO cart(productId, image, name, quantity, price) VALUES('$id', '$image', '$name', '$quantity', '$totalprice')";
      mysqli_query($conn, $sqlinsert);

    }
    header("Location: {$_SERVER['REQUEST_URI']}");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SnackRush</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

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

<body>

<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
    <div class="logo d-flex align-items-center me-auto me-lg-0">
        <h1>SnackRush<span>!</span></h1>
    </div>
      <nav id="navbar" class="navbar">
        <ul>
        <li><a id="home" href="#">Home</a></li>
          <li><a id="product" href="#">Products</a></li>
          <li><a id="profile" href="#">Profile</a></li>
          <li><a id="cart" href="#">Cart</a></li>
          <li class="dropdown"><a href="#"><span>Accessibility</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li class="dropdown"><a href="#"><span>Font Size</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <li><a href="#">+ Increase font size</a></li>
                  <li><a href="#">- Decrease font size</a></li>
                </ul>
              </li>
              <li><a href="#">[Option2]</a></li>
                <li><a href="#">[Option3]</a></li>
              <li><a href="#">Suggestions</a></li>
            </ul>
          </li>
          <li><a href="login.php">Logout</a></li>
        </ul>
      </nav><!-- .navbar -->
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header>
    <section>
        <div class="container text-center mt-5" data-aos="fade-up">
            <div class="row">
              <?php
                $sql = "SELECT * FROM product";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img src="assets/product/' . $row['image'] . '" class="card-img-top" alt="' . $row['image'] . '">
                                <div class="card-body">
                                    <h5 class="card-title">' . $row['name'] . '</h5>
                                    <p class="card-text">' . $row['price'] . '</p>
                                    <form action ="#" method="post">
                                    <div class="col-3 product-sub-1">
                                          <p id="qty">Qty: <br><input type="number" name="quantity" min="1" value="1" id="" class="quantity"></p>
                                      </div>
                                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                                    <input type="text" hidden name="id" value="'. $row['id'].'">
                                    </form>
                                </div>
                            </div>
                        </div>';
                }
              ?>
                
            
            </div>
          </div>
        </section>
    <section class="sample-page">
      <!--Copy this <div> section to create more objects-->
      <div class="container" data-aos="fade-up">

        <p>
          [Inner Page here]
        </p>

      </div>
    </section>

  </main>

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
        $(document).ready(function() {
          var urlParams = new URLSearchParams(window.location.search);
          var userId = urlParams.get('user_id'); // Extracting user_id from URL

          $("#product").click(function() {
              window.location.href = "product.php?user_id=" + userId;
          });
          $("#profile").click(function() {
              window.location.href = "profile.php?user_id=" + userId;
          });
          $("#home").click(function() {
              window.location.href = "snackrush.php?user_id=" + userId;
          });
          $("#cart").click(function() {
              window.location.href = "cart.php?user_id=" + userId;
          });
});


    </script>

    </script>

</body>

</html>