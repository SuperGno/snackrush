<?php
require_once "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $price = $_POST["price"];

    $image_name = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_temp = $_FILES['image']['tmp_name'];
    $error = $_FILES['image']['error'];

    if ($error === 0) {
        if ($image_size < 0) {
            echo "<script>alert('File size too big')</script>";
        } else {
            $image_ex = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
            $allowed_ex = array("png", "jpg", "jpeg");

            if (in_array($image_ex, $allowed_ex)) {
                $new_image_name = uniqid("IMG-", true) . '.' . $image_ex;
                move_uploaded_file($image_temp, 'assets/product/' . $new_image_name);
                $sql = "INSERT INTO product (image, name, price) VALUES ('$new_image_name', '$name', '$price')";
                mysqli_query($conn, $sql);
                
                // Redirect to prevent form resubmission
                header("Location: {$_SERVER['REQUEST_URI']}");
                exit();
            } else {
                echo "<script>alert('Cannot accept file type')</script>";
            }
        }
    } else {
        echo "Error occurred";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Add Product</h2>
    <form method="post" enctype="multipart/form-data">
        <label for="image">Image URL:</label><br>
        <input type="file" id="image" name="image" required><br><br>
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        <label for="price">Price:</label><br>
        <input type="number" id="price" name="price" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
