<?php
require_once "connection.php";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch cart data from the database
$sql = "SELECT name, quantity, price, SUM(price) as total_price FROM cart GROUP BY name";
$result = $conn->query($sql);

$cartData = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $cartData[] = array(
            'name' => $row['name'],
            'quantity' => $row['quantity'],
            'price' => $row['price'],
            'totalprice' => $row['total_price']
        );
    }
}

// Close the database connection
$conn->close();

// Return the cart data as JSON
header('Content-Type: application/json');
echo json_encode($cartData);
?>
