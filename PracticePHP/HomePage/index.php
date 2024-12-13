<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <h1>Welcome to the Home Page</h1>
    <p>Click the buttons below to either send data or find a user:</p>

    <form action="http://localhost/phptut/PracticePHP/InputFormPage/inputprocess.php" method="get">
        <input type="submit" value="Send Data">
    </form>
    <br>
    
    <!-- Button to go to Find User page -->
    <form action="http://localhost/phptut/PracticePHP/PrintFormpage/finduser.html" method="get">
        <input type="submit" value="Find User">
    </form>
</body>
</html>
