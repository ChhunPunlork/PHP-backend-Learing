<?php
if (isset($_POST['submit'])) {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $city = $_POST['city'];

    // Database credentials
    $hs = "localhost";
    $us = "root";
    $ps = "";
    $dbname = "phptutorial";

    // Create connection
    $conn = mysqli_connect($hs, $us, $ps, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO student (name, email, mobile, city) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $name, $email, $mobile, $city); // 's' for string, 'i' for integer

    // Execute the query
    if ($stmt->execute()) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    mysqli_close($conn);
}
?>