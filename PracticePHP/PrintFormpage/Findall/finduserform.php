<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find All Users</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>

    <h1>All Users</h1>
    <p>Below are the details of all users in the database:</p>

    <?php
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

    // Query to fetch all users from the database
    $sql = "SELECT * FROM student";
    $result = mysqli_query($conn, $sql);

    // Check if there are any users in the database
    if (mysqli_num_rows($result) > 0) {
        echo "<h2>All User Records</h2>";
        echo "<table>
                <tr>
                    <th>Sno</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>City</th>
                </tr>";

        // Display each row of data
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . $row['sno'] . "</td>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['mobile'] . "</td>
                    <td>" . $row['city'] . "</td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No users found in the database.</p>";
    }

    // Close the connection
    mysqli_close($conn);
    ?>

</body>
</html>
