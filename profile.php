<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
                        * {
                margin: 0;
                padding: 0
            }

            body {
                background-color: #000
            }

            .card {
                width: 350px;
                background-color: #efefef;
                border: none;
                cursor: pointer;
                transition: all 0.5s;
            }

            .image img {
                transition: all 0.5s
            }

            .card:hover .image img {
                transform: scale(1.5)
            }

            .btn {
                height: 140px;
                width: 140px;
                border-radius: 50%
            }

            .name {
                font-size: 22px;
                font-weight: bold
            }

            .idd {
                font-size: 14px;
                font-weight: 600
            }

            .idd1 {
                font-size: 12px
            }

            .number {
                font-size: 22px;
                font-weight: bold
            }

            .follow {
                font-size: 12px;
                font-weight: 500;
                color: #444444
            }

            .btn1 {
                height: 40px;
                width: 150px;
                border: none;
                background-color: #000;
                color: #aeaeae;
                font-size: 15px
            }

            .text span {
                font-size: 13px;
                color: #545454;
                font-weight: 500
            }

            .icons i {
                font-size: 19px
            }

            hr .new1 {
                border: 1px solid
            }

            .join {
                font-size: 14px;
                color: #a0a0a0;
                font-weight: bold
            }

            .date {
                background-color: #ccc
            }
        </style>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
    
        <title>SnackRush</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
    
        <link href="assets/img/favicon.png" rel="icon">
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
      <main>
      <section class="profile">
        <div class="container mt-4 mb-4 p-3 d-flex justify-content-center"> 
        <?php
          require_once "connection.php";
          if(isset($_GET['user_id'])) {
              $userid = $_GET['user_id'];
              $sql="SELECT * FROM account WHERE id=$userid";
              $result = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_assoc($result)) {
                  echo '<div class="card p-4">
                    <div class="image d-flex flex-column justify-content-center align-items-center">
                        <button class="btn btn-secondary">
                            <img src="assets/product/' . $row['image'] . '" height="100" width="100" /></button>
                            <span class="name mt-3">User</span> <span class="idd">' . $row['userName'] . '</span> 
                            <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                                <span class="idd1">' . $row['id'] . '</span> <span><i class="fa fa-copy"></i></span> 
                            </div> 
                                <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center"> 
                                    <span><i class="bi bi-twitter"></i></span> 
                                    <span><i class="bi bi-facebook"></i></span> 
                                    <span><i class="bi bi-instagram"></i></span> 
                                    <span><i class="bi bi-linkedin"></i></span> 
                                </div> 
                            </div> 
                        </div>';
    }
}
?>


        </div>
    </section>
</main>
<footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div>
            <h4>Address</h4>
            <p>
              1234 Arlegui Street<br>
              Quiapo, M. Manila 1001 - PH<br>
            </p>
          </div>

        </div>

        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>Reservations</h4>
            <p>
              <strong>Phone:</strong> +63 912 345 6789<br>
              <strong>Email:</strong> snaccrush@jamil.com<br>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4>Work Hours</h4>
            <p>
              <strong>M-F: 09:00AM</strong> - 20:00PM
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Follow Us</h4>
          <div class="social-links d-flex">
            <a href="https://www.twitter.com/mknthnm" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="https://www.facebook.com/mknthnm.dc143c" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="https://www.twitter.com/mnthmlln"><i class="bi bi-instagram"></i></a>
            <a href="#" class="https://www.linkedin.com/"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>SnackRush</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <a>To God Be All Glory.</a>
      </div>
    </div>

  </footer> 

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