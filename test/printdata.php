<?php
// Initialize variables
$name = $email = $mobile = $city = "";

// Check if the form is submitted
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
        echo "Data inserted successfully!<br>";
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }

    // Close the statement
    $stmt->close();

    // Query to fetch all students from the database
    $sql = "SELECT * FROM student";
    $result = mysqli_query($conn, $sql);

    // Display fetched data
    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Student Records</h2>";
        echo "<table border='1'>
                <tr>
                    <th>Sno</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>City</th>
                </tr>";

        // Display each row of data
        $sno = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . $sno++ . "</td>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['mobile'] . "</td>
                    <td>" . $row['city'] . "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No data found.";
    }

    // Close the connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <h1>Insert Student Data</h1>
    <form action="" method="post">
        Name: <input type="text" name="name" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        Mobile: <input type="number" name="mobile" required><br><br>
        City: <input type="text" name="city" required><br><br>
        <input type="submit" name="submit" value="Send Data">
    </form>
</body>

</html>