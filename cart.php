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

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>\
              <th scope="col">image</th>
              <th scope="col">Product</th>
              <th scope="col">Quantity</th>
              <th scope="col">Price</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php
          require_once "connection.php";
            $userId = $_GET["user_id"];
            $sqla = "SELECT * FROM cart WHERE userId=$userId";
            $result = mysqli_query($conn, $sqla);
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<th scope="row">' . $row['id'] . '</th>';
                echo '<td><img src="assets/product/' . $row['image'] . '" alt="' . $row['image'] . '" style="width: 100px;"></td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['quantity'] . '</td>';
                echo '<td> ₱ ' . $row['price'] . '</td>';
                echo '<td><a href="deletefunction.php?product_id='. $row['id'] .'&& user_id= ' .$userId .' " type="button" class="btn btn-danger">Delete</button></td>';
                echo '</tr>';
            }
            
            ?>

          </tbody>
        </table>
      </section>
        <button type="sumbit" name="reciept" class="btn btn-primary" id="reciept">Checkout</button>
    <div class="modal" id="receiptModal">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Receipt</h5>
              </div>
              <div class="modal-body">
              </div>
              <div class="modal-footer">
                <button type="sumbit" name="checkout" class="btn btn-primary" id="checkoutBtn">Checkout</button>

              </div>
          </div>
      </div>
    </div>

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
            $("#checkoutBtn").click(function(){
                $.ajax({
                  url: 'checkout.php',
                  type: 'POST', // Change to POST method since you're modifying data
                  data: { user_id: userId }, // Include the userId in the data sent to the server
                  success: function(response) {
                      // Handle success
                      console.log(response); // Log the response for debugging
                      window.location.href = "cart.php?user_id=" + userId;
                  },
                  error: function(xhr, status, error) {
                      // Handle error
                      console.error(xhr.responseText); // Log the error response for debugging
                  }
              });
          });
          

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
$(document).ready(function(){
    $("#reciept").click(function(){
        $.ajax({
            url: 'getcartdata.php',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                var cartData = response;
                var modalBodyHTML = '<table class="cart-item-list">';
                var totalPrice = 0; // Initialize total price variable
                
                // Table header
                modalBodyHTML += '<thead><tr><th class="text-center">Product</th><th class="text-center">Quantity</th><th class="text-center">Price</th></tr></thead>';

                for (var i = 0; i < cartData.length; i++) {
                    modalBodyHTML += '<tr>';
                    modalBodyHTML += '<td class="item-name text-center">' + cartData[i].name + '</td>';
                    modalBodyHTML += '<td class="item-quantity text-center">' + cartData[i].quantity + '</td>';
                    modalBodyHTML += '<td class="item-price text-center">₱ ' + cartData[i].price + '</td>';
                    modalBodyHTML += '</tr>';

                    totalPrice += parseFloat(cartData[i].price); // Add item price to total price
                }

                // Close the table
                modalBodyHTML += '</table>';

                // Append total price to modal body
                modalBodyHTML += '<p class="total-price">Total Price: ₱ ' + totalPrice.toFixed(2) + '</p>';

                document.getElementById('receiptModal').querySelector('.modal-body').innerHTML = modalBodyHTML;
                $('#receiptModal').modal('show');
            },
            error: function() {
                alert('Failed to fetch cart data');
            }
        });
    });
});









</script>

</body>

</html>