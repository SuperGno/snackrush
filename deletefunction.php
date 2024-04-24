<?php
require_once "connection.php";

if (isset($_GET["product_id"])) {
    $id = $_GET["product_id"];
    $userId=$_GET["user_id"];
    // Prepare a delete statement
    $sql = "DELETE FROM cart WHERE id = ?";
    
    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $id);
        
        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            echo "Item deleted successfully.";
            header("location:cart.php?user_id=$userId");
        } else {
            echo "Error deleting item: " . mysqli_error($conn);
        }
    }
    
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($conn);
} else {
    echo "Invalid request.";
}
?>
