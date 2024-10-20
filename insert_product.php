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
    // Get the product name and price from the form
    $name = $_POST['name'];
    $price = $_POST['price'];

    // Prepare an SQL query to insert the new record
    $sql = "INSERT INTO products (name, price) VALUES ('$name', '$price')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "New product inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>

<!-- HTML form to input product details -->
<!DOCTYPE html>
<html>
<head>
    <title>Insert Product</title>
</head>
<body>
    <h2>Insert New Product</h2>
    <form method="post" action="">
        <label for="name">Product Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="price">Product Price:</label><br>
        <input type="number" step="0.01" id="price" name="price" required><br><br>

        <input type="submit" value="Insert Product">
    </form>
</body>
</html>
