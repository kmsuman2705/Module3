<?php
// Database connection details
$servername = "localhost";
$username = "my_user";         // Replace with your MySQL username
$password = "my_password";     // Replace with your MySQL password
$dbname = "my_database";       // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the order ID from the form
    $order_id = $_POST['order_id'];

    // Prepare the SQL statement to delete the record
    $sql = "DELETE FROM orders WHERE order_id = $order_id";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Order deleted successfully!";
    } else {
        echo "Error deleting order: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>

<!-- HTML form to input the order ID -->
<!DOCTYPE html>
<html>
<head>
    <title>Delete Order</title>
</head>
<body>
    <h2>Delete an Order</h2>
    <form method="post" action="">
        <label for="order_id">Order ID:</label><br>
        <input type="number" id="order_id" name="order_id" required><br><br>

        <input type="submit" value="Delete Order">
    </form>
</body>
</html>
