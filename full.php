<!DOCTYPE html>
<html>
<head>
    <title>PHPMyAdmin Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            max-width: 400px;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 5px;
        }
        h2 {
            text-align: center;
        }
        .button-group {
            margin-top: 20px;
            text-align: center;
        }
        .button-group button {
            margin: 5px;
        }
        .success-msg {
            margin-top: 20px;
            text-align: center;
            color: green;
        }
        .error-msg {
            margin-top: 20px;
            text-align: center;
            color: red;
        }
    </style>
</head>
<body>
    <form method="post">
        <table align="center"> 
            <h1 align="center">User Form</h1>
            <hr>
            <tr>
                <td>Name: </td>
                <td><input type="text" name="Name"></td>
            </tr> 
            <tr>
                <td>ID: </td>
                <td><input type="text" name="ID"> </td> <br>
            </tr>
            <tr>
                <td>Email: </td>
                <td><input type="text" name="Email"></td>
            </tr>
            <tr>
                <td>CGPA: </td>
                <td><input type="number" name="CGPA"></td>
            </tr>
            <tr>
                <td>University: </td>
                <td><input type="text" name="University"></td>
            </tr>
            <tr>
                <td>Country: </td>
                <td><input type="text" name="Country"></td>
            </tr>
                <div class="button-group">
                <button type="submit" name="submit">Submit</button>
                <button type="submit" name="insert">Insert</button>
                <button type="submit" name="view">View</button>
                <button type="submit" name="delete">Delete</button>
                </div>
    </form>
<?php
        // Display success or error messages
        if (isset($_GET['success'])) {
            echo '<div class="success-msg">Data submitted successfully.</div>';
        }
        if (isset($_GET['error'])) {
            echo '<div class="error-msg">An error occurred. Please try again.</div>';
        }
// Establish a database connection
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "project";

$conn = mysqli_connect($host, $user, $pass, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Process form submissions
if (isset($_POST['submit'])) {
    // Handle form submission logic here
    $Name = $_POST['Name'];
    $ID = $_POST['ID'];
    $Email = $_POST['Email']; 
    $CGPA = $_POST['CGPA'];
    $University = $_POST['University'];
    $Country = $_POST['Country'];
 
    // Prepare the SQL query
    $sql = "INSERT INTO portal(Name,ID,Email,CGPA,University,Country) values ('$Name','$ID','$Email','$CGPA','$University','$Country')";
    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Redirect back to the form page with success message
        header("Location: full.html?success=1");
        exit();
    } else {
        // Redirect back to the form page with error message
        header("Location: full.html?error=1");
        exit();
    }
}

if (isset($_POST['insert'])) {
    // Handle insert logic here
    // ...
    // Redirect back to the form page with success or error messages
    header("Location: full.html?success=1");
    exit();
}

if (isset($_POST['view'])) {
    // Handle view logic here
    // Prepare the SQL query
    $sql = "SELECT * FROM portal";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if any rows were returned
    if (mysqli_num_rows($result) > 0) {
        // Display the data
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Name: " . $row["name"] . "<br>";
            echo "Email: " . $row["email"] . "<br>";
            echo "Phone: " . $row["phone"] . "<br><br>";
        }
    } else {
        echo "No data found";
    }

    // Redirect back to the form page
    header("Location: full.html");
    exit();
}

if (isset($_POST['delete'])) {
    // Handle delete logic here
    // ...
    // Redirect back to the form page with success or error messages
    header("Location: full.html?success=1");
    exit();
}

// Close the database connection
mysqli_close($conn);
?>

</body>
</html>

