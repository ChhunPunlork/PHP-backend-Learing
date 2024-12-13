<!-- <?php 
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $city = $_POST['city'];


        $hs = "localhost";
        $us = "root";
        $ps = "";
        $dbname = "phptutorial";
         
        $conn = mysqli_connect($hs, $us, $ps, $dbname);
        $sql = "INSERT INTO student(name, email, mobile, city) values($name, $email, $mobile, $city)";
        mysqli_query($conn, $sql);

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
    <form action="#" method="post">
        Name: <input type="text" name="name"><br><br>
        Email: <input type="email" name="email"><br><br>
        Mobile: <input type="number" name="mobile"><br><br>
        City: <input type="text" name="city"><br><br>
        <input type="submit" name="submit" value="send data">

    </form>
</body>
</html> -->

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input</title>
</head>
<body>
    <form action="" method="post">
        Name: <input type="text" name="name" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        Mobile: <input type="number" name="mobile" required><br><br>
        City: <input type="text" name="city" required><br><br>
        <input type="submit" name="submit" value="Send Data">
    </form>
</body>
</html>