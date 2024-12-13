<?php
//define variable
$sno = "";

//check if the form is submitted
if (isset($_POST['findbyid'])) {
    //get from data
    $sno = $_POST['id'];

    //db credential
    $hs = "localhost";
    $us = "root";
    $ps = "";
    $dbname = "phptutorial";

    $conn = mysqli_connect($hs, $us, $ps, $dbname);

    //check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    //query to find user by id
    $sql = "SELECT * FROM student WHERE sno = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $sno);

    // Execute the query
    $stmt->execute();
    $result = $stmt->get_result();

    // Display fetched data
    if ($result->num_rows > 0) {
        echo "<h2>User Found</h2>";
        echo "<table>
                    <tr>
                        <th>Sno</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>City</th>
                    </tr>";

        // Display the found user data
        $row = $result->fetch_assoc();
        echo "<tr>
                    <td>" . $row['sno'] . "</td>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['mobile'] . "</td>
                    <td>" . $row['city'] . "</td>
                </tr>";

        echo "</table>";
    } else {
        echo "No user found with id: " . $sno;
    }

    // Close the connection
    $stmt->close();
    mysqli_close($conn);
}
