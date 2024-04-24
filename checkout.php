<?php
require_once "connection.php";

if (isset($_POST["user_id"])) {
    $userId = $_POST["user_id"];
    $sql = "DELETE FROM cart WHERE userId=$userId";
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "User ID not provided";
}
?>
