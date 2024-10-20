<?php
// Function to count the number of employees in the employees table
function countEmployees() {
    // Database connection details
    $servername = "localhost";     // Replace with your MySQL server
    $username = "my_user";         // Replace with your MySQL username
    $password = "my_password";     // Replace with your MySQL password
    $dbname = "my_database";       // Replace with your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to count the number of records in the employees table
    $sql = "SELECT COUNT(*) AS total_employees FROM employees";

    // Execute the query
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result->num_rows > 0) {
        // Fetch the result as an associative array
        $row = $result->fetch_assoc();
        $employee_count = $row['total_employees'];
    } else {
        $employee_count = 0;  // If no records are found, return 0
    }

    // Close the connection
    $conn->close();

    // Return the count of employees
    return $employee_count;
}

// Call the function and display the count
echo "Total Employees: " . countEmployees();
?>
